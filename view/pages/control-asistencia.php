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
        <div class="table-responsive">
            <table id="tabla-responsives" class="table table-hover table-xl mb-0 myTable display">
                <thead>
                    <tr>
                        <th class="border-top-0">#</th>
                        <th class="border-top-0">Nombre</th>
                        <th class="border-top-0">Apellidos</th>
                        <th class="border-top-0">Día de jornada</th>
                        <th class="border-top-0">Hora de entrada</th>
                        <th class="border-top-0">Hora de salida</th>
                        <th class="border-top-0">Ubicación de entrada</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach ($asistencia as $key => $value) : ?>
                        <tr>
                            <td><?php echo ($key + 1) ?></td>
                            <td><?php echo isset($value["nombre"]) ? $value["nombre"] : "No disponible"; ?></td>
                            <td><?php echo isset($value["apellidos"]) ? $value["apellidos"] : "No disponible"; ?></td>
                            <td><?php echo $value["fecha"] ?></td>
                            <td><?php echo $value["hora_entrada"] ?></td>
                            <td><?php echo $value["hora_salida"] ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <a href="<?php echo $value["ubicacion"] ?>" target="_blank" class="btn btn-success"><i class="fas fa-image"></i> Ver ubicación de entrada</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
