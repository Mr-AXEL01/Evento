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
        <p class="cinema">ODEON CINEMA PRESENTS</p>
        <p class="movie-title">ONLY GOD FORGIVES</p>
    </div>
    <div class="poster">
        <img src="{{ $event->cover }}" alt="Event Cover" />
    </div>
    <div class="info">
        <table>
            <tr>
                <th>EVENT</th>
                <th>LOCATION</th>
                <th>DATE</th>
            </tr>
            <tr>
                <td class="bigger">{{ $event->title }}</td>
                <td>{{ $event->location }}</td>
                <td>{{ $event->date }}</td>
            </tr>
        </table>
        <table>
            <tr>
                <th>CUSTOMER</th>
                <th>EMAIL</th>
            </tr>
            <tr>
                <td>{{ $reservation->customer->name }}</td>
                <td>{{ $reservation->customer->email }}</td>
            </tr>
        </table>
    </div>
    <div class="holes-lower"></div>
    <div class="serial">
        <table class="barcode"><tr></tr></table>
        <table class="numbers">
            <tr>
                @foreach(str_split($reservation->id) as $digit)
                    <td>{{ $digit }}</td>
                @endforeach
            </tr>
        </table>
    </div>
</div>


</body>
</html>
