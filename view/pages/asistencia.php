<!DOCTYPE html>
<html>

<head>
    <title>Obtener Coordenadas</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .custom-header {
            font-size: 1.5rem;
            font-weight: 400;
            color: #173076;
            margin-bottom: 1rem;
            text-transform: none;
            font-family: 'Poppins';
        }

        .custom-button {
            width: 200px;
        }

        @media (max-width: 768px) {
            .custom-button {
                width: 100%;
            }
        }

        .btn {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        }

        .container,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl {
            max-width: 100%;
        }
    </style>
</head>

<body>

    <div class="content-header row mt-4">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Bienvenido "<?php echo $_SESSION["nombre"] . " " . $_SESSION["apellidos"] ?>"</h3>
            <p class="mb-4">Registra tus labores de manera fácil y sencilla.</p>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center" style="background-color: #1c577f;">
                        <h5 class="m-0 font-weight-bold text-white mt-1">Ingresos de tiempos laborales</h5>
                        <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCard1" aria-expanded="true" aria-controls="collapseCard1">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <div id="collapseCard1" class="collapse show">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="custom-header">Marcar Hora</h1>
                                    <button id="entradaButton" class="btn btn-success mb-2 custom-button" onclick="marcarEntrada()">
                                        <i class="fas fa-clock"></i><span style="margin-left: 5px;">Enviar corte</span>
                                    </button>
                                </div>
                                <div class="col-12">
                                    <h1 class="custom-header mt-4">Enviar ubicación</h1>
                                    <button id="ubicacionButton" class="btn btn-primary mb-2 custom-button" onclick="getLocation()" disabled>
                                        <i class="fas fa-map-marker-alt"></i><span style="margin-left: 5px;">Enviar ubicación</span>
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" id="last_inserted_id" value="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center" style="background-color: #1c577f;">
                        <h5 class="m-0 font-weight-bold text-white mt-1">Resumen laborales</h5>
                        <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCard2" aria-expanded="true" aria-controls="collapseCard2">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <div id="collapseCard2" class="collapse show">
                        <div class="card-body">
                            <input type="hidden" id="last_inserted_id" value="">

                            <div class="col-12">
                                <h1 class="custom-header">Tiempos Registrados</h1>
                                <div id="historialAsistenciaContainer" class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Hora de Entrada</th>
                                                <th>Hora de Salida</th>
                                                <th>Ubicación</th>
                                            </tr>
                                        </thead>
                                        <tbody id="asistenciaBody">
                                            <!-- Dynamic rows will be inserted here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentLatitude = null;
        let currentLongitude = null;

        document.addEventListener("DOMContentLoaded", function () {
            resetButtonStates();

            const now = new Date();
            const midnight = new Date();
            midnight.setHours(24, 0, 0, 0);
            const timeUntilMidnight = midnight - now;

            setTimeout(function () {
                localStorage.clear();
                location.reload();
            }, timeUntilMidnight);

            setInterval(() => {
                resetButtonStates();
            }, 10000);

            mostrarHistorialAsistencia(<?php echo $_SESSION["id"]; ?>);
        });

        function resetButtonStates() {
            document.getElementById("entradaButton").disabled = false;
            document.getElementById("ubicacionButton").disabled = true;
            localStorage.setItem("entradaButtonDisabled", "false");
            localStorage.setItem("ubicacionButtonDisabled", "true");
        }

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

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log("Coordenadas actualizadas: " + xhr.responseText);
                        mostrarHistorialAsistencia(<?php echo $_SESSION["id"]; ?>);  // Refresh the attendance list after updating coordinates
                    }
                };
            }
        }

        function marcarEntrada() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/asistencia.ajax.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("action=marcarEntrada");

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log("Respuesta del servidor: " + xhr.responseText);
                    document.getElementById("last_inserted_id").value = xhr.responseText;
                    localStorage.setItem("lastInsertedId", xhr.responseText);
                    document.getElementById("ubicacionButton").disabled = false;

                    document.getElementById("entradaButton").disabled = true;
                    localStorage.setItem("ubicacionButtonDisabled", "false");
                    localStorage.setItem("entradaButtonDisabled", "true");

                    mostrarHistorialAsistencia(<?php echo $_SESSION["id"]; ?>);  // Refresh the attendance list after marking entry
                }
            };
        }

        function mostrarHistorialAsistencia(id_usuario) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/asistencia.ajax.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("action=obtenerHistorialAsistencia&id_usuario=" + id_usuario);

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var historial = JSON.parse(xhr.responseText);
                    if (historial.length > 0) {
                        var asistenciaBody = document.getElementById("asistenciaBody");
                        asistenciaBody.innerHTML = historial.map(item => `
                            <tr>
                                <td>${item.fecha}</td>
                                <td>${item.hora_entrada}</td>
                                <td>${item.hora_salida}</td>
                                <td>${item.ubicacion}</td>
                            </tr>
                        `).join('');
                    } else {
                        console.log("No se encontraron datos de asistencia.");
                    }
                }
            };
        }
    </script>

</body>
</html>
