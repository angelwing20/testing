@session('message')
    <script>
        window.alert("{{ session('message') }}")
    </script>
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
    p{
        margin:2px;
        padding: 2px;
        background-color: red;
        color: white;
    }
</style>
<body>
    <center>
        <form action="{{ route('register') }}" method="post">
            <h1>Register Page</h1>
            @csrf
            <table>
                <tr>
                    <th><label for="name">Name</label></th>
                    <td><input type="text" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th><label for="password">Password</label></th>
                    <td><input type="password" name="password">
                        @error('password')
                            <p>{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th><label for="password_confirmation">Confirm Password</label></th>
                    <td><input type="password" name="password_confirmation" id="password_confirmation">
                        @error('password')
                            <p>{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" name="submit"></td>
                </tr>
            </table>
            <div>
                <a href="{{ route('login_page') }}">Login Account?</a>
            </div>
        </form>
    </center>
    
</body>
</html>