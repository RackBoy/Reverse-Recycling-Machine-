<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Se asigna el nombre de la página-->
        <title>Green Technology</title>
    <!--Se realiza la conexión con el css de estilo del menú-->
    <link rel="stylesheet" href="estilomenu.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
</head>


<body>
    <header>
        <nav>
            <!--Se crean la opciones que aparecen en la aprte superior del menú-->
            <!--Para poder acceder a las otras partes de la página se realizó un hipervinculo con href-->
            <a href="#">Inicio</a>
            <a href="#Nosotros">Acerca de</a>
            <a href="#portafolio">Portafolio</a>
            <a href="#contacto">Contacto</a>
        </nav>
        <!--Titulo de bienvenido a la página-->
        <section class="textos-header">
            <h1>Bienvenido a un estilo de vida sostenible</h1>
            <h3>Con cada aporte que tuyo, contribuyes a la construcción de un mundo mejor</h3>
        </section>
        <!--Efecto de onda de la parte superior-->
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </header>

    <!--Se crean las opciones que aparecen en el menú-->
    <main>
        <section class="contenedor sobre-nosotros">
            <!--Se utiliza name= para asiganarle un nombre que luego se utiliza en el hipervinculo-->
			<a name="Nosotros"></a>
            <!--Titulo de la sección-->
            <h2 class="titulo">Acerca de nosotros</h2>
            <div class="contenedor-sobre-nosotros">
                <img src="img/ilustracion2.svg" alt="" class="imagen-about-us">
                <div class="contenido-textos">
                    <!--Se añade el contenido de esta sección-->
                    <h3><span>1</span>Contexto</h3>
                    <p>En la medida que aumenta la población colombiana en las pequeñas y grandes urbes, hace que la población demande bienes y servicios; 
                       Si a esto se añade el aumento en los hábitos de consumo de la población por productos empacados tales como el agua embotellada, bebidas 
                       azucaradas y bebidas alcohólicas, las cuales inducen un aumento en los envases plásticos, vidrio o en lata, que muchas veces no se 
                       reciclan y demandan de espacio y energía para su disposición final. <br>

                       <br>Se pretende que este proyecto a corto plazo minimice la contaminación del departamento del Quindío, esperando que los actores privados y
                       los actores públicos contribuyan a tal objetivo de mejoramiento a la calidad de vida de los habitantes.<br>

                       <br>Es por esto, que este proyecto se desarrolla con el propósito de promover conciencia en la población estudiantil sobre la importancia 
                       del reciclaje.
                     </p>
                    <h3><span>2</span>Descripción del producto</h3>
                    <p>Este proyecto lo que se busca es la implementación de un receptáculo residuos inorgánicos; El cual recibe artículos reciclables (Vidrio o Plástico) 
                       y dependiendo el tipo de residuo que ingrese, la persona irá acumulando cierta cantidad de puntos que posteriormente puede redimir en beneficios,
                       los cuales serán canjeados en diferentes establecimientos disponibles. <br>

                        <br>El receptáculo también tiene una visualización de la cantidad de material depositado y el número de puntos acumulados; al igual que el listado de objetos posibles a redimir. 
                        </p>
                </div>
            </div>
        </section>

        <section class="portafolio">
             <!--Se utiliza name= para asiganarle un nombre que luego se utiliza en el hipervinculo-->
			<a name="portafolio"></a>
            <div class="contenedor">
                 <!--Titulo de la sección-->
                <h2 class="titulo">Portafolio</h2>
                <div class="galeria-port">
                    
                    <div class="imagen-port">
                         <!--Se crean unos cuadros en donde aparece una imagen y el texto de descripción-->
                        <a href="#usuario1"><img src="img/usuario.jpg" alt=""></a>
                        
                        <p> <br>Nombre de usuario:<?php echo $_GET["nombre"];?> <br>
							Identificación: <?php echo $_GET["cedula"];?><br>
							Fecha de creación de la cuenta: <?php echo $_GET["fecha"];?> <br>
						 </p>
                         
						<div class="hover-galeria">
                             <!--Efecto con imagen y titulo cuando se esta en esta sección-->
                            <img src="img/icono1.png" alt="">
                            <p>Usuario</p>
                        </div>
                    </div>

                    <div class="imagen-port">
                        <a href="#estadistica"><img src="img/estadistica.jpg" alt=""></a>
						<p> <br>En esta sección se muestran tus estadisticas. <br>
                            <br>Además, podras conocer como ha sido tu proceso.
                        </p>
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p> Estadística</p>
                        </div>
                    </div>

                    <div class="imagen-port">
                        <a href="#puntos"><img src="img/puntos1.JPG" alt=""></a>
                        <p> <br>Los puntos acumulados hasta el momento son: <?php echo $_GET["puntos"];?><br> 
                        </p>
						<div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Puntos</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        
         <!--Se crea la ultima sección del menú-->
        <section class="clientes contenedor">
            <h2 class="titulo">Contactanos</h2>
            <div class="cards">
                <div class="card">
					<a name="contacto"></a>
                     <!--Imagen de descripción-->
                    <img src="img/inge.jpg" alt="">
                     <!--El contenido o la información de los integrantes del equipo, son agregadas en un recuadro de descripción-->
                    <div class="contenido-texto-card">
                        <h4>Manuela Correa López</h4>
                        <p>Estudiante del programa de Ingeniería Electrónica<br>
						   Celular: 3185957386
						</p>
						<h4><br>Jacobo Montenegro Ángel</h4>
                        <p>Estudiante del programa de Ingeniería Electrónica<br>
						   Celular: 3233073789
						</p>
                    </div>
                </div>
                
                <div class="card">
                    <img src="img/inge.jpg" alt="">
                    <div class="contenido-texto-card">
                        <h4>Mateo Valencia buitrago</h4>
                        <p>Estudiante del programa de Ingeniería Electrónica<br>
						   Celular: 31277703665
						</p>
						<h4><br>Brahiam Joel Soto Hidalgo</h4>
                        <p>Estudiante del programa de Ingeniería Electrónica<br>
						   Celular: 3168882489
						</p>
                    </div>
                </div>
            </div>
        </section>
    
    </main>
</body>

</html>

