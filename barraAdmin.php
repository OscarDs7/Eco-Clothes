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
                    <h2><center>Bienvenidos a la sección de productos como Administradores!</center></h2>
                </div>
                <!-- Seperación del titulo con el menu -->
                <div style="clear:both;"></div>
            <!-- start nav -->
            <nav id="menu">
            <!-- start menu -->
                <ul>
                    <li><a href="#">Registrar</a>
                    <ul>
                        <li><a href="http://localhost/ECO_CLOTHES/ProductosAdmin/CasualRegAdmin.php">Casual</a></li>
                        <li><a href="http://localhost/ECO_CLOTHES/ProductosAdmin/DeportRegAdmin.php">Deportiva</a></li>
                        <li><a href="http://localhost/ECO_CLOTHES/ProductosAdmin/FormalRegAdmin.php">Formal</a></li>
                    </ul>
                    </li>
                    <li><a href="http://localhost/ECO_CLOTHES/ProductosAdmin/MostrarProdAdmin.php">Consultar</a></li>
                    <li><a href="http://localhost/ECO_CLOTHES/ProductosAdmin/BusquedaAdmin.php">Búsqueda</a></li>
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
