<?php

namespace App\Http\Controllers;

use App\Models\Location as ModelsLocation;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class GeoController extends Controller
{
  public function index(Request $request)
  {

    $getIP = getData();
    $ip = $getIP['ip'];

    $info = Location::get($ip);

    $lat1 = floatval('-7.824775771304698');
    $lon1 = floatval('110.38513475148494');
    $lat2 = floatval($info->latitude);
    $lon2 = floatval($info->longitude);
    $unit = 'K';


    //dd(gettype(floatval($lat1)));

    $distance = round(distance($lat1, $lon1, $lat2, $lon2, $unit), 2);



    return view('geo', compact('lat1', 'lon1', 'lat2', 'lon2', 'distance', 'info'));
  }

  public function allLocation()
  {
    $location = ModelsLocation::latest()->get();

    return view('all-location', compact('location'));
    
  }

  public function getLocation($id)
  {
    $location = ModelsLocation::findOrFail($id);

    return view('location', compact('location'));
    
  }

  public function storeLocation(Request $request)
  {

    ModelsLocation::insert([
      'ip' => $request->ip,
      'latitude1' => $request->latitude1,
      'latitude2' => $request->latitude2,
      'longitude1' => $request->longitude1,
      'longitude2' => $request->longitude2,
      'distance' => $request->distance,
      'province_name' => $request->province_name,
      'city_name' => $request->city_name,
      'url' => $request->url,
    ]);

    $notification = array(
      'message' => 'Insert Successfully',
      'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
  }
}
