<!--Esperanza Rodríguez Martínez-->
<!--PÁGINA DE REGISTRO DE ALUMNO-->
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
		<header>Añadir Alumno</header>
		<!--CUERPO DE LA PÁGINA-->
        <section>
				<a href="index.php">VOLVER</a>
		</section>
		<main>
            <form action="redireccionar.php?dire=anadiralumno" method="post">
                <label>Nombre:</label><br />
                <input type="text" name="nombre" pattern="^[a-zA-ZñÑ\s\W]{3,40}$" required><br />
				<label>Clase</label><br />
				<select name="clase" required>
					<opt group label="clase">
					<option value="" selected hidden>--Seleccione una clase--</option>
					<?php
						include('alumno.php');
						$alumno = new Controlador();
						$alumno->vista->mostrarclases();
					?>
				</select>
                <div id="centrar">
                    <input type="submit" name="enviar" id="solicitar" value="Añadir">
                </div>
            </form>
		</main>
		<footer>
			Panel de control CRUD
		</footer>
	</body>
</html>
