<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{public_path('/css/ticket.css')}}">
</head>
<body>

<div class="ticket">
    <div class="holes-top"></div>
    <div class="title">
        <p class="movie-title">{{$event->title}}</p>
    </div>
    <div class="info">
        <table>
            <tr>
                <th>LOCATION</th>
                <th>DATE</th>
            </tr>
            <tr>
                <td>{{ $event->location }}</td>
                <td>{{ date('d-m-Y', strtotime($event->date)) }}</td>
            </tr>
        </table>
        <table>
            <tr>
                <th>CUSTOMER</th>
                <th>EMAIL</th>
            </tr>
            <tr>
                <td>{{ $reservation->customer->user->name }}</td>
                <td>{{ $reservation->customer->user->email }}</td>
            </tr>
        </table>
    </div>
    <div class="holes-lower"></div>
    <div class="serial">
        <table class="barcode"><tr></tr></table>
        <table class="numbers">
            <thead>
            <tr>
                <td>
                    Ticket N:
                </td>
            </tr>
            </thead>
            <tr>
                    <td>{{ $reservation->id }}</td>
            </tr>
        </table>
    </div>
</div>


</body>
</html>
