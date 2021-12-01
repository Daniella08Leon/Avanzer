<!DOCTYPE html>
<html lang="en">


<!-- widget-chart.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Avanzer</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('./assets/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('./assets/bundles/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('./assets/bundles/flag-icon-css/css/flag-icon.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('./assets/css/style2.css') }}">
  <link rel="stylesheet" href="{{ asset('./assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('./assets/bundles/pretty-checkbox/pretty-checkbox.min.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('./assets/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href="{{ asset('./assets/img/favicon.ico') }}" />
  <!-- Sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
@include('sweet::alert')
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{ asset('./assets/img/persona.jpg') }}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hola Administrador</div>
              <a href="{{'/administrador/perfil'}}" class="dropdown-item has-icon"> <i class="far fa-user"></i>
                Perfil
                </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"> <img alt="image" src="{{ asset('./assets/img/logo2.png') }}" class="header-logo" /> <span
                class="logo-name">Avanzer</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="dropdown">
              <a href="{{ url('administrador/fichas') }}" class="nav-link"><i data-feather="monitor"></i><span>Fichas</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Usuarios</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('administrador/usuarios/aprendiz') }}">Lista Aprendices</a></li>
                <li><a class="nav-link" href="{{ url('administrador/usuarios/instructor') }}">Lista Instructores</a></li>
                <li><a class="nav-link" href="{{ url('administrador/usuarios/coordinador/administrador') }}">Lista Coordinador y Admi</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="book-open"></i><span>Evidencias</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('administrador/lista/evidencias') }}">Lista Evidencias</a></li>
                <li><a class="nav-link" href="{{ url('administrador/lista/evidencias/fichas') }}">Evidencias Fichas</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>

  <div class="main-content">
          @yield('fichas')
          @yield('usuariosA')
          @yield('usuariosI')
          @yield('usuariosCA')
          @yield('evidencias')
          @yield('evidenciasFichas')
          @yield('perfil')
</div>
  
  <!-- General JS Scripts -->
  <script src="{{ asset('./assets/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <script src="{{ asset('./assets/bundles/chartjs/chart.min.js') }}"></script>
  <script src="{{ asset('./assets/bundles/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('./assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('./assets/bundles/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('./assets/bundles/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('./assets/bundles/jqvmap/dist/maps/jquery.vmap.indonesia.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('./assets/js/page/widget-chart.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('./assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('./assets/js/custom.js') }}"></script>

</body>


<!-- widget-chart.html  21 Nov 2019 03:50:03 GMT -->

</html>