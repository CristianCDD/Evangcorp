<div class="content-header row mt-4">
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Registro de validaciones</h3>
        <p class="mb-4">Seguimiento en tiempo real de pedidos.</p>
    </div>
</div>

<div class="card shadow mb-4 contenedor-relevante">
    <div class="card-header py-3" style="background-color: #173076;">
        <h5 class="m-0 font-weight-bold text-white mt-1">CONSULTA RUC</h5>
    </div>
    
    <div class="card-body">

        <form method="post" enctype="multipart/form-data">
            <!-- RUC -->
            <div class="row mb-2">

                <div class="col mb-2">

                    <small>Ingresa solo el numero de RUC</small><span style="color: red;"> *</span>

                    <!-- Agrega el formulario de búsqueda aquí -->
                    <div class="input-group mt-2">
                        <input type="text" id="rucConsulta" name="registroRuc" class="form-control" style="outline: none;" placeholder="Buscar comercio">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary registroRuc">
                                <i class="fas fa-search"></i> Buscar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- NOMBRE DEL RUC -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="registrarNombreRuc" id="nombreRuc" class="form-control" placeholder="Nombre del representante" >
                </div>
            </div>

            <!-- COLUMA DE DOS -->

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                    <!-- Razon social-->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                            </div>
                            <input type="text" name="agregarRazonSocial" id="razonSocialRuc" class="form-control" placeholder="Razon social" >
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                    <!-- Nombre comercial -->
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <input type="text" name="agregarNombreComercial" id="nombreComercialRuc" class="form-control" placeholder="Nombre comercial" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <!-- condicion -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-check"></i></span>
                            </div>
                            <input type="text" id="condicionRuc" name="condicionRuc" class="form-control" placeholder="Condicion" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columa de tres -->
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <!-- departamento -->
                    <div class="form-group">
                        <div class="input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <input type="text" name="agregarDepartamento" class="form-control" placeholder="Departamento" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <!-- direccion -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <input type="text" name="agregarDireccion" class="form-control" placeholder="Direccion" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <!-- Estado -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-check"></i></span>
                            </div>
                            <input type="text" id="estadoRuc" name="agregarEstado" class="form-control" placeholder="Estado" readonly>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Columa de tres -->
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <!-- HORA DE LA LLAMADA VALIDADORA -->
                    <div class="form-group">
                        <label for="horaLlamadaValidadora">Hora de la llamada validadora <span style="color: red;">*</span></label>
                        <div class="input-group">

                            <input type="time" class="form-control" name="horaValidadora" id="horaLlamadaValidadoraTime" required>
                           

                        </div>
                    </div>


                </div>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <!-- DURACION DE LA LLAMADA -->
                    <div class="form-group">
                        <label for="duracionLlamada">Duración de la llamada</label>
                        <input type="text" name="duracionLlamada" id="duracionLlamada" class="form-control" placeholder="Duración de la llamada">
                    </div>
                </div>

                <!-- HORA DE ACTIVACION DEL POS -->

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="horaActivacionPOS">Hora de activación del POS <span style="color: red;">*</span></label>
                        <div class="input-group">

                            <input type="time" class="form-control" name="horaActivacionPos" id="horaActivacionPOSTime" required>
                            
                        </div>
                    </div>
                </div>

            </div>


            <!-- Subir CARTA Y VOUCHER -->
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-3">
                        <label for="subirPDF">
                            <i class="fas fa-file-pdf"></i> Subir PDF de la CARTA OFERTA
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input nuevoPDF" name="nuevoPDF" id="customFile" accept=".pdf" aria-describedby="pdfHelp">
                            <label class="custom-file-label" for="customFile">Seleccionar archivo</label>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <label for="subirVoucher">
                            <i class="fas fa-file-image"></i> Subir imagen del Voucher
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input nuevoVoucher" name="nuevoVoucher" id="customFileVoucher" accept="image/*" aria-describedby="voucherHelp">
                            <label class="custom-file-label" for="customFileVoucher">Seleccionar archivo</label>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <!-- Botón de guardar -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>


        </form>

        <?php

        $validaciones = new ControllerValidaciones();
        $validaciones->ctrAgregarValidaciones();

        ?>


    </div>
</div>