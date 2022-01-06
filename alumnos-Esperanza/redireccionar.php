<?php
    //Esperanza Rodríguez Martínez
    /*----------REDIRECCIONAR----------*/
	//Incluimos el archivo crud.php para utilizar las funciones definidas en el
	//Lo incluimos fuera del switch porque es el más común usado para las acciones a realizar
	include('crud.php');
	$crud = new Crud();

    
    switch($_GET['dire']) {
		case "anadiralumno":	//Añadir alumno
			$crud->anadirAlumno($_POST['nombre'],$_POST['clase']);
			break;
		case "anadiralumnos":	//Añadir alumnos (fichero)
			include('alumno.php');
			$alumno = new Controlador();
			$alumno->anadirAlumnos($crud,$_FILES['fichero']);
			break;
		case "modificaralumno":	//Modificar alumno
			$crud->modificarAlumno($_GET['nombre'],$_POST['nombrem'],$_POST['clase']);	
			break;
		case "borraralumno":	//Borrar alumno
			$crud->borrarAlumno($_GET['nombre']);
			break;
	}

?>