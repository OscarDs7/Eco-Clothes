<?php
class menuGeneral {
    function barraMenuGeneral() {
        ?>
    <div class="container">
        <div class="centered-div">
            <div id="logo">
                    <div id="eslogan">
                    </div>
                    <h1><center><a class="titulo" href="http://localhost/ECO_CLOTHES/index.php">ECO-CLOTHES</a></center></h1>
                    <hr>
                    <h2><center>El ecommerce que tu deseas y necesitas !</center></h2>
                </div>
                <!-- Seperación del titulo con el menu -->
                <div style="clear:both;"></div>
            <!-- start nav -->
            <nav id="menu">
            <!-- start menu -->
                <ul>
                    <li><a href="http://localhost/ECO_CLOTHES/index.php">Inicio</a></li>
                    <li><a href="http://localhost/ECO_CLOTHES/Formularios/frmUsuariosRegistro.php">Registro</a></li>
                    <li><a href="http://localhost/ECO_CLOTHES/Formularios/frmUsuariosLogin.php">Login</a></li>
                    <li><a href="http://localhost/ECO_CLOTHES/nosotros.php">Nosotros</a></li>
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
