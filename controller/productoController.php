<?php

require_once("model/ProductoModel.php");

$modelo = new ProductoModel();
$productos = $modelo->getProductos();

require_once("view/productoVista.php");
