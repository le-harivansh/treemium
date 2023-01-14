<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description"
          content="{{ __('Treemium s’appuie sur son expertise forestière et la détection LiDAR pour protéger et valoriser les forêts par la création d’un revenu immédiat sur les arbres en croissance.') }}"/>
    <title>{{ config('app.name') }}</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/client/logo.png') }}"/>

    <!-- Font Awesome icons -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css"/>

    <!-- Core theme CSS -->
    @vite(['resources/css/bootstrap-agency.css', 'resources/css/client.css'])
</head>

<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="{{ asset('assets/img/client/logo.png') }}"
                                                      alt="{{ __('Logo Treemium') }}"/></a>
        <a class="navbar-brand" href="#page-top"><span class="mot_vert strong center">{{ __('Treemium') }}</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            {{ __('Menu') }}
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="#page-top">{{ __('Home') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="#offre">{{ __('Offre') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="#technologie">{{ __('Technologie') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="#equipe">{{ __('Equipe') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">{{ __('Contact') }}</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('main-content')

<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">Copyright &copy; Treemium 2022</div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
@vite('resources/js/client.js')
</body>
</html>
