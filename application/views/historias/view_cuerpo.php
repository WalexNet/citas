    <!-- Tabla Pacientes  -->
    <section class="container mt-5">
        <div class="row">
            <div class="col">

                <div class="card bg-light my-4">

                    <div class="card-header"> <!-- Título y Formulario Busqueda -->
                        <div class="row">
                            <div class="col-sm-6"> <!-- Titulo --> 
                                <h3 class="card-title">Listado de Histórias Clinicas</h3>
                            </div>
                            
                            <div class="col-sm-6"> <!-- Formulario Busqueda --> 
                                <form role="form" action="<?= base_url('Historial/buscar')?>" method="POST"> <!-- Formulario --> 
                                    <div class="input-group input-group-sm hidden-xs">
                                        <input type="text" name="buscar" class="form-control" placeholder="Buscar por DNI o Nombre">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body"> <!-- Tabla de pacientes -->
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">DNI</th>
                                    <th scope="col">Nombres y Apellidos</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">DNI</th>
                                    <th scope="col">Nombres y Apellidos</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php if(isset($datos)):?> <!-- Si no hay datos no hay nada que mostrar -->
                                    <?php foreach ($datos as $registro): ?>

                                        <tr>
                                            <th scope="row"> <?= $registro->dni ?> </th>
                                            <td><?= $registro->nombres.' '.$registro->apellidos ?></td>
                                            <td><?= date('d-m-Y H:i',strtotime($registro->fecha)) ?></td>
                                            <td><?= $registro->tituloNota ?></td>

                                            <td> <!-- Acciones -->
                                                <div class="btn-group mr-2" role="group" >
                                                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Ver Historial">
                                                        <a href="<?= base_url('Historial/ficha/'.$registro->idhistoria)?>"><i class="far fa-file-alt text-light" style='font-size:16px'></i></a>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    
                                    <?php endforeach; ?> 
                                <?php endif; ?>

                            </tbody>
                        </table>
                        <hr> <!-- Linea de separación -->
                    </div>

                    <div class="card-footer"> <!-- Paginación y boton de añadir -->
                        <div class="row"> 
                            <div class="col-sm-8">
                                <?= $this->pagination->create_links()?>
                            </div>
                            
                            <div class="col-sm-4">
                                <!-- Nada que mostrar -->
                            </div>
                            
                        </div>
                    </div>

                </div>

            </div >
        </div>
    </section>
   