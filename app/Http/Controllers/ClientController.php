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
        return view('client.index', compact('business'));
    }

    public function addaccount(Request $request){
        $data = $request->validate([
            'account_name' => ['required'],
        ]);

        $client = Auth::guard('staff')->user()->client_id;

        try{
            Account::create([
                'client_id' => $client,
                'account_name' => $data['account_name'],
            ]);

            return redirect()->route('dashboard-client'); 
            
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }

    public function logout(Request $request)
    {   
        Auth::guard('staff')->logout();
        return redirect()->route('front.index');
    }
}
