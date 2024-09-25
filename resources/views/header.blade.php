<style>
    header{
        background-color: rgba(0,0,0,0.8);
        padding: 1rem;
        display:flex;
        justify-content: space-between;
        align-items: center;
        top: 0%;
        width: 100%;
        position: fixed;
        z-index: 100;
    }
    header a{
        color: white;
        text-decoration: none;
    }
    .logout{
        background-color: red;
        color: white;
        cursor: pointer;
        margin-right: 30px;
    }
</style>
<header>
    <div>
        <a href="{{ route('index') }}">{{ Auth::user()->name }}</a>
    </div>
    <div>
        <a href="{{ route('logout') }}"><button type="button" class="logout">Logout</button></a>
    </div>
</header>

@yield('content')