<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/menus.css">
    <link rel="stylesheet" href="fondo.css">
    <title>Eco-Clothes</title>
</head>
<body>
    <header>
        <?php
        include 'Controlador/seguridadLoginAdmin.php';
        ?>
        <?php
        //Llamada al menú de navegación
        include 'barraAdmin.php';
        $menu = new menuPrincipal();
        $menu ->barraPrincipal();
        ?>
    </header> 
        <!-- Separación del menu con el resto de la pagina-->
        <div style="clear:both;"></div>
        <section class="info" align="center">

            <p>
                Este sitio web está pensado para el público que se interese en comprar articulos de ropa de buena 
                calidad <br> y precio accesible, está orientada a tres categorías: ropa casual, ropa deportiva y 
                ropa formal.
            </p>
            <img src="IMG/logo.jpg" alt="logo" width="320px" height="220px">
        </section> 
        <?php
            include 'piepagina.php';
        ?>
        
</body>
</html>