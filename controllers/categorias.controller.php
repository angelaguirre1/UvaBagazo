<?php

class ControllerCategorias{

    static public function ctrCrearCategoria(){
        if(isset($_POST["nuevaCategoria"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){
                $tabla = "categorias";
                $datos = $_POST["nuevaCategoria"];

                $respuesta = ModelCategorias::mdlIngresarCategoria($tabla,$datos);

                if($respuesta == "ok"){
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Categoria agregada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if(result.value){
                            window.location = "categorias";
                        }
                    });
                </script>';
                }else{
                    echo '<script>
                    swal({
                        type: "error",
                        title: "La categoria no pudo ser agregada",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if(result.value){
                            window.location = "categorias";
                        }
                    });
                </script>';
                }

            }else{
                echo '<script>
                 swal({
                     type: "error",
                     title: "La categoria no puede ir vacia o tener caracteres especiales",
                     showConfirmButton: true,
                     confirmButtonText: "Cerrar",
                     closeOnConfirm: false
                 }).then((result) => {
                     if(result.value){
                         window.location = "categorias";
                     }
                 });
             </script>';
            }
        }
    }

    static public function ctrMostrarCategorias($item,$valor){
        $tabla = "categorias";

        $respuesta = ModelCategorias::mdlMostrarCategorias($tabla,$item,$valor);

        return $respuesta;
    }

    static public function ctrEditarCategoria(){
        if(isset($_POST["editarCategoria"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])){
                $tabla = "categorias";
                $datos = array("categoria" => $_POST["editarCategoria"],
                               "id" => $_POST["idCategoria"]
                              );

                $respuesta = ModelCategorias::mdlEditarCategoria($tabla,$datos);

                if($respuesta == "ok"){
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Categoria editada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if(result.value){
                            window.location = "categorias";
                        }
                    });
                </script>';
                }else{
                    echo '<script>
                    swal({
                        type: "error",
                        title: "La categoria no pudo ser agregada",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if(result.value){
                            window.location = "categorias";
                        }
                    });
                </script>';
                }

            }else{
                echo '<script>
                 swal({
                     type: "error",
                     title: "La categoria no puede ir vacia o tener caracteres especiales",
                     showConfirmButton: true,
                     confirmButtonText: "Cerrar",
                     closeOnConfirm: false
                 }).then((result) => {
                     if(result.value){
                         window.location = "categorias";
                     }
                 });
             </script>';
            }
        }
    }

    static public function ctrBorrarCategoria(){
        if(isset($_GET["idCategoria"])){
            $tabla = "categorias";
            $datos = $_GET["idCategoria"];

            $respuesta = ModelCategorias::mdlBorrarCategoria($tabla,$datos);

            if($respuesta == "ok"){
                echo '<script>
                    swal({
                        type: "success",
                        title: "Categoria eliminada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if(result.value){
                            window.location = "categorias";
                        }
                    });
                </script>';
            }else{
                echo '<script>
                 swal({
                     type: "error",
                     title: "Error al eliminar la categoria",
                     showConfirmButton: true,
                     confirmButtonText: "Cerrar",
                     closeOnConfirm: false
                 }).then((result) => {
                     if(result.value){
                         window.location = "categorias";
                     }
                 });
             </script>';
            }
        }
    }
}