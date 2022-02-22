<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Account;
use App\Models\Accountcategory;
use App\Models\Record;

class APIController extends Controller
{
    public function __construct(){
        $this->middleware('auth:staff');
    }

    public function getAccount(){
        $client = Auth::guard('staff')->user()->client_id;
        $data = Account::where('client_id', $client)->orderby('account_name', 'asc')->get();
        return response()->json($data);
    }

    public function getSubaccount(Request $request){
        $data = Accountcategory::where('account_id', $request->account_id)->orderby('account_category_name', 'asc')->get();
        return response()->json($data);
    }

    public function getMonth(Request $request){
        $client = Auth::guard('staff')->user()->client_id;
        $data = Record::select('month')->where('client_id', $client)->orderby('month', 'asc')->distinct()->get();
        return response()->json($data);
    }

    public function getYear(Request $request){
        $client = Auth::guard('staff')->user()->client_id;
        $data = Record::select('year')->where('month', $request->month_id)->where('client_id', $client)->orderby('month', 'asc')->distinct()->get();
        return response()->json($request->month);
    }
}
