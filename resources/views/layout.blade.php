<!doctype html>
<html lang="en">
    <head>
        <title>Storage of things</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>

    <body>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/thing">Things</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/thing/create">Create things</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/place">Places</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/place/create">Create places</a>
                </li>
                @endauth
            </ul>
            @guest
                <a href="/auth/login" class="btn btn-outline-light rounded-pill me-2">Login</a>
                <a href="/auth/signup" class="btn btn-light rounded-pill">Sign Up</a>
            @endguest
            @auth
                <span class="text-white me-3">{{ auth()->user()->name }}</span>
                <a href="/auth/logout" class="btn btn-light rounded-pill">Logout</a>
            @endauth

        </div>
    </div>
    </nav>
    </header>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</html>
