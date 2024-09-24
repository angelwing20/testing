@session('message')
    <script>
        window.alert("{{ session('message') }}")
    </script>
@endsession

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
<style>
    body{
        margin: 0px;
    }
</style>
<body>

</body>
</html>
