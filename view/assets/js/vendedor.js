$(document).ready(function () {
  $(".registroRuc").click(function () {
    datosRuc = $("#rucConsulta").val();

    if (datosRuc == null || datosRuc == "") {
      $(".registroRuc").val("");

      Swal.fire({
        icon: "error",
        title: "Los campos del RUC no deben ir vacios",
        text: "¡Ingrese el documento porfavor!",
      });
    } else {
      $.ajax({
        type: "POST",
        url: "api/sunat-api.php",
        data: "registroRuc=" + datosRuc,
        dataType: "json",
        success: function (response) {
          $("#nombreRuc").val(response["nombre"]);
          $("#condicionRuc").val(response["condicion"]);
          $("#estadoRuc").val(response["estado"]);

          if (
            response["condicion"] == "ACTIVO" &&
            response["estado"] == "HABIDO"
          ) {
            $("#condicionRuc").addClass("rayita-verde");
            $("#estadoRuc").addClass("rayita-verde");
          }
        },
      });
    }
  });

  $(".btnEditarValidaciones").click(function () {
    var idValidaciones = $(this).attr("idValidaciones");
    var datos = new FormData();
    datos.append("idValidaciones", idValidaciones);

    $.ajax({
      type: "POST",
      url: "ajax/validaciones.ajax.php",
      data: datos,
      dataType: "json",
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        $("#editarRuc").val(response["ruc"]);
        $("#editarHoraLlamadaValidadora").val(response["llamada_validadora"]);
        $("#editarDuracionLlamada").val(response["duracion_llamada"]);
        $("#editarHoraActivacionPos").val(response["activacion_pos"]);
        $("#actualPdf").val(response["carta_oferta"]);
        $("#vaucherActual").val(response["vaucher_culqi"]);
      },
    });
  });

  $(".btnEliminarValidaciones").click(function () {
    var idValidaciones = $(this).attr("idValidaciones");

    Swal.fire({
      title: "¿Está seguro de borrar este usuario?",
      text: "¡No podrás revertir esto!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "¡Sí, bórralo!",
    }).then(function (result) {
      if (result.value) {
        window.location =
          "index.php?route=carta-ofertas&idValidaciones=" + idValidaciones;
      }
    });
  });

  /* validar si ya existe ese usuario */

  $(".registroRuc").click(function () {
    var rucConsulta = $("#rucConsulta").val();

    var datos = new FormData();
    datos.append("rucConsulta", rucConsulta);

    $.ajax({
      type: "POST",
      url: "ajax/validaciones.ajax.php",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        /* console.log(response); return; */

        if (response) {
          $("#rucConsulta")
            .parent()
            .after(
              '<div class="alert alert-warning p-3">Este usuario y ruc ya se encuentran en la base de datos!</div>'
            );
          $("#rucConsulta").val("");

          //deshabiliar cajas de texto
          $("#horaLlamadaValidadoraTime").prop("readonly", true);
          $("#duracionLlamada").prop("readonly", true);
          $("#horaActivacionPOSTime").prop("readonly", true);

          // Establecer un tiempo de vida para la alerta (10 segundos)
          setTimeout(function () {
            $(".alert").fadeOut("slow", function () {
              $(this).remove();
            });
          }, 4000);
        } else {
          $(".alert").remove();
          //deshabiliar cajas de texto
          $("#horaLlamadaValidadoraTime").prop("readonly", false);
          $("#duracionLlamada").prop("readonly", false);
          $("#horaActivacionPOSTime").prop("readonly", false);
        }
      },
    });
  });
});

// Escuchador de eventos para el cambio de archivos
document.querySelectorAll(".custom-file-input").forEach((input) => {
  input.addEventListener("change", function (e) {
    // Obtener el nombre del archivo seleccionado
    const fileName = e.target.files[0].name;
    // Actualizar el texto del label con el nombre del archivo
    const label = e.target.nextElementSibling;
    label.innerText = fileName;
  });
});
