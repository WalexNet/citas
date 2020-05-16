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
                                    <div class="input-group input-group-sm hidden-xs">
                                        <input type="text" name="buscar_paciente" class="form-control" placeholder="Buscar por DNI o Nombre">
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
                                    <th scope="col">mail</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">DNI</th>
                                    <th scope="col">Nombres y Apellidos</th>
                                    <th scope="col">mail</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php if(isset($datos)):?> <!-- Si no hay datos no hay nada que mostrar -->
                                    <?php foreach ($datos as $registro): ?>

                                        <tr>
                                            <th scope="row"> <a href="<?= base_url('Pacientes/ficha/').$registro->id ?>"> <?= $registro->dni ?></a></th>
                                            <td><?= $registro->nombres.' '.$registro->apellidos ?></td>
                                            <td> <a href="mailto:<?= $registro->mail ?>"> <?= $registro->mail ?></a></td>
                                            <td><?= $registro->tel1 ?></td>

                                            <td> <!-- Acciones -->
                                                <div class="btn-group mr-2" role="group" >
                                                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Ver Ficha">
                                                        <a href="<?= base_url('Pacientes/ficha/'.$registro->id)?>"><i class="far fa-file-alt text-light" style='font-size:16px'></i></a>
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Editar">
                                                        <a href="<?= base_url('Pacientes/editar/'.$registro->id)?>"><i class="fa fa-edit text-light" style='font-size:16px'></i></a>
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Eliminar">
                                                        <a href="<?= base_url('Pacientes/baja/'.$registro->id)?>"onclick="return confirmar('Realmente desea ELIMINAR a <?= $registro->nombres ?>?')"><i class="fa fa-times text-light" style='font-size:16px'></i></a>
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
   