<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Morilog\Jalali\Jalalian;

class HomeController extends Controller
{

    public function index(Request $request){

        return view('dashboard.home');
    }
}
