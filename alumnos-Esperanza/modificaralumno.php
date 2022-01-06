<!--Esperanza Rodríguez Martínez-->
<!--PÁGINA DE MODIFICACIÓN DE DATOS DEL ALUMNO-->
<html>
	<head>
		<title>Administrar crud</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilogeneraluno.css" rel="stylesheet" type="text/css">
        <link href="css/estiloformulario.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--TÍTULO-->
		<header>Modificar Alumno</header>
		<!--CUERPO DE LA PÁGINA-->
        <section>
				<a href="index.php">VOLVER</a>
		</section>
		<main>
		<?php
			include('alumno.php');
			$alumno = new Controlador();
			$alumno->vista->modificarAlumno($_GET['nombre']);
		?>           
		</main>
		<footer>
			Panel de control CRUD
		</footer>
	</body>
</html>
