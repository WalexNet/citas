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
                     
                    </div>

                    <div class="card-footer">
                        <div class="row"> <!-- Paginación y boton de añadir -->
                            <div class="col-sm-8">
                                <!-- <?= $this->pagination->create_links()?> -->
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="row justify-content-end">
                                    <a href="<?= base_url('Pacientes/formAlta') ?>"  class="btn btn-primary btn-block d-inline-block" tabindex="0" data-toggle="tooltip" title="Añade un paciente"><i class="fa fa-plus"></i>&nbsp;&nbsp;Paciente</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>

            </div >
        </div>
    </section>
   