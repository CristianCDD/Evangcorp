<!DOCTYPE html>
<html>
<head>
    <title>Obtener Coordenadas</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <style>
        .custom-header {
            font-size: 1.5rem;
            font-weight: bold;
            color: #173076;
            margin-bottom: 1rem;
            text-transform: none; /* Asegura que el texto no se transforme a mayúsculas */
        }
        .custom-button {
            width: 200px; /* Ancho fijo en pantallas grandes */
        }
        @media (max-width: 768px) {
            .custom-button {
                width: 100%; /* Ancho completo en pantallas pequeñas */
            }
        }

        .btn {
           box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        }
    </style>
</head>
<body>

<div class="content-header row mt-4">
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Bienvenido "<?php echo $_SESSION["nombre"] . $_SESSION["apellidos"] ?>"</h3>
        <p class="mb-4">Rellenar correctamente la plantilla.</p>
    </div>
</div>

<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3" style="background-color: #173076;">
        <h5 class="m-0 font-weight-bold text-white mt-1">Funcionalidades Adicionales</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h1 class="custom-header">Marcar Fecha de Entrada</h1>
                <button id="entradaButton" class="btn btn-success mb-2 custom-button" onclick="marcarEntrada()">Enviar</button>

                <h1 class="custom-header">Enviar ubicación</h1>
                <button id="ubicacionButton" class="btn btn-primary mb-2 custom-button" onclick="getLocation()" disabled>Enviar</button>
            </div>
        </div>
        <input type="hidden" id="last_inserted_id" value="">
    </div>
</div>

<script>
    let currentLatitude = null;
    let currentLongitude = null;

    document.addEventListener("DOMContentLoaded", function() {
        if (localStorage.getItem("entradaButtonDisabled") === "true") {
            document.getElementById("entradaButton").disabled = true;
        }

        if (localStorage.getItem("ubicacionButtonDisabled") === "false") {
            document.getElementById("ubicacionButton").disabled = false;
        }

        document.getElementById("last_inserted_id").value = localStorage.getItem("lastInsertedId") || "";
        
        const now = new Date();
        const midnight = new Date();
        midnight.setHours(24, 0, 0, 0);
        const timeUntilMidnight = midnight - now;

        setTimeout(function() {
            localStorage.clear();
            location.reload();
        }, timeUntilMidnight);

        setInterval(() => {
            document.getElementById("entradaButton").disabled = false;
            document.getElementById("ubicacionButton").disabled = false;
            localStorage.setItem("entradaButtonDisabled", "false");
            localStorage.setItem("ubicacionButtonDisabled", "false");
        }, 10000); // Habilitar los botones cada 10 segundos para pruebas

        if (localStorage.getItem("lastInsertedId")) {
            setInterval(getLocation, 10000); // Cada 10 segundos para pruebas
        }
    });

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
            document.getElementById("entradaButton").disabled = true;
            document.getElementById("ubicacionButton").disabled = true;
            localStorage.setItem("entradaButtonDisabled", "true");
            localStorage.setItem("ubicacionButtonDisabled", "true");
        } else {
            document.getElementById("server-response").innerHTML = "Geolocalización no soportada por este navegador.";
        }
    }

    function showPosition(position) {
        currentLatitude = position.coords.latitude;
        currentLongitude = position.coords.longitude;

        var lastInsertedId = document.getElementById("last_inserted_id").value;

        if (lastInsertedId) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/asistencia.ajax.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("action=updateCoordinates&id=" + lastInsertedId + "&latitude=" + currentLatitude + "&longitude=" + currentLongitude);
        }
    }

    function marcarEntrada() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/asistencia.ajax.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("action=marcarEntrada");

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log("Respuesta del servidor: " + xhr.responseText);
                document.getElementById("last_inserted_id").value = xhr.responseText;
                localStorage.setItem("lastInsertedId", xhr.responseText);
                document.getElementById("ubicacionButton").disabled = false;

                document.getElementById("entradaButton").disabled = true;
                localStorage.setItem("ubicacionButtonDisabled", "false");
                localStorage.setItem("entradaButtonDisabled", "true");
            }
        };
    }
</script>

</body>
</html>
