/* -------------------------------------------------------------------------- */
/*                    CARGAR LA TABLA DINÁMICA DE PRODUCTOS                   */
/* -------------------------------------------------------------------------- */

$.ajax({
  url: "ajax/gestorProductos.ajax.php",
  success: function (respuesta) {
    console.log("respuesta", respuesta);
  },
});

$("#tablaProductos").DataTable({
  ajax: "ajax/gestorProductos.ajax.php",
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
/*                 CAPTURAMOS LA CATEGORIA PARA ASIGNAR CODIGO                */
/* -------------------------------------------------------------------------- */

$("#nuevaCategoria").change(function () {
  var idCategoria = $(this).val();
  var datos = new FormData();
  datos.append("idCategoria", idCategoria);

  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (!respuesta) {
        var nuevoCodigo = atob(idCategoria) + "01";
        $("#nuevoCodigo").val(nuevoCodigo);
      } else {
        var nuevoCodigo = Number(respuesta["codigo"]) + 1;
        $("#nuevoCodigo").val(nuevoCodigo);
      }
    },
  });
});

/* --------------- CAPTURAMOS LA CATEGORIA PARA ASIGNAR CODIGO -------------- */

/* -------------------------------------------------------------------------- */
/*                          AGREGANDO PRECIO DE VENTA                         */
/* -------------------------------------------------------------------------- */

$("#nuevoPrecioCompra, #editarPrecioCompra").change(function () {
  if ($(".porcentaje").prop("checked")) {
    var valorPorcentaje = $(".nuevoPorcentaje").val();
    var porcentaje =
      Number(($("#nuevoPrecioCompra").val() * valorPorcentaje) / 100) +
      Number($("#nuevoPrecioCompra").val());
    var editarPorcentaje =
      Number(($("#editarPrecioCompra").val() * valorPorcentaje) / 100) +
      Number($("#editarPrecioCompra").val());

    $("#nuevoPrecioVenta").val(porcentaje);
    $("#nuevoPrecioVenta").prop("readonly", true);

    $("#editarPrecioVenta").val(editarPorcentaje);
    $("#editarPrecioVenta").prop("readonly", true);
  }
});

/* ------------------------ AGREGANDO PRECIO DE VENTA ----------------------- */

/* -------------------------------------------------------------------------- */
/*                            CAMBIO DE PORCENTAJE                            */
/* -------------------------------------------------------------------------- */

$(".nuevoPorcentaje").change(function () {
  if ($(".porcentaje").prop("checked")) {
    var valorPorcentaje = $(this).val();
    var porcentaje =
      Number(($("#nuevoPrecioCompra").val() * valorPorcentaje) / 100) +
      Number($("#nuevoPrecioCompra").val());

    var editarPorcentaje =
      Number(($("#editarPrecioCompra").val() * valorPorcentaje) / 100) +
      Number($("#editarPrecioCompra").val());

    $("#nuevoPrecioVenta").val(porcentaje);
    $("#nuevoPrecioVenta").prop("readonly", true);

    $("#editarPrecioVenta").val(editarPorcentaje);
    $("#editarPrecioVenta").prop("readonly", true);
  }
});

// $("#porcentaje").on("ifUnchecked", function () {
//   console.log("porcentaje deschekeado");
//   $("#nuevoPrecioVenta").prop("readonly", false);
//   $("#editarPrecioVenta").prop("readonly", false);
// });

// $("#porcentaje").on("ifChecked", function () {
//   console.log("porcentaje chekeado");
//   $("#nuevoPrecioVenta").prop("readonly", true);
//   $("#editarPrecioVenta").prop("readonly", true);
// });

$("#porcentaje").on("change", function () {
  if (this.checked) {
    $("#nuevoPrecioVenta").prop("readonly", true);
    $("#editarPrecioVenta").prop("readonly", true);
    // console.log("chekeado");
  } else {
    $("#nuevoPrecioVenta").prop("readonly", false);
    $("#editarPrecioVenta").prop("readonly", false);
    // console.log("des chekeado");
  }
});

/* -------------------------- CAMBIO DE PORCENTAJE -------------------------- */

/* -------------------------------------------------------------------------- */
/*                        SUBIENDO LA FOTO DEL PRODUCTO                       */
/* -------------------------------------------------------------------------- */

$("#nuevaImagen, .nuevaImagen").change(function () {
  var imagen = this.files[0];

  console.log("imagen", imagen);

  /* ----------- VALIDATOS QUE EL FORMATO DE LA IMGAEN SEA JPG O PNG ---------- */

  if (imagen["type"] != "image/jpeg") {
    $("#nuevaImagen").val("");

    Swal.fire({
      title: "Error al subir la imagen",
      text: "La imagen debe estar en formato JPG!",
      icon: "error",
      confirmButtonText: "Cerrar",
    });
  } else if (imagen["size"] > 4000000) {
    Swal.fire({
      title: "Error al subir la imagen",
      text: "La imagen no debe pesar más de 4MB!",
      icon: "error",
      confirmButtonText: "Cerrar",
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;
      $(".previsualizar").attr("src", rutaImagen);
    });
  }
});

/* ---------------------- SUBIENDO LA FOTO DEL PRODUCTO --------------------- */

/* -------------------------------------------------------------------------- */
/*                               EDITAR PRODUCTO                              */
/* -------------------------------------------------------------------------- */

$("#tablaProductos tbody").on("click", "button.btnEditarProducto", function () {
  var idProducto = $(this).attr("idProducto");
  var datos = new FormData();
  datos.append("idProducto", idProducto);

  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var datosCategoria = new FormData();
      datosCategoria.append("idCategoria", btoa(respuesta["idCategoria"]));

      $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datosCategoria,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          console.log(respuesta);
          $("#editarCategoriaProducto").val(respuesta["id"]);
          $("#editarCategoriaProducto").html(respuesta["categoria"]);
        },
      });

      $("#editarCodigo").val(respuesta["codigo"]);
      $("#editarDescripcion").val(respuesta["descripcion"]);
      $("#editarStock").val(respuesta["stock"]);
      $("#editarPrecioCompra").val(respuesta["precioCompra"]);
      $("#editarPrecioVenta").val(respuesta["precioVenta"]);

      if (respuesta["imagen"] != "") {
        $("#imagenActual").val(respuesta["imagen"]);
        $(".previsualizar").attr("src", respuesta["imagen"]);
      } else {
        $(".previsualizar").attr(
          "src",
          "vistas/img/productos/default/anonymous.png"
        );
      }
    },
  });
});

/* ----------------------------- EDITAR PRODUCTO ---------------------------- */

/* -------------------------------------------------------------------------- */
/*                              ELIMINAR PRODUCTO                             */
/* -------------------------------------------------------------------------- */

$("#tablaProductos tbody").on(
  "click",
  "button.btnEliminarProducto",
  function () {
    var idProducto = $(this).attr("idProducto");
    var codigo = $(this).attr("codigo");
    var imagen = $(this).attr("imagen");

    Swal.fire({
      title: "¿Está seguro de borrar el producto?",
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Borrar producto",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = window.location =
          "index.php?ruta=productos&idProducto=" +
          idProducto +
          "&imagen=" +
          imagen +
          "&codigo=" +
          codigo;
      }
    });
  }
);

/* ---------------------------- ELIMINAR PRODUCTO --------------------------- */
