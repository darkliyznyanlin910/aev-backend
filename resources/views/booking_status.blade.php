@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-center text-danger text-lighten-xs p-3"><b>AEV Booking Status</b></h1>
        <?php if($check){
            $hash = hash('sha256', $result->username);
            if($new){?>
                <div>
                    <div class="alert alert-success d-flex justify-content-center">
                        <div>Your booking is confirmed. You can access booking status later
                            <a href="/booking_status/{{ $result->id }}/{{ $hash }}">HERE</a>.
                        </div>
                    </div>
                </div>
            <?php }else{ ?>
                <div>
                    <div class="alert alert-success d-flex justify-content-center">
                        <div>You can access booking status later
                            <a href="/booking_status/{{ $result->id }}/{{ $hash }}">HERE</a>.
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="pb-2">
                <div class="card">
                    <div class="card-header text-light bg-danger"><b>Booking Info</b></div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td><b>Booking ID</b></td>
                                    <td><b>{{ $result->id }}</b></td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $result->username }}</td>
                                </tr>
                                <tr>
                                    <td>Pickup</td>
                                    <td>{{ $result->pickup }}</td>
                                </tr>
                                <tr>
                                    <td>Destination</td>
                                    <td>{{ $result->destination }}</td>
                                </tr>
                                <tr>
                                    <td>Booked Time</td>
                                    <td>{{ $result->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Queue Number</td>
                                    <td>{{ $queue }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a type="button" class="btn btn-danger" href="{{ url()->previous() }}">Back</a>
                <a type="button" class="btn btn-success" href="{{ route('index') }}">Home</a>
            </div>
        <?php }else{ ?>
            <div>
                <div class="alert alert-danger d-flex justify-content-center">
                    <div>
                        Booking not found. Check UID and Name again.
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a type="button" class="btn btn-danger" href="{{ url()->previous() }}">Back</a>
                <a type="button" class="btn btn-success" href="{{ route('index') }}">Home</a>
            </div>
        <?php } ?>
    </div>
</div>

@endsection
