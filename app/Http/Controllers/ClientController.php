<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Client;
use App\Models\Account;
use App\Models\Accountcategory;
use App\Models\Record;
use App\Models\Imprest;
use DB;

class ClientController extends Controller
{

    public function __construct(){
        $this->middleware('auth:staff');
    }

    public function index(){   
        $client = Auth::guard('staff')->user()->client_id;
        $business = Client::where('id', $client)->first();
        $accounts = Account::where('client_id', $client)->orderby('account_name', 'asc')->get();
        $accountcategory = Accountcategory::orderby('account_category_name', 'asc')->get();

        
        //Getting Imprest ID
        $imprest_id = Account::select('id')->where('account_name', 'imprest')->first();
        
        $imprest = Record::where('account_id', $imprest_id->id)->where('client_id', $client)->sum('record_amount');
        $records = Record::where('client_id', $client)->where('account_id', '!=', $imprest_id->id)->sum('record_amount');
        
        //Getting the balance 
        $balance = $imprest - $records;
        
        //View Report
        $months = Record::select('month')->where('client_id', $client)->orderby('month', 'asc')->distinct()->get();
        $years = Record::select('year')->where('client_id', $client)->orderby('year', 'asc')->distinct()->get();
        // dd($view_report);

        return view('client.index', compact('business', 'accounts', 'accountcategory', 'balance', 'months', 'years'));
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
                'year' => date('Y', strtotime($record_date))
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
        $report_columns = Account::where('client_id', $client)->where('id', '!=', $imprest_id->id)->get();
        $received = Record::where('month', $month)->where('year', $year)->where('client_id', $client)->where('account_id', $imprest_id->id)->orderby('day', 'asc')->get();
        $reports = Record::where('month', $month)->where('year', $year)->where('client_id', $client)->where('account_id', '!=', $imprest_id->id)->orderby('day', 'asc')->get();
        

        //Balance C/D
        $imprest_month = Record::where('account_id', $imprest_id->id)->where('month', $month)->where('year', $year)->where('client_id', Auth::guard('staff')->user()->client_id)->sum('record_amount');
        $expenditure = Record::where('account_id', '!=', $imprest_id->id)->where('month', $month)->where('year', $year)->where('client_id', Auth::guard('staff')->user()->client_id)->sum('record_amount');
        $balance_month = $imprest_month - $expenditure;

        //Balance B/D
        if($month == 01){
            $month_bd = 12;
            $count_month_bd = Record::where('month', '<=', $month_bd)->where('year', $year)->where('client_id', $client)->where('account_id', '!=', $imprest_id->id)->orderby('month', 'desc')->get();
            
            if(count($count_month_bd) > 0){
                $month_bd = Record::where('month', '<=', $month_bd)->where('year', $year)->where('client_id', $client)->where('account_id', '!=', $imprest_id->id)->orderby('month', 'desc')->limit(1)->first();
                $month_bd = $month_bd->month;
            }else{
                $month_bd = '';
            }
        }else{
            $month_bd = Record::select('month')->where('month', '<', $month)->where('year', $year)->where('client_id', $client)->where('account_id', '!=', $imprest_id->id)->orderby('month', 'desc')->limit(1)->first();
            $month_bd = $month_bd->month;
        }
        
        if($month_bd == 12){
            $year_bd = $year - 1;
        }else{
            $year_bd = $year;
        }
    
        $imprest_month_bd = Record::where('account_id', $imprest_id->id)->where('month', '<', $month_bd)->where('year', $year_bd)->where('client_id', Auth::guard('staff')->user()->client_id)->sum('record_amount');
        $expenditure_bd = Record::where('account_id', '!=', $imprest_id->id)->where('month', '<', $month_bd)->where('year', $year_bd)->where('client_id', Auth::guard('staff')->user()->client_id)->sum('record_amount');
        
        $balance_month_bd = $imprest_month_bd - $expenditure_bd;
        
        return view('client.view-report', compact(
            'report_columns', 'month', 
            'year', 'business', 
            'accounts', 'accountcategory', 
            'balance', 'months', 'years', 
            'reports', 'imprest_id', 
            'balance_month', 'received',
            'balance_month_bd'
        ));
    }

    //Logout
    public function logout(Request $request)
    {   
        Auth::guard('staff')->logout();
        return redirect()->route('front.index');
    }
}
