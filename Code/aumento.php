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
	
	//Captura los puntos actuales
	$sql = "SELECT * FROM usuarios WHERE Cedula=".$_GET["cedula"];
	$result = $conn->query($sql);
	if ($result->num_rows > 0)  {  
		$row = $result->fetch_assoc();
	
		//Aumenta los puntos y retorna el nuevo valor
		$puntos = $row["Puntos"] + 10;

		//Actualiza en la base de datos
		$sql = "UPDATE usuarios SET Puntos=".$puntos." WHERE Cedula=".$_GET["cedula"];
		$result = $conn->query($sql);
		
		$respObj = new stdClass(); 
		$respObj->credentialsOk = true;
		$respObj->nombre = $row["Nombre"];
			$respObj->puntos = $puntos;
			$respObj->email = $row["email"];
			$respObj->fecha = $row["Fecharegistro"];
			$respObj->cedula = $row["Cedula"];
		$respJSON = json_encode($respObj);
		echo $respJSON;
	}	
	//Cierra la conexión con el servidor
	$conn->close();
?>
