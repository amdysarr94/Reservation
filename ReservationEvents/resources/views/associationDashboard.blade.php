<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Association Dashboad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/306230e7b8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
*,
::after, 
::before{
    box-sizing: border-box;
}
body {
    font-family: 'Poppins', sans-serif;
    font-size: 0.875rem;
    opacity: 1;
    overflow-y: scroll;
    margin: 0;
}
a{
    cursor: pointer;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
}
li{
    list-style: none;
}
.wrapper{
    align-items: stretch;
    display: flex;
    width: 100%;
}
#sidebar{
    max-width: 264px;
    min-width: 264px;
    background: var(--bs-body-color);
    transition: all 0.35s ease-in-out;
}
.main{
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    min-width: 0;
    overflow: hidden;
    transition: all 0.35s ease-in-out;
    width: 100%;
    background: var(--bs-dark-bg-subtle);
}
.sidebar-logo{
    padding: 1.15rem;
}
.sidebar-logo a {
    color: #e9ecef;
    font-size: 1.15rem;
    font-weight: 600;
}
.sidebar-nav{
    flex-grow: 1;
    list-style: none;
    margin-bottom: 0;
    padding-left: 0;
    margin-left: 0;
}
.sidebar-header{
    color: #e9ecef;
    font-size: .75rem;
    padding: 1.5rem 1.5rem .375rem;
}
a.sidebar-link{
    padding: .625rem 1.625rem;
    color: #e9ecef;
    position: relative;
    display: block;
    font-size: 0.875rem;
}
.sidebar-link[data-bs-toggle="collapse"]::after{
    border: solid;
    border-width: 0 .075rem .075rem 0;
    content: "";
    display: inline-block;
    padding: 2px;
    position: absolute;
    right: 1.5rem;
    top: 1.4rem;
    transform: rotate(-135deg);
    transition: all .2s ease-out;
}
.sidebar-link[data-bs-toggle="collapse"].collapsed::after{
    transform: rotate(45deg);
    transition: all .2s ease-out;
}
    </style>
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
                <div class="h-100">
                    <div class="sidebar-logo">
                        <a href="#">Association</a>
                    </div>
                    <ul class="sidebar-nav">
                        <li class="sidebar-header">
                            {{$clienconn->nom}}
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-list"></i>
                            Dashboad
                            </a>
                        </li>
                        
                    <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-regular fa-user pe-2"></i>    
                            Clients</a>

                       
                    </ul>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{route('listClientReservation', $clienconn->id)}}" class="sidebar-link">Liste</a>
                        </li>
                       
                    </ul>
                    </li>
                    <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-sliders"></i>    
                            Evénements</a>

                        </li>
                    </ul>
                    <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{route('indexevent', $clienconn->id)}}" class="sidebar-link">Ajouter</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('listevent', $clienconn->id)}}" class="sidebar-link">Lister</a>
                        </li>
                    </ul> 
                    <li class="sidebar-item">
                            <a href="{{route('logout')}}" class="sidebar-link">Logout</a>
                    </li>
                </div>
        </aside>
        <div class="main">
            <nav class="navbar">
            <span class="navbar-toggler-icon"></span>
            </nav>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/script.js"></script>
</body>
</html>