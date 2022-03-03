<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Client;
use App\Models\Account;
use App\Models\Accountcategory;
use App\Models\Record;
use App\Models\Imprest;
use App\Models\Staff;
use DB;

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
}
