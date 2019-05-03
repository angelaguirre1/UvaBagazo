<?php

    require_once "../models/eventos.model.php";

    class AjaxEventos{

        public $eliminarEve;

        public function eliminarEvento(){

            $valor = $this->eliminarEve;

            $respuesta = ModelEventos::mdlEliminarEvento($valor);
            
            if($respuesta == "ok"){
                echo '<script>
                     swal({
                         type: "success",
                         title: "El evento ha sido borrado correctamente",
                         showConfirmButton: true,
                         confirmButtonText: "Cerrar",
                         closeOnConfirm: false
                     }).then((result) => {
                         if(result.value){
                             window.location = "calendario";
                         }
                     });
                 </script>';
            }else{
                echo '<script>
                     swal({
                         type: "error",
                         title: "El evento no ha sido borrado, intentelo nuevamente",
                         showConfirmButton: true,
                         confirmButtonText: "Cerrar",
                         closeOnConfirm: false
                     }).then((result) => {
                         if(result.value){
                             window.location = "calendario";
                         }
                     });
                 </script>';
            }
        }
    }

    if(isset($_POST["idEvento"])){
        $eliminar = new AjaxEventos();
        $eliminar -> eliminarEve= $_POST["idEvento"];
        $eliminar -> eliminarEvento();
    }