<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Avanzer</title>
    
    <!-- Meta -->
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="{{ asset('./assets/img/favicon.ico') }}"> 
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:700|Roboto:400,400i,700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome JS-->
    <script src="https://kit.fontawesome.com/31837ac296.js" crossorigin="anonymous"></script>

    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ asset('./assets/css/theme.css') }}">

</head> 

<body>   

    <header>	
            
	    <div class="logo"><a href="index.html"><!-- class="navbar-brand"  -->
	        <img class="logo-icon me-2" src="{{ asset('./assets/img/logo.png') }}" alt="logo" ></a> 
	    </div> 
	    <div class="botones">
	    <div class="col-12 col-md-auto botn">
			<a class="btn btn-secondary scrollto w-100" href="#">Inicio</a>
		</div>
	    <div class="col-12 col-md-auto botn">
			<a class="btn btn-secondary scrollto w-100" href="#hero-section">Acerca de</a>
		</div>
		<div class="col-12 col-md-auto botn">
			<a class="btn btn-secondary scrollto w-100" href="#audience-section">Módulos</a>
		</div>
		<div class="col-12 col-md-auto botn">
			<a class="btn btn-secondary scrollto w-100" href="#benefits-section">Funcionalidades</a>
		</div>
		<div class="col-12 col-md-auto botn">
			<a class="btn btn-secondary scrollto w-100" href="#content-section">Ventajas</a>
		</div>
		<div class="col-12 col-md-auto botn">
			<a class="btn btn-secondary scrollto w-100" href="#author-section">Contacto</a>
		</div>
	    <div class="text-center">
	        <a class="btn btn-primary" href="{{ route('login') }}">Iniciar sesion</a>
	    </div>
	    </div>
    </header><!--//header-->
    
    <section class="hero-section">
	    <div class="container">
		    <div class="row">
			    <div class="col-12 col-md-7 pt-5 mb-5 align-self-center">
				    <div class="promo pe-md-3 pe-lg-5">
					    <h1 class="headline mb-3">
						    Acerca de Avanzer  
					    </h1><!--//headline-->
					    <div class="subheadline mb-4">
						    Es un sistema de información capaz de realizar el seguimiento a proyectos formativos de todo tipo. 
					    </div>
				    </div><!--//promo-->
			    </div><!--col-->
			    <div class="col-12 col-md-5 mb-5 align-self-center">
				    <div class="book-cover-holder">
					    <img class="img-fluid book-cover" src="{{ asset('./assets/img/imagen1.png') }}" alt="book cover" >
				    </div><!--//book-cover-holder-->
				    </div>
		    </div><!--//row-->
	    </div><!--//container-->
    </section><!--//hero-section-->

    <section id="audience-section" class="audience-section py-5">
	    <div class="container">
		    <h2 class="section-heading text-center mb-4">Módulos de Avanzer</h2>
		    <div class="section-intro single-col-max1 mx-auto mb-5 text-center textM">
			    Contamos con tres módulos principales, con los cuales buscamos que realizar seguimiento a los proyectos formativos sea un proceso mas llevadero y fácil tanto para instructores como para los aprendices. 
		    </div><!--//section-intro-->
		    <div class="imagenes">			    
			    <div class="item row gx-3">
				    <!-- <div class="col-auto item-icon"><i class="fab fa-codepen"></i></div> -->
				    <div class="col">
					    <h4 class="palabra item-title">Subir evidencia</h4>
					    <div>
					    	<img class="img-fluid book-cover" src="{{ asset('./assets/img/img2.png') }}" alt="book cover" >
					    </div>
				    </div><!--//col-->
			    </div><!--//item-->	
			    <div class="item row gx-3">
				   <!--  <div class="col-auto item-icon"><i class="fab fa-codepen"></i></div> -->
				    <div class="col">
					    <h4 class="palabra item-title">Estado de los proyectos</h4>
					    <div>
					    	<img class="img-fluid book-cover" src="{{ asset('./assets/img/img3.png') }}" alt="book cover" >
					    </div>
				    </div><!--//col-->
			    </div><!--//item-->		    
			    <div class="item row gx-3">
				    <!-- <div class="col-auto item-icon"><i class="fab fa-codepen"></i></div> -->
				    <div class="col">
					    <h4 class="palabra item-title">Registrar avances</h4>
					    <div>
					    	<img class="img-fluid book-cover" src="{{ asset('./assets/img/img1.png') }}" alt="book cover" >
					    </div>
				    </div><!--//col-->
			    </div><!--//item-->
		    </div><!--//audience-->
	    </div><!--//container-->
    </section><!--//audience-section-->
    
    <section id="benefits-section" class="benefits-section theme-bg-light-gradient py-5">
	    <div class="container py-5">
		    <h2 class="section-heading text-center mb-3">Funcionalidades de Avanzer </h2>
		    <div class="caja row text-center ">
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><i class="fas fa-book"></i></div>
						    <h3 class="item-heading">Evidencias establecidas</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">
						    Las evidencias que cada ficha y proyecto tengan que subir serán las mismas dependiendo del trimestre. 
					    </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><i class="fas fa-tasks"></i></div>
						    <h3 class="item-heading">Planificar tareas</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">
						    El aprendiz podrá crear y planificar las tareas pendientes del grupo.
					    </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><i class="fas fa-laptop-code"></i></div>
						    <h3 class="item-heading">Avances</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">
						    Los instructores podrán realizar observaciones semanales del estado de los proyectos y generar un acta.
					    </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><i class="fas fa-clipboard"></i></div>
						    <h3 class="item-heading">Evidencias</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">
						    Los aprendices serán capaces de subir las evidencias requeridas para así demostrar los avances que tengan de su proyecto.
					    </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->
			    <div class="item col-12 col-md-6 col-lg-4">
				    <div class="item-inner p-3 p-lg-4">
					    <div class="item-header mb-3">
						    <div class="item-icon"><i class="fas fa-chalkboard"></i></div>
						    <h3 class="item-heading"> Observar proyectos</h3>
					    </div><!--//item-heading-->
					    <div class="item-desc">Los coordinadores podrán observar todas las fichas con sus respectivos proyectos, evidencias, y observaciones de cada instructor. 
					    </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->

		    </div><!--//row-->
	    </div><!--//container-->
    </section><!--//benefits-section-->
    
    <section id="content-section" class="content-section">
	    <div class="container">
		    <div class="single-col-max mx-auto">
		    <h2 class="section-heading text-center mb-5">Ventajas de usar Avanzer</h2>
			    <div class="row">
				    <div class="col-12 col-md-6">
					    <div class="figure-holder mb-5">
						    <img class="img-fluid" src="{{ asset('./assets/img/imagen2.png') }}" alt="image" >
					    </div><!--//figure-holder-->
				    </div><!--//col-->
				    <div class="col-12 col-md-6 mb-5">
					    <div class="key-points mb-4 text-center">
						    <ul class="key-points-list list-unstyled mb-4 mx-auto d-inline-block text-start">
						    	<li><i class="fas fa-check-double me-2"></i>Trabajo en equipo.</li>
							    <li><i class="fas fa-check-double me-2"></i>Lo documentos estarán seguros.</li>
							    <li><i class="fas fa-check-double me-2"></i>Se pueden crear grupos de proyectos.</li>
							    <li><i class="fas fa-check-double me-2"></i>Las evidencias serán estándar.</li>
							    <li><i class="fas fa-check-double me-2"></i>Pueden crear actas a cada evidencia.</li>
							    <li><i class="fas fa-check-double me-2"></i>Observar el estado de los proyectos.</li>
							    <li><i class="fas fa-check-double me-2"></i>Planeación de trabajos o tareas.</li>
							    <li><i class="fas fa-check-double me-2"></i>Se puede realizar anuncios a las fichas.</li>
							    
						    </ul>
					    </div><!--//key-points-->
					    
				    </div><!--//col-12-->   
			    </div><!--//row-->
		    </div><!--//single-col-max-->
	    </div><!--//container-->
    </section><!--//content-section-->
    
    <section id="author-section" class="author-section section theme-bg-primary py-5">
	    <div class="container">
		    <div class="lead-form-wrapper single-col-max mx-auto theme-bg-light rounded p-5">
			    <h2 class="form-heading text-center">Contáctenos</h2>
			    <div class="form-intro text-center mb-3">Si tienes alguna pregunta no dudes en contactarnos.</div> 
			    <div class="form-wrapper mx-auto">					
					<form class="formul signup-form row g-2 align-items-center">
	                    <div class="col-12 col-lg-9">
	                        <label class="sr-only" for="semail">Nombre</label>
	                        <input type="text" id="text" name="text" class="form-control me-md-1 semail" placeholder="Tu nombre">
	                    </div>
	                    <div class="col-12 col-lg-9">
	                        <label class="sr-only" for="semail">Correo</label>
	                        <input type="email" id="semail" name="semail1" class="form-control me-md-1 semail" placeholder="Tu correo">
	                    </div>
	                    <div class="col-12 col-lg-9">
	                        <label class="sr-only" for="semail">Asunto</label>
	                        <textarea type="text" id="text2" name="text2" class="form-control me-md-4 semail"placeholder="Asunto"></textarea>
	                    </div>
	                    <div class="col-12 col-lg-3">
	                        <button type="submit" class="btn btn-primary btn-submit w-100">Enviar</button>
	                    </div>
	                </form><!--//signup-form-->
			    </div><!--//form-wrapper-->
		    </div><!--//lead-form-wrapper-->
	    </div><!--//container-->
    </section><!--//author-section-->
    
    <footer class="footer">
    	<div class="foot">
    	<div class="logo1"><!-- class="navbar-brand"  -->
	        <img class="logo-icon me-2" src="{{ asset('./assets/img/logo.png') }}" alt="logo" ></a> 
	    </div> 
	    <div class="footer-bottom py-5">
            <small class="copyright">Copyright 2021. Todos los derechos reservados</small>
	    </div>
	    </div>
    </footer>
    
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
    <script src="assets/plugins/smoothscroll.min.js"></script> 
    
    <script src="assets/js/main.js"></script>

</body>
</html> 

