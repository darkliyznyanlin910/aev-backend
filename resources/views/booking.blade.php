@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-center text-danger text-lighten-xs p-3"><b>AEV Booking Portal</b></h1>
        <div class="col-md-9">
            <div>
                <h4 class="text-center">The ASV can navigate to you and bring you to your desired location.</h4>
                <h4 class="text-center">So book it and <b>Snatch</b> a ride on it to explore SP!</h4>
                <h3 class="text-center p-3"><b>Snatch it</b></h3>
            </div>
            <div>
                <p class="text-center">Connection status to the buggy : <span id="status"></span></p>
            </div>
            <form action="/new_booking" method="POST">
            @csrf
                <div class="row mb-3 justify-content-center">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" name="username" placeholder="Name" id="name" required>
                            <input class="input-group-append btn btn-success" type="button" value="Confirm" id="confirm_name">
                        </div>
                    </div>
                </div>


                <div class="row mb-3 justify-content-center" id="confirm1">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Pickup</span>
                            <select name="pickup" class="form-select" onchange="selection()" id="select1">
                                <?php $i = 1;
                                    foreach($locations as $location){ ?>
                                    <option value="{{ $location->name }}">{{ $location->name }}</option>
                                <?php $i++; } ?>
                            </select>
                            <input class="input-group-append btn btn-success" type="button" value="Confirm" id="confirm_pickup">
                        </div>
                    </div>
                </div>


                <div class="row mb-3 justify-content-center" id="confirm2">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Destination</span>
                            <select name="destination" class="form-select" onchange="selection()" id="select2">
                                <?php $i = 1;
                                    foreach($locations as $location){ ?>
                                    <option value="{{ $location->name }}">{{ $location->name }}</option>
                                <?php $i++; } ?>
                            </select>
                            <input class="input-group-append btn btn-success" type="button" value="Confirm" id="confirm_destination">
                        </div>
                    </div>
                </div>
                <div id="error">
                    <div class="alert alert-danger d-flex justify-content-center">Pickup and destination must not be the same.</div>
                </div>


                <div id="confirm3">
                    <div class="text-center pb-3">
                        <input type="button" class="btn btn-danger" id="reset" value="Reset">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" id="snatch">SNATCH</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>

<script>
    document.getElementById("status").style.color = "green";
    document.getElementById("status").innerHTML = "Connected";
    document.getElementById('error').style.display = "none";
    var pickup_div = document.getElementById("confirm1");
    var destination_div = document.getElementById("confirm2");
    var snatch_reset_div = document.getElementById("confirm3");
    pickup_div.style.visibility="hidden";
    destination_div.style.visibility="hidden";
    snatch_reset_div.style.visibility="hidden";

    var name;
    var btn_confirm_name = document.getElementById("confirm_name");
    btn_confirm_name.onclick = function(){
        name = document.getElementById("name").value;
        pickup_div.style.visibility = "visible";
    }

    var pickup;
    var btn_confirm_pickup = document.getElementById("confirm_pickup")
    btn_confirm_pickup.onclick = function(){
        pickup = document.getElementById("select1").value;
        destination_div.style.visibility = "visible";
    }

    var destination;
    var btn_destination = document.getElementById('confirm_destination');
    btn_destination.onclick = function(){
        destination = document.getElementById("select2").value;
        if (pickup==destination){
            document.getElementById('error').style.display = "block";
        }
        else{
            document.getElementById('error').style.display = "none";
            snatch_reset_div.style.visibility = "visible";
        }
    }

    var btn_reset = document.getElementById('reset');
    btn_reset.onclick = function(){
        document.getElementById("name").value = "";
        pickup_div.style.visibility="hidden";
        destination_div.style.visibility="hidden";
        snatch_reset_div.style.visibility="hidden";
    }
</script>
@endsection
