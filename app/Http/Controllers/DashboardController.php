<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Client;
use App\Models\Staff;

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
        $client_password = Hash::make('1234567890');

        try{
            Client::create(
                [
                'client_business_name'=>$request->client_business_name,
                'client_email'=>$request->client_email,
                'client_username'=>$request->client_username,
                'client_phone_number'=>$request->client_phone_number,
                'client_address'=>$request->client_address,
                'client_photo'=>$imageName,
                'password' => $client_password 
                ]);
                
                $request->client_photo->move('images/clients', $imageName);
                
                try{
                    
                    $client = Client::where('client_username', $client_username)->first();
                        Staff::create(
                            [
                                'client_id'=>$client->id,
                                'staff_username'=>$request->client_username,
                                'password'=>$request->client_password,
                                'staff_name'=>$request->client_username,
                                'staff_type'=> 1,
                            ]
                        );
                    return redirect()->route('dashboard-admin')->with('success', 'Client Added');
                
                }catch(Exception $e){
                    return redirect('/')->with('error', $e->getMessage());    
                }
            
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());    
            }
    }
}
