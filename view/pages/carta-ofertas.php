<?php

$item = null;
$valor = null;
$cartas = ControllerValidaciones::ctrMostrarValidaciones($item, $valor);

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
                        <th class="border-top-0">Ruc</th>
                        <th class="border-top-0">Razon social</th>
                        <th class="border-top-0">Hora de la llamada validadora</th>
                        <th class="border-top-0">Duración de la llamada</th>
                        <th class="border-top-0">Hora de activación del POS</th>
                        <th class="border-top-0">Vaucher y Carta</th>
                        <th class="border-top-0">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($cartas as $key => $value) : ?>
                        <tr>
                            <td><?php echo ($key + 1) ?></td>
                            <td><?php echo $value["ruc"] ?></td>
                            <td><?php echo $value["nombres_ruc"] ?></td>
                            <td><?php echo $value["llamada_validadora"] ?></td>
                            <td><?php echo $value["duracion_llamada"] ?></td>
                            <td><?php echo $value["activacion_pos"] ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <a href="<?php echo $value["vaucher_culqi"] ?>" target="_blank" class="btn btn-success"><i class="fas fa-image"></i> Vaucher</a>
                                    <a href="<?php echo $value["carta_oferta"] ?>" target="_blank" class="btn btn-danger ml-2"><i class="fas fa-file-pdf"></i> Carta Oferta</a>
                                </div>
                            </td>


                            <td>
                                <!-- Botones de acciones -->
                                <div class="btn-group" role="group" aria-label="Acciones de usuario">
                                    <button idValidaciones="<?php echo $value["id_validaciones"] ?>" type="button" class="btn btn-primary btn-xs btnEditarValidaciones" data-toggle="modal" data-target="#modalEditarValidaciones"><i class="fa fa-edit"></i></button>
                                    <button idValidaciones="<?php echo $value["id_validaciones"] ?>" type="button" class="btn btn-danger btn-xs btnEliminarValidaciones"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal para editar campos -->
<div class="modal fade" id="modalEditarValidaciones" tabindex="-1" role="dialog" aria-labelledby="modalEditarValidaciones" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #173076;">
                <h5 class="modal-title text-white" id="modalEditarCamposLabel">Editar Campos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Aquí coloca los campos que deseas editar -->
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body p-3">

                    <!-- CAMPO DE RUC INVIBLE -->
                    <input type="hidden" class="form-control" id="editarRuc" name="editarRuc">

                    <!-- HORA DE LA LLAMADA VALIDADORA -->
                    <div class="form-group">
                        <label for="editarHoraLlamadaValidadora">Hora de la llamada validadora</label>
                        <input type="time" class="form-control" id="editarHoraLlamadaValidadora" name="editarHoraLlamadaValidadora">
                    </div>
                    <div class="form-group">
                        <label for="editarDuracionLlamada">Duración de la llamada</label>
                        <input type="text" class="form-control" id="editarDuracionLlamada" name="editarDuracionLlamada">
                    </div>
                    <div class="form-group">
                        <label for="editarHoraActivacionPos">Hora de activación del POS</label>
                        <input type="time" class="form-control" id="editarHoraActivacionPos" name="editarHoraActivacionPos">
                    </div>
                    <div class="form-group">
                        <label for="subirPDF">
                            <i class="fas fa-file-pdf"></i> Subir PDF de la CARTA OFERTA
                        </label>
                        <div class="custom-file">
                            <input type="hidden" class="custom-file-input nuevoPDF" name="actualPdf" id="actualPdf" accept=".pdf" aria-describedby="pdfHelp">
                            <input type="file" class="custom-file-input nuevoPDF" name="editarPdf" id="editarPdf" accept=".pdf" aria-describedby="pdfHelp">
                            <label class="custom-file-label" for="customFile">Seleccionar archivo</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subirVoucher">
                            <i class="fas fa-file-image"></i> Subir imagen del Voucher
                        </label>
                        <div class="custom-file">
                            <!-- vaucher actual -->
                            <input type="hidden" class="custom-file-input nuevoVoucher" name="vaucherActual" id="vaucherActual" accept="image/*" aria-describedby="voucherHelp">
                            <!-- vaucher actualizar -->
                            <input type="file" class="custom-file-input editarVaucher" name="editarVaucher" id="editarVaucher" accept="image/*" aria-describedby="voucherHelp">
                            <label class="custom-file-label" for="customFileVoucher">Seleccionar archivo</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="guardarEdicion">Guardar cambios</button>
                </div>
            </form>

            <!-- controlador para editar validaciones -->
            <?php

            $editarValidaciones = new ControllerValidaciones();
            $editarValidaciones->ctrActualizarValidaciones();

            ?>
        </div>
    </div>
</div>

<?php

$eliminarValidaciones = new ControllerValidaciones();
$eliminarValidaciones->ctrEliminarValidacicones();

?>

<style>
    .close {
        color: white;
    }

    .close:hover {
        color: white;
    }
</style>