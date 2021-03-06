
        <section class="container mt-5">
            <div class="row">
                <div class="col">

                    <div class="card bg-light my-4">
                    <form action="<?= base_url('Historial/addHistoria') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $datos[0]->id ?>">
                        <div class="card-header"> <!-- Título  -->
                            <div class="row">
                                <div class="col-sm-4"> <!-- Titulo --> 
                                    <h3 class="card-title">Añada una nueva Ficha a:</h3>
                                    
                                </div>
                                
                                <div class="col-sm-8"> <!-- Nomnres y Apellidos --> 
                                    <h3 class="text-black-50"><?= $datos[0]->nombres.' '.$datos[0]->apellidos ?></h3> 
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">      <!-- Fecha y Descripcion-->

                                <div class="form-group col-md-3"> <!-- fecha y Hora -->
                                    <div class="row">
                                        <div class="form-group col-md-7">
                                            <label for="inputFecha">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" id="inputFecha" name="fecha" value="<?= date('Y-m-d') ?>" required>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="inputHora">Hora</label>
                                            <input type="time" class="form-control form-control-sm" id="inputHora" name="hora" value="<?= date('H:i') ?>" require>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-9"> <!-- descripcion -->
                                    <label for="inputTitulo">Descripción</label>
                                    <input type="text" class="form-control form-control-sm" id="inputTitulo" placeholder="Breve descripción" name="des" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="areaText">Historial del paciente:</label>
                                    <textarea class="form-control form-control-sm" id="areaText" name="notas" rows="10"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row"> <!-- Boton del formulario -->
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary">Añadir</button>
                                    <a href="<?= base_url('Historial') ?>" type="button" class="btn btn-secondary">Salir</a>
                                </div>
                                
                                <div class="col-sm-4">
                                    <!-- NADA QUE HACER -->
                                </div>
                                
                            </div>
                        </div>
                    </form>
                    </div>

                </div >
            </div>
        </section>
    