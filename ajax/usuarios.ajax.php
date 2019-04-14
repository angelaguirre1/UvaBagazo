<?php

    require_once "../controllers/usuarios.controller.php";
    require_once "../models/usuarios.model.php";

    class AjaxUsuarios{
        //Editar usuario
        public $idUsuario;

        public function ajaxEditarUsuario(){
            $item = "id";
            $valor = $this->idUsuario;

            $respuesta = ControllerUsuarios::ctrMostrarUsuario($item,$valor);

            echo json_encode($respuesta);
        }
    }

    if(isset($_POST["idUsuario"])){
        $editar = new AjaxUsuarios();
        $editar -> idUsuario = $_POST["idUsuario"];
        $editar -> ajaxEditarUsuario();
    }
?>