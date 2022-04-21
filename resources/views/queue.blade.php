@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-center text-danger text-lighten-xs p-3"><b>AEV Booking Queue</b></h1>
        <div class="col-md-9 pb-2">
            <div class="card">
                <div class="card-header text-light bg-danger"><b>Booking Search</b></div>
                <div class="card-body">
                    <form action="/booking_search" method="POST">
                    @csrf
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">UID</span>
                                    </div>
                                    <input type="number" class="form-control" name="id" placeholder="123" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Name</span>
                                    </div>
                                    <input type="text" class="form-control" name="username" placeholder="John Doe" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success" id="snatch">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">UID</th>
                        <th scope="col">Pickup</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                        foreach($bookings as $booking){ ?>
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->pickup }}</td>
                        <td>{{ $booking->destination }}</td>
                        <td>{{ $booking->status }}</td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
