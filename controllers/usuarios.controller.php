<?php

class ControllerUsuarios{
    static public function ctrIngresoUsuario(){
        if(isset($_POST["ingusuario"])){
            if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingusuario"]) &&
               preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingpassword"])){

                $tabla = "usuarios";
                $item = "usuario";
                $valor = $_POST["ingusuario"];

                $respuesta = ModelUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);

                if($respuesta["usuario"] == $_POST["ingusuario"] &&
                   $respuesta["contrasena"] == $_POST["ingpassword"]){

                    echo '<br>';
                    echo '<div class="alert alert-success">Bienvenido al sistema</div>';

                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["usuario"] = $respuesta["usuario"];
                    $_SESSION["email"] = $respuesta["email"];
                    $_SESSION["departamento"] = $respuesta["departamento"];
                    $_SESSION["foto"] = $respuesta["foto"];

                    echo '<script>
                        window.location = "inicio"
                    </script>';

                }else{
                    echo '<br>';
                    echo '<div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                }
                
            }
        }
    }

    static public function ctrCrearUsuario(){
        if(isset($_POST["nuevoUsuario"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
               preg_match('/^[a-zA-Z0-9.]+$/', $_POST["nuevoPassword"])){

                $ruta ="";

                if(isset($_FILES["nuevaFoto"]["tmp_name"])){
                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    $directorio = "views/images/users/" . $_POST["nuevoUsuario"];

                    mkdir($directorio,0755);

                    //de acuerdo al tipo de imagen aplicamos las funciones por defecto de php

                    if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){
                        //guardamos la imagen en el directorio
                        $aleatorio = mt_rand(100,999);

                        $ruta = "views/images/users/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagejpeg($destino, $ruta);
                    }

                    if($_FILES["nuevaFoto"]["type"] == "image/png"){
                        //guardamos la imagen en el directorio
                        $aleatorio = mt_rand(100,999);

                        $ruta = "views/images/users/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagepng($destino, $ruta);
                    }
                }

                 $tabla = "usuarios";

                 $datos = array("nombre" => $_POST["nuevoNombre"],
                                "usuario" => $_POST["nuevoUsuario"],
                                "email" => $_POST["nuevoEmail"],
                                "contrasena" => $_POST["nuevoPassword"],
                                "departamento" => $_POST["nuevoDepartamento"],
                                "foto" => $ruta);

                 $respuesta = ModelUsuarios::mdlIngresarUsuarios($tabla, $datos);

                 if($respuesta == "ok"){
                     echo '<script>
                         swal({
                             type: "success",
                             title: "El usuario ha sido guardado correctamente",
                             showConfirmButton: true,
                             confirmButtonText: "Cerrar",
                             closeOnConfirm: false
                         }).then((result) => {
                             if(result.value){
                                 window.location = "usuarios";
                             }
                         });
                     </script>';
                 }

                
             }else{
                 echo '<script>
                 swal({
                     type: "error",
                     title: "El usuario no puede estar vacio o tener caracteres especiales",
                     showConfirmButton: true,
                     confirmButtonText: "Cerrar",
                     closeOnConfirm: false
                 }).then((result) => {
                     if(result.value){
                         window.location = "usuarios";
                     }
                 });
             </script>';
             }
        }
    }

    static public function ctrMostrarUsuario($item,$valor){

        $tabla = "usuarios";
        $respuesta = ModelUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);
        return $respuesta;
    }
}