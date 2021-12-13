<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title> 
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="estilos.css">
</head> 


<body>

 <form class="formulario" method="post" > 
     
    
     <h1>Registrate</h1>
     <div class="contenedor">

     <!--Se diseñan los campos para ingresar el nombre, la cédula, el email y la contraseña-->
     <div class="input-contenedor">
         <i class="fas fa-user icon"></i>
         <input type="text" name="Nombre" placeholder="Nombre Completo" >
         </div>
         
         <div class="input-contenedor">
         <i class="fas fa-address-card icon"></i>
         <input type="text" name="Cedula" placeholder="Cédula" >
         </div>

         <div class="input-contenedor">
         <i class="fas fa-envelope icon"></i>
         <input type="text" name="email" placeholder="Email">
         </div>
         
         <div class="input-contenedor">
         <i class="fas fa-key icon"></i>
         <input type="password" name= "Contrasena" placeholder="Contraseña">
         </div>

         <div class="input-contenedor">
         <i class="fas fa-calendar-day icon"></i>
         <input type="date" name= "Fecharegistro" placeholder="Fecha de registro">
         </div>

         <!--Se crea el boton de registro-->
         <input type="submit" name="Registrate"  class="button"> 
         

         <!--Una vez creada la cuenta, se hace una conexión a la página de ingresp-->
         <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
         <p>Con tu cuenta creada, ingresa el usuario<a class="link" href="index.html">Iniciar Sesion</a></p>
     </div>
    </form>
    <?php 
        include("registrar.php");
    ?>
</body>
</html>