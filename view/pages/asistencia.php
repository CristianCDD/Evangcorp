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

        document.addEventListener("DOMContentLoaded", function() {
            const now = new Date();
            const midnight = new Date();
            midnight.setHours(24, 0, 0, 0);
            const timeUntilMidnight = midnight - now;

            setTimeout(function() {
                localStorage.clear();
                location.reload();
            }, timeUntilMidnight);

            mostrarHistorialAsistencia(<?php echo $_SESSION["id"]; ?>); // Obtener y mostrar el historial de asistencia al cargar la página
        });

        function getLocation(id_asistencia) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    showPosition(position, id_asistencia);
                });
            } else {
                document.getElementById("server-response").innerHTML = "Geolocalización no soportada por este navegador.";
            }
        }

        function showPosition(position, id_asistencia) {
            currentLatitude = position.coords.latitude;
            currentLongitude = position.coords.longitude;

            if (id_asistencia) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/asistencia.ajax.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("action=updateCoordinates&id=" + id_asistencia + "&latitude=" + currentLatitude + "&longitude=" + currentLongitude);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log("Coordenadas actualizadas: " + xhr.responseText);
                        mostrarHistorialAsistenciaPorId(id_asistencia); // Mostrar el historial de asistencia para el ID específico
                        // Habilitar el botón después de 10 segundos
                        setTimeout(function() {
                            document.getElementById("entradaButton").disabled = false;
                            localStorage.setItem("entradaButtonDisabled", "false");
                        }, 10000); // Habilitar después de 10 segundos
                    }
                };
            }
        }

        function mostrarHistorialAsistenciaPorId(id_asistencia) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/asistencia.ajax.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("action=obtenerHistorialAsistenciaPorId&id_asistencia=" + id_asistencia);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var historial = JSON.parse(xhr.responseText);
                    if (historial.length > 0) {
                        var container = document.getElementById("historialAsistenciaContainer");
                        container.innerHTML = `
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Usuario</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Ubicación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${historial.map((item, index) => `
                                        <tr>
                                            <td>${index + 1}</td>
                                            <td>${item.id}</td>
                                            <td>${item.nombre}</td>
                                            <td>${item.fecha}</td>
                                            <td>${item.hora}</td>
                                            <td><a class="btn btn-primary" href="${item.ubicacion}" target="_blank"><i class="fas fa-map-marker-alt"></i></a></td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                            </table>
                        `;
                    } else {
                        console.log("No se encontraron datos de asistencia.");
                    }
                }
            };
        }

        function marcarEntrada() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/asistencia.ajax.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("action=marcarEntrada");

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log("Respuesta del servidor: " + xhr.responseText);
                    var id_asistencia = xhr.responseText;
                    document.getElementById("last_inserted_id").value = id_asistencia;
                    localStorage.setItem("lastInsertedId", id_asistencia);

                    document.getElementById("entradaButton").disabled = true;
                    localStorage.setItem("entradaButtonDisabled", "true");

                    // Llamar a getLocation para obtener y registrar la ubicación automáticamente
                    getLocation(id_asistencia); // Pasar el id_asistencia a getLocation
                }
            };
        }
    </script>

</body>

</html>