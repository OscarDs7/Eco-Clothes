<?php

session_start();
//print_r($_POST);
//variables que pasamos del formulario de Login.php
$usuario=$_POST['nombre'];
$password=$_POST['contrasena'];


//echo "Se reciben los siguientes datos: <br>";
//echo "Usuario recibido: ".$usuario."<br>";
//echo "Contraseña recibida: ".$password."<br>";
//Validar si están vacios
if($usuario=='' || $password==''){
    //Dirigir a la página principal
    echo '<script>window.location.replace("../index.php");</script>';
}else {
    try{
        include_once '../Modelo/usuarios.php';
        $usr = new Usuario();
        $usr->setNombre($_POST['nombre']);
        $usr->setContrasena($_POST['contrasena']);
        $datos = $usr->buscarUsuario();
        //Obtener el registro de la busqueda
        $registro = mysqli_fetch_array($datos);
        //Validar si los datos de la BD son vacios
        if($registro['nombre']=='' || $registro['contrasena']==''){
            //echo "Verdadero. <br>";
            echo '<script>alert("Usuario y contraseña incorrectos, intente de nuevo.")</script>';
            echo '<script>location.href="../Formularios/frmUsuarioslogin.php"</script>';
        }
        else{
            //Valida usuario y contraseña
            if($usuario == $registro['nombre'] && $password == $registro['contrasena']) {
                $_SESSION['valido'] = $registro['rol'];
                
                
                if(isset($_SESSION['valido'])){
                    $rol = $_SESSION['valido'];
        
                    switch ($rol) {
                        case 1:
                            header("Location: ../productosAdmin.php");
                            exit();
                        case 2:
                            header("Location: ../productosUsr.php");
                            exit();
                    }
                    
                }//consultarRol*/

               echo '<script>location.href="../productosAdmin.php"</script>';
            }
            else{
                echo '<script>alert("El usuario o contraseña son incorrectos. Intente de nuevo.")</script>';
                echo '<script>location.href="../Formularios/frmUsuarioslogin.php"</script>';
            }
        }//else
    }catch(Exception $ex){
        echo 'Error: '.$ex->getMessage();
    }

}//validar

