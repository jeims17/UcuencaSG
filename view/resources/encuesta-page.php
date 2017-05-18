<!DOCTYPE html>
<html>
<head>
	<title>Creación de Encuesta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/admin-report.css">	
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>	
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>

<body>
	<header>
		
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			
		    <div class="container-fluid" > 
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span> 
		            </button>
		            <a target="_blank" class="navbar-brand" style="margin-top: -13px;">
		            	<div class="imgwrapper">
							<img src="https://scontent-lga3-1.xx.fbcdn.net/v/t1.0-9/17757618_1623377324344467_1853624857172948435_n.jpg?oh=30d10d485f36a6731b596e7735e9d366&oe=598398AE" class="img-responsive"></img>
						</div>
						<h2 style="margin-top: 5px; color:#fff">UcuencaSG</h2>
					</a>
		        </div>
		        <div class="collapse navbar-collapse">
		            <ul class="nav navbar-nav navbar-left">
		                <li id="nav-li"><a href="admin-page.html" >Inicio</a></li>             
		            </ul>
		            <ul class="nav navbar-nav navbar-right">
		                <li class="dropdown">
		                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                        <strong>Cuenta</strong>
		                        <span class="glyphicon glyphicon-chevron-down"></span>
		                    </a>
		                    <ul class="dropdown-menu">
		                        <li>
		                            <div class="navbar-login">
		                                <div class="row">
		                                    <div class="col-md-12">
		                                        <p class="text-left"><strong>Nombre Apellido</strong></p>
		                                        <p class="text-left small">correoElectronico@email.com</p>                       
		                                    </div>
		                                </div>
		                            </div>
		                        </li>
		                        <li class="divider"></li>
		                        <li>
		                            <div class="navbar-login navbar-login-session">
		                                <div class="row">
		                                    <div class="col-md-12">
		                                        <p>
		                                            <a href="#" class="btn btn-danger btn-block">Cerrar Sesion</a>
		                                        </p>
		                                    </div>
		                                </div>
		                            </div>
		                        </li>
		                    </ul>
		                </li>
		            </ul>
		        </div>
		    </div>
		    <div class="container-fluid">
				<ol class="breadcrumb">
					<li><a href="admin-page.html">Inicio</a></li>
					<li class="active">Reporte</li>				
				</ol>
			</div>
		</div>	
	</header>


	<section class="report-section">
		<div class="container" style="margin-bottom: 40px;">
			<div class="row">
				<div class="btn-group col-md-6" role="group" aria-label="...">
				  	<button class="btn btn-danger" type="button">
                    	<span class="glyphicon glyphicon-plus"></span> Agregar Pregunta
                	</button>
				</div>
			</div>
		</div>

		<div class="container" style="margin-bottom: 40px;">

			<div class="panel panel-default">
				<div class="panel-heading">Preguntas de la Encuesta</div>
				<div class="panel-body">
					<div class="container-fluid" id="survey-avalaible-table">
						<div class="row col-md-6 col-md-offset-2 custyle">
							<table class="table table-striped custab">
								<thead>
									<tr>
										<th>Título</th>
										<th>Tipo</th>
										<th>Número de Opciones</th>
										<th>Acción</th>
									</tr>
									<tr>
										<td>¿Pregunta?</td>
										<td>Opción Multiple</td>
										<td>3</td>
										<td>
											<a class='btn btn-success btn-xs' href="#"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
											<a class='btn btn-success btn-xs' href="#"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
										</td>
									</tr>
								</thead>
							</table>
						</div>
					</div>
		    	</div>
		    </div>
		</div>
	</section>
	
	<center >
		<button type="submit" class="btn btn-primary" >Guardar Cambios</button>	
	</center>
		
	<footer>
		<div class="foot">
			<p>© 2017<a style="color:#0a93a6; 
		text-decoration:none;" href="#"> Alulema, Arévalo, Macías & Montesdeoca</a>, All rights reserved 2016-2017.</p>
		</div>		
	</footer>

	<script>
	    $(document).ready(function(){
	        $(".dropdown-toggle").dropdown();
	    });
 	 </script>
</body>
</html>