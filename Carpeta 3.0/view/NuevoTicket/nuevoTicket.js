function init() {
    $("#ticket_form").on("submit", function(e) {
        guardarYEditar(e);
    });
}

$(document).ready(function() {
    $('#ticket_descripcion').summernote({ 
        height: 200
    });

    $.post("../../controller/categoria.php?op=combo", function(data, status) {
        $('#categoria_id').html(data); 
    });
});

function guardarYEditar(e) {
    e.preventDefault();
    const formData = new FormData(document.getElementById("ticket_form"));
    $.ajax({
        url: "../../controller/ticket.php?op=insert",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos) {
            $('#ticket_descripcion').summernote('code', ''); 
            $('#ticket_titulo').val(''); 

            swal({
                title: "Ticket Enviado!!",
                text: "Tu ticket ha sido enviado exitosamente.",
                icon: "success", 
                button: "Aceptar"
            });
        }
    });
}    

init();
