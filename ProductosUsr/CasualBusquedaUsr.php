<!DOCTYPE html>
<html>
<head>
    <?php
    include '../Controlador/seguridadLoginUser.php';
    ?>
	<meta charset="utf-8">
	<title>Eco-Clothes</title>
    <link rel="stylesheet" href="../CSS/menus.css" type="text/css">
    <link rel="stylesheet" href="../CSS/formulariosBusc.css" type="text/css">
    <link rel="stylesheet" href="../fondo.css">
    <script type="text/javascript" src="../Validaciones/usuarios.js"></script>
</head>
<body>
    <header>
        <?php
        //Llamada al menú de navegación
        include '../barraUser.php';
        $menu = new menuPrincipal();
        $menu ->barraPrincipal();
        ?>
    </header>
    <!-- Separación del menu con el resto de la pagina-->
    <div style="clear:both;"></div>
    <section>
        <h1 class="busqueda">Busqueda de ropa casual</h1>
        <div class="buscar">
        <form method="post" action="../Controlador/procesaMovimientoProducto.php">
            <div class="formleyenda"><label>Nombre:</label></div>
            <input id="nombre" type="text" name="nombre" onfocus="entroEnFoco(this);" onblur="salioDeFoco(this); validarNombre(this)">
            <div></div>
            <div>
                <button id="enviarConsultaCas" name="enviarConsultaCas" type="submit">Buscar</button>
            </div>
        </form>
        </div>
        
    </section>
</body>
</html>