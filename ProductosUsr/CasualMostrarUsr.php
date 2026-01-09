<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ECO-CLOTHES</title>
    <link rel="stylesheet" href="../CSS/menus.css" type="text/css">
    <link rel="stylesheet" href="../CSS/formularios.css" type="text/css">
    <link rel="stylesheet" href="../CSS/tablas.css" type="text/css">
    <link rel="stylesheet" href="fondo.css" type="text/css">
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
        <h1 style="text-align:center" class="subtitulo">Listado de productos Casuales</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Categoria</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include '../Modelo/casual.php';
                        $cas = new Casual();
                        $datos = $cas->consultaProductosCasual();
                    
                        while($fila = mysqli_fetch_array($datos)){
                            echo "<tr><td>".$fila['nombre']."</td><td>".$fila['precio']."</td><td>".$fila['descripcion']."</td><td>".$fila['categoria']."</td><td>
                            <img src='../Controlador/Imagen/".$fila['imagen']."' alt='Sin imagen' width=300px height=250px></td>";
                           
                        }//while
                    ?>                    
                </tbody>
            </table>
        </div>
        <!--tabla de consulta-->
    </section>
</body>
</html>