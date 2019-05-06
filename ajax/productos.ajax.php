<?php

require_once "../controllers/productos.controller.php";
require_once "../models/productos.model.php";

require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.model.php";

class AjaxProductos{
    
    public $idProducto;

    public function ajaxEditarProducto(){
        $item = "id";
        $valor = $this->idProducto;

        $respuesta = ControllerProductos::ctrMostrarProductos($item,$valor);

        echo json_encode($respuesta);
    }
}

if(isset($_POST["idProducto"])){
    $editarProducto = new AjaxProductos();
    $editarProducto -> idProducto = $_POST["idProducto"];
    $editarProducto -> ajaxEditarProducto();
}