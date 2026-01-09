<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ECO-CLOTHES</title>
    <link rel="stylesheet" href="../CSS/menus.css" type="text/css">
    <link rel="stylesheet" href="../CSS/formularios.css" type="text/css">
    <link rel="stylesheet" href="../CSS/tablas.css" type="text/css">
    <!-- Enlaces de Bootstrap desde una CDN (Content Delivery Network) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
       <h1 class="titulo"><center>ECO-CLOTHES</center></h1>
    </header>
    <!-- Separación del menu con el resto de la pagina-->
    <div style="clear:both;"></div>
    <section>
        <!--tabla de consulta-->
        <div style="overflow-x: auto;">
        <h1 style="text-align:center">Listado de productos</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id de Producto</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Categoria</th>
                        <th>Imagen</th>
                        <th>Tipo de ropa</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include '../Modelo/productos.php';
                        $prod = new Producto();
                        $datos = $prod->consultaProductos();
                    
                        while($fila = mysqli_fetch_array($datos)){
                            echo "<tr><td>".$fila['idProducto']."</td><td>".$fila['nombre']."</td><td>".$fila['precio']."</td><td>".$fila['descripcion']."</td>
                            <td>".$fila['categoria']."</td><td>".$fila['imagen']."</td><td>".$fila['TipoRopa']."</td>
                            <td>
                            <a id=\"borrar\" name=\"borrar\" href='http://localhost/ECO_CLOTHES/Controlador/procesaMovimientoProducto.php?idProducto=".$fila['idProducto']."'>Eliminar</a>
                            </td>";   
                        }//while
                    ?>                    
                </tbody>
            </table>
        </div>
        <!--tabla de consulta-->
    </section>
</body>
</html>