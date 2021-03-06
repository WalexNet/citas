    <!-- Formularios de Alta (2) y Edicion (3)  -->

    <?php if ($tipoVista==2): ?> <!-- Formularios de Alta (2)  -->
        <section class="container mt-5">
            <div class="row">
                <div class="col">

                    <div class="card bg-light my-4">
                    <form action="<?= base_url('Usuarios/cliadd') ?>" method="post">
                        <div class="card-header"> <!-- Título y Formulario Busqueda -->
                            <div class="row">
                                <div class="col-sm-6"> <!-- Titulo --> 
                                    <h3 class="card-title">Añada un nuevo Paciente</h3>
                                </div>
                                
                                <div class="col-sm-6"> <!-- NADA QUE HACER --> 
                                    <!-- NADA QUE HACER-->
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-row">      <!-- email y pass -->
                                <div class="form-group col-md-6"> <!-- email -->
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="mail" required>
                                </div>
                                <div class="form-group col-md-6"> <!-- Password -->
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="psw" required>
                                </div>
                            </div>
                            <div class="form-row">      <!-- Nombres y Apellido -->
                                <div class="form-group col-md-6"> <!-- Nombres -->
                                    <label for="inputNom">Nombres</label> 
                                    <input type="text" class="form-control" id="inputNom" placeholder="Nombres" name="nombre" required>
                                </div>
                                <div class="form-group col-md-6"> <!-- Apellidos -->
                                    <label for="inputApe">Apellidos</label>
                                    <input type="text" class="form-control" id="inputApe" placeholder="Apellidos" name="apellido" required>
                                </div>
                            </div>
                            <div class="form-group">    <!-- DNI -->
                                <label for="inputDNI">DNI</label>
                                <input type="text" class="form-control" id="inputDNI" placeholder="DNI" name="dni" required>
                            </div>
                            <div class="form-group">    <!-- Direccion -->
                                <label for="inputAddress">Direcci&oacute;n</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Calle Nro, Piso y Puerta" name="direccion" required>
                            </div>
                            <div class="form-row">      <!-- Localidad - Provincia - CP -->
                                <div class="form-group col-md-6"> <!-- Localidad -->
                                    <label for="inputCity">Localidad</label>
                                    <input type="text" class="form-control" id="inputCity" name="localidad" required>
                                </div>
                                <div class="form-group col-md-4"> <!-- Provincia -->
                                    <label for="inputProvincia">Provincia</label>
                                    <input type="text" class="form-control" id="inputProvincia" name="provincia" required>
                                </div>
                                <div class="form-group col-md-2"> <!-- CP -->
                                    <label for="inputZip">CP</label>
                                    <input type="text" class="form-control" id="inputZip" name="cp" pattern="[0-9]{5}" required>
                                </div>
                            </div>
                            <div class="form-row">      <!-- telefonos 1 y 2 -->
                                <div class="form-group col-md-6"> <!-- telefono 1 -->
                                    <label for="inputTel1">Tel&eacute;fono #1</label>
                                    <input type="text" class="form-control" id="inputTel1" placeholder="Fijo o Cell" name="tel1" required>
                                </div>
                                <div class="form-group col-md-6"> <!-- telefono 2 -->
                                    <label for="inputTel2">Tel&eacute;fono #2</label>
                                    <input type="text" class="form-control" id="inputTel2" placeholder="Fijo o Cell" name="tel2">
                                </div>
                            </div>
                            <div class="form-group">    <!-- Comentario -->
                                <label for="ormControlTextarea1">Escriba un breve comentario sobre el paciente:</label>
                                <textarea class="form-control" id="FormControlTextarea1" rows="3" name="comentario"></textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row"> <!-- Boton del formulario -->
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary">Añadir</button>
                                    <a href="<?= base_url('Pacientes') ?>" type="button" class="btn btn-secondary">Salir</a>
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
    <?php else: ?> <!-- Formularios Edicion (3)  -->
        <section class="container mt-5">
            <div class="row">
                <div class="col">

                    <div class="card bg-light my-4">
                    <form action="<?= base_url('Pacientes/modifica') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $datos[0]->id ?>">
                        <div class="card-header"> <!-- Título y Formulario Busqueda -->
                            <div class="row">
                                <div class="col-sm-6"> <!-- Titulo --> 
                                    <h3 class="card-title">Modificando los datos de:</h3>
                                </div>
                                
                                <div class="col-sm-6"> <!-- NADA QUE HACER --> 
                                    <!-- NADA QUE HACER-->
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-row">      <!-- email y pass -->
                                <div class="form-group col-md-6"> <!-- email -->
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" value="<?= $datos[0]->mail ?>" placeholder="Email" name="mail" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="verificado" value="<?= $datos[0]->verificado ?>" id="Check1" <?= ($datos[0]->verificado) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="Check1">Mail Verificado?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">      <!-- Nombres y Apellido -->
                                <div class="form-group col-md-6"> <!-- Nombres -->
                                    <label for="inputNom">Nombres</label> 
                                    <input type="text" class="form-control" id="inputNom" value="<?= $datos[0]->nombres ?>" placeholder="Nombres" name="nombre" required>
                                </div>
                                <div class="form-group col-md-6"> <!-- Apellidos -->
                                    <label for="inputApe">Apellidos</label>
                                    <input type="text" class="form-control" id="inputApe" value="<?= $datos[0]->apellidos ?>" placeholder="Apellidos" name="apellido" required>
                                </div>
                            </div>
                            <div class="form-group">    <!-- DNI -->
                                <label for="inputDNI">DNI</label>
                                <input type="text" class="form-control" id="inputDNI" value="<?= $datos[0]->dni ?>" placeholder="DNI" name="dni" required>
                            </div>
                            <div class="form-group">    <!-- Direccion -->
                                <label for="inputAddress">Direcci&oacute;n</label>
                                <input type="text" class="form-control" id="inputAddress" value="<?= $datos[0]->dir ?>" placeholder="Calle Nro, Piso y Puerta" name="direccion" required>
                            </div>
                            <div class="form-row">      <!-- Localidad - Provincia - CP -->
                                <div class="form-group col-md-6"> <!-- Localidad -->
                                    <label for="inputCity">Localidad</label>
                                    <input type="text" class="form-control" id="inputCity" value="<?= $datos[0]->localidad ?>" name="localidad" required>
                                </div>
                                <div class="form-group col-md-4"> <!-- Provincia -->
                                    <label for="inputProvincia">Provincia</label>
                                    <input type="text" class="form-control" id="inputProvincia" value="<?= $datos[0]->provincia ?>" name="provincia" required>
                                </div>
                                <div class="form-group col-md-2"> <!-- CP -->
                                    <label for="inputZip">CP</label>
                                    <input type="text" class="form-control" id="inputZip" value="<?= $datos[0]->cp ?>" name="cp" pattern="[0-9]{5}" required>
                                </div>
                            </div>
                            <div class="form-row">      <!-- telefonos 1 y 2 -->
                                <div class="form-group col-md-6"> <!-- telefono 1 -->
                                    <label for="inputTel1">Tel&eacute;fono #1</label>
                                    <input type="text" class="form-control" id="inputTel1" value="<?= $datos[0]->tel1 ?>" placeholder="Fijo o Cell" name="tel1" required>
                                </div>
                                <div class="form-group col-md-6"> <!-- telefono 2 -->
                                    <label for="inputTel2">Tel&eacute;fono #2</label>
                                    <input type="text" class="form-control" id="inputTel2" value="<?= $datos[0]->tel2 ?>" placeholder="Fijo o Cell" name="tel2">
                                </div>
                            </div>
                            <div class="form-group">    <!-- Comentario -->
                                <label for="ormControlTextarea1">Escriba un breve comentario sobre el paciente:</label>
                                <textarea class="form-control" id="FormControlTextarea1" rows="3" name="comentario"><?= $datos[0]->comentario ?></textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row"> <!-- Boton del formulario -->
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="<?= base_url('Pacientes/ficha/').$datos[0]->id ?>" type="button" class="btn btn-secondary">Ver Ficha</a>
                                    <a href="<?= base_url('Pacientes') ?>" type="button" class="btn btn-secondary">Salir</a>
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
    <?php endif ?>