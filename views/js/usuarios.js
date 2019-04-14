//Subir foto de el usuario

$(".nuevaFoto").change(function(){

    var imagen = this.files[0];
    
    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
        $(".nuevaFoto").val("");
        swal({
            title: "Errror al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG",
            type: "error",
            confirmButtonText: "Cerrar"
        });
    }else if(imagen["size"] > 2000000){
        $(".nuevaFoto").val("");
        swal({
            title: "Errror al subir la imagen",
            text: "La imagen no debe pesar mas de 5MB",
            type: "error",
            confirmButtonText: "Cerrar"
        });
    }else{
        var datosImgaen = new FileReader;
        datosImgaen.readAsDataURL(imagen);

        $(datosImgaen).on("load",function(event){
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        })
    }
})

//Editar Usuario

$(".btnEditarUsuario").click(function(){
    var idUsuario = $(this).attr("idUsuario");
    var datos = new FormData();
    datos.append("idUsuario",idUsuario);
    $.ajax({
        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarEmail").val(respuesta["email"]);
            $("#editarDepartamento").html(respuesta["departamento"]);
        }

    });

})