<?php

require_once("db/ConexionDB.php");
require_once("entity/Producto.php");

class ProductoModel
{
    protected $db;

    public function __construct(){
        $this->db = ConexionDB::conexion();
    }


    /**
     * obtine producto por id
     *
     * @param $id
     * @return Producto|null
     */
    public function getProducto($id){
        try{
            $stm = $this->db->prepare('SELECT * FROM productos WHERE id = :producto_id');
            $stm->execute([':producto_id' => $id]);

            $product = $stm->fetch(PDO::FETCH_OBJ);

            return !empty($product) ? $this->convertirAObjeto($product) : null;
        }catch (Exception $e){
            die($e->getMessage());
        }

    }

    /**
     * obtiene lista de productos
     *
     * @return array
     */
    public function getProductos(){
        try{
            $stm = $this->db->prepare('SELECT * FROM productos');
            $stm->execute();
            $productos = [];

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $producto)
            {
                $productos[] = $this->convertirAObjeto($producto);
            }

            return $productos;

        }catch (Exception $e){
            die($e->getMessage());
        }

    }

    /**
     * @param $producto
     * @return Producto
     */
    public function convertirAObjeto($producto){

        $obj_producto = new Producto();
        $obj_producto->__SET('id', (int)$producto->id);
        $obj_producto->__SET('nombre', $producto->nombre);
        $obj_producto->__SET('referencia', $producto->referencia);
        $obj_producto->__SET('precio', (int)$producto->precio);
        $obj_producto->__SET('peso', (int)$producto->peso);
        $obj_producto->__SET('categoria', $producto->categoria);
        $obj_producto->__SET('stock', (int)$producto->stock);
        $obj_producto->__SET('fechaCreacion', $producto->fecha_creacion);
        $obj_producto->__SET('fechaUltimaVenta', $producto->fecha_ultima_venta);

        return $obj_producto;
    }


    public function editarProducto(Producto $producto){
        try{
            $sql = "
                UPDATE productos SET 
                    nombre = :nombre, 
                    referencia = :referencia, 
                    precio = :precio, 
                    peso = :peso, 
                    categoria = :categoria, 
                    stock = :stock, 
                    fecha_creacion = :fecha_creacion, 
                    fecha_ultima_venta = :fecha_ultima_venta
                WHERE id = :producto_id
            ";


            return $this->db->prepare($sql)->execute([
                ':producto_id' => $producto->__GET('id'),
                ':nombre' => $producto->__GET('nombre'),
                ':referencia' => $producto->__GET('referencia'),
                ':precio' => $producto->__GET('precio'),
                ':peso' => $producto->__GET('peso'),
                ':categoria' => $producto->__GET('categoria'),
                ':stock' => $producto->__GET('stock'),
                ':fecha_creacion' => $producto->__GET('fechaCreacion'),
                ':fecha_ultima_venta' => $producto->__GET('fechaUltimaVenta')
            ]);

        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    /**
     * @param Producto $producto
     * @return bool
     */
    public function crearProducto(Producto $producto){
        try{
            $sql = "
                INSERT INTO productos 
                    (nombre, referencia, precio, peso, categoria, stock, fecha_creacion, fecha_ultima_venta) 
                VALUES 
                    (:nombre, :referencia, :precio, :peso, :categoria, :stock, :fecha_creacion, :fecha_ultima_venta)";


            return $this->db->prepare($sql)->execute([
                    ':nombre' => $producto->__GET('nombre'),
                    ':referencia' => $producto->__GET('referencia'),
                    ':precio' => $producto->__GET('precio'),
                    ':peso' => $producto->__GET('peso'),
                    ':categoria' => $producto->__GET('categoria'),
                    ':stock' => $producto->__GET('stock'),
                    ':fecha_creacion' => $producto->__GET('fechaCreacion'),
                    ':fecha_ultima_venta' => $producto->__GET('fechaUltimaVenta')
                ]);

        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    /**
     * @param Producto $producto
     * @return bool
     */
    public function borrarProducto(Producto $producto){
        try{
            $sql = "DELETE FROM productos WHERE id = :producto_id";
            return $this->db->prepare($sql)->execute([':producto_id' => $producto->__GET('id')]);
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

}

/*$obj = new ProductoModel(); °°°°°°

$o = $obj->getProducto(3);
$o->__SET('nombre', 'edición funcionando');
print_r($obj->editarProducto($o));*/