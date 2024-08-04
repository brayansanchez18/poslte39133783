/* -------------------------------------------------------------------------- */
/*                    CARGAR LA TABLA DINÁMICA DE PRODUCTOS                   */
/* -------------------------------------------------------------------------- */

// $.ajax({
//   url: "ajax/gestorCategorias.ajax.php",
//   success: function (respuesta) {
//     console.log("respuesta", respuesta);
//   },
// });

$("#tablaCategorias").DataTable({
  ajax: "ajax/gestorCategorias.ajax.php",
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

/* ------------------ CARGAR LA TABLA DINÁMICA DE PRODUCTOS ----------------- */

/* -------------------------------------------------------------------------- */
/*                          EVITAR REPETIR CATEGORIAS                         */
/* -------------------------------------------------------------------------- */

$(".nuevaCategoria").change(function () {
  $(".alert").remove();

  var categoria = $(this).val();
  var datos = new FormData();
  datos.append("validarcategoria", categoria);

  $.ajax({
    url: "ajax/categorias.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta) {
        $(".nuevaCategoria")
          .parent()
          .after(
            '<div class="alert alert-warning">Esta categoria ya existe en la base de datos</div>'
          );

        $(".nuevaCategoria").val("");
      }
    },
  });
});

/* ------------------------ EVITAR REPETIR CATEGORIAS ----------------------- */

/* -------------------------------------------------------------------------- */
/*                              EDUTAR CATEGORIA                              */
/* -------------------------------------------------------------------------- */

$("#tablaCategorias").on("click", ".btnEditarCategoria", function () {
  var idCategoria = $(this).attr("idCategoria");

  var datos = new FormData();
  datos.append("idCategoria", idCategoria);

  $.ajax({
    url: "ajax/categorias.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#editarCategoria").val(respuesta["categoria"]);
      $("#idCategoria").val(btoa(respuesta["id"]));
    },
  });
});

/* ---------------------------- EDUTAR CATEGORIA ---------------------------- */

/* -------------------------------------------------------------------------- */
/*                             ELIMINAR CATEGORIA                             */
/* -------------------------------------------------------------------------- */

$("#tablaCategorias").on("click", ".btnEliminarCategoria", function () {
  var idCategoria = $(this).attr("idCategoria");

  Swal.fire({
    title: "¿Está seguro de borrar la categoria?",
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Borrar categoria",
  }).then((result) => {
    if (result.value) {
      window.location = "index.php?ruta=categorias&idCategoria=" + idCategoria;
    }
  });
});

/* --------------------------- ELIMINAR CATEGORIA --------------------------- */
