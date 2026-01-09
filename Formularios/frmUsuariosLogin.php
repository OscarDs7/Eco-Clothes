<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Eco-Clothes</title>
    <link rel="stylesheet" href="../CSS/menus.css" type="text/css">
    <link rel="stylesheet" href="../CSS/formulariosReg.css" type="text/css">
    <link rel="stylesheet" href="../fondo.css">
    <script type="text/javascript" src="../Validaciones/usuarios.js"></script>
</head>
<body>
    <header>
        <?php
        //Llamada al menú de navegación
        include '../barraGralMenu.php';
        $menu = new menuGeneral();
        $menu ->barraMenuGeneral();
        ?>
    </header><br>
    <!-- Separación del menu con el resto de la pagina-->
    <div style="clear:both;"></div>
    <section>
        <h3>Login</h3>
        <div>
            <form method="post" action="http://localhost/ECO_CLOTHES/Controlador/validarLogin.php" onsubmit="return confirm('¿Datos correctos?');">
                    <div class="formleyenda"><label>Nombre:</label></div>
                    <input id="nombre" type="text" name="nombre" onfocus="entroEnFoco(this);" onblur="salioDeFoco(this); validarNombre(this)" placeholder="solo letras/minimo 4">
                    <div class="formleyenda"><label>Contraseña:</label></div>
                    <input id="contrasena" type="password" name="contrasena" onfocus="entroEnFoco(this);" onblur="salioDeFoco(this); validarContrasena(this)" placeholder="minimo 8 caracteres/sin espacios">
                    <div>
                        <button id="enviarLogin" name="enviarLogin" type="submit" onclick="ingresarLogin(event)">Ingresar</button>
                    </div>
                </form>
        </div>
    </section>
</body>
</html>