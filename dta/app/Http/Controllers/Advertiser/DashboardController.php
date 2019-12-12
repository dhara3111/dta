<?php

namespace App\Http\Controllers\Advertiser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /*----------------------------------------------------------------------------------
            This method use for display Dashboard Form
    ------------------------------------------------------------------------------------*/
    public function index(){
        return view('advertiser.dashboard.index');
    }
}
