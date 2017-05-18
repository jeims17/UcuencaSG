<?php
	$ruta = new Ruta();
	$ruta->controladores(array(
		"/"         => "WelcomeController",
	    "/login"    => "AuthController",
	    "/usuario"  => "UsuarioController",
	    "/encuesta" => "EncuestaController",
	    "/pregunta" => "PreguntaoController",
	    "/admin"    => "AdminController",
	));
?>