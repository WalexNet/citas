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
                        <div class="row"> <!-- Fecha, Hora y Descripcion -->
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="form-group col-md-7">
                                        <label for="inputFecha">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" id="inputFecha" value="<?= date('Y-m-d',strtotime($datos->fecha)) ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="inputHora">Hora</label>
                                        <input type="time" class="form-control form-control-sm" id="inputHora" value="<?= date('H:i',strtotime($datos->fecha)) ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9"> <!-- descripcion -->
                                <div class="form-group">
                                    <label for="dir">Descripcion breve: </label>
                                    <input type="text" class="form-control form-control-sm" id="dir" value="<?= $datos->tituloNota ?>"  readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row"> <!-- comentario -->
                            <div class="col-md-12"> 
                                <div class="form-group">
                                    <label for="com">Comentario:</label>
                                    <textarea type="text" class="form-control form-control-sm" id="com" rows="20" readonly><?= $datos->notas ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row"> <!-- Paginación y boton de añadir -->
                            <div class="col-sm-8">
                                <!-- <a href="<?= base_url('Pacientes/editar/').$datos->id ?>" type="button" class="btn btn-secondary">Editar</a> -->
                                <a href="<?= base_url('Pacientes/ficha/').$datos->id ?>" type="button" class="btn btn-secondary">Salir</a>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="row justify-content-end">
                                    <a href="<?= base_url('Historial/alta'.'/'.$datos->id) ?>"  class="btn btn-primary btn-block d-inline-block" tabindex="0" data-toggle="tooltip" title="Añade un ficha al Historial"><i class="fa fa-plus"></i>&nbsp;&nbsp;Historia Clínica</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>

            </div >
        </div>

    </section>
   