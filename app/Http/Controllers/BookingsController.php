<?php

namespace App\Http\Controllers;

use App\Models\bookings;
use App\Models\locations;
use Illuminate\Http\Request;

class BookingsController extends Controller
{

    //  Web Routes
    public function new_booking(request $request)
    {
        $username = $request['username'];
        $pickup = $request['pickup'];
        $destination = $request['destination'];
        
        $result = bookings::create(['username' => $username, 'pickup' => $pickup, 'destination' => $destination]);
        
        $bookings = bookings::where('id', '<=', $result->id)->whereNot('status', 'Finished')->get();
    
        $count = count($bookings);

        $new = True;
        $check = True;
        return view('booking_status', ['result' => $result, 'queue' => $count, 'new' => $new, 'check' => $check]);
    }

    public function booking_status($input, $username_hash)
    {
        $result = bookings::where('id', $input)->get();
        $check = False;
        $hash = hash('sha256', $result[0]->username);
        if($hash == $username_hash){
            $id = $result[0]->id;
            $bookings = bookings::where('id', '<=', $id)->whereNot('status', 'Finished')->get();
            $count = count($bookings);
            $new = False;
            $check = True;
            return view('booking_status', ['result' => $result[0], 'queue' => $count, 'new' => $new, 'check' => $check]);
        }else{
            return view('booking_status', ['check' => $check]);
        }
    }

    public function booking_search(request $request)
    {   
        $id = $request['id'];
        $username = $request['username'];
        $username_hash = hash('sha256', $username);
        return to_route('booking_status', array('input' => $id,'username_hash' => $username_hash));
    }

    public function queue()
    {
        $bookings = bookings::whereNot('status', 'Finished')->get();
        return view('queue', ['bookings'=>$bookings]);
    }

    public function booking()
    {
        $locations = locations::select('name')->distinct()->get();
        return view('booking', ['locations'=>$locations]);
    }



    //  Api Routes
    public function car_booking_get()
    {
        $count = 0;
        $first_booking = bookings::orderBy('id', 'asc')->whereNot('status', 'Finished')->first();

        if($first_booking != NULL)
        {
            $count = 1;
            $id = $first_booking->id;

            $pickup_coor = locations::where('name', $first_booking->pickup)->get();
            $destination_coor = locations::where('name', $first_booking->destination)->get();
    
            return ['pickup'=>$pickup_coor[0], 'destination'=>$destination_coor[0], 'id'=>$id, 'count' => $count];
        }
        return ['count' => $count];
    }
    
    public function car_booking_update_current($id)
    {
        bookings::where('id', $id)->update(['status' => 'Current Booking']);
        return ['status'=>'successful'];
    }

    public function car_booking_update_finished($id)
    {
        bookings::where('id', $id)->update(['status' => 'Finished']);
        return ['status'=>'successful'];
    }
    
}
