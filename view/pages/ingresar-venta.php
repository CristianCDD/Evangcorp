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
                    <div class="row">
                        <!-- RUC -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ruc">RUC:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                    <input type="text" name="ruc" id="ruc" class="form-control" required>
                                </div>
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
                                    <select name="banco" id="banco" class="form-control" required onchange="checkBanco()">
                                        <option value="" selected disabled>Seleccione un banco</option>
                                        <option value="BCP">BCP</option>
                                        <option value="INTERBANK">INTERBANK</option>
                                        <option value="BBVA">BBVA</option>
                                        <option value="SCOTIABANK">SCOTIABANK</option>
                                        <option value="BANCO LA NACION">BANCO LA NACION</option>
                                        <option value="OTRO">OTRO</option>
                                    </select>
                                </div>
                                <div class="input-group mt-2" id="otroBancoContainer" style="display: none;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                                    </div>
                                    <input type="text" name="otroBanco" id="otroBanco" class="form-control" placeholder="Ingrese otro banco">
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
                                    <select name="cuenta" id="cuenta" class="form-control" required>
                                        <option value="" selected disabled>Seleccione una opción</option>
                                        <option value="corriente">Corriente</option>
                                        <option value="ahorro">Ahorro</option>
                                    </select>
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
                                    <select name="equipo" id="equipo" class="form-control" required>
                                        <option value="" disabled>Seleccione una opción</option>
                                        <option value="culqi-full">Culqi Full</option>
                                        <option value="culqi-link">Culqi Link</option>
                                        <option value="culqi-online">Culqi Online</option>
                                        <option value="super-pos">Super Pos</option>
                                    </select>
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
                                    <select name="tipoPago" id="tipoPago" class="form-control" required>
                                        <option value="" selected disabled>Seleccione un tipo de pago</option>
                                        <option value="yape">Yape</option>
                                        <option value="plin">Plin</option>
                                        <option value="transferencia-bancaria">Transferencia bancaria</option>
                                        <option value="pos-pagador">Pos pagador</option>
                                    </select>
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
                                    <select name="asesor" id="asesor" class="form-control" required>
                                        <option value="" selected>Seleccione un asesor</option>
                                        <?php
                                        $item = null;
                                        $valor = null;
                                        $usuarios = ControllerUser::ctrMostrarUsuarios($item, $valor);
                                        foreach ($usuarios as $usuario) {
                                            if ($usuario["rol"] == "Vendedor") {
                                                echo '<option value="' . $usuario["id"] . '">' . $usuario["nombre"] . ' ' . $usuario["apellidos"] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
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
                        <!-- DNI del asesor -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dniAsesor">DNI del asesor:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input type="text" name="dniAsesor" id="dniAsesor" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- Comentario Adicional -->
                        <div class="col-md-12">
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
    function checkBanco() {
        const bancoSelect = document.getElementById('banco');
        const otroBancoContainer = document.getElementById('otroBancoContainer');
        if (bancoSelect.value === 'OTRO') {
            otroBancoContainer.style.display = 'flex';
            document.getElementById('otroBanco').setAttribute('required', 'required');
        } else {
            otroBancoContainer.style.display = 'none';
            document.getElementById('otroBanco').removeAttribute('required');
        }
    }

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

        const asesorElement = document.getElementById('asesor');
        const asesorName = asesorElement.options[asesorElement.selectedIndex].text;

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
        *Banco:* ${formData.get('banco') === 'OTRO' ? formData.get('otroBanco') : formData.get('banco')}
        *Cuenta:* ${formData.get('cuenta')}
        *N° de Cuenta:* ${formData.get('nroCuenta')}
        *CCI de Cuenta:* ${formData.get('cciCuenta')}
        *Equipo:* ${formData.get('equipo')}
        *Tasa Ofrecida:* ${formData.get('tasaOfrecida')}
        *Precio:* ${formData.get('precio')}
        *Tipo de Pago:* ${formData.get('tipoPago')}
        *Serie POS:* ${formData.get('seriePos')}
        *Asesor:* ${asesorName}
        *DNI del asesor:* ${formData.get('dniAsesor')}
        *Supervisor:* ${supervisor}
        *Comentario Adicional:* ${formData.get('comentarioAdicional')}
    `;

        const whatsappURL = `https://api.whatsapp.com/send?phone=${supervisorPhone}&text=${encodeURIComponent(mensaje)}`;
        window.open(whatsappURL, '_blank');
    }
</script>
