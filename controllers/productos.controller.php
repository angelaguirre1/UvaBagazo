<?php

class ControllerProductos{

    static public function ctrMostrarProductos($item,$valor){
        $tabla = "productos";

        $respuesta = ModelProductos::mdlMostrarProductos($tabla,$item,$valor);

        return $respuesta;
    }

    static public function ctrCrearProducto(){

        if(isset($_POST["nuevoNombre"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCodigo"]) &&
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
               preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
               preg_match('/^[0-9.]+$/', $_POST["nuevoPrecio"])){

                $tabla = "productos";
                $datos = array("id_categoria" => $_POST["nuevaCategoria"],
                               "nombre" => $_POST["nuevoNombre"],
                               "codigo" => $_POST["nuevoCodigo"],
                               "descripcion" => $_POST["nuevaDescripcion"],
                               "stock" => $_POST["nuevoStock"],
                               "precio" => $_POST["nuevoPrecio"]);

                $respuesta = ModelProductos::mdlIngresarProducto($tabla,$datos);

                if($respuesta == "ok"){
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Producto agregado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if(result.value){
                            window.location = "productos";
                        }
                    });
                </script>';
                }else{
                    echo '<script>
                    swal({
                        type: "error",
                        title: "El producto no pudo ser agregado",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if(result.value){
                            window.location = "productos";
                        }
                    });
                </script>';
                }

            }else{
                echo '<script>
                 swal({
                     type: "error",
                     title: "El producto no puede ir vacio o tener caracteres especiales",
                     showConfirmButton: true,
                     confirmButtonText: "Cerrar",
                     closeOnConfirm: false
                 }).then((result) => {
                     if(result.value){
                         window.location = "productos";
                     }
                 });
             </script>';
            }
        }
    }

    static public function ctrEditarProducto(){

        if(isset($_POST["editarNombre"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCodigo"]) &&
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
               preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&
               preg_match('/^[0-9.]+$/', $_POST["editarPrecio"])){

                $tabla = "productos";

                $datos = array(
                               "id_categoria" => $_POST["editarCategoria"],
                               "nombre" => $_POST["editarNombre"],
                               "codigo" => $_POST["editarCodigo"],
                               "descripcion" => $_POST["editarDescripcion"],
                               "stock" => $_POST["editarStock"],
                               "precio" => $_POST["editarPrecio"]);

                $respuesta = ModelProductos::mdlEditarProducto($tabla,$datos);

                if($respuesta == "ok"){
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Producto editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if(result.value){
                            window.location = "productos";
                        }
                    });
                </script>';
                }else{
                    echo '<script>
                    swal({
                        type: "error",
                        title: "El producto no pudo ser editado",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if(result.value){
                            window.location = "productos";
                        }
                    });
                </script>';
                }

            }else{
                echo '<script>
                 swal({
                     type: "error",
                     title: "El producto no puede ir vacio o tener caracteres especiales",
                     showConfirmButton: true,
                     confirmButtonText: "Cerrar",
                     closeOnConfirm: false
                 }).then((result) => {
                     if(result.value){
                         window.location = "productos";
                     }
                 });
             </script>';
            }
        }
    }

    static public function ctrEliminarProducto(){
        if(isset($_GET["idProducto"])){
            $tabla = "productos";
            $datos = $_GET["idProducto"];

            $respuesta = ModelProductos::mdlEliminarProducto($tabla,$datos);

            if($respuesta == "ok"){
                echo '<script>
                swal({
                    type: "success",
                    title: "Producto eliminado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result) => {
                    if(result.value){
                        window.location = "productos";
                    }
                });
            </script>';
            }else{
                echo '<script>
                swal({
                    type: "error",
                    title: "El producto no pudo ser eliminado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result) => {
                    if(result.value){
                        window.location = "productos";
                    }
                });
            </script>';
            }
        }
    }
}