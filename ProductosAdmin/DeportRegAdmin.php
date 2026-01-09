<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Proyecto EPA</title>
    <link rel="stylesheet" href="../CSS/menuS.css" type="text/css">
    <link rel="stylesheet" href="../CSS/formulariosReg.css" type="text/css">
</head>
<body style="background-image: url(../IMG/fondo3.jpg); padding: 100px; background-size: 100% 100%; background-attachment: fixed;">
    <header>
        <?php
        //Llamada al menú de navegación
        include '../barraAdmin.php';
        $menu = new menuPrincipal();
        $menu ->barraPrincipal();
        ?>
    </header>
    <!-- Separación del menu con el resto de la pagina-->
    <div style="clear:both;"> <h1 class="registro">Registrar Producto</h1></div>
    <section>
       
        <div class="formulario">
            <form method="post" action="../Controlador/procesaMovimientoProducto.php" onsubmit="return confirm('¿Datos correctos?');" enctype="multipart/form-data">
                    <div class="formleyenda"><label>Nombre del producto:</label></div>
                    <input id="Nombre" type="text" name="Nombre"required>
                    <div class="formleyenda"><label>Precio:</label></div>
                    <input id="Precio" type="number" name="Precio"required>
                    <div class="formleyenda"><label>Descripcion:</label></div>
                    <input id="Descripcion" type="text" name="Descripcion"required>
                    <div class="formleyenda"><label>Categoria:</label></div>
                    <div class="caja">
                    <select id ="Categoria" name="Categoria">
                    <option value="Superior">Superior</option>
                    <option value="Inferior" selected>Inferior</option>
                    <option value="Zapatos">Zapatos</option>    
                    <option value="Accesorios">Accesorios</option>
                    </select></div>
                    <div class="formleyenda"><label>Selecione una imagen(SOLO PNG):</label></div>
                    <input type="file" id="ima" name="ima">
                    <div></div>
                    <div class="enviar">
                        <button id="enviarRegdeportiva" name="enviarRegdeportiva" type="submit">Registrar</button>
                    </div>
                </form>
        </div>
    </section>
</body>
</html>