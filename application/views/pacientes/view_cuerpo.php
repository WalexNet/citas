    <!-- Tabla Pacientes  -->
    <section class="container mt-5">
        <div class="row">
            <div class="col">

                <div class="card bg-light my-4">

                    <div class="card-header"> <!-- Título y Formulario Busqueda -->
                        <div class="row">
                            <div class="col-sm-6"> <!-- Titulo --> 
                                <h3 class="card-title">Listado de Pacientes</h3>
                            </div>
                            
                            <div class="col-sm-6"> <!-- Formulario Busqueda --> 
                                <form role="form" action="<?= base_url('Pacientes/buscar')?>" method="POST"> <!-- Formulario --> 
                                    <div class="input-group input-group-sm hidden-xs" >
                                        <input type="text" name="buscar_paciente" class="form-control" placeholder="Buscar por DNI o Nombre">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title"> Light card title </h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>

                    <div class="card-footer">
                        pie de la tarjeta
                    </div>

                </div>

            </div >
        </div>
    </section>
   