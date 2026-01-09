<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Eco-Clothes</title>
</head>
<body>
    <header>
        <?php
        //Llamada al menú de navegación
        include '../barraGralMenu.php';
        $menu = new menuGeneral();
        $menu ->barraMenuGeneral();
        //Instrucciones para ver errores en navegador
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        ?>
    </header>
    <!-- Separación del menu con el resto de la página-->
    <div style="clear:both;"></div>
    <section>
        <?php
            //Efectuar la operación REGISTRAR
            if(isset($_POST['enviarRegUsr'])){
                //Importamos el archivo php de la clase Alumnos
                include '../Modelo/usuarios.php';
                //Generamos una instancia de la clase Alumnos
                $usr = new Usuario();
                //Registramos datos en el objeto
                $usr->setNombre($_POST['nombre']);
                $usr->setContrasena($_POST['contrasena']);
                //Llamada al método para registrar valores
                $usr->registrarUsuario();
                //Mensaje informativo
                echo '<script>alert("Usuario '.$usr->getNombre().' registrado.");</script>';
                //Dirigir a la página principal
                echo '<script>window.location.replace("http://localhost/ECO_CLOTHES/Formularios/frmUsuariosRegistro.php");</script>';
            }//enviarRegUsr
        ?>
    </section>
</body>
</html>