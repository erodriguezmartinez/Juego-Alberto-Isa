<?php
    //Esperanza Rodríguez Martínez
    /*Modelo, vista, controlador*/
    /**
     * Clase controlador (ejecución)
     */
    class Controlador{

        public $vista;
        public $modelo;
        /**
         * Función constructor
         */
        function __construct(){
            $this->vista = new Vista();
            $this->modelo = new Modelo();
        }
        /**
         * Función para comprobar el fichero subido de los alumnos 
         */
        function anadirAlumnos($crud,$archivo){
            //Incluimos el archivo crud.php para utilizar las funciones definidas en el
 
            if(copy($archivo["tmp_name"], 'ficheros/'.$archivo["name"])){
                $fichero = fopen('ficheros/'.$archivo["name"], "r");
                while (!feof($fichero)){
                    $separada = explode('-', fgets ($fichero));
                    $crud->anadirAlumno($separada[0],$separada[1]);	//Llamamos a la función de añadir alumno para ir añadindo alumno a alumno mediante el while
                }
                fclose ($fichero);
                echo "<script type='text/javascript'>alert('Fichero subido correctamente al servidor');window.location.href='fichero.html'</script>";
            }else{
                echo "<script type='text/javascript'>alert('ERROR al subir el fichero al servidor');window.location.href='fichero.html'</script>";
            }
        }
    }
    
    /**
     * Clase vista (mostrar datos)
     */
    class Vista{
        function __construct(){
            
        }
        /**
         * Función para mostrar las clases en el select
         */
        function mostrarClases(){

            //Incluimos el archivo crud.php para utilizar las funciones definidas en el
            include('crud.php');
            $crud = new Crud();

            $resultado=$crud->listarClases();

            while($fila = mysqli_fetch_assoc($resultado)){
                echo '<option value="'.$fila["idClase"].'"">'.$fila["nombreClase"].'</option>';
            };
        }
        /**
         * Función para mostrar los alumnos
         */
        function mostrarAlumnos(){
            //Incluimos el archivo crud.php para utilizar las funciones definidas en el
            include('crud.php');
            $crud = new Crud();

            $resultado=$crud->listarAlumnos();

            while($fila = mysqli_fetch_assoc($resultado)){
                echo '<tr>
                    <td>'.$fila["nombre"].'</td>
                    <td>'.$fila["nombreClase"].'</td>
                    <td><a href="modificaralumno.php?nombre='.$fila["nombre"].'"><img src="imagenes/editar.png"></a></td>
                    <td><a href="redireccionar.php?dire=borraralumno&nombre='.$fila["nombre"].'"><img src="imagenes/borrar.png"></a></td>
                </tr>';
            };
        }
        /**
         * Función para indicar por defecto los valores del formulario de modificación de datos del alumno y visualizar las clases del select
         */
        function modificarAlumno($nombre){
            //Incluimos el archivo crud.php para utilizar las funciones definidas en el
            include('crud.php');
            $crud = new Crud();

            $resultadoalumno=$crud->listarAlumno($nombre);
            $resultadoclases=$crud->listarClases();
            $fila = mysqli_fetch_assoc($resultadoalumno);

            echo'
            <form action="redireccionar.php?dire=modificaralumno&nombre='.$_GET["nombre"].'" method="post">
            <label>Nombre:</label><br />
                <input type="text" name="nombrem" value="'.$fila["nombre"].'" required><br />
				<label>Clase</label><br />
				<select name="clase" required>
					<opt group label="clase">
                    <option value="'.$fila["idClase"].'" selected hidden>'.$fila["Clase"].'</option>';
                    while($filac = mysqli_fetch_assoc($resultadoclases)){
                        echo '<option value="'.$filac["idClase"].'"">'.$filac["nombreClase"].'</option>';
                    };
				echo'</select>
                <div id="centrar">
				    <input type="submit" name="enviar" id="solicitar" value="Modificar">
			    </div>
                </form>';

        }
    }
    /**
     * Clase modelo (obtención de datos)
     */
    class Modelo{
        function __construct(){
            
        }
    }

    
?>