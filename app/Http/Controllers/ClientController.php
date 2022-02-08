<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Client;
use App\Models\Account;

class ClientController extends Controller
{

    public function __construct(){
        $this->middleware('auth:staff');
    }

    public function index(){   
        $client = Auth::guard('staff')->user()->client_id;
        $business = Client::where('id', $client)->first();
        $accounts = Account::where('client_id', $client)->get();

        return view('client.index', compact('business', 'accounts'));
    }

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

    public function logout(Request $request)
    {   
        Auth::guard('staff')->logout();
        return redirect()->route('front.index');
    }
}
