<?php
	class Crud{
		//---Esperanza Rodríguez Martínez---
		//----------------------------------------CRUD---------------------------------------------------
		//OPERACIONES DE BBDD

		private $conexion;
		private $resultado;
        /**
         * Función constructor
         */
		function __construct() {

			require 'constantes.php';	//Incluimos Constantes.php donde tendrémos definidos los valores para la conexión

			$this->conexion  = new mysqli(SERVER,USUARIO,CONTRASENA,NOMBREBD);	//Conexión a bd
		}


		/**
		 * Función para añadir alumno
		 */
		function anadirAlumno($nombre,$clase){
			echo "ddd";
			if($this->conexion === false){
				echo "<script type='text/javascript'>alert('ERROR,falló la conexion con la Base de datos');window.location.href='index.php'</script>"; //Visualización de posible error en forma de alert
			}else{
				
				$consulta = "INSERT INTO alumno (nombre, idClase) VALUES
				('".$nombre."','".$clase."');";
				echo $consulta;
				if($this->conexion->query($consulta)==false){
					echo "<script type='text/javascript'>alert('ERROR, al añadir el alumno');window.location.href='index.php'</script>"; //Visualización de posible error en forma de alert
				}
				header("Location: index.php");
			}

			
		}

		/**
		 * Función para obtener las clases 
		 */
		function listarClases(){

			if($this->conexion === false){
				echo "<script type='text/javascript'>alert('ERROR,falló la conexion con la Base de datos');window.location.href='index.php'</script>"; //Visualización de posible error en forma de alert
			}else{
				$consulta = "SELECT idClase,nombreClase FROM clase";	//Consulta a ejecutar
				return $this->resultado = mysqli_query($this->conexion, $consulta);
			}
		}
		/**
		 * Función para obtener los alumnos 
		 */
		function listarAlumnos(){

			if($this->conexion === false){
				echo "<script type='text/javascript'>alert('ERROR,falló la conexion con la Base de datos');window.location.href='index.php'</script>"; //Visualización de posible error en forma de alert
			}else{
				$consulta = "SELECT alumno.nombre,clase.nombreClase FROM alumno INNER JOIN clase ON alumno.idClase=clase.idClase ORDER BY clase.idClase,alumno.nombre;";	//Consulta a ejecutar

				return $this->resultado = mysqli_query($this->conexion, $consulta);
			}
			return;

		}
		/**
		 * Función para borrar un alumno
		 */
		function borrarAlumno($nombre){
			if($this->conexion === false){
				echo "<script type='text/javascript'>alert('ERROR,falló la conexion con la Base de datos');window.location.href='index.php'</script>"; //Visualización de posible error en forma de alert
			}else{

				$consulta = "DELETE FROM alumno WHERE nombre = '".$nombre."';";

				if($this->conexion->query($consulta)){
					header("Location: index.php");
					
				}else{
					echo "ERROR, al borrar el alumno";	//Visualización de posible error
				}
			}
		}
		/**
		 * Función para modificar un alumno
		 */
		function modificarAlumno($nombre,$nombrem,$clase){

			if($this->conexion === false){
				echo "<script type='text/javascript'>alert('ERROR,falló la conexion con la Base de datos');window.location.href='index.php'</script>"; //Visualización de posible error en forma de alert
			}else{

				$consulta = "UPDATE alumno SET nombre = '".$nombrem."',idClase='".$clase."' WHERE nombre ='".$nombre."';";

				if($this->conexion->query($consulta)){
					header("Location: index.php");
					
				}else{
					echo "ERROR, al modificar el alumno";	//Visualización de posible error
				}
			}
		}
		/**
		 * Función para obtener los datos del alumno seleccionado para editar
		 */
		function listarAlumno($nombre){
			if($this->conexion === false){
				echo "<script type='text/javascript'>alert('ERROR,falló la conexion con la Base de datos');window.location.href='index.php'</script>"; //Visualización de posible error en forma de alert
			}else{

				$consulta = "SELECT alumno.nombre,alumno.idClase,(SELECT nombreClase FROM clase WHERE clase.idClase=alumno.idClase) AS Clase FROM alumno WHERE alumno.nombre='".$nombre."';";	//Consulta a ejecutar

				return $this->resultado = mysqli_query($this->conexion, $consulta);
			}
		}
	}
?>
