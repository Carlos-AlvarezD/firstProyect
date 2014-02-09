<!--
    Name:  Index.php
    Autor: Carlos Andres Alvarez Diaz
    Desc:  Index de la pagina web
-->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" 	href="js/library/jquery-ui-1.10.0.custom.min.css">
</head>
<body>
<!--<> -->

<div id="contenedor">
    <div id="cabecera">
        <img src="imagenes/b1.jpg" />
    </div>
    <div id="header">
        <ul id="mainmenu">
            <li><a href="#" id="home">Home</a></li>
            <li><a href="#">Acerca de</a></li>
            <li class="last"><a href="#">Servicios</a>
                <ul class="oculto">
                    <li><a href="#" id="carroCompras">Carrito de compras</a></li>
                    <li><a href="#" id="session">Session</a></li>
                    <li><a href="#">Desarrollo</a></li>
                </ul>
            </li>

            <li id="desplegar"><a href="#">Productos</a>
                <ul class="oculto">
                    <li><a href="#">Plantillas</a></li>
                    <li><a href="#">Aplicaciones</a></li>
                    <li><a href="#">Labs</a></li>
                </ul>
            </li>
            <li>
                <a href="#" id="logIn">Sign In</a>
            
            </li>
        </ul>
    </div>
    <div class="subcontenedor">

        <div class="seccion1">
            <div class="art"></div>
            <div class="obtenerArticulo">
                
            </div>
        </div>
        <div class="seccion2">

        </div>
    </div>
    <div id="pie">
            <img src="imagenes/pie.jpg" />
    </div>
</div>
<!-- Este div va por fuera para poder tomar la posicion original del cursor -->
<div id="sobreimagen">
    
</div>
<script type="text/javascript" src="js/library/jquery-1.9.1.min.js"> </script>
<script type="text/javascript" src="js/library/jquery-ui-1.10.0.custom.min.js"> </script>
<script type="text/javascript" src="js/menu.js"> </script>
<script type="text/javascript" src="js/user.js"> </script>
<script type="text/javascript" src="js/arrastrar.js"></script>

</body>
</html>