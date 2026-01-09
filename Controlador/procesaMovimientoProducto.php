<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ECO-CLOTHES</title>
    <link rel="stylesheet" href="../css/menus.css" type="text/css">
    <link rel="stylesheet" href="../css/formularios.css" type="text/css">
    <link rel="stylesheet" href="../CSS/formulariosBusc.css" type="text/css">
    <script type="text/javascript" src="../Validaciones/usuarios.js"></script>
</head>
<body>
    <header>
    </header>
    <!-- Separación del menu con el resto de la página-->
    <div style="clear:both;"></div>
    <section>
        <?php
        //---------------Inicio de operaciones administradores-----------------//
        
        //Efectuar la operación REGISTRAR
        
        //ROPA CASUAL
        if(isset($_POST['enviarRegcasual'])){
            //Importamos el archivo php de la clase Alumnos
            include '../Modelo/casual.php';
            //Generamos una instancia de la clase Alumnos
            $cas = new Casual();
            //Registramos datos en el objeto
            $cas->setNombre($_POST['Nombre']);
            $cas->setPrecio($_POST['Precio']);
            $cas->setDescripcion($_POST['Descripcion']);
            $cas->setCategoria($_POST['Categoria']);
            $cas->setImagen($_FILES['ima']['name']);
            $imagen = $_FILES['ima']['name'];
            $temp  = $_FILES['ima']['tmp_name'];
            move_uploaded_file($temp,'Imagen/'.$imagen);   
            //Llamada al método para registrar valores
            $cas->RegistrarProductoCasual();
            //Mensaje informativo
            echo '<script>alert("Producto '.$cas->getNombre().' registrado.");</script>';
            //Dirigir a la página principal
            echo '<script>window.location.replace("../ProductosAdmin/CasualRegAdmin.php");</script>';
        }//enviarRegCasual

        //ROPA DEPORTIVA
        if(isset($_POST['enviarRegdeportiva'])){
            //Importamos el archivo php de la clase Alumnos
            include '../Modelo/deportiva.php';
            //Generamos una instancia de la clase Alumnos
            $dep = new Deportiva();
            //Registramos datos en el objeto
            $dep->setNombre($_POST['Nombre']);
            $dep->setPrecio($_POST['Precio']);
            $dep->setDescripcion($_POST['Descripcion']);
            $dep->setCategoria($_POST['Categoria']);
            $dep->setImagen($_FILES['ima']['name']);
            $imagen = $_FILES['ima']['name'];
            $temp  = $_FILES['ima']['tmp_name'];
            move_uploaded_file($temp,'Imagen/'.$imagen);   
            //Llamada al método para registrar valores
            $dep->RegistrarProductoDeportivo();
            //Mensaje informativo
            echo '<script>alert("Producto '.$dep->getNombre().' registrado.");</script>';
            //Dirigir a la página principal
            echo '<script>window.location.replace("../ProductosAdmin/DeportRegAdmin.php");</script>';
        }//enviarRegDeportiva

        //ROPA FORMAL
        if(isset($_POST['enviarRegformal'])){
            //Importamos el archivo php de la clase Formal
            include '../Modelo/formal.php';
            //Generamos una instancia de la clase Formal
            $form = new Formal();
            //Registramos datos en el objeto
            $form->setNombre($_POST['Nombre']);
            $form->setPrecio($_POST['Precio']);
            $form->setDescripcion($_POST['Descripcion']);
            $form->setCategoria($_POST['Categoria']);
            $form->setImagen($_FILES['ima']['name']);
            $imagen = $_FILES['ima']['name'];
            $temp  = $_FILES['ima']['tmp_name'];
            move_uploaded_file($temp,'Imagen/'.$imagen);   
            //Llamada al método para registrar valores
            $form->RegistrarProductoFormal();
            //Mensaje informativo
            echo '<script>alert("Producto '.$form->getNombre().' registrado.");</script>';
            //Dirigir a la página principal
            echo '<script>window.location.replace("../ProductosAdmin/FormalRegAdmin.php");</script>';
        }//enviarRegDeportiva

         //Efectuar la operación ELIMINAR
         if(isset($_GET['idProducto'])){
            //Importamos el archivo php de la clase Alumnos
            include '../Modelo/formal.php';
            //Generamos una instancia de la clase Alumnos
            $form = new Formal();
            //Cambiar valores para actualizar
            $form->setIdProducto($_GET['idProducto']);
            //Llamada al método para actualizar valores
            $form->borrarProducto();
            //Mensaje informativo
            echo '<script>confirm("Producto Eliminado");</script>';
            //Dirigir a la página principal
            echo '<script>window.location.replace("../ProductosAdmin/MostrarProdAdmin.php");</script>';
        }

        //Efectuar la operación BUSCAR
        if(isset($_POST['enviarConsultaProd'])){
            //Importamos el archivo php de la clase Alumnos
            include '../Modelo/productos.php';
            //Generamos una instancia de la clase Alumnos
            $prod = new Producto();
            //Cambiar valores para actualizar
            $prod->setIdProducto($_POST['idproducto']);
            //Llamada al método para buscar valores
            $datos = $prod->consultaProducto();
            //Obtener el registro de la busqueda
            $registro = mysqli_fetch_array($datos);
            if($registro['nombre']!=''){
                //Mostrar los datos obtenidos
            ?>
            <h1>Busqueda de producto</h1>
            <form method="post" onsubmit="return confirm('¿Deseas modificar el producto?');" action="../Controlador/procesaMovimientoProducto.php">
            <div class="formleyenda"><label>Id de Producto:</label></div>
            <input id="idproducto" type="number" name="idproducto" value="<?php echo $registro['idProducto']?>" readonly>
            <div class="formleyenda"><label>Nombre:</label></div>
            <input id="nombre" type="text" name="nombre" value="<?php echo $registro['nombre']?>">
            <div class="formleyenda"><label>Precio:</label></div>
            <input id="precio" type="number" name="precio" value="<?php echo $registro['precio']?>">
            <div class="formleyenda"><label>Descripción:</label></div>
            <input id="descripcion" type="text" name="descripcion" value="<?php echo $registro['descripcion']?>">
            <div class="formleyenda"><label>Categoria:</label></div>
            <div class="formleyenda">
                    <select id ="categoria" name="categoria" value="<?php echo $registro['categoria']?>">
                    <option value="Superior">Superior</option>
                    <option value="Inferior" selected>Inferior</option>
                    <option value="Zapatos">Zapatos</option>    
                    <option value="Accesorios">Accesorios</option>
                    </select>
            </div>
            <div class="formleyenda"><label>Tipo de ropa:</label></div>
                    <div class="tropa">
                    <select id ="tiporopa" name="tiporopa" value="<?php echo $registro['tiporopa']?>">
                    <option value="1">Casual</option>
                    <option value="2">Deportivo</option>
                    <option value="3">Formal</option>    
                    </select></div>
            
            <div class="botonActProd">
                <button id="actualizarProducto" name="actualizarProducto" type="submit">Actualizar</button>
            </div>
            </form>
            
            <?php
            } else {
                //Mensaje informativo
                echo '<script>alert("Producto inexistente.");</script>';
                //Redirigir a página principal
                echo '<script>window.location.replace("http://localhost/ECO_CLOTHES/Formularios/productosAdmin.php");</script>';
            }//else
        }//if-enviarConsultaProducto

        //Efectuar la operación ACTUALIZAR
        if(isset($_POST['actualizarProducto'])){
            //Importamos el archivo php de la clase Alumnos
            include '../Modelo/productos.php';
            //Generamos una instancia de la clase Alumnos
            $prod = new Producto();
            //Cambiar valores para actualizar
            $prod->setIdProducto($_POST['idproducto']);
            $prod->setNombre($_POST['nombre']);
            $prod->setPrecio($_POST['precio']);
            $prod->setDescripcion($_POST['descripcion']);
            $prod->setCategoria($_POST['categoria']);
            $prod->setTipoRopa($_POST['tiporopa']);
            //Llamada al método para actualizar valores
            $prod->Actualizarprod();
            //Mensaje informativo
            echo '<script>alert("Actualizados datos del producto.");</script>';
            //Dirigir a la página principal
            echo '<script>window.location.replace("../ProductosAdmin/MostrarProdAdmin.php");</script>';
        }


        //---------------Inicio de operaciones usuarios-----------------//

        //Efectuar la operación BUSCAR 

            //BUSQUEDA CASUAL
            if(isset($_POST['enviarConsultaCas'])){
                    //Importamos el archivo php de la clase Alumnos
                    include '../Modelo/casual.php';
                    //Generamos una instancia de la clase Alumnos
                    $cas = new Casual();
                    //Cambiar valores para actualizar
                    $cas->setNombre($_POST['nombre']);
                    //Llamada al método para buscar valores
                    $datos = $cas->consultaProductoCasual();
                    //Obtener el registro de la busqueda
                    $registro = mysqli_fetch_array($datos);
                    if($registro['nombre']!=''){
                        //Mostrar los datos obtenidos
                    ?>
                    <h1>Busqueda de producto</h1>
                    <form method="post" onsubmit="return confirm('¿Deseas agregarlo al carrito?');" action="../Controlador/procesaMovimientoProducto.php">
                    <div class="formleyenda"><label>Nombre:</label></div>
                    <input id="nombre" type="text" name="nombre" value="<?php echo $registro['nombre']?>" readonly>
                    <div class="formleyenda"><label>Precio:</label></div>
                    <input id="precio" type="number" name="precio" value="<?php echo $registro['precio']?>" readonly>
                    <div class="formleyenda"><label>Descripción:</label></div>
                    <input id="descripcion" type="text" name="descripcion" value="<?php echo $registro['descripcion']?>" readonly>
                    <div class="formleyenda"><label>Categoría:</label></div>
                    <input id="categoria" type="text" name="categoria" value="<?php echo $registro['categoria']?>" readonly>
                    <div class="formleyenda"><label>Tipo de ropa:</label></div>
                    <input id="tiporopa" type="text" name="tiporopa" value="<?php echo $registro['tiporopa']?>" readonly>
                    <div class="formleyenda"><label>Imagen:</label></div>
                    <?php echo "<img src = '../Controlador/Imagen/".$registro['imagen']."'alt=''width=300px height=250px>";?>
                    <div class="formleyenda"><label>Cantidad a agregar:</label></div>
                    <input type="number" name="cantidad" id="cantidad">

                    <div>
                        <button id="agregarCarrito" name="agregarCarrito" type="submit">Agregar al Carrito</button>
                    </div>
                    </form>
                    <?php
                    } else {
                        //Mensaje informativo
                        echo '<script>alert("Producto inexistente.");</script>';
                        //Redirigir a página principal
                        echo '<script>window.location.replace("http://localhost/ECO_CLOTHES/productosUsr.php");</script>';
                    }//else
                }//if-enviarConsultaCasual

            //BUSQUEDA DEPORTIVA
            if(isset($_POST['enviarConsultaDep'])){
                //Importamos el archivo php de la clase Alumnos
                include '../Modelo/deportiva.php';
                //Generamos una instancia de la clase Alumnos
                $dep = new Deportiva();
                //Cambiar valores para actualizar
                $dep->setNombre($_POST['nombre']);
                //Llamada al método para buscar valores
                $datos = $dep->consultaProductoDeportivo();
                //Obtener el registro de la busqueda
                $registro = mysqli_fetch_array($datos);
                if($registro['nombre']!=''){
                    //Mostrar los datos obtenidos
                ?>
                <h1>Busqueda de producto</h1>
                <form method="post" onsubmit="return confirm('¿Deseas agregarlo al carrito?');" action="../Controlador/procesaMovimientoProducto.php">
                <div class="formleyenda"><label>Nombre:</label></div>
                <input id="nombre" type="text" name="nombre" value="<?php echo $registro['nombre']?>" readonly>
                <div class="formleyenda"><label>Precio:</label></div>
                <input id="precio" type="number" name="precio" value="<?php echo $registro['precio']?>" readonly>
                <div class="formleyenda"><label>Descripción:</label></div>
                <input id="descripcion" type="text" name="descripcion" value="<?php echo $registro['descripcion']?>" readonly>
                <div class="formleyenda"><label>Categoría:</label></div>
                <input id="categoria" type="text" name="categoria" value="<?php echo $registro['categoria']?>" readonly>
                <div class="formleyenda"><label>Tipo de ropa:</label></div>
                <input id="tiporopa" type="text" name="tiporopa" value="<?php echo $registro['tiporopa']?>" readonly>
                <div class="formleyenda"><label>Imagen:</label></div>
                <?php echo "<img src = '../Controlador/Imagen/".$registro['imagen']."'alt=''width=300px height=250px>";?>
                <div class="formleyenda"><label>Cantidad a agregar:</label></div>
                <input type="number" name="cantidad" id="cantidad">
                <div>
                    <button id="agregarCarrito" name="agregarCarrito" type="submit">Agregar al Carrito</button>
                </div>
                </form>
                <?php
                } else {
                    //Mensaje informativo
                    echo '<script>alert("Producto inexistente.");</script>';
                    //Redirigir a página principal
                    echo '<script>window.location.replace("http://localhost/ECO_CLOTHES/productosUsr.php");</script>';
                }//else
            }//if-enviarConsultaCasual

             //BUSQUEDA CASUAL
             if(isset($_POST['enviarConsultaForm'])){
                //Importamos el archivo php de la clase Alumnos
                include '../Modelo/formal.php';
                //Generamos una instancia de la clase Alumnos
                $form = new Formal();
                //Cambiar valores para actualizar
                $form->setNombre($_POST['nombre']);
                //Llamada al método para buscar valores
                $datos = $form->consultaProductoFormal();
                //Obtener el registro de la busqueda
                $registro = mysqli_fetch_array($datos);
                if($registro['nombre']!=''){
                    //Mostrar los datos obtenidos
                ?>
                <h1>Busqueda de producto</h1>
                <form method="post" onsubmit="return confirm('¿Deseas agregarlo al carrito?');" action="../Controlador/procesaMovimientoProducto.php">
                <div class="formleyenda"><label>Nombre:</label></div>
                <input id="nombre" type="text" name="nombre" value="<?php echo $registro['nombre']?>" readonly>
                <div class="formleyenda"><label>Precio:</label></div>
                <input id="precio" type="number" name="precio" value="<?php echo $registro['precio']?>">
                <div class="formleyenda"><label>Descripción:</label></div>
                <input id="descripcion" type="text" name="descripcion" value="<?php echo $registro['descripcion']?>" readonly>
                <div class="formleyenda"><label>Categoría:</label></div>
                <input id="categoria" type="text" name="categoria" value="<?php echo $registro['categoria']?>" readonly>
                <div class="formleyenda"><label>Tipo de ropa:</label></div>
                <input id="tiporopa" type="text" name="tiporopa" value="<?php echo $registro['tiporopa']?>" readonly>
                <div class="formleyenda"><label>Imagen:</label></div>
                <?php echo "<img src = '../Controlador/Imagen/".$registro['imagen']."'alt=''width=300px height=250px>";?>
                <div class="formleyenda"><label>Cantidad a agregar:</label></div>
                <input type="number" name="cantidad" id="cantidad">
                <div>
                    <button id="agregarCarrito" name="agregarCarrito" type="submit">Agregar al Carrito</button>
                </div>

                </form>
                <?php
                } else {
                    //Mensaje informativo
                    echo '<script>alert("Producto inexistente.");</script>';
                    //Redirigir a página principal
                    echo '<script>window.location.replace("http://localhost/ECO_CLOTHES/productosUsr.php");</script>';
                }//else
            }//if-enviarConsultaCasual

            //AGREGAR AL CARRITO
            if(isset($_POST['agregarCarrito']))
            {
                //Se llama a este archivo php
                include '../carrito.php';
                //Se crea una instancia de la clase Carrito (se crea el objeto)
                $carri = new Carrito();
               
                //Obtener el registro de la busqueda (obtiene los valores de cada caja de texto mediante su 'name' y se envían a mostrarCarrito)
                $carri->setNombre($_POST['nombre']);
                $carri->setPrecio($_POST['precio']);
                $carri->setDescripcion($_POST['descripcion']);
                $carri->setCategoria($_POST['categoria']);
                $carri->setTiporopa($_POST['tiporopa']);
                $carri->setCantidad($_POST['cantidad']);
                //Llamada al método para registrar valores
                $info = $carri->RegistrarProductoCarrito();
                //Mensaje informativo
                echo '<script>alert("Producto '.$carri->getNombre().' registrado.");</script>';
                //Dirigir a la página principal
                echo '<script>window.location.replace("../mostrarCarrito.php");</script>';
            }

            //ELIMINAR DE CARRITO
             //Efectuar la operación ELIMINAR
            if(isset($_GET['idCarrito'])){
            //Importamos el archivo php de la clase Alumnos
            include '../carrito.php';
            //Generamos una instancia de la clase Alumnos
            $carri = new Carrito();
            //Cambiar valores para actualizar
            $carri->setIdProducto($_GET['idCarrito']);
            //Llamada al método para actualizar valores
            $carri->borrarProducto();
            //Mensaje informativo
            echo '<script>confirm("Producto Eliminado de carrito");</script>';
            //Dirigir a la página principal
            echo '<script>window.location.replace("../mostrarCarrito.php");</script>';
        }


        ?>

    </section>
</body>
</html>