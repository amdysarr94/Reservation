<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>@yield('title', 'Events & Reservations')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</script>
   <header>
          <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Events & Reservations</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
              <div class="collapse navbar-collapse" id="navbarColor02">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Accueil
                    
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{route('register.client')}}">Inscription Client</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{route('register.association')}}">Inscription Association</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{route('login')}}">Se connecter</a>
                </li>
              </ul>
              <form class="d-flex">
                <input class="form-control me-sm-2" type="search" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Recherche</button>
              </form>
            </div>
           
          </div>
        </nav>
   </header> 
  @yield('content')
  </body>
</html>