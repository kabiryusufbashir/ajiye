<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Client;

class LoginController extends Controller
{
    public function index(){
        return view('welcome');    
    }

    public function adminlogin(){
        return view('auth.admin');    
    }

    public function setupsystem(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try{
            User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);

            try{
                if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])){
                    $request->session()->regenerate();
                    return redirect()->route('dashboard'); 
                }else{
                    return back()->with(['error' => 'Please try again later! ('.$e.')']);
                }
            }catch(Exception $e){
                return back()->with(['error' => 'Please try again later! ('.$e.')']);
            }
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }

    public function loginadmin(Request $request){
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $username = $request->username;

        $admin = User::where('username', $username)->first();
    
        if($admin !== null){
            try{
                if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
                    $request->session()->regenerate();
                    return redirect()->route('dashboard-admin');
                }else{
                    return back()->with('error', 'Incorrect Username or Password');
                }
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());
            }
        }else{
            return back()->with('error', 'Please contact your system adminstration!');
        }

    }

    public function loginclient(Request $request){
        // dd($request->client_password);

        $credentials = $request->validate([
            'client_username' => ['required'],
            'client_password' => ['required'],
        ]);

        $client_username = $request->client_username;

        $client = Client::where('client_username', $client_username)->first();
    
        if($client !== null){
            try{
                if(Auth::guard('client')->attempt(['client_username' => $request->client_username, 'password' => $request->client_password])){
                    $request->session()->regenerate();
                    return redirect()->route('dashboard-client');
                }else{
                    return back()->with('error', 'Incorrect Username or Password');
                }
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());
            }
        }else{
            return back()->with('error', 'Please contact your system adminstration!');
        }
        
    }

    public function logout(Request $request)
    {   
        Auth::guard('web')->logout();
        return redirect()->route('front.index');
    }
}
