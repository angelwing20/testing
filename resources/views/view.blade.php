<style>
    body{
        margin: 0;
    }
    form{
        margin-top: 50px;
    }
    h1{
        margin: 0;
    }
    img{
        width:250px;
        height:auto;
    }
</style>
@extends('header')
@session('content')
    
@endsession
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
        <form action="" method="post">
            @csrf
            <img src="{{ asset('storage/'.$detail->image) }}" alt="">
            <h1>{{ $detail->p_name }}</h1>
            <p style="margin: 5px">Per Price: RM{{ number_format($detail->price,2) }}</p>
            <p style="margin: 2px">Description: {{ $detail->description }}</p>
            <table>
                <tr>
                    <th><label for="mass">Mass (g):</label></th>
                    <td><input type="number" name="mass" min="100" step="50" oninput="cal({{ $detail->price }})" id="mass" value="{{ $detail->mass }}"></td>
                </tr>
                <tr>
                    <th><label for="total_price">Total Price:</label></th>
                    <td><input type="text" name="total_price" id="total_price" value="{{ $detail->price }}" readonly></td>
                </tr>
                <tr>
                    <th><a href="{{ route('index') }}"><button type="button">Back</button></a></th>
                    <td><input type="submit" name="submit"></td>
                </tr>
            </table>
            <div>   
            </div>
        </form>
    </center>
</body>
</html>

<script>
    function cal(price){
        var mass = document.getElementById('mass');
        var vmass = mass.value;

        if (vmass < 100) {
            vmass = 100;
            mass.value = 100;
        }

        var total = mass.value*price/100;
        document.getElementById('total_price').value = total;
    }
</script>