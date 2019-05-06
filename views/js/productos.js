$(document).on("click", ".btnEditarProducto",function(){
    var idProducto = $(this).attr("idProducto");
    
    var datos = new FormData();
    datos.append("idProducto",idProducto);

    $.ajax({
        url:"ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            var datosCategoria = new FormData();
            datosCategoria.append("idCategoria",respuesta["id_categoria"]);

            $.ajax({
                url:"ajax/categorias.ajax.php",
                method: "POST",
                data: datosCategoria,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta){
                    $("#editarCategoria").val(respuesta["id"]);
                    $("#editarCategoria").html(respuesta["categoria"]);
                }
            })
            
            $("#idEditado").val(respuesta["id"]);
            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarStock").val(respuesta["stock"]);
            $("#editarPrecio").val(respuesta["precio"]);

            
        }
    })
})

$(document).on("click", ".btnEliminarProducto",function(){

    var idProducto = $(this).attr("idProducto");

    swal({
        title: "Esta seguro de eliminar el producto?",
        text: "Si no esta seguro puede cancelar la accion",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, estoy seguro"
    }).then((result)=>{
        if(result.value){
            window.location = "index.php?ruta=productos&idProducto="+idProducto;
        }
    })


})