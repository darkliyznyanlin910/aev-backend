<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bookings;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $bookings = bookings::all();
        return view('dashboard', ['bookings' => $bookings]);
    }

    public function logs()
    {
        $bookings = bookings::all();
        return view('logs', ['bookings' => $bookings]);
    }

    public function manage_locations($new)
    {
        $new = 0;
        $locations = locations::all();
        return view('manage_locations', ['locations' => $locations, 'new' => $new]);
    }

    public function new_location(request $request)
    {
        $new = 0;

        $name = strtoupper($request['name']);
        $result = locations::create(    ['name' => $name, 'px' => $request['px'], 'py' => $request['py'], 'pz' => $request['pz'], 
                                        'ox' => $request['ox'], 'oy' => $request['oy'], 'oz' => $request['oz'], 'ow' => $request['ow'],]);
        $new_location = bookings::where('id', $result->id)->get();

        if(count($new_location) == 1){
            $new = 1;
            return to_route('manage_locations', array('new' => $new, 'new_location_id' => $result->id));
        }else{
            return view('booking', ['new' => $new]);
        }
    }
}
