/* -------------------------------------------------------------------------- */
/*                            VARIABLE LOCALSTORAGE                           */
/* -------------------------------------------------------------------------- */

if (localStorage.getItem("capturarRango2") != null) {
  $("#daterange-btn2 span").html(localStorage.getItem("capturarRango2"));
}

/* -------------------------- VARIABLE LOCALSTORAGE ------------------------- */

/* -------------------------------------------------------------------------- */
/*                               RANGO DE FECHAS                              */
/* -------------------------------------------------------------------------- */

//Date range as a button
$("#daterange-btn2").daterangepicker(
  {
    ranges: {
      Hoy: [moment(), moment()],
      Ayer: [moment().subtract(1, "days"), moment().subtract(1, "days")],
      "Últimos 7 días": [moment().subtract(6, "days"), moment()],
      "Últimos 30 días": [moment().subtract(29, "days"), moment()],
      "Este mes": [moment().startOf("month"), moment().endOf("month")],
      "Ultimo mes": [
        moment().subtract(1, "month").startOf("month"),
        moment().subtract(1, "month").endOf("month"),
      ],
    },
    startDate: moment(),
    endDate: moment(),
    opens: "right",
  },
  function (start, end) {
    $("#daterange-btn2 span").html(
      start.format("DD/MM/YYYY") + " - " + end.format("DD/MM/YYYY")
    );

    var fechaInicial = start.format("YYYY-MM-DD");
    var fechaFinal = end.format("YYYY-MM-DD");
    var capturarRango2 = $("#daterange-btn2 span").html();

    localStorage.setItem("capturarRango2", capturarRango2);

    window.location =
      "index.php?ruta=reportes&fechaInicial=" +
      fechaInicial +
      "&fechaFinal=" +
      fechaFinal;
  }
);

/* ----------------------------- RANGO DE FECHAS ---------------------------- */

/* -------------------------------------------------------------------------- */
/*                          CANCELAR RANGO DE FECHAS                          */
/* -------------------------------------------------------------------------- */

$(".daterangepicker.opensright .drp-buttons .cancelBtn").on(
  "click",
  function () {
    localStorage.removeItem("capturarRango2");
    localStorage.clear();
    window.location = "reportes";
  }
);

/* ------------------------ CANCELAR RANGO DE FECHAS ------------------------ */

/* -------------------------------------------------------------------------- */
/*                                CAPTURAR HOY                                */
/* -------------------------------------------------------------------------- */

$(".daterangepicker.opensright .ranges li").on("click", function () {
  var textoHoy = $(this).attr("data-range-key");

  if (textoHoy == "Hoy") {
    var d = new Date();

    var dia = d.getDate();
    var mes = d.getMonth() + 1;
    var año = d.getFullYear();

    if (mes < 10) {
      var fechaInicial = año + "-0" + mes + "-" + dia;
      var fechaFinal = año + "-0" + mes + "-" + dia;
    } else if (dia < 10) {
      var fechaInicial = año + "-" + mes + "-0" + dia;
      var fechaFinal = año + "-" + mes + "-0" + dia;
    } else if (mes < 10 && dia < 10) {
      var fechaInicial = año + "-0" + mes + "-0" + dia;
      var fechaFinal = año + "-0" + mes + "-0" + dia;
    } else {
      var fechaInicial = año + "-" + mes + "-" + dia;
      var fechaFinal = año + "-" + mes + "-" + dia;
    }

    localStorage.setItem("capturarRango2", "Hoy");

    window.location =
      "index.php?ruta=reportes&fechaInicial=" +
      fechaInicial +
      "&fechaFinal=" +
      fechaFinal;
  }
});

/* ------------------------------ CAPTURAR HOY ------------------------------ */
