<!--Esperanza Rodríguez Martínez-->
<!--PÁGINA DE INICIO-->
<html>
	<head>
		<title>Administrar crud</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilogeneraluno.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--TÍTULO-->
		<header>Alumnos</header>
		<!--CUERPO DE LA PÁGINA-->
		<section>
				<a href="anadiralumno.php">AÑADIR ALUMNO</a><br /><br /><br />
				<a href="anadiralumnos.php">AÑADIR ALUMNOS</a>
		</section>
		<main>
			<table>
				<tr id="cabeceras">
					<th>Nombre</th>
					<th>Clase</th>
					<th colspan="2"></th>
				</tr>
				<?php
					include('alumno.php');
					$alumnos = new Controlador();
					$alumnos->vista->mostrarAlumnos();
				?>
			</table>
		</main>
		<footer>
			Panel de control CRUD
		</footer>
	</body>
</html>
