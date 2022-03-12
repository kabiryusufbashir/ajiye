<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

use App\Models\Client;
use App\Models\Account;
use App\Models\Accountcategory;
use App\Models\Record;
use App\Models\Imprest;
use App\Models\Staff;
use DB;

class GlobalData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $client = Auth::guard('staff')->user()->client_id;
        $business = Client::where('id', $client)->first();
        $accounts = Account::where('client_id', $client)->orderby('account_name', 'asc')->get();
        $accountcategory = Accountcategory::orderby('account_category_name', 'asc')->get();

        //Getting Imprest ID
        $imprest_id = Account::select('id')->where('client_id', $client)->where('account_name', 'imprest')->first();

        $staff = Staff::where('client_id', $client)->where('staff_status', 1)->get();
        $imprest = Record::where('account_id', $imprest_id->id)->where('client_id', $client)->sum('record_amount');
        $records = Record::where('client_id', $client)->where('account_id', '!=', $imprest_id->id)->sum('record_amount');

        //Getting the balance 
        $balance = $imprest - $records;

        //View Report
        $months = Record::select('month')->where('client_id', $client)->orderby('month', 'asc')->distinct()->get();
        $years = Record::select('year')->where('client_id', $client)->orderby('year', 'asc')->distinct()->get();

        $imprest = Record::where('account_id', $imprest_id->id)->where('client_id', $client)->sum('record_amount');
        $records = Record::where('client_id', $client)->where('account_id', '!=', $imprest_id->id)->sum('record_amount');

        View::share('business', $business);
        View::share('balance', $balance);
        View::share('staff', $staff);
        View::share('accounts', $accounts);
        View::share('months', $months);
        View::share('years', $years);
        View::share('imprest', $imprest);
        View::share('records', $records);

        return $next($request);
    }
}
