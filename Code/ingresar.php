<?php
	$servername = "localhost";
	$username   = "root";
	$password   = "";
	$dbname     = "recliclador";	
    // Crea conexión con el servidor
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn->set_charset("utf8");
	// Chequea que la conexión con el servidor funcione
	if ($conn->connect_error) {
	   die("Fallo en la conexión con el servidor: " . $conn->connect_error);
	}
	//Verifica acceso en la base de datos
	$respObj = new stdClass(); 
	$respObj->credentialsOk = false;
	
	$sql = "SELECT * FROM usuarios WHERE Cedula=".$_GET["cedula"];
	$result = $conn->query($sql);
	if ($result->num_rows > 0)  {  
		$row = $result->fetch_assoc();
		
		if ($row["Contrasena"] == $_GET["contrasena"]) {
			$respObj->credentialsOk = true;
			$respObj->nombre = $row["Nombre"];
			$respObj->puntos = $row["Puntos"];
			$respObj->email = $row["email"];
			$respObj->fecha = $row["Fecharegistro"];
			$respObj->cedula = $row["Cedula"];
		} 
		
	}	
	$respJSON = json_encode($respObj);
	echo $respJSON;
	//Cierra la conexión con el servidor
	$conn->close();
?>