/* -------------------------------------------------------------------------- */
/*                      CARGAR TABLA DINAMICA DE USUARIOS                     */
/* -------------------------------------------------------------------------- */

$.ajax({
  url: "ajax/gestorUsuarios.ajax.php",
  success: function (respuesta) {
    // console.log("respuesta", respuesta);
  },
});

$("#tablaUsuarios").DataTable({
  ajax: "ajax/gestorUsuarios.ajax.php",
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

/* -------------------- CARGAR TABLA DINAMICA DE USUARIOS ------------------- */

/* -------------------------------------------------------------------------- */
/*                        SUBIENDO LA FOTO DEL USUARIO                        */
/* -------------------------------------------------------------------------- */

$(".nuevaFoto").change(function () {
  var fotoImagen = this.files[0];

  /* -------------------- VALIDAMOS EL FORMATO DE LA IMAGEN ------------------- */

  if (fotoImagen["type"] != "image/jpeg" && fotoImagen["type"] != "image/png") {
    $(".nuevaFoto").val("");

    Swal.fire({
      title: "Error al subir la imagen",
      text: "La imagen debe ser formato JPG o PNG!",
      icon: "error",
      confirmButtonText: "Cerrar",
    });
  } else if (fotoImagen["size"] > 4000000) {
    $(".nuevaFoto").val("");

    Swal.fire({
      title: "Error al subir la imagen",
      text: "La imagen no debe pesar mas 4MB!",
      icon: "error",
      confirmButtonText: "Cerrar",
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(fotoImagen);

    $(datosImagen).on("load", function (event) {
      var rutaImage = event.target.result;
      $(".previsualizar").attr("src", rutaImage);
    });
  }
});

/* ---------------------- SUBIENDO LA FOTO DEL USUARIO ---------------------- */

/* -------------------------------------------------------------------------- */
/*                               EDITAR USUARIO                               */
/* -------------------------------------------------------------------------- */

$(document).on("click", ".btnEditarUsuario", function () {
  var idUsuario = $(this).attr("idUsuario");
  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      // console.log(respuesta);
      $("#editarNombre").val(respuesta["nombre"]);
      $("#editarUsuario").val(respuesta["usuario"]);
      $("#editarPerfil").html(respuesta["perfil"]);
      $("#editarPerfil").val(respuesta["perfil"]);
      $("#fotoActual").val(respuesta["foto"]);
      $("#passwordActual").val(respuesta["pass"]);

      if (respuesta["foto"] != "") {
        $(".previsualizar").attr("src", respuesta["foto"]);
      } else {
        $(".previsualizar").attr(
          "src",
          "vistas/img/usuarios/default/anonymous.png"
        );
      }
    },
  });
});

/* ----------------------------- EDITAR USUARIO ----------------------------- */
