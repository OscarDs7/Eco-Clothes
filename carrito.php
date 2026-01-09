<?php

//Esta clase almacenrá la información proveniente del formulario, para posteriormente conectar a la BD y realizar la operación CRUD (agregar-C-, consultar-R-, actualizar-U- y eliminar-D)correspondiente

class Carrito{
    //Atributos(igual que los campos de la tabla)
    private $idproducto;
    private $nombre;
    private $precio;
    private $cantidad;
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
    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
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
    public function getCantidad(){
        return $this->cantidad;
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

    public function RegistrarProductoCarrito(){
        //1-Definir la instruccion SQL de inserción 
        echo '<script>alert("Producto '.$this->getNombre().' agregado.");</script>';
        //insert into alumnos (matricula, nombre, apellidos, promedio, estatus) values (12345,'Luis','Lopez',8.2, 1);
        $registrar = "insert into carrito (idCarrito, nombre, precio, cantidad, descripcion, categoria, tiporopa) Values ('".NULL."','".$this->getNombre()."','".$this->getPrecio()."','".$this->getCantidad()."','".$this->getDescripcion()."','".$this->getCategoria()."','".$this->getTiporopa()."');";
        //echo $registrar."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $consulta = mysqli_query($this->conexion,$registrar);

        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Mensaje informativo
        echo "Producto agregado.<br>";

        return $consulta;
    }

    //Método para CONSULTAR TODOS los registros de la tabla
    public function consultaProductosCarrito(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "select idCarrito, nombre, precio, cantidad, descripcion, CategoriaPorTipoRopa(tiporopa) as TipoRopa, categoria, precio*cantidad as Total from carrito";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consultaProfesores

    public function consultaTotaldeCompra(){
         //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "select sum(precio*cantidad) as TotalCompra from carrito";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }

    public function borrarProducto(){
        //1-Definir la instruccion SQL de consulta
        //update alumnos set estatus=2 where matricula=12345;
        $borrar = "delete from carrito where idCarrito = '".$this->getIdProducto()."';";
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

