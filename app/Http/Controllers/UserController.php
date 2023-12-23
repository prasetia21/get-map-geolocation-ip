<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Http;


class UserController extends Controller
{
    public function index(Request $request)
    { 
        $getIP = getData();
        $ip = $getIP['ip'];

        //$ip = '36.80.226.224';
        // $ip = $_SERVER['REMOTE_ADDR'];
  

        $currentUserInfo = Location::get($ip);

    

        return view('user', compact('currentUserInfo'));

    }

    
   
    
}