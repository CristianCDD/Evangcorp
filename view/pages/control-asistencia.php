<?php
global $asistencia;
?>

<div class="content-header row mt-4">
    <div class="content-header-left col-md-8 col-12 mb-5 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">VALIDACIONES Y CARTAS</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="inicio">ESCRITORIO</a>
                    </li>
                    <li class="breadcrumb-item active">carta ofertas
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary p-2 mb-4 btnAgregarUsuarios" onclick="window.location.href='registrar-validaciones'" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">
    Ingresar carta y vaucher
</button>

<div class="card">
    <div class="card-content p-4">
        <div class="filters-container mb-3 row align-items-end">
            <div class="col-md-4 mb-3">
                <label for="filterName" class="form-label">Filtrar por Nombre y Apellidos:</label>
                <input type="text" class="form-control" id="filterName" onkeyup="filterTable()" placeholder="Buscar por nombre y apellidos..">
            </div>
            <div class="col-md-4 mb-3">
                <label for="filterDate" class="form-label">Filtrar por Fecha:</label>
                <input type="date" class="form-control" id="filterDate" onchange="filterTable()">
            </div>
            <div class="col-md-4 mb-3">
                <button class="btn btn-secondary w-100 mt-4" onclick="resetFilters()">Resetear Filtros</button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="tabla-responsives" class="table table-hover table-xl mb-0 myTable display">
                <thead>
                    <tr>
                        <th class="border-top-0">#</th>
                        <th class="border-top-0">Nombre</th>
                        <th class="border-top-0">Apellidos</th>
                        <th class="border-top-0">Día de jornada</th>
                        <th class="border-top-0">Hora de entrada</th>
                        <th class="border-top-0">Ubicación</th>
                    </tr>
                </thead>
                
                <tbody id="tableBody">
                    <?php foreach ($asistencia as $key => $value) : ?>
                        <tr>
                            <td><?php echo ($key + 1) ?></td>
                            <td><?php echo ($value["nombre"]) ?></td>
                            <td><?php echo ($value["apellidos"]) ?></td>
                            <td><?php echo fechaCastellano($value["fecha"]) ?></td>
                            <td><?php echo formatDate($value["hora"]) ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <a href="<?php echo $value["ubicacion"] ?>" target="_blank" class="btn btn-success"><i class="fas fa-map-marker-alt"></i>  Ver ubicación</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function filterTable() {
    var inputName, inputDate, filterName, filterDate, table, tr, tdName, tdLastName, tdDate, i, txtValueName, txtValueDate;
    inputName = document.getElementById("filterName");
    inputDate = document.getElementById("filterDate");
    filterName = inputName.value.toUpperCase();
    filterDate = inputDate.value;
    table = document.getElementById("tabla-responsives");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        tdName = tr[i].getElementsByTagName("td")[1];
        tdLastName = tr[i].getElementsByTagName("td")[2];
        tdDate = tr[i].getElementsByTagName("td")[3];
        if (tdName && tdLastName && tdDate) {
            txtValueName = (tdName.textContent || tdName.innerText) + " " + (tdLastName.textContent || tdLastName.innerText);
            txtValueDate = tdDate.textContent || tdDate.innerText;
            if (txtValueName.toUpperCase().indexOf(filterName) > -1 && (filterDate === "" || txtValueDate === filterDate)) {
                tr[i].style.display = "";
            }
        }
    }
}

function resetFilters() {
    document.getElementById("filterName").value = "";
    document.getElementById("filterDate").value = "";
    filterTable();
}
</script>

<style>
@media (min-width: 768px) {
    .table-responsive {
        overflow-x: hidden;
    }
}

@media (max-width: 767px) {
    .table-responsive {
        overflow-x: auto;
    }
}

.filters-container {
    margin-bottom: 1rem;
}
</style>
