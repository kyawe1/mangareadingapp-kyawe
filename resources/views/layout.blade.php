<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <header class=''>
        <nav class="navbar navbar-expand-lg navbar navbar-light mb-2 shadow-sm">
            <div class="navbar-brand">
                <img src="">
                MangaReadingApp
            </div>
            <button class="navbar-toggler" data-bs-target="#navContent" aria-controls="navContent" data-bs-toggle="collapse" aria-expanded="false" aria-labelledby="navtoggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-lg-2 my-md-2"><a href="{{(Route::currentRouteName()=='basic.home')? '#' : route('basic.home')}}" class="nav-link {{(Route::currentRouteName()=='basic.home')? 'active' : '' }}">Home</a></li>
                    <li class="nav-item mx-lg-2 my-md-2"><a href="{{(Route::currentRouteName()=='about')? '#' : route('about')}}" class="nav-link {{(Route::currentRouteName()=='about')? 'active' : '' }}">About</a></li>
                    @auth
                    <li class='nav-item mx-lg-2 my-md-2'>
                        <div class="dropdown">
                            <button class='btn  btn-light btn-outline-secondary dropdown-toggle' id="nav-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{auth()->user()->name}}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="nav-dropdown">
                                <li>
                                    <a href="{{route('loggedin.saved-series')}}" class="dropdown-item ">Saved Series</a>
                                </li>
                                <li>
                                    <form action="{{route('loggedin.author-create')}}" method="post">
                                        @csrf 
                                        <input type="submit" value="Apply Author" class="dropdown-item" />
                                    </form>
                                </li>
                                <li>
                                    <form action="{{route('auth.signout')}}" method="post">
                                        @csrf 
                                        <input type="submit" value="Logout" class="dropdown-item" />
                                    </form>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    @else
                    <li class="nav-item mx-lg-2 my-md-2"><a href="{{route('auth.login')}}" class='nav-link'>Login</a></li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>
    <main class="container-fluid overflow-auto min w-100 mb-2">
        @yield('body')
    </main>
    <footer class="p-5 footer">
        <div class="d-flex justify-content-between">
            <div class="m-1">
                The Manga Reading App
            </div>
            <div class="p-1">
                Blah blah blah
            </div>
        </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>
</body>

</html>