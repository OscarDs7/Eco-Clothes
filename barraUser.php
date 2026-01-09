<?php
class menuPrincipal {
    function barraPrincipal() {
        ?>
    <div class="container">
        <div class="centered-div">
            <div id="logo">
                    <div id="eslogan">
                    </div>
                    <h1><center><a class="titulo" href="#">ECO-CLOTHES</a></center></h1>
                    <hr>
                    <h2><center>Bienvenidos a la sección de productos como usuarios!</center></h2>
                </div>
                <!-- Seperación del titulo con el menu -->
                <div style="clear:both;"></div>
            <!-- start nav -->
            <nav id="menu">
            <!-- start menu -->
                <ul>
                    <li><a href="http://localhost/ECO_CLOTHES/index.php">Ropa Casual</a>
                        <ul>
                            <li><a href="http://localhost/ECO_CLOTHES/ProductosUsr/CasualMostrarUsr.php">Mostrar</a></li>
                            <li><a href="http://localhost/ECO_CLOTHES/ProductosUsr/CasualBusquedaUsr.php">Busqueda</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Ropa Deportiva</a>
                    <ul>
                            <li><a href="http://localhost/ECO_CLOTHES/ProductosUsr/DeportivaMostrar.php">Mostrar</a></li>
                            <li><a href="http://localhost/ECO_CLOTHES/ProductosUsr/DeportivaBusqueda.php">Busqueda</a></li>
                     </ul>
                
                    </li>
                    <li><a href="#">Ropa formal</a>
                    <ul>
                            <li><a href="http://localhost/ECO_CLOTHES/ProductosUsr/FormalMostrar.php">Mostrar</a></li>
                            <li><a href="http://localhost/ECO_CLOTHES/ProductosUsr/FormalBusqueda.php">Busqueda</a></li>
                     </ul>
                    </li>
                    <li style="float:right"><a href="http://localhost/ECO_CLOTHES/Controlador/cerrarLogin.php">Cerrar sesión</a>
                    </li>
                </ul>
            <!-- end menu -->
            </nav>
        </div>
    </div>
    <!-- end nav -->
<?php
    }//método
}//class
?>
