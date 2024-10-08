$("#tables").DataTable({
  // ajax: "ajax/tablaProductos.ajax.php",
  deferRender: true,
  retrieve: true,
  processing: true,
  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
  },
});

$("#numeroCliente").inputmask("(+99) 999-999-9999");
$("#editarTelefono").inputmask("(+99) 999-999-9999");

/*=============================================
 //iCheck for checkbox and radio inputs
=============================================*/

// $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
//   checkboxClass: "icheckbox_minimal-blue",
//   radioClass: "iradio_minimal-blue",
// });

//Initialize Select2 Elements
$(".select2").select2();

//Initialize Select2 Elements
$(".select2bs4").select2({
  theme: "bootstrap4",
});
