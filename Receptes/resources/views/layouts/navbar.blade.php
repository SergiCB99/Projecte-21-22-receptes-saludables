<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('welcome') }}">
        <img src="//assets-global.cpcdn.com/assets/logo_circle-b64d2213e198178ddebdc070777b8a499069aa570a6aa12244a441482ae5ed92.png" width="32" height="32"/>
        <img src="https://static.cookpad.com/global/assets/images/logo/fr_seasons/logo_winter_text.png" width="80" height="32">
    </a>

@auth
    <!--<a href="{{ url('/dashboard') }}">Dashboard</a>-->
        <a class="btn btn-warning" href="{{ route('recipe.create') }}">Crear Recepta</a>
    @else
        <a class="btn btn-light" href="{{ route('login') }}">Log in</a>

        @if (Route::has('register'))
            <a class="btn btn-warning" href="{{ route('register') }}">Register</a>
        @endif
    @endauth
</nav>
