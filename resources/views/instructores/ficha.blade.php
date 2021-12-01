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
              <div class="dropdown-title">Hola Instructor</div>
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
              <a href="{{ url('instructor/ficha') }}" class="nav-link"><i data-feather="monitor"></i><span>Fichas</span></a>
            </li>
          </ul>
        </aside>
      </div>

	  <div class="main-content">
<section class="section">
<div class="section-body">
    <div class="row">
			@foreach ($result as $ficha)
			  <div class="col-xl-3 col-lg-6">
			  <a href="{{ url('instructor/proyectos/'.$ficha->idFicha) }}">
                <div class="card l-bg-orange">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Ficha: {{ $ficha->ficha }}</h4>
                      <span>Fecha Inicio: {{ $ficha->fechaInicio }}</span><br>
                      <span>Fecha Fin: {{ $ficha->fechaFin }}</span>
                    </div>
                  </div>
                </div>
				</a>
              </div>  
			@endforeach
    </div>
</div>
</section>

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