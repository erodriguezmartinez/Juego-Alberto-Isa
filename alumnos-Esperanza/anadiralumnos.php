<!--Esperanza Rodríguez Martínez-->
<!--PÁGINA DE REGISTRO DE ALUMNOS MEDIANTE FICHERO-->
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
		<header>Añadir Alumnos mediante fichero</header>
		<!--CUERPO DE LA PÁGINA-->
        <section>
				<a href="index.php">VOLVER</a>
		</section>
		<main>
			<form action="redireccionar.php?dire=anadiralumnos" enctype="multipart/form-data"  method="post">
				<label>Añade fichero de alumnos</label><br />
				<input type="file" name="fichero" >
				<br />
				<div id="centrar">
					<input type="submit" name="enviar" id="solicitar" value="Subir Archivo"> 
				</div>
			</form>
		</main>
		<footer>
			Panel de control CRUD
		</footer>
	</body>
</html>
