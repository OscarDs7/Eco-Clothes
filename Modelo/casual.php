<?php

//Esta clase almacenrá la información proveniente del formulario, para posteriormente conectar a la BD y realizar la operación CRUD (agregar-C-, consultar-R-, actualizar-U- y eliminar-D)correspondiente

class Casual{
    //Atributos(igual que los campos de la tabla)
    private $idproducto;
    private $nombre;
    private $precio;
    private $descripcion;
    private $categoria;
    private $tiporopa;
    private $imagen;
    //Atributo de conectividad con la BD
    private $conexion;
    
    //Métodos
    //-Constructor
    public function _construct(){
        $this->idproducto = 0;
        $this->nombre="none";
        $this->precio = 0.0;
        $this->descripcion="none";
        $this->categoria="none";
        $this->tiporopa=0;
        $this->imagen="none";
    }
    
    //Set's y Get's
    public function setIdProducto($idproducto){
        $this->idproducto = $idproducto;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function setPrecio($precio){
        $this->precio = $precio;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
    public function setTiporopa($tiporopa){
        $this->tiporopa = $tiporopa;
    }
    
    public function setImagen($imagen){
        $this->imagen = $imagen;
    }
    //-----------------------------------
    public function getIdProducto(){
        return $this->idproducto;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getCategoria(){
        return $this->categoria;
    }
    public function getTiporopa(){
        return $this->tiporopa;
    }
    public function getImagen(){
        return $this->imagen;
    }

    //Método para conectar a la tabla alumnos de la BD
    private function EstableceConexion(){
        //$this->conexion = mysqli_connect('127.0.0.1:8889','llopez','12345');
        $this->conexion = mysqli_connect('127.0.0.1:3306','root','');
        
        if(!$this->conexion){
            echo "La conexion no se ha podido establecer.<br>";
        } else{
            mysqli_select_db($this->conexion,"Ecomerce");
        }
    }//EstableceConexion

    public function RegistrarProductoCasual(){
        //1-Definir la instruccion SQL de inserción 
        echo '<script>alert("Producto '.$this->getNombre().' registrado.");</script>';
        //insert into alumnos (matricula, nombre, apellidos, promedio, estatus) values (12345,'Luis','Lopez',8.2, 1);
        $registrar = "insert into productos (idProducto, nombre, precio, descripcion, categoria, imagen, tiporopa) Values ('".NULL."','".$this->getNombre()."','".$this->getPrecio()."','".$this->getDescripcion()."','".$this->getCategoria()."','".$this->getImagen()."',1)";
        //echo $registrar."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        mysqli_query($this->conexion,$registrar);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Mensaje informativo
        echo "Ropa casual registrado.<br>";
    }

    public function consultaProductoCasual(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "select nombre, precio,  descripcion, categoria, tiporopa, imagen from productos where nombre LIKE '".$this->getNombre()."';";
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
    

    //Método para CONSULTAR TODOS los registros de la tabla
    public function consultaProductosCasual(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "select nombre, precio, descripcion, categoria, imagen from productos where tiporopa = 1 order by nombre";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consultaProfesores

    public function borrarProducto(){
        //1-Definir la instruccion SQL de consulta
        //update alumnos set estatus=2 where matricula=12345;
        $borrar = "delete from productos where idProducto = '".$this->getIdProducto()."';";
        //print_r($borrar);
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
    
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        mysqli_query($this->conexion,$borrar);
    
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
    
        //5-Mensaje informativo
        echo "Producto eliminado.";
    }//borrarProducto

} //class

