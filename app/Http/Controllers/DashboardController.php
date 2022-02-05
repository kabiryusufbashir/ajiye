<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Client;

class DashboardController extends Controller
{
    public function index(){   
        return view('dashboard.index');
    }

    public function clientcreate(Request $request)
    {
        $data = request()->validate([
            'client_business_name'=> 'required',
            'client_email'=> 'required|email',
            'client_username'=> 'required',
            'client_phone_number'=> 'required',
            'client_address'=> 'required',
            'client_photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = '/images/clients/'.time().'.'.$request->client_photo->extension();  
        
        try{
            Client::create(
                [
                'client_business_name'=>$request->client_business_name,
                'client_email'=>$request->client_email,
                'client_username'=>$request->client_username,
                'client_phone_number'=>$request->client_phone_number,
                'client_address'=>$request->client_address,
                'client_photo'=>$imageName,
                'client_password' => Hash::make('1234567890')
                ]);
                
                $request->client_photo->move('images/clients', $imageName);
                
                return redirect()->route('dashboard-admin')->with('success', 'Client Added');
            
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());    
            }
    }
}
