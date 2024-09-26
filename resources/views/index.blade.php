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
        @foreach ($products as $item)
        <tr>
            <td><a href="{{ route('view',$item->id) }}"><img src="{{ asset('storage/'.$item->image) }}" alt=""></a>{{ $item->p_name }}</td>
            <td>{{ $item->mass }}</td>
            <td>{{ $item->price }}</td>
            <td>
                <a href="{{ route('view',$item->id) }}"><button type="button">View</button></a><br><br>
                <form action="{{ route('addcart',$item->id) }}" method="post">
                    @csrf
                    <input type="submit" name="submit" value="Add Cart">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
