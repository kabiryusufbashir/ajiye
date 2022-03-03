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

class ClientStaffController extends Controller
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
        $imprest_id = Account::select('id')->where('client_id', $client)->where('account_name', 'imprest')->first();

        $staff = Staff::where('client_id', $client)->get();
        $imprest = Record::where('account_id', $imprest_id->id)->where('client_id', $client)->sum('record_amount');
        $records = Record::where('client_id', $client)->where('account_id', '!=', $imprest_id->id)->sum('record_amount');

        //Getting the balance 
        $balance = $imprest - $records;

        //View Report
        $months = Record::select('month')->where('client_id', $client)->orderby('month', 'asc')->distinct()->get();
        $years = Record::select('year')->where('client_id', $client)->orderby('year', 'asc')->distinct()->get();
        
        return view('client.staff', compact('business', 'balance', 'staff', 'accounts', 'months', 'years'));
    }

    public function editstaff($staff){
        $staff = Staff::findOrFail($staff);
        return view('client.staff.edit', compact('staff'));
    }
}
