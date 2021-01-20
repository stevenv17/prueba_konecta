<?php

declare(strict_types=1);

/**
 * Class Producto
 */
class Producto
{
    private $id;
    private $nombre;
    private $referencia;
    private $precio;
    private $peso;
    private $categoria;
    private $stock;
    private $fechaCreacion;
    private $fechaUltimaVenta;

    /**
     * @param $atributo
     * @return mixed
     */
    public function __GET($atributo){
        return $this->$atributo;
    }

    /**
     * @param $atributo
     * @param $valor
     * @return mixed
     */
    public function __SET($atributo, $valor){
        return $this->$atributo = $valor;
    }

}