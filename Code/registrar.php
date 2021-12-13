<?php 
    $servername = "localhost";
	$username   = "root";
	$password   = "";
	$dbname     = "recliclador";	
    // Crea conexión con el servidor
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn->set_charset("utf8");
	// Chequea que la conexión con el servidor funcione
       
    if (isset($_POST['Registrate']))
    {
        if (strlen ($_POST['Nombre']) >= 1 && strlen ($_POST['Cedula']) >= 1 && strlen ($_POST['email']) >= 1 && strlen ($_POST['Contrasena']) >= 1 && strlen ($_POST['Fecharegistro']) >= 1 ) 
        {
           $nombre = trim($_POST['Nombre']); 
           $cedula = trim($_POST['Cedula']);
           $email = trim($_POST['email']);
           $contrasena = trim($_POST['Contrasena']);
           $fecha = trim($_POST['Fecharegistro']);
           $puntos = trim($_POST['Puntos']);
           $consulta = "INSERT INTO usuarios (Nombre, Cedula, email, Contrasena, Fecharegistro, Puntos) VALUES ('$nombre','$cedula','$email','$contrasena','$fecha',0)";
           $resultado = mysqli_query($conn, $consulta);
           if($resultado)
           {    
                ?>
                    <h3 class="ok"> ¡Te has registrado Correctamente! </h3>
                <?php
           }else
           {
                ?>
                <h3 class="bad"> ¡Ups ha ocurrido un error! </h3>
                <?php   
           }
        }else
        {
            ?>
            <h3 class="bad"> ¡Por favor complete los campos! </h3>
            <?php 
        }
     
    }
?>
