<?php

    class ControllerEventos{

        static public function ctrCrearEvento(){
            if(isset($_POST["titulo"])){

                $tabla = "calendario";

                $start = $_POST["fecha"] . " " . $_POST["hora"];

                $datos = array("title" => $_POST["titulo"],
                               "descripcion" => $_POST["descripcion"],
                               "start" => $start,
                               "color" => $_POST["color"],
                               "end" => $start);

                $respuesta = ModelEventos::mdlAgregarEvento($tabla,$datos);

                if($respuesta == "ok"){
                    echo '<script>
                         swal({
                             type: "success",
                             title: "El evento ha sido guardado correctamente",
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
                             title: "El evento no ha sido guardado, intentelo nuevamente",
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

        static public function ctrEliminarEvento(){
            if(isset($_POST["idEvento"])){

                $item = $_POST["idEvento"];
                $tabla = "calendario";

                $respuesta = ModelEventos::mdlEliminarEvento($tabla,$item);

                if($respuesta == "ok"){
                    echo '<script>
                         swal({
                             type: "success",
                             title: "El evento ha sido eliminado correctamente",
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
                             title: "El evento no ha sido eliminado, intentelo nuevamente",
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
    }