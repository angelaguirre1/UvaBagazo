<?php

    require_once "../controllers/usuarios.controller.php";
    require_once "../models/usuarios.model.php";

    class AjaxUsuarios{
        //Editar usuario
        public $idUsuario;
        public $activarUsuario;
        public $activarId;
        public $validarUsuario;
        public $validarEmail;


        public function ajaxEditarUsuario(){
            $item = "id";
            $valor = $this->idUsuario;

            $respuesta = ControllerUsuarios::ctrMostrarUsuario($item,$valor);

            echo json_encode($respuesta);
        }

        public function ajaxActivarUsuario(){

            $tabla = "usuarios";

            $item1 = "estado";
            $valor1 = $this->activarUsuario;

            $item2 = "id";
            $valor2 = $this->activarId;

            $respuesta = ModelUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

        }

        public function ajaxValidarUsuario(){
            $item = "usuario";
            $valor = $this->validarUsuario;

            $respuesta = ControllerUsuarios::ctrMostrarUsuario($item,$valor);

            echo json_encode($respuesta);
        }

        public function ajaxValidarEmail(){
            $item = "email";
            $valor = $this->validarEmail;

            $respuesta = ControllerUsuarios::ctrMostrarUsuario($item,$valor);

            echo json_encode($respuesta);
        }



    }

    if(isset($_POST["idUsuario"])){
        $editar = new AjaxUsuarios();
        $editar -> idUsuario = $_POST["idUsuario"];
        $editar -> ajaxEditarUsuario();
    }

    if(isset($_POST["activarUsuario"])){
        $activarUsuario = new AjaxUsuarios();
        $activarUsuario -> activarUsuario = $_POST["activarUsuario"];
        $activarUsuario -> activarId = $_POST["activarId"];
        $activarUsuario -> ajaxActivarUsuario();
    }

    if(isset($_POST["validarUsuario"])){
        $valUsuario = new AjaxUsuarios();
        $valUsuario -> validarUsuario = $_POST["validarUsuario"];
        $valUsuario -> ajaxValidarUsuario();
    }

    if(isset($_POST["validarEmail"])){
        $valEmail = new AjaxUsuarios();
        $valEmail -> validarEmail = $_POST["validarEmail"];
        $valEmail -> ajaxValidarEmail();
    }


?>