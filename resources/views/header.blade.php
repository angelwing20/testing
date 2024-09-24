<style>
    header{
        background-color: rgba(0,0,0,0.6);
        position: fixed;
        width: 100%;
        padding: 1rem;
        display:flex;
        position: fixed;
    }
    header a{
        color: white;
        text-decoration: none;
    }
    .logout{
        background-color: red;
        color: white;
        cursor: pointer;
    }
</style>
<header>
    <div>
        <a href="#" style="">{{ Auth::user()->name }}</a>
        <a href="{{ route('logout') }}"><button type="button" class="logout">Logout</button></a>    
    </div>
</header>

@yield('content')