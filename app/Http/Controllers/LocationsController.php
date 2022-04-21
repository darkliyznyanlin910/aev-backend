<?php

namespace App\Http\Controllers;

use App\Models\locations;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    //

    public function list_location()
    {
        $locations = locations::select('name')->distinct()->get();
        return ['locations'=>$locations];
    }
}
