<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Client;
use App\Models\Account;
use App\Models\Accountcategory;
use App\Models\Record;
use App\Models\Imprest;
use App\Models\Staff;
use DB;

use App\Charts\ClientStatisticChart;

class ClientController extends Controller
{

    public function __construct(){
        $this->middleware('auth:staff');
    }

    public function index(){   
        $client = Auth::guard('staff')->user()->client_id;
        
        //Getting Imprest ID
        $imprest_id = Account::select('id')->where('client_id', $client)->where('account_name', 'imprest')->first();

        //Chart
        $dataset = DB::table('records')
            ->join('accounts', 'records.account_id', '=', 'accounts.id')
            ->where('accounts.id', '!=', $imprest_id->id)
            ->where('accounts.client_id', '=', $client)
            ->select('accounts.account_name', \DB::raw("SUM(record_amount) as total"))
            ->groupBy('accounts.account_name')
            ->get();
        $chart = new ClientStatisticChart;
        $chart->labels($dataset->pluck('account_name'));
        $chart->dataset('Expenditure Statistics', 'bar', $dataset->pluck('total'))->options(['backgroundColor' => '#3CB371']);
        
        $staff = Staff::where('client_id', $client)->get();

        return view('client.index', compact('chart', 'staff'));
    }

    //Account
    public function addaccount(Request $request){
        $data = $request->validate([
            'account_name' => ['required'],
        ]);

        $client = Auth::guard('staff')->user()->client_id;
        $account_name = $data['account_name'];

        $check = Account::where('account_name', $account_name)->where('client_id', $client)->get();

        if(count($check) == 0){
            try{
                Account::create([
                    'client_id' => $client,
                    'account_name' => $data['account_name'],
                ]);
    
                return redirect()->route('dashboard-client')->with('success', $account_name.' Account Created'); 
                
            }catch(Expection $e){
                return back()->with(['error' => 'Please try again later! ('.$e.')']);
            }
        }else{
            return redirect()->route('dashboard-client')->with('error', $account_name.' already exists');
        }
    }

    //Sub Account
    public function addsubaccount(Request $request){
        $data = $request->validate([
            'account_id' => ['required'],
            'account_category_name' => ['required'],
        ]);

        $client = Auth::guard('staff')->user()->client_id;
        $account_id = $data['account_id'];
        $account_category_name = $data['account_category_name'];

        $check = Accountcategory::where('account_id', $account_id)->where('account_category_name', $account_category_name)->get();

        if(count($check) == 0){
            try{
                Accountcategory::create([
                    'account_id' => $account_id,
                    'account_category_name' => $account_category_name
                ]);
    
                return redirect()->route('dashboard-client')->with('success', $account_category_name.' Account Created'); 
                
            }catch(Expection $e){
                return back()->with(['error' => 'Please try again later! ('.$e.')']);
            }
        }else{
            return redirect()->route('dashboard-client')->with('error', $account_name.' already exists');
        }
    }

    //Imprest
    public function addimprest(Request $request){
        $data = $request->validate([
            'imprest_amount' => ['required'],
            'date' => ['required'],
        ]);

        $client = Auth::guard('staff')->user()->client_id;
        $imprest_amount = $data['imprest_amount'];
        $date = $data['date'];

        try{
            Imprest::create([
                'client_id' => $client,
                'imprest_amount' => $data['imprest_amount'],
                'day' => date('d', strtotime($date)),
                'month' => date('m', strtotime($date)),
                'year' => date('Y', strtotime($date))
            ]);

            return redirect()->route('dashboard-client')->with('success', $imprest_amount.' Added'); 
            
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }

    //Record
    public function addrecord(Request $request){
        $data = $request->validate([
            'account_id' => ['required'],
            'record_date' => ['required'],
            'record_amount' => ['required'],
            'accountcategory_id' => [''],
            'details' => [''],
            'record_receipt_no' => [''],
        ]);

        $record_date = $data['record_date'];
        $account_id = $data['account_id'];
        $accountcategory_id = $data['accountcategory_id'];
        $record_amount = $data['record_amount'];
        $record_receipt_no = $data['record_receipt_no'];
        $details = $data['details'];
        $staff_id = Auth::guard('staff')->user()->id;
        $client_id = Auth::guard('staff')->user()->client_id;
        $timestamp = strtotime($data['record_date']) + date('His');
        
        try{
            Record::create([
                'account_id' => $account_id,
                'client_id' => $client_id,
                'accountcategory_id' => $accountcategory_id,
                'record_date' => $record_date,
                'record_amount' => $record_amount,
                'record_receipt_no' => $record_receipt_no,
                'details' => $details,
                'staff_id' => $staff_id,
                'day' => date('d', strtotime($record_date)),
                'month' => date('m', strtotime($record_date)),
                'year' => date('Y', strtotime($record_date)),
                'timestamp' => $timestamp
            ]);

            return redirect()->route('dashboard-client')->with('success', 'Imprest Stored'); 
            
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }

    //View Report
    public function viewreport(Request $request){
        $client = Auth::guard('staff')->user()->client_id;
        $business = Client::where('id', $client)->first();
        $accounts = Account::where('client_id', $client)->orderby('account_name', 'asc')->get();
        $accountcategory = Accountcategory::orderby('account_category_name', 'asc')->get();
        
        //Getting Imprest ID
        $imprest_id = Account::select('id')->where('account_name', 'imprest')->first();

        $imprest = Record::where('account_id', $imprest_id->id)->where('client_id', $client)->sum('record_amount');
        $records = Record::where('account_id', '!=', $imprest_id->id)->where('client_id', $client)->sum('record_amount');
        
        //Getting the balance 
        $balance = $imprest - $records;
        
        //View Report
        $months = Record::select('month')->where('client_id', $client)->orderby('month', 'asc')->distinct()->get();
        $years = Record::select('year')->where('client_id', $client)->orderby('year', 'asc')->distinct()->get();

        //Validating Page
        $data = $request->validate([
            'month' => ['required'],
            'year' => ['required'],
        ]);

        $client = Auth::guard('staff')->user()->client_id;
        $month = $data['month'];
        $year = $data['year'];

        //Reports data
        $data_count = Record::where('month', $month)->where('year', $year)->where('client_id', $client)->orderby('day', 'asc')->get();
        $report_columns = Account::where('client_id', $client)->where('id', '!=', $imprest_id->id)->get();
        $received = Record::where('month', $month)->where('year', $year)->where('client_id', $client)->where('account_id', $imprest_id->id)->orderby('day', 'asc')->get();
        $reports = Record::where('month', $month)->where('year', $year)->where('client_id', $client)->where('account_id', '!=', $imprest_id->id)->orderby('day', 'asc')->get();
        
        //Balance C/D
        $imprest_month = Record::where('account_id', $imprest_id->id)->where('month', $month)->where('year', $year)->where('client_id', Auth::guard('staff')->user()->client_id)->sum('record_amount');
        $expenditure = Record::where('account_id', '!=', $imprest_id->id)->where('month', $month)->where('year', $year)->where('client_id', Auth::guard('staff')->user()->client_id)->sum('record_amount');
        $balance_month = $imprest_month - $expenditure;

        //Balance B/D
        // Getting the previous month 
            if($month == 01){
                $month_bd = 12;
                $year_month_bd = $year - 1;
                $count_month_bd = Record::where('month', '<=', $month_bd)->where('year', $year_month_bd)->where('client_id', $client)->orderby('timestamp', 'desc')->get();
                    if(count($count_month_bd) > 0){
                        $getting_month_bd = Record::select('month', 'timestamp')->where('month', '<=', $month_bd)->where('year', $year_month_bd)->where('client_id', $client)->orderby('timestamp', 'desc')->limit(1)->first();
                        $month_bd = $getting_month_bd->month;
                        $month_timestamp = $getting_month_bd->timestamp;
                    }else{
                        $month_bd = '';
                        $month_timestamp = '';
                    }
            }else{
                //if previous month is not 12
                $count_month_bd = Record::where('month', '<', $month)->where('year', $year)->where('client_id', $client)->orderby('timestamp', 'desc')->get();
                if(count($count_month_bd) > 0){
                    $getting_month_bd = Record::select('month', 'timestamp')->where('month', '<', $month)->where('year', $year)->where('client_id', $client)->orderby('timestamp', 'desc')->limit(1)->first();
                    $month_bd = $getting_month_bd->month;
                    $month_timestamp = $getting_month_bd->timestamp;
                }else{
                    $month_bd = '';
                    $month_timestamp = '';
                }
            }
               
        //Calculating the imprest and total expenditure
        $received_last_month = Record::where('timestamp', '<=', $month_timestamp)->where('client_id', $client)->where('account_id', $imprest_id->id)->sum('record_amount');
        $expenditure_last_month = Record::where('timestamp', '<=', $month_timestamp)->where('client_id', $client)->where('account_id', '!=', $imprest_id->id)->sum('record_amount');
        $balance_month_bd = $received_last_month - $expenditure_last_month;

        return view('client.view-report', compact(
            'report_columns', 'month', 
            'year', 'business', 
            'accounts', 'accountcategory', 
            'balance', 'months', 'years', 
            'reports', 'imprest_id', 
            'balance_month', 'received',
            'balance_month_bd', 'data_count'
        ));
    }

    //Delete Received
    public function deletereceived($id){
        $received = Record::findOrFail($id);
        try{
            $received->delete();
            return redirect()->route('dashboard-client')->with('success', 'Imprest Deleted');
        }catch(Exception $e){
            return redirect()->route('dashboard-client')->with('error', 'Please try again... '.$e);
        }
    }

    //Delete Report
    public function deletereport($id){
        $report = Record::findOrFail($id);
        try{
            $report->delete();
            return redirect()->route('dashboard-client')->with('success', 'Report Deleted');
        }catch(Exception $e){
            return redirect()->route('dashboard-client')->with('error', 'Please try again... '.$e);
        }
    }

    //Staff
    public function addstaff(Request $request){
        $data = $request->validate([
            'staff_name' => ['required'],
            'staff_email' => ['required'],
            'staff_username' => ['required'],
            'password' => ['required'],
            'staff_type' => ['required'],
        ]);

        $client = Auth::guard('staff')->user()->client_id;
        $staff_name = $data['staff_name'];
        $staff_email = $data['staff_email'];
        $staff_username = $data['staff_username'];
        $password = Hash::make($data['password']);
        $staff_type = $data['staff_type'];

        try{
            Staff::create([
                'client_id' => $client,
                'staff_username' => $data['staff_username'],
                'staff_name' => $data['staff_name'],
                'staff_email' => $data['staff_email'],
                'password' => $password,
                'staff_type' => $data['staff_type'],
                'staff_status' => 1
            ]);

            return redirect()->route('dashboard-client')->with('success', $staff_name.' Added'); 
            
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }

    public function editprofile(Request $request){
        
        $data = $request->validate([
            'old_password' => ['required'],
            'password' => ['required'],
        ]);

        
        $user =  Auth::guard('staff')->user();
        
        if($request->old_password){
            if (Hash::check($request->old_password, $user->password)){
                $password = Hash::make($request->password);
                    try{
                        $user = Staff::where('id', $user->id)->update(['password'=> $password]);
                        return redirect()->route('dashboard-client')->with('success', 'Password Changed');
                    }catch(Exception $e){
                        return back()->with('error', 'Please try again... '.$e);
                    }
            }else{
                return back()->with('error', 'Please Check Your Password and Try Again');
            }
        }
    }

    //Logout
    public function logout(Request $request)
    {   
        Auth::guard('staff')->logout();
        return redirect()->route('front.index');
    }
}
