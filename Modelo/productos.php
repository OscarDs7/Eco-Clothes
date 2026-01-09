<?php

//Esta clase almacenrá la información proveniente del formulario, para posteriormente conectar a la BD y realizar la operación CRUD (agregar-C-, consultar-R-, actualizar-U- y eliminar-D)correspondiente

class Producto{
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
        $this->cantidad = 0;
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


    //Método para CONSULTAR TODOS los registros de la tabla
    public function consultaProductos(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "select idProducto, nombre, precio, descripcion, categoria, imagen, CategoriaPorTipoRopa(tiporopa) as TipoRopa from productos order by idProducto";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD) 
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consultaProfesores

    public function consultaProducto(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "select * from productos where idProducto=".$this->getIdProducto().";";
        
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

    public function Actualizarprod(){
        echo '<script>alert("'.$this->getNombre().'");</script>';
        //Evaluar que existan datos por actualizar
        if($this->getIdProducto() != 0){
            //1-Definir la instruccion SQL de actualización
            //update alumnos set nombre='María', apellidos='Gonzalez', Sindicalizado=9.3 where matricula=12345;
            $actualizar = "update productos set nombre='".$this->getNombre()."', precio=".$this->getPrecio().",  descripcion='".$this->getDescripcion()."',categoria='".$this->getCategoria()."',tiporopa=".$this->getTipoRopa()." where idProducto='".$this->getIdProducto()."';";
            //echo $actualizar."<br>";
    
            //2-Establecer conexión con la BD
            $this->EstableceConexion();
    
            //3-Ejecutar la instrucción SQL en la conexion (BD)
            mysqli_query($this->conexion,$actualizar);
    
            //4-Cierro la conexión con la BD
            mysqli_close($this->conexion);
    
            //5-Mensaje informativo
            echo "Producto Actualizado.";
        }else {
            echo "Sin definir identificador por actualizar.";
        }
        
    }//actualizaProducto

} //class

