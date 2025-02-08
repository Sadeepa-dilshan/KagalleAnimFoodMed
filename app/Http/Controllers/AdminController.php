<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Driver;
use App\Models\Booking;
use App\Models\CoreSetting;
use Illuminate\Http\Request;
use App\Models\VehicleCategories;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard(){
        return view('backoffice.admin-dashboard');
    }
}
