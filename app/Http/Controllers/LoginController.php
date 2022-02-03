<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('auth.setup');    
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

    public function logout(Request $request)
    {   
        Auth::guard('web')->logout();
        return redirect()->route('front.index');
    }
}
