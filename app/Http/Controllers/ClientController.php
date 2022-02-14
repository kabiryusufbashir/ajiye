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
        
        $imprest = Imprest::where('client_id', $client)->sum('imprest_amount');
        $records = Record::where('client_id', $client)->sum('record_amount');
        
        //Getting the balance 
        $balance = $imprest - $records;

        return view('client.index', compact('business', 'accounts', 'accountcategory', 'balance'));
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
        ]);

        $client = Auth::guard('staff')->user()->client_id;
        $imprest_amount = $data['imprest_amount'];

        try{
            Imprest::create([
                'client_id' => $client,
                'imprest_amount' => $data['imprest_amount'],
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
            'accountcategory_id' => [''],
            'record_date' => ['required'],
            'record_amount' => ['required'],
            'record_receipt_no' => ['required'],
        ]);

        $record_date = $data['record_date'];
        $account_id = $data['account_id'];
        $accountcategory_id = $data['accountcategory_id'];
        $record_amount = $data['record_amount'];
        $record_receipt_no = $data['record_receipt_no'];
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
                'staff_id' => $staff_id
            ]);

            return redirect()->route('dashboard-client')->with('success', 'Imprest Stored'); 
            
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }

    //Logout
    public function logout(Request $request)
    {   
        Auth::guard('staff')->logout();
        return redirect()->route('front.index');
    }
}
