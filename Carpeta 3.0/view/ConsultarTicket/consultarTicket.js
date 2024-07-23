let tabla;
let usu_id = $('#user_idx').val();
let rol_id = $('#rol_idx').val();
function init() {

}
    $(document).ready(function() {

        if(rol_id == 1 ) {
                  // Inicializa DataTable
        tabla = $('#ticket_data').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons: [
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "ajax": {
                url: '../../controller/ticket.php?op=listar_x_usu',
                type: "POST",
                dataType: "json",
                data: { usuario_id: usu_id },
                error: function(e) {
                    console.log("Error en la solicitud AJAX:", e.responseText);
                    alert("Ocurrió un error al cargar los datos. Revisa la consola para más detalles.");
                }
            },
            "bDestroy": true,
            "responsive": true,
            "bInfo": true,
            "iDisplayLength":10,
            "autoWidth": false,
            "language": {
                "sProcessing": "Procesando :(",
                "sLengthMenu": "Mostrar _MENU_ registros :(",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en la tabla",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar",
                "loadingRecords": "Cargando...",
                "sUrl": "",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        }).DataTable

            
        } else {
                  // Inicializa DataTable
        tabla = $('#ticket_data').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons: [
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "ajax": {
                url: '../../controller/ticket.php?op=listar',
                type: "POST",
                dataType: "json",
                error: function(e) {
                    console.log("Error en la solicitud AJAX:", e.responseText);
                    alert("Ocurrió un error al cargar los datos. Revisa la consola para más detalles.");
                }
            },
            "bDestroy": true,
            "responsive": true,
            "bInfo": true,
            "iDisplayLength":10,
            "autoWidth": false,
            "language": {
                "sProcessing": "Procesando :(",
                "sLengthMenu": "Mostrar _MENU_ registros :(",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en la tabla",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar",
                "loadingRecords": "Cargando...",
                "sUrl": "",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        }).DataTable
            
        }

  
    });


init();
