<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUIyJ" crossorigin="anonymous">
        <!-- Styles -->
        <link rel="stylesheet" href="css/app.css">

        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">Connect</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarCollapse">
                
                <ul class="navbar-nav mr-auto mb-2 mb-md-0">
                  @auth
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('create') }}">New Post</a>
                  </li>
                  @endauth
                </ul>
                
                
                <ul class="nav navbar-nav navbar-right">
                  @auth
                    <li>
                        <form action="{{ route('profile.index') }}" method="get" class="block py-2 px-2 inline">
                            <button type="submit" class="btn btn-primary">Your Profile</button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="block py-2 px-2 inline">
                            @csrf
                            <button type="submit" class="btn btn-primary" >Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="" class="block py-3 px-4"></a>
                    </li>
                @endguest
                </ul>
              </div>
            </div>
          </nav>

           @yield('content')
    </body>
</html>
