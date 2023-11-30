function enviardato() {
    var idproducto = $("#id").val();
    var nombreproducto = $("#nombre").val();
    var categoriaproducto = $("#id_categoria").val();
    var precioproducto = $("#precio").val();
    var descripcionproducto = $("#descripcion").val();
    $.ajax({type: "POST",
    url: "https://jsoza.ilab.cl/DAM2023/nicolas.matamal/src/templates/eliminarProductos.php", 
    data: {
            idproducto: idproducto,
            nombreproducto : nombreproducto,
            categoriaproducto: categoriaproducto,
            precioproducto: precioproducto,
            descripcionproducto: descripcionproducto

    },
        success: function (response) {
                alert("datos recibidos");
        },
        error: function (error) {
            alert("datos no recibidos");
        }
    });
}
