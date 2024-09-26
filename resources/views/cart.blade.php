@session('message')
    <script>
        window.alert("{{ session('message') }}")
    </script>
@endsession

<style>
    body{
        margin: 0px !important;
        padding-top: 60px
    }
    table,th,td{
        border:1px solid;
    }
    table{
        margin: 20px;
    }
    th,td{
        padding: 10px;
        align-items: center;
        justify-content: center;
        width: 100%;
    }
    img{
        width: 100%;
        height: 100px;
        object-fit:cover; 
    }
    form{
        display: flex;
        justify-content: center;
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
    <table>
        <tr>
            <th>Product</th>
            <th>Mass</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        @if (!count($cart)=='0')
            @foreach ($cart as $item)
            <tr>
                <td><a href="{{ route('view',$item->product->id) }}"><img src="{{ asset('storage/'.$item->product->image) }}" alt=""></a>{{ $item->product->p_name }}</td>
                <td>{{ $item->c_mass }}</td>
                <td>{{ $item->c_price }}</td>
                <td>
                    <form action="{{ route('deletecart',$item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" name="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        @else
        <center>
            <h1>Your Cart Is Empty Now</h1>
        </center>
        @endif
    </table>
    <form action="{{ route('checkout') }}" method="post">
        @csrf
        @method('PUT')
        <button type="submit" name="checkout">Checkout To Buy All</button>
    </form>
</body>
</html>
