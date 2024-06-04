$(document).ready(function () {
  //Esto desactivará el clic derecho en toda la página.

  // Desactivar clic derecho en contenedores relevantes
  /* $(".contenedor-relevante").on("contextmenu", function (e) {
    e.preventDefault();
    // Activar la capa de overlay
    $(this).find(".overlay").addClass("active");
  }); */
  
  // Desactivar clic derecho en dispositivos móviles
  /* if (isMobile()) {
    $(document).on("contextmenu", function (e) {
      e.preventDefault();
      alert("Capturas de pantalla desactivadas en dispositivos móviles");
    });
  }

  function isMobile() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
      navigator.userAgent
    );
  } */

  // Agrega esto dentro de tu $(document).ready(function () {...}
  $(".btnAgregarUsuarios").click(function () {
    limpiarModal();
  });

  /* validaciones de la foto y previsualizacion */
  $(".nuevaFoto").change(function () {
    var imagen = this.files[0];

    /* validamos el formato de imagen */

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
      $(".nuevaFoto").val("");

      Swal.fire({
        icon: "error",
        title: "Hubo un error al subir una imagen...",
        text: "¡La imagen debe estar en formato JPG o PNG!",
      });
    } else if (imagen["size"] > 2000000) {
      $(".nuevaFoto").val("");

      Swal.fire({
        icon: "error",
        title: "Hubo un error al subir una imagen..",
        text: "¡La imagen no debe pesar mas de 2MB!",
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

  //ajax para poder actaulziafr la pagina de perfil

  /*  var idUsuario = $("#idUsuario").val();
  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({
    type: "POST",
    url: "ajax/usuarios.ajax.php",
    data: datos,
    dataType: "json",
    cache: false,
    contentType: false,
    processData: false,
    success: function (response) {
      $("#editarNombre").val(response["nombre"]);
      $("#editarApellido").val(response["apellidos"]);
      $("#editarUsuario").val(response["usuario"]);
      $("#editarCorreoElectronico").val(response["correo"]);
      $("#pwdActual").val(response["password"]);
      $("#editarRol").val(response["rol"]);
      $("#fotoActual").val(response["ruta"]);
      $("#ultimoLogin").val(response["fecha_ingreso"]);

      if (response["ruta"]) {
        $(".previsualizar").attr("src", response["ruta"]).show();
      }

      
    },
  }); */

  /* console.log(datos);return; */

  $(".btnEditarUsuarios").click(function () {
    var idUsuario = $(this).attr("idUsuario");

    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    /* solicitud ajax */
    $.ajax({
      type: "POST",
      url: "ajax/usuarios.ajax.php",
      data: datos,
      dataType: "json",
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        $("#editarNombre").val(response["nombre"]);
        $("#editarApellido").val(response["apellidos"]);
        $("#editarUsuario").val(response["usuario"]);
        $("#editarCorreoElectronico").val(response["correo"]);
        $("#pwdActual").val(response["password"]);
        $("#editarRol").val(response["rol"]);
        $("#fotoActual").val(response["ruta"]);

        if (response["ruta"]) {
          $(".previsualizar").attr("src", response["ruta"]).show();
        } else {
          $(".previsualizar").hide();
        }
      },
    });
  });

  /* registor DNI */

  $(".registroDni").click(function () {
    
    datosDni = $("#dniConsulta").val();

    if (datosDni == null || datosDni == "") {
      $(".registroDni").val("");

      Swal.fire({
        icon: "error",
        title: "Los campos del DNI no deben ir vacios",
        text: "¡Ingrese el documento porfavor!",
      });
    } else {
      $.ajax({
        type: "POST",
        url: "api/reniec-api.php",
        data: "registroDni=" + datosDni,
        dataType: "json",
        success: function (response) {
          $("#nombreDNI").val(response["nombres"]);
          $("#apellidoDNI").val(
            response["apellidoPaterno"] + " " + response["apellidoMaterno"]
          );

          var diminutivo = "EVA";
          var nuevoValor = diminutivo + response["numeroDocumento"];

          $("#nameUser").val(nuevoValor);

          //deshabiliar cajas de texto
          $("#nombreDNI").prop("readonly", true);
          $("#apellidoDNI").prop("readonly", true);
          $("#nameUser").prop("readonly", true);
        },
      });
    }
  });

  /* para activar el usuario */
  $(".btnActivar").click(function () {
    var idUsuario = $(this).attr("idUsuario");

    var estadoUsuario = $(this).attr("estadoUsuario");

    var datos = new FormData();

    datos.append("activarId", idUsuario);

    datos.append("estadoUsuario", estadoUsuario);

    $.ajax({
      type: "POST",
      url: "ajax/usuarios.ajax.php",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,

      success: function (response) {
        if (window.matchMedia("(max-width:767px)").matches) {
          Swal.fire({
            title: "El usuario ha sido actualizado",
            type: "success",
            confirmButtonText: "¡Cerrar!",
          }).then(function (result) {
            if (result.value) {
              window.location = "usuarios";
            }
          });
        }
      },
    });

    if (estadoUsuario == 0) {
      $(this).removeClass("btn-success");
      $(this).addClass("btn-danger");
      $(this).html("Desactivado");
      $(this).attr("estadoUsuario", 1);
    } else {
      $(this).addClass("btn-success");
      $(this).removeClass("btn-danger");
      $(this).html("Activado");
      $(this).attr("estadoUsuario", 0);
    }
  });

  /* BTN ELIMINAR USUARIO */
  $(".btnEliminarUsuarios").click(function () {
    var idUsuario = $(this).attr("idUsuario");

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
        window.location = "index.php?route=usuarios&idUsuario=" + idUsuario;
      }
    });
  });

  /* validar si ya existe ese usuario */

  $(".registroDni").click(function () {
    var dniValidar = $("#dniConsulta").val();

    var datos = new FormData();
    datos.append("dniConsulta", dniValidar);

    $.ajax({
      type: "POST",
      url: "ajax/usuarios.ajax.php",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        /* console.log(response); return; */

        if (dniValidar == "" || dniValidar == null) {
          Swal.fire({
            icon: "error",
            title: "Campo DNI vacio",
            text: "¡Porfavor ingrese el numero de DNI e intente nuevamente!",
          });
        } else {
          if (response) {
            $("#dniConsulta")
              .parent()
              .after(
                '<div class="alert alert-warning p-3">Este dni y usuario ya se encuentran en la base de datos!</div>'
              );
            $("#dniConsulta").val("");

            //deshabiliar cajas de texto
            $("#agregarCorreoElectronico").prop("readonly", true);
            $("#agregarPwd").prop("readonly", true);
            $("#selRol").prop("readonly", true);

            // Establecer un tiempo de vida para la alerta (10 segundos)
            setTimeout(function () {
              $(".alert").fadeOut("slow", function () {
                $(this).remove();
              });
            }, 4000);
          } else {
            $(".alert").remove();
            //deshabiliar cajas de texto
            $("#agregarCorreoElectronico").prop("readonly", false);
            $("#agregarPwd").prop("readonly", false);
            $("#selRol").prop("readonly", false);
          }
        }
      },
    });
  });
});

function limpiarModal() {
  $(".nuevaFoto").val(""); // Limpiar el input de la imagen
  $(".previsualizar").attr("src", "view/img/anonimo.jpg"); // Restaurar la imagen predeterminada
  // Restablecer el estado de solo lectura si es necesario
}

/* funcion para poder ver la contraseña y ocultara */

function togglePassword() {
  var passwordInput = document.getElementById("password");
  var eyeIcon = document.getElementById("eye-icon");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    eyeIcon.classList.remove("fa-eye");
    eyeIcon.classList.add("fa-eye-slash");
  } else {
    passwordInput.type = "password";
    eyeIcon.classList.remove("fa-eye-slash");
    eyeIcon.classList.add("fa-eye");
  }
}
