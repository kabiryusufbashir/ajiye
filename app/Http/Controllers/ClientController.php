<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Client;

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

    public function logout(Request $request)
    {   
        Auth::guard('staff')->logout();
        return redirect()->route('front.index');
    }
}
