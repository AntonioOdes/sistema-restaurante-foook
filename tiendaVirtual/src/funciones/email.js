function enviarCorreo() {
    var mensaje = $("#texto").val();
    $.ajax({type: "POST",
    url: "http://localhost/tiendaVirtual/src/funciones/enviarCorreo.php", 
    data: {
            mensaje: mensaje
    },
        success: function (response) {
                alert("Correo enviado con éxito");
        },
        error: function (error) {
            alert("Error al enviar el correo");
        }
    });
}
