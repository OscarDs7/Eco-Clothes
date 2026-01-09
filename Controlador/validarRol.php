<?php
    session_start();

    
    $_SESSION['rol'] = 'admin'; // Esto es solo para demostrar. En un caso real, obtendrás esto de la base de datos.
    // Verificamos el rol y redirigimos a la página correspondiente
    if (isset($_SESSION['rol'])) {
        $role = $_SESSION['rol'];
    
        switch ($role) {
            case 'admin':
                header("Location: ../productosAdmin.php");
                exit();
            case 'user':
                header("Location: ../productosUsr.php");
                exit();
        }
    } else {
        // Si no hay un rol en la sesión, redirigimos al login o a una página de error
        header("Location: frmUsuariosLogin.php");
        exit();
    }
?>