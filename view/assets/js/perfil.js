$(document).ready(function () {
  // Obtener la ruta de la URL
  var urlPerfil = window.location.href;

  // Verificar si la ruta contiene "perfil"
  if (urlPerfil.indexOf("perfil") !== -1) {
    // Ejecutar la función específica para la página de perfil
    tuFuncionEspecificaParaPerfil();
  }

  $(".btnActualizarPerfil").click(function (e) {
    var fotoValidar = $("#newFoto").val();

    if (fotoValidar === "" || fotoValidar === null) {
      Swal.fire({
        icon: "error",
        title: "FOTO NUEVA NO SELECCIONADA",
        text: "¡Por favor, elija una nueva foto e intente nuevamente!",
      });
    } else {
      // Utiliza el método submit() en el formulario
      $(this).closest("form").submit();
    }

    e.preventDefault();
  });
});

///Definir tu función específica para la página de perfil
function tuFuncionEspecificaParaPerfil() {
  var idPerfil = $("#idPerfil").val();
  var datos = new FormData();
  datos.append("idPerfil", idPerfil);

  $.ajax({
    type: "POST",
    url: "ajax/perfil.ajax.php",
    data: datos,
    dataType: "json",
    cache: false,
    contentType: false,
    processData: false,
    success: function (response) {
      $("#editNombre").val(response["nombre"]);
      $("#editApellidos").val(response["apellidos"]);
      $("#editUsuario").val(response["usuario"]);
      $("#dni").val(response["dni_usuarios"]);
      $("#editCorreoElectronico").val(response["correo"]);
      $("#passActual").val(response["password"]);
      $("#editRol").val(response["rol"]);
      $("#fotoActual").val(response["ruta"]);
      $("#ultimoLogin").val(response["fecha_ingreso"]);

      if (response["ruta"]) {
        $(".previsualizar").attr("src", response["ruta"]).show();
      }

      /* console.log(datos); */
    },
  });


}

function saberMas() {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "Parece que tu cuenta esta desactivada, comunícate con el administrador para su activación!",
  }).then(function (result) {
    if (result.value) {
      history.back();
    }
  });
}

function saberMasWarnign() {
  Swal.fire({
    icon: "warning",
    title: "Tu email o contraseña no coinciden",
    text: "Comunicate con el administrador para restablecerlo",
  }).then(function (result) {
    if (result.value) {
      history.back();
    }
  });
}
