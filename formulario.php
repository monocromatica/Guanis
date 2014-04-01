<?php
if(isset($_POST['email'])) {
	
	// CHANGE THE TWO LINES BELOW
	$email_to = "guanis_moda@yahoo.com";
	
	$email_subject = "Email desde el website.";
	
	
	function died($error) {
		// your error code can go here
		echo "Lo sentimos, pero hay errores en el formulario que envi&oacute;.<br /><br />";
		echo $error."<br /><br />";
		echo "Por favor regrese y corrija estos errores.<br /><br />";
		die();
	}
	
	// validation expected data exists
	if(!isset($_POST['first_name']) ||
		!isset($_POST['email']) ||
		!isset($_POST['telephone']) ||
		!isset($_POST['comments'])) {
		died('Lo sentimos, pero hay errores en el formulario que envi&oacute;.');		
	}
	
	$first_name = $_POST['first_name']; // required
	$email_from = $_POST['email']; // required
	$telephone = $_POST['telephone']; // not required
	$comments = $_POST['comments']; // required
	
	$error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
  	$error_message .= 'El email que usted envi&oacute; parece no ser v&aacute;lido.<br />';
  }
	$string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
  	$error_message .= 'El nombre que usted envi&oacute; parece no ser v&aacute;lido.<br />';
  }
  if(strlen($comments) < 2) {
  	$error_message .= 'Los comentarios que usted envi&oacute; parecen no ser v&aacute;lidos.<br />';
  }
  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	$email_message = "Detalles del formulario abajo..\n\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}
	
	$email_message .= "Nombre: ".clean_string($first_name)."\n";
	$email_message .= "Email: ".clean_string($email_from)."\n";
	$email_message .= "Teléfono: ".clean_string($telephone)."\n";
	$email_message .= "Comentarios: ".clean_string($comments)."\n";
	
	
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>



<!-- place your own success html below -->

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <title>Zapatería Guanis</title>
	    <meta name="description" content="Zapataería Guanis -  El mejor calzado de dama en Guadalajara Jalisco">
	    <meta name="viewport" content="width=device-width">
	
		<link rel='stylesheet' href='css/app.css'>
<link rel='stylesheet' href='css/view.css'>
<link rel='stylesheet' href='css/slicknav.css'>
<link rel='stylesheet' href='css/bootstrap.css'>
<link rel='stylesheet' href='fonts/sofia.css'>
		
	    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	<body>
	    <!--[if lt IE 7]>
	        <p class="chromeframe">Estas usando un navegador <strong>anticuado</strong>. Por favor <a href="http://browsehappy.com/">actualiza tu navegador</a></p>
	    <![endif]-->
	

      

		<header>
		    <div class="container">
		    	<div id="menuHeader" class="row">
		    		<ul id="menu1" class="col-md-4 col-sm-4 hidden-xs list-inline">
		    			<li><a href="index.html">inicio</a></li>
		    			<li><a href="nosotros.html">conocenos</a></li>
		    			<li><a href="servicios.html">servicios</a></li>
		    		</ul>
		    		
		    		<div id="logo" class="col-md-4 col-sm-4 hidden-xs"><a href="index.html"><img src="img/logotipo.png" class="zoom img-responsive" alt="Zapatería Guanis" /></a></div>
		    		<div id="logoXS" class="row visible-xs text-center">
		    			<div class="col-xs-12">
		    				<a href="index.html" class="nobd"><img src="img/logo-footer.png" alt="Zapatería Guanis" /></a>
		    			</div>
		    		</div>
		    		
		    		<ul id="menu2" class="col-md-4 col-sm-4 hidden-xs list-inline">
		    			<li><a href="">cat&aacute;logo</a></li>
		    			<li><a href="construccion.html">ventas</a></li>
		    			<li class='current'><a class='current' href="contacto.html">contacto</a></li>
		    		</ul>
		    		<div id="menu-xs" class="col-xs-12 visible-xs">
			    		<ul id="menu">
						    <li><a href="index.html">inicio</a></li>
						    <li><a href="nosotros.html">conocenos</a></li>
						    <li><a href="servicios.html">servicios</a></li>
						    <li><a href="#">catálogo</a></li>
						    <li><a href="construccion.html">ventas</a></li>
						    <li class='current'><a class='current' href="contacto.html">contacto</a></li>
						</ul>
		    		</div>
		    	</div>
		    </div>
		</header>	
		

		<div class="container" style="margin-top:150px; text-align: center; margin-bottom: 150px">
		    <div class="row">
		    	<div class="col-md-6 col-md-offset-3 col-xs-12">
		    		
		    		<div id="holder">
		    			<h1>¡Muchas Gracias!</h1>
		    			<h2 class="blanco">Su correo ha sido recibido y ser&aacute; atendido por el departamento correspondiente.</h2>
		    			<p>Si su correo necesita respuesta, nos pondremos en contacto lo m&aacute;s pronto posible.</p>
		    		</div>
		    	</div>
		    </div>
		</div>


		<br /><br /><br />

	<footer>
		<div id="franja"></div>
		<div id="infooter" class="container">
			<div class="row">
				<div id="logoFooter" class="col-md-12 text-center">
					<img src="img/logo-footer.png" alt="logo-footer" width="195" height="95" />
				</div>
				<div class="col-md-8 col-md-offset-2">
					<div class="row text-center">
						<div class="col-md-4 col-sm-4">
							<h3>Direcci&oacute;n</h3>
							<img src="img/divisor2.png" alt="divisor2" width="221" height="10" class="img-responsive mb divisor2-center" />
							<p>Abascal y Sauza 534 <br />Zona Zapatera de Esteban Alatorre <br /> en el Centro de Guadalajara</p>		
						</div>
						<div class="col-md-4 col-sm-4">
							<h3>Tel&eacute;fono</h3>
								<img src="img/divisor2.png" alt="divisor2" width="221" height="10" class="img-responsive mb divisor2-center" />
							<p>(33) 3618 4410<br />(33) 3585 7620</p>
						</div>
						<div class="col-md-4 col-sm-4">
							<h3>Email</h3>
							<img src="img/divisor2.png" alt="divisor2" width="221" height="10" class="img-responsive mb divisor2-center" />
							<a href="mailto:contacto@guanis.com.mx">contacto@guanis.com.mx</a><br />
							<a href="mailto:guanis_moda@yahoo.com">guanis_moda@yahoo.com</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
		
			
	
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src='js/vendor/bootstrap.js'></script>
<script src='js/main.js'></script>
<script src='js/jquery.slicknav.js'></script>

		<script>
			$(function(){
				$('#menu').slicknav();
			});
		</script>	    
			    
	    		<script>
	        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	        g.src='//www.google-analytics.com/ga.js';
	        s.parentNode.insertBefore(g,s)}(document,'script'));
	    </script>
	    
	</body>

</html>





<?php
}
die();
?>