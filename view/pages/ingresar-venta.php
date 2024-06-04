<div class="content-header row mt-4">
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Ingreso de venta</h3>
        <p class="mb-4">Rellenar correctamente la plantilla.</p>
    </div>
</div>

<div class="card shadow mb-4 contenedor-relevante">
    <div class="card-header py-3" style="background-color: #173076;">
        <h5 class="m-0 font-weight-bold text-white mt-1">INGRESO DE PLANTILLA</h5>
    </div>

    <div class="card-body">

        <form id="ventaForm">
            <!-- Datos Personales -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold">Datos Personales</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Nombre Rep Leg -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombreRepLeg">Nombre Rep Leg:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="nombreRepLeg" id="nombreRepLeg" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- Fecha -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- DNI -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dni">DNI:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input type="text" name="dni" id="dni" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Celular -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="celular">Celular:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input type="text" name="celular" id="celular" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Datos Comerciales -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold">Datos Comerciales</h6>
                </div>
                <div class="card-body">
                    <!-- RUC -->
                    <div class="form-group">
                        <label for="rucConsulta">RUC:</label>
                        <small>Ingresa solo el número de RUC</small><span style="color: red;"> *</span>
                        <div class="input-group mt-2">
                            <input type="text" id="rucConsulta" name="registroRuc" class="form-control" style="outline: none;" placeholder="Buscar comercio">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary registroRuc">
                                    <i class="fas fa-search"></i> Buscar
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Razón Social -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="razonSocial">Razón Social:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                    <input type="text" name="razonSocial" id="razonSocial" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- Nombre Comercial -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombreComercial">Nombre Comercial:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-store"></i></span>
                                    </div>
                                    <input type="text" name="nombreComercial" id="nombreComercial" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Dirección -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion">Dirección:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <input type="text" name="direccion" id="direccion" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- Referencia -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="referencia">Referencia:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                                    </div>
                                    <input type="text" name="referencia" id="referencia" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Departamento -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="departamento">Departamento:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    </div>
                                    <input type="text" name="departamento" id="departamento" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- Provincia -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provincia">Provincia:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    </div>
                                    <input type="text" name="provincia" id="provincia" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Distrito -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="distrito">Distrito:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    </div>
                                    <input type="text" name="distrito" id="distrito" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- Rubro -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rubro">Rubro:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                    </div>
                                    <input type="text" name="rubro" id="rubro" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Datos Bancarios -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold">Datos Bancarios</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Banco -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banco">Banco:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                                    </div>
                                    <input type="text" name="banco" id="banco" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- Cuenta -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cuenta">Cuenta:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                                    </div>
                                    <input type="text" name="cuenta" id="cuenta" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- N° de Cuenta -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nroCuenta">N° de Cuenta:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                                    </div>
                                    <input type="text" name="nroCuenta" id="nroCuenta" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- CCI de Cuenta -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cciCuenta">CCI de Cuenta:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-exchange-alt"></i></span>
                                    </div>
                                    <input type="text" name="cciCuenta" id="cciCuenta" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Datos de la Oferta -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold">Datos de la Oferta</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Equipo -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="equipo">Equipo:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                                    </div>
                                    <input type="text" name="equipo" id="equipo" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- Tasa Ofrecida -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tasaOfrecida">Tasa Ofrecida:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    </div>
                                    <input type="text" name="tasaOfrecida" id="tasaOfrecida" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Precio -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio">Precio:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="text" name="precio" id="precio" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- Tipo de Pago -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipoPago">Tipo de Pago:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                    </div>
                                    <input type="text" name="tipoPago" id="tipoPago" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Serie POS -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="seriePos">Serie POS:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                    </div>
                                    <input type="text" name="seriePos" id="seriePos" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- Asesor -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="asesor">Asesor:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                    </div>
                                    <input type="text" name="asesor" id="asesor" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Supervisor -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supervisor">Supervisor:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                    </div>
                                    <select name="supervisor" id="supervisor" class="form-control" required>
                                        <option value="">Seleccione un supervisor</option>
                                        <option value="Jorge Chung">Jorge Chung</option>
                                        <option value="Paul Alvites">Paul Alvites</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Comentario Adicional -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="comentarioAdicional">Comentario Adicional:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-comment-dots"></i></span>
                                    </div>
                                    <textarea name="comentarioAdicional" id="comentarioAdicional" class="form-control" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botón de Enviar Venta -->
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success" onclick="enviarVenta()">
                    <i class="fab fa-whatsapp"></i> Enviar Venta
                </button>
            </div>
        </form>

    </div>
</div>





<script>
    function enviarVenta() {
        const supervisor = document.getElementById('supervisor').value;
        const form = document.getElementById('ventaForm');
        const formData = new FormData(form);

        let supervisorPhone = '';
        if (supervisor === 'Jorge Chung') {
            supervisorPhone = '51912612018'; // Replace with actual phone number
        } else if (supervisor === 'Paul Alvites') {
            supervisorPhone = '51950005046'; // Replace with actual phone number
        }

        const mensaje = `
        *Nombre Rep Leg:* ${formData.get('nombreRepLeg')}
        *Fecha:* ${formData.get('fecha')}
        *Email:* ${formData.get('email')}
        *DNI:* ${formData.get('dni')}
        *Celular:* ${formData.get('celular')}
        *RUC:* ${formData.get('ruc')}
        *Razón Social:* ${formData.get('razonSocial')}
        *Nombre Comercial:* ${formData.get('nombreComercial')}
        *Dirección:* ${formData.get('direccion')}
        *Referencia:* ${formData.get('referencia')}
        *Departamento:* ${formData.get('departamento')}
        *Provincia:* ${formData.get('provincia')}
        *Distrito:* ${formData.get('distrito')}
        *Rubro:* ${formData.get('rubro')}
        *Banco:* ${formData.get('banco')}
        *Cuenta:* ${formData.get('cuenta')}
        *N° de Cuenta:* ${formData.get('nroCuenta')}
        *CCI de Cuenta:* ${formData.get('cciCuenta')}
        *Equipo:* ${formData.get('equipo')}
        *Tasa Ofrecida:* ${formData.get('tasaOfrecida')}
        *Precio:* ${formData.get('precio')}
        *Tipo de Pago:* ${formData.get('tipoPago')}
        *Serie POS:* ${formData.get('seriePos')}
        *Asesor:* ${formData.get('asesor')}
        *Supervisor:* ${supervisor}
        *Comentario Adicional:* ${formData.get('comentarioAdicional')}
    `;

        const whatsappURL = `https://api.whatsapp.com/send?phone=${supervisorPhone}&text=${encodeURIComponent(mensaje)}`;
        window.open(whatsappURL, '_blank');
    }
</script>