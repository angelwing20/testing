@session('message')
    <script>
        window.alert("{{ session('message') }}")
    </script>
@endsession

<style>
    body{
        margin: 0;
    }
    form{
        margin-top: 80px;
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
        <form action="{{ route('addcart_view',$detail->id) }}" method="post">
            @csrf
            <img src="{{ asset('storage/'.$detail->image) }}" alt="">
            <h1>{{ $detail->p_name }}</h1>
            <p style="margin: 5px">Per Price: RM{{ number_format($detail->price,2) }}</p>
            <p style="margin: 2px">Description: {{ $detail->description }}</p>
            <table>
                <tr>
                    <th><label for="c_mass">Mass (g):</label></th>
                    <td><input type="number" name="c_mass" min="100" step="50" oninput="cal({{ $detail->price }})" id="c_mass" value="{{ $detail->mass }}"></td>
                </tr>
                <tr>
                    <th><label for="c_price">Total Price:</label></th>
                    <td><input type="text" name="c_price" id="c_price" value="{{ $detail->price }}" readonly></td>
                </tr>
                <tr>
                    <th>
                        <a href="{{ route('index') }}"><button type="button">Back</button></a>
                    </th>
                    <td>
                        <input type="submit" name="submit" value="Add Cart">
                        
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>

<script>
    function cal(price){
        var mass = document.getElementById('c_mass');
        var vmass = mass.value;

        if (vmass < 100) {
            vmass = 100;
            mass.value = 100;
        }

        var total = mass.value*price/100;
        document.getElementById('c_price').value = total;
    }
</script>