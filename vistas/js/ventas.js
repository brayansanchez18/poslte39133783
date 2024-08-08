/* -------------------------------------------------------------------------- */
/*                TABLA DINAMICA DE PRODUCTOS PARA CREAR VENTA                */
/* -------------------------------------------------------------------------- */

// $.ajax({
//   url: "ajax/gestorVentas.ajax.php",
//   success: function (respuesta) {
//     console.log("respuesta", respuesta);
//   },
// });

$("#tablaVentas").DataTable({
  ajax: "ajax/gestorVentas.ajax.php",
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

/* -------------- TABLA DINAMICA DE PRODUCTOS PARA CREAR VENTA -------------- */

/* -------------------------------------------------------------------------- */
/*                           FORMATO AL PRECIO FINAL                          */
/* -------------------------------------------------------------------------- */

// $(".itotal").number(true, 2);

/* --------------------- FIN DE FORMATO AL PRECIO FINAL --------------------- */

/* -------------------------------------------------------------------------- */
/*             CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA            */
/* -------------------------------------------------------------------------- */

$("#tablaVentas").on("draw.dt", function () {
  if (localStorage.getItem("quitarProducto") != null) {
    var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

    for (let i = 0; i < listaIdProductos.length; i++) {
      $(
        "button.recuperarBoton[idProducto='" +
          listaIdProductos[i]["idProducto"] +
          "']"
      ).removeClass("btn-default");
      $(
        "button.recuperarBoton[idProducto='" +
          listaIdProductos[i]["idProducto"] +
          "']"
      ).addClass("btn-primary agregarProducto");
    }
  }
});

/* ----------- CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA ---------- */

/* -------------------------------------------------------------------------- */
/*                AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA               */
/* -------------------------------------------------------------------------- */

$("#tablaVentas tbody").on("click", "button.agregarProducto", function () {
  var idProducto = $(this).attr("idProducto");

  $(this).removeClass("btn-primary agregarProducto");
  $(this).addClass("btn-default");
  $(this).prop("disabled", true);

  var datos = new FormData();
  datos.append("idProducto", idProducto);

  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cahe: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var descripcion = respuesta["descripcion"];
      var stock = respuesta["stock"];
      var precio = respuesta["precioVenta"];

      /*=============================================
			EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
			=============================================*/

      if (stock == 0) {
        swal({
          title: "No hay stock disponible",
          type: "error",
          confirmButtonText: "Cerrar",
        });

        $("button[idProducto='" + idProducto + "']").addClass(
          "btn-primary agregarProducto"
        );

        return;
      }

      $(".nuevoProducto").append(
        "<!-- Descripción del producto -->" +
          '<div class="row">' +
          '<div class="col-12 col-xl-6" style="padding-right:0px">' +
          '<div class="input-group mt-2 mb-2">' +
          '<div class="input-group-prepend">' +
          '<span class="input-group-text" id="basic-addon1">' +
          '<button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="' +
          idProducto +
          '">' +
          '<i class="fa fa-times"></i>' +
          "</button>" +
          "</span>" +
          "</div>" +
          '<input type="text" class="form-control" id="agregarProducto" name="agregarProducto" value="' +
          descripcion +
          '" readonly required>' +
          "</div> " +
          "</div> " +
          "<!-- Cantidad del producto -->" +
          '<div class="col-6 col-xl-3">' +
          '<div class="input-group mt-2 mb-2">' +
          '<input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="' +
          stock +
          '" required>' +
          "</div>" +
          "</div>" +
          "<!-- Precio del producto -->" +
          '<div class="col-6 col-xl-3" style="padding-left:0px">' +
          '<div class="input-group mt-2 mb-2">' +
          '<div class="input-group-prepend">' +
          '<span class="input-group-text" id="basic-addon1">' +
          '<i class="fas fa-dollar-sign"></i>' +
          "</span>" +
          "</div>" +
          '<input type="number" min="1" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" value="' +
          precio +
          '" readonly required>' +
          "</div>" +
          "</div>" +
          "</div>"
      );

      // sumarTotalPrecios();
      // agregarImpuesto();
      // listarProductos();

      // $(".nuevoPrecioProducto").number(true, 2);
    },
  });
});

/* -------------- AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA ------------- */

/* -------------------------------------------------------------------------- */
/*               QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN               */
/* -------------------------------------------------------------------------- */

var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");

$(".formularioVenta").on("click", "button.quitarProducto", function () {
  $(this).parent().parent().parent().parent().parent().remove();

  var idProducto = $(this).attr("idProducto");

  /*=============================================
	ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
	=============================================*/

  if (localStorage.getItem("quitarProducto") == null) {
    idQuitarProducto = [];
  } else {
    idProducto.concat(localStorage.getItem("quitarProducto"));
  }

  idQuitarProducto.push({ idProducto: idProducto });
  localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

  $("button.recuperarBoton[idProducto='" + idProducto + "']").removeClass(
    "btn-default"
  );
  $("button.recuperarBoton[idProducto='" + idProducto + "']").addClass(
    "btn-primary agregarProducto"
  );
  $("button.recuperarBoton[idProducto='" + idProducto + "']").prop(
    "disabled",
    false
  );

  if ($(".nuevoProducto").children().length == 0) {
    $("#nuevoImpuestoVenta").val(0);
    $("#nuevoTotalVenta").val(0);
    $("#totalVenta").val(0);
    $("#nuevoTotalVenta").attr("total", 0);
  } else {
    sumarTotalPrecios();
    agregarImpuesto();
    listarProductos();
  }
});

/* ------------- QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN ------------- */
