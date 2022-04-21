@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-center text-danger text-lighten-xs p-3"><b>AEV Booking Logs</b></h1>
        <h3 class="text-center"><b>Filter</b></h3>
        <div class="col-md-9">
            <div class="input-group justify-content-center mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="start">Start date and time:</label>
                </div>
                <div class="input-group-append">
                    <input class="form-control" type="date" id="date-start">
                </div>
            </div>

            <div class="input-group justify-content-center mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="start">End date and time:</label>
                </div>
                <div class="input-group-append">
                    <input class="form-control" type="date" id="date-stop">
                </div>
            </div>  
            
            <div class="text-center pb-3">
                <button type="button" class="btn btn-danger pe-3" id="reset" onclick="reset()">Reset</button>
                <button type="button" class="btn btn-success" id="filter" onclick="searchDate()">Filter</button>
            </div>
            </p>
        </div> 
        <div class="col-md-9">
            <table class="table" id="bookings">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">UID</th>
                        <th scope="col">User</th>
                        <th scope="col">Pickup</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Status</th>
                        <th scope="col">Time Booked</th>
                        <th scope="col">Last Updated</th>
                    </tr>
                </thead>
                <tbody id="bookings">
                    <?php $i = 1;
                        foreach($bookings as $booking){ ?>
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->username }}</td>
                        <td>{{ $booking->pickup }}</td>
                        <td>{{ $booking->destination }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>{{ $booking->created_at }}</td>
                        <td>{{ $booking->updated_at }}</td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function searchDate() {
        var input_startDate, input_stopDate, table, tr, i, temp, temp1, temp2;

        // get the values and convert to date
        input_startDate = new Date(document.getElementById("date-start").value);
        input_stopDate = new Date(document.getElementById("date-stop").value);

        table = document.getElementById("bookings");
        tr = table.getElementsByTagName("tr");
        
        console.log(input_startDate);
        console.log(input_stopDate);
        for (i = 1; i < tr.length+1; i++) {
            // you need to get the text and convert to date
            temp = tr[i].getElementsByTagName("td")[5].textContent;
            temp1 = temp.split(" ");
            temp2 = temp1[0];
            let td_date = new Date(temp2);
            console.log(td_date);
            // now you can compare dates correctly
            if (td_date) {
                if (td_date >= input_startDate && td_date <= input_stopDate) {
                    // show the row by setting the display property
                    tr[i].style.display = 'table-row';
                } else {
                    // hide the row by setting the display property
                    tr[i].style.display = 'none';
                }
            }

        }
    }
    function reset() {
        var input_startDate, input_stopDate, table, tr, i;

        input_startDate = new Date(document.getElementById("date-start").value);
        input_stopDate = new Date(document.getElementById("date-stop").value);

        table = document.getElementById("bookings");
        tr = table.getElementsByTagName("tr");

        document.getElementById("date-start").value = "";
        document.getElementById("date-stop").value = "";

        for (i = 0; i < tr.length; i++) {
            tr[i].style.display = 'table-row';
        }
    }
</script>   
@endsection
