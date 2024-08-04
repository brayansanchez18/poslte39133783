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

/* -------------------------------------------------------------------------- */
/*                               ACTIVAR USUARIO                              */
/* -------------------------------------------------------------------------- */

$(document).on("click", ".btnActivar", function () {
  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario");

  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      if (window.matchMedia("(max-width:767px)").matches) {
        Swal.fire({
          icon: "success",
          title: "OK",
          text: "El estado ha sido actualizado",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
        }).then(function (result) {
          if (result.value) {
            window.location = "/usuarios";
          }
        });
      }
    },
  });

  if (atob(estadoUsuario) == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Inactivo");
    $(this).attr("estadoUsuario", 1);
  } else {
    $(this).removeClass("btn-danger");
    $(this).addClass("btn-success");
    $(this).html("Activo");
    $(this).attr("estadoUsuario", 0);
  }
});

/* ----------------------------- ACTIVAR USUARIO ---------------------------- */

/* -------------------------------------------------------------------------- */
/*                  REVISAR SI EL USUARIO YA ESTÁ REGISTRADO                  */
/* -------------------------------------------------------------------------- */

$("#nuevoUsuario").change(function () {
  $(".alert").remove();

  var usuario = $(this).val();
  console.log(usuario);
  var datos = new FormData();
  datos.append("validarUsuario", usuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);
      if (respuesta) {
        $("#nuevoUsuario")
          .parent()
          .after(
            '<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>'
          );

        $("#nuevoUsuario").val("");
      }
    },
  });
});

/* ---------------- REVISAR SI EL USUARIO YA ESTÁ REGISTRADO ---------------- */

/* -------------------------------------------------------------------------- */
/*                              ELIMINAR USUARIO                              */
/* -------------------------------------------------------------------------- */

$(document).on("click", ".btnEliminarUsuario", function () {
  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

  Swal.fire({
    title: "¿Está seguro de borrar el usuario?",
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Borrar usuario",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location =
        "index.php?ruta=usuarios&idUsuario=" +
        idUsuario +
        "&usuario=" +
        usuario +
        "&fotoUsuario=" +
        fotoUsuario;
    }
  });
});

/* ---------------------------- ELIMINAR USUSARIO --------------------------- */
