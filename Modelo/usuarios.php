<?php

//Esta clase almacenrá la información proveniente del formulario, para posteriormente conectar a la BD y realizar la operación CRUD (agregar-C-, consultar-R-, actualizar-U- y eliminar-D)correspondiente

class Usuario{
    //Atributos(igual que los campos de la tabla)
    private $nombre;
    private $contrasena;
    //Atributo de conectividad con la BD
    private $conexion;
    
    //Métodos
    //-Constructor
    public function _construct(){
        $this->nombre="none";
        $this->contrasena="none";
    }
    
    //Set's y Get's
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }


    public function getNombre(){
        return $this->nombre;
    }
    
    public function getContrasena(){
        return $this->contrasena;
    }

    //Método para conectar a la tabla alumnos de la BD
    private function EstableceConexion(){
        //$this->conexion = mysqli_connect('127.0.0.1:8889','llopez','12345');
        $this->conexion = mysqli_connect('127.0.0.1:3306','root','');
        
        if(!$this->conexion){
            echo "La conexion no se ha podido establecer.<br>";
        } else{
            mysqli_select_db($this->conexion,"EcoClothes");
        }
    }//EstableceConexion
    
    //Método para REGISTRAR información en la tabla alumnos
    public function registrarUsuario(){
        //1-Definir la instruccion SQL de inserción
        //insert into alumnos (matricula, nombre, apellidos, promedio, estatus) values (12345,'Luis','Lopez',8.2, 1);
        $registrar = "insert into usuarios (nombre, contrasena, rol, estatus) values ('".$this->getNombre()."','".$this->getContrasena()."',2,1)";
        //echo $registrar."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        mysqli_query($this->conexion,$registrar);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);

    }//registrarUsuario

    public function buscarUsuario(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "select * from usuarios where estatus = 1 and nombre='".$this->getNombre()."' and contrasena = '".$this->getContrasena()."';";
        //echo $consulta."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consultaAlumnos

    public function consultarRol()
    {
        $consulta = "select rol from usuarios where estatus = 1";

         //2-Establecer conexión con la BD
         $this->EstableceConexion();
        
         //3-Ejecutar la instrucción SQL en la conexion (BD)
         $resultado = mysqli_query($this->conexion,$consulta);

         //4-Cierro la conexión con la BD
         mysqli_close($this->conexion);
         
         //5-Retorna los datos de la consulta
         return $resultado;
    
    }//consultarRol
}