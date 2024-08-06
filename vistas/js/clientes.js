/* -------------------------------------------------------------------------- */
/*                    CARGAR LA TABLA DINAMICA DE CLIENTES                    */
/* -------------------------------------------------------------------------- */

// $.ajax({
//   url: "ajax/gestorClientes.ajax.php",
//   success: function (respuesta) {
//     console.log("respuesta", respuesta);
//   },
// });

$("#tablaClientes").DataTable({
  ajax: "ajax/gestorClientes.ajax.php",
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

/* ------------------ CARGAR LA TABLA DINAMICA DE CLIENTES ------------------ */

/* -------------------------------------------------------------------------- */
/*                               EDITAR CLIENTE                               */
/* -------------------------------------------------------------------------- */

$("#tablaClientes").on("click", ".btnEditarCliente", function () {
  var idCliente = $(this).attr("idCliente");
  var datos = new FormData();
  datos.append("idCliente", idCliente);

  $.ajax({
    url: "ajax/clientes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#idCliente").val(btoa(respuesta["id"]));
      $("#editarCliente").val(respuesta["nombre"]);
      $("#editarEmail").val(respuesta["email"]);
      $("#editarTelefono").val(respuesta["telefono"]);
      $("#editarDireccion").val(respuesta["direccion"]);
    },
  });
});

/* ----------------------------- EDITAR CLIENTE ----------------------------- */

/* -------------------------------------------------------------------------- */
/*                              ELIMINAR CLIENTE                              */
/* -------------------------------------------------------------------------- */

$("#tablaClientes").on("click", ".btnEliminarCliente", function () {
  var idCliente = $(this).attr("idCliente");

  Swal.fire({
    title: "¿Está seguro de borrar el cliente?",
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Borrar cliente",
  }).then((result) => {
    if (result.value) {
      window.location = "index.php?ruta=clientes&idCliente=" + idCliente;
    }
  });
});

/* ---------------------------- ELIMINAR CLIENTE ---------------------------- */
