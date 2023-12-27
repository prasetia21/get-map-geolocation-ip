<?php

namespace App\Http\Controllers;

use App\Models\Coordinate as ModelsCoordinate;
use Illuminate\Http\Request;

class CoordinateController extends Controller
{
    public function index(Request $request)
    { 
        return view('geolocation');
    }

    public function storeLocation(Request $request) {
        $location = ModelsCoordinate::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        // Return a success response or handle errors as needed
        return response()->json(['success' => true]);
    }
}