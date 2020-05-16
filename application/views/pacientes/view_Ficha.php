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
                                <h3 class="card-title text-black-50"><?= $datos[0]->nombres.' '.$datos[0]->apellidos ?> </h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row"> <!-- dni y direccion -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="dni">DNI:</label>
                                    <input type="text" class="form-control form-control-sm" id="dni" value="<?= $datos[0]->dni ?>"  readonly>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="dir">Calle Dirección: </label>
                                    <input type="text" class="form-control form-control-sm" id="dir" value="<?= $datos[0]->dir ?>"  readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!-- mail, cp, localidad y provincia -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mail">Correo electrónico: </label>
                                    <a href="mailto:<?= $datos[0]->mail ?>" data-toggle="tooltip" title="Pike para enviar mail" >
                                    <input type="text" class="form-control form-control-sm" id="mail" value="<?= $datos[0]->mail ?>"  readonly>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cp">CP: </label>
                                    <input type="text" class="form-control form-control-sm" id="cp" value="<?= $datos[0]->cp ?>"  readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="loca">Localidad:</label>
                                    <input type="text" class="form-control form-control-sm" id="loca" value="<?= $datos[0]->localidad ?>"  readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="prov">Provincia: </label>
                                    <input type="text" class="form-control form-control-sm" id="prov" value="<?= $datos[0]->provincia ?>"  readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"> <!-- Tel1 y Tel2 -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tel1">Teléfono 1:</label>
                                            <input type="text" class="form-control form-control-sm" id="tel1" value="<?= $datos[0]->tel1 ?>"  readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tel2">Teléfono 2:</label>
                                            <input type="text" class="form-control form-control-sm" id="tel2" value="<?= $datos[0]->tel2 ?>"  readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9"> <!-- comentario -->
                                <div class="form-group">
                                    <label for="com">Comentario:</label>
                                    <textarea type="text" class="form-control form-control-sm" id="com" rows="4" readonly><?= $datos[0]->comentario ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row"> <!-- Paginación y boton de añadir -->
                            <div class="col-sm-8">
                                <a href="<?= base_url('Pacientes/editar/').$datos[0]->id ?>" type="button" class="btn btn-secondary">Editar</a>
                                <a href="<?= base_url('Pacientes') ?>" type="button" class="btn btn-secondary">Salir</a>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="row justify-content-end">
                                    <a href="<?= base_url('Historial/alta'.'/'.$datos[0]->id) ?>"  class="btn btn-primary btn-block d-inline-block" tabindex="0" data-toggle="tooltip" title="Añade un ficha al Historial"><i class="fa fa-plus"></i>&nbsp;&nbsp;Historia Clínica</a>
                                </div>
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
                                <h3 class="card-title">Historial - Fichas </h3>
                            </div>
                            
                            <div class="col-sm-7"> <!-- Nombres y Apellidos --> 
                                <!-- Pte de añadir datos -->
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php if($datos[0]->idhistoria):?> <!-- Si no hay datos no hay nada que mostrar -->
                                    <?php foreach ($datos as $registro): ?>

                                        <tr>
                                            <td><?= $registro->Fecha?></td>
                                            <td><?= $registro->tituloNota ?></td>

                                            <td> <!-- Acciones -->
                                                <div class="btn-group mr-2" role="group" >
                                                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Ver Informe">
                                                        <a href="<?= base_url('Pacientes/historia/'.$registro->idhistoria)?>"><i class="far fa-file-alt text-light" style='font-size:16px'></i></a>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    
                                    <?php endforeach; ?> 
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="card-footer">
                        <div class="row"> <!-- Paginación y boton de añadir -->
                            <div class="col-sm-8">
                                <!-- una nota -->
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="row justify-content-end">
                                    <a href="<?= base_url('Historial/alta'.'/'.$datos[0]->id) ?>"  class="btn btn-primary btn-block d-inline-block" tabindex="0" data-toggle="tooltip" title="Añade un ficha al Historial"><i class="fa fa-plus"></i>&nbsp;&nbsp;Historia Clínica</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>

            </div >
        </div>
    </section>
   