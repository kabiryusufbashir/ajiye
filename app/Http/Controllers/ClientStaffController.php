<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Staff;

class ClientStaffController extends Controller
{
    public function __construct(){
        $this->middleware('auth:staff');
    }

    public function index(){   
        return view('client.staff');
    }

    public function editstaff($staff){
        $staff = Staff::findOrFail($staff);
        return view('client.staff.edit', compact('staff'));
    }

    public function updatestaff(Request $request, $id){
        $data = $request->validate([
            'staff_name' => ['required'],
            'staff_email' => ['required'],
            'staff_type' => ['required'],
        ]);

        try{
            $staff = Staff::where('id', $id)->update($data);
            return redirect()->route('dashboard-staff')->with('success', 'Staff Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }
}
