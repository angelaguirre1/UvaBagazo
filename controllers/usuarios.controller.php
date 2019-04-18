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
                    
                    if($respuesta["estado"] == 1){
                        echo '<br>';
                        echo '<div class="alert alert-success">Bienvenido al sistema</div>';

                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["email"] = $respuesta["email"];
                        $_SESSION["departamento"] = $respuesta["departamento"];
                        $_SESSION["foto"] = $respuesta["foto"];

                        //Regristrar fecha para saber el ultimo login

                        date_default_timezone_set('America/Mexico_City');

                        $fecha = date('Y-m-d');
                        $hora = date('H:i:s');

                        $fechaActual = $fecha . ' ' . $hora;

                        $item1 = "ultimo_login";
                        $valor1 = $fechaActual;
                        $item2 = "id";
                        $valor2 = $respuesta["id"];

                        $ultimoLogin = ModelUsuarios::mdlActualizarUsuario($tabla, $item1,$valor1,$item2,$valor2);

                        echo '<script>
                            window.location = "inicio"
                        </script>';

                    }else{
                        echo '<br>';
                        echo '<div class="alert alert-danger">Error, el usuario esta desactivado</div>';
                    }

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

    static public function ctrEditarUsuario(){
        
        if(isset($_POST["editarUsuario"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

                $ruta = $_POST["fotoActual"];

                if($_FILES["editarFoto"]["tmp_name"] != ""){

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    $directorio = "views/images/users/" . $_POST["editarUsuario"];

                    if(!empty($_POST["fotoActual"])){
                        unlink($_POST["fotoActual"]);
                    }else{
                        mkdir($directorio,0755);
                    }

                    //de acuerdo al tipo de imagen aplicamos las funciones por defecto de php

                    if($_FILES["editarFoto"]["type"] == "image/jpeg"){
                        //guardamos la imagen en el directorio
                        $aleatorio = mt_rand(100,999);

                        $ruta = "views/images/users/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagejpeg($destino, $ruta);
                    }

                    if($_FILES["editarFoto"]["type"] == "image/png"){
                        //guardamos la imagen en el directorio
                        $aleatorio = mt_rand(100,999);

                        $ruta = "views/images/users/".$_POST["editarUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                        imagecopyresized($destino,$origen,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);

                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "usuarios";

                if($_POST["editarPassword"] != ""){
                    if(preg_match('/^[a-zA-Z0-9.]+$/', $_POST["editarPassword"])){
                        $contrasena = $_POST["editarPassword"];
                    }else{
                        echo '<script>
                            swal({
                                type: "error",
                                title: "La contraseña no puede estar vacia o tener caracteres especiales",
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
                    $contrasena = $_POST["passwordActual"];
                }

                $datos = array("nombre" => $_POST["editarNombre"],
                               "usuario" => $_POST["editarUsuario"],
                               "email" => $_POST["editarEmail"],
                               "contrasena" => $contrasena,
                               "departamento" => $_POST["editarDepartamento"],
                               "foto" => $ruta);

                $respuesta = ModelUsuarios::mdlEditarUsuarios($tabla,$datos);

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
                     title: "El nombre no puede estar vacio o tener caracteres especiales",
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

    static public function ctrBorrarUsuario(){
        if(isset($_GET["idUsuario"])){
            $tabla = "usuarios";
            $datos = $_GET["idUsuario"];

            if($_GET["fotoUsuario"] != ""){
                unlink($_GET["fotoUsuario"]);
                rmdir('views/images/users/'.$_GET["usuario"]);
            }

            $respuesta = ModelUsuarios::mdlBorrarUsuario($tabla, $datos);

            if($respuesta == "ok"){
                echo '<script>
                        swal({
                            type: "success",
                            title: "El usuario ha sido borrado correctamente",
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
}