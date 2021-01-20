<?php

require_once("model/ProductoModel.php");
require_once("entity/Producto.php");

$modelo = new ProductoModel();
$productos = $modelo->getProductos();

switch($_REQUEST['action'])
{
    case 'actualizar':
        if(empty($_REQUEST['id'])){//crear

            $obj_producto = new Producto();

            $obj_producto->__SET('nombre', $_REQUEST['nombre']);
            $obj_producto->__SET('referencia', $_REQUEST['referencia']);
            $obj_producto->__SET('precio', (int)$_REQUEST['precio']);
            $obj_producto->__SET('peso', (int)$_REQUEST['peso']);
            $obj_producto->__SET('categoria', $_REQUEST['categoria']);
            $obj_producto->__SET('stock', (int)$_REQUEST['stock']);
            $obj_producto->__SET('fechaCreacion', date('Y-m-d'));
            $obj_producto->__SET('fechaUltimaVenta', null);

            $modelo->crearProducto($obj_producto);

        }else{//editar
            $producto = $modelo->getProducto($_REQUEST['id']);
            $obj_producto = $modelo->convertirAObjeto($producto);

            $obj_producto->__SET('nombre', $_REQUEST['nombre']);
            $obj_producto->__SET('referencia', $_REQUEST['referencia']);
            $obj_producto->__SET('precio', (int)$_REQUEST['precio']);
            $obj_producto->__SET('peso', (int)$_REQUEST['peso']);
            $obj_producto->__SET('categoria', $_REQUEST['categoria']);
            $obj_producto->__SET('stock', (int)$_REQUEST['stock']);

            $modelo->editarProducto($obj_producto);
        }
        header("Refresh:0; url=/");
        break;
    case 'eliminar':
        break;
}

require_once("view/productoVista.php");
