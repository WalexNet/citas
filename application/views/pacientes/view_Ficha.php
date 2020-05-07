    <!-- Tabla Pacientes  -->
    <section class="container mt-5">
        <div class="row">
            <div class="col">

                <div class="card bg-light my-4"> <!-- Ficha -->

                    <div class="card-header"> <!-- Título -->
                        <div class="row">
                            <div class="col-sm-5"> <!-- Titulo --> 
                                <h3 class="card-title">Ficha de: </h3>
                            </div>
                            
                            <div class="col-sm-7"> <!-- Nombres y Apellidos --> 
                                <h3 class="card-title text-black-50"><?= $datos->nombres.' '.$datos->apellidos ?> </h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row"> <!-- dni y direccion -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="dni">DNI:</label>
                                    <input type="text" class="form-control form-control-sm" id="dni" value="<?= $datos->dni ?>"  readonly>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="dir">Calle Dirección: </label>
                                    <input type="text" class="form-control form-control-sm" id="dir" value="<?= $datos->dir ?>"  readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!-- mail, cp, localidad y provincia -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mail">Correo electrónico: </label>
                                    <a href="mailto:<?= $datos->mail ?>" data-toggle="tooltip" title="Pike para enviar mail" >
                                    <input type="text" class="form-control form-control-sm" id="mail" value="<?= $datos->mail ?>"  readonly>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cp">CP: </label>
                                    <input type="text" class="form-control form-control-sm" id="cp" value="<?= $datos->cp ?>"  readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="loca">Localidad:</label>
                                    <input type="text" class="form-control form-control-sm" id="loca" value="<?= $datos->localidad ?>"  readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="prov">Provincia: </label>
                                    <input type="text" class="form-control form-control-sm" id="prov" value="<?= $datos->provincia ?>"  readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"> <!-- Tel1 y Tel2 -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tel1">Teléfono 1:</label>
                                            <input type="text" class="form-control form-control-sm" id="tel1" value="<?= $datos->tel1 ?>"  readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tel2">Teléfono 2:</label>
                                            <input type="text" class="form-control form-control-sm" id="tel2" value="<?= $datos->tel2 ?>"  readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9"> <!-- comentario -->
                                <div class="form-group">
                                    <label for="com">Comentario:</label>
                                    <textarea type="text" class="form-control form-control-sm" id="com" rows="4" readonly><?= $datos->comentario ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row"> <!-- Paginación y boton de añadir -->
                            <div class="col-sm-6">
                                <a href="<?= base_url('Pacientes/editar/').$datos->id ?>" type="button" class="btn btn-secondary">Editar</a>
                                <a href="<?= base_url('Pacientes') ?>" type="button" class="btn btn-secondary">Salir</a>
                            </div>
                            
                            <div class="col-sm-6">
                                    <!-- Nada que poner -->
                            </div>
                            
                        </div>
                    </div>

                </div>

            </div >
        </div>

        <!-- HISTORIAL MEDICO -->
        <div class="row">
            <div class="col">

                <div class="card bg-light">

                    <div class="card-header"> <!-- Título  -->
                        <div class="row">
                            <div class="col-sm-5"> <!-- Titulo --> 
                                <h3 class="card-title">Historial: </h3>
                            </div>
                            
                            <div class="col-sm-7"> <!-- Nombres y Apellidos --> 
                                <!-- Pte de añadir datos -->
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        
                    </div>

                    <div class="card-footer">
                        <div class="row"> <!-- Paginación y boton de añadir -->
                            <div class="col-sm-6">
                                una nota
                            </div>
                            
                            <div class="col-sm-6">
                                    una nota
                            </div>
                            
                        </div>
                    </div>

                </div>

            </div >
        </div>
    </section>
   