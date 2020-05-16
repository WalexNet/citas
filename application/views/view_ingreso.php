    <!-- INGRESO  -->
    <section id="newsletter" class=" text-white py-5" style="background-color: #9a5680;">
        <div class="container">
            <?php if($errorRegistro): ?>
            <!-- Mensage de Error de registro -->
            <div class="row">
                <div class="col">
                <div class="alert alert-warning" role="alert">
                    <p class="text-center">La contrase&ntilde;a o mail ingresado no son v&aacute;lidos, o usted no esta dado de alta. <br> Para pedir una cita debe darse de alta.</p>
                    <p class="text-center">Vuelva a intentarlo o dese de Alta</p>
                    <a href="#">
                    <p class="text-center"><button type="button" class="btn btn-light" data-toggle="modal" data-target="#formModal">Crear Cuanta</button></p>
                    </a>
                </div>
                </div>
            </div>
            <!-- Fin mensaje de error -->
            <?php endif; ?>

            <!-- Mensaje error Mail existe -->
            <?php if($this->session->mail_existe == true): ?>
                <div class="row">
                    <div class="col">
                    <div class="alert alert-warning" role="alert">
                        <p class="text-center">El mail que ha ingresado ya <b>EXISTE</b> en nuestra base de datos</p>
                        <p class="text-center">Vuelva a intentarlo <?= $this->session->mail_existe ?> </p>
                        <a href="#">
                        <p class="text-center"><button type="button" class="btn btn-light" data-toggle="modal" data-target="#formModal">Crear Cuenta</button></p>
                        </a>
                    </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Mensaje error Mail no verificado -->
            <?php if((!$this->session->verificado) && ($this->session->logged)): ?>
            <div class="row">
                <div class="col">
                <div class="alert alert-warning" role="alert">
                    <p class="text-center">Su mail no se ha verificado</p>
                    <p class="text-center">Vuelva a intentarlo </p>
                    <a href="#">
                    <p class="text-center"><button type="button" class="btn btn-light" data-toggle="modal" data-target="#formModal">Crear Cuenta</button></p>
                    </a>
                </div>
                </div>
            </div>
            <?php endif; ?>

            <form action="<?= base_url('Inicio/entrar') ?>" method="post"> <!-- Ingreso -->
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="text-white text-center">Ingrese sus Datos para poder solicitar turno</h4>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <input type="email" class="form-control form-control-lg text-center my-2" name="mail" placeholder="Email" required>
                    </div>
                    <div class="col-md-4">
                    <input type="password" class="form-control form-control-lg text-center my-2" name="psw" placeholder="Contrase&ntilde;a" required>
                    </div>
                    <div class="col-md-4">
                    <input class="btn btn-primary btn-lg btn-block my-2" type="submit" value="Solicitar Turno">
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <a href="#">
                    <p class="text-white text-center" data-toggle="modal" data-target="#formModal">[Crear una cuenta Nueva]</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-body" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?= base_url() ?>Usuarios/cliadd" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingrese sus Datos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">              <!-- Formulario -->

                            <div class="form-row">              <!-- email y pass -->
                                <div class="form-group col-md-6"> <!-- email -->
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="mail" required>
                                </div>
                                <div class="form-group col-md-6"> <!-- Password -->
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="psw" required>
                                </div>
                            </div>
                            <div class="form-row">              <!-- Nombres y Apellido -->
                                <div class="form-group col-md-6"> <!-- Nombres -->
                                    <label for="inputNom">Nombres</label> 
                                    <input type="text" class="form-control" id="inputNom" placeholder="Nombres" name="nombre" required>
                                </div>
                                <div class="form-group col-md-6"> <!-- Apellidos -->
                                    <label for="inputApe">Apellidos</label>
                                    <input type="text" class="form-control" id="inputApe" placeholder="Apellidos" name="apellido" required>
                                </div>
                            </div>
                            <div class="form-group">            <!-- DNI -->
                                <label for="inputDNI">DNI</label>
                                <input type="text" class="form-control" id="inputDNI" placeholder="DNI" name="dni" required>
                            </div>
                            <div class="form-group">            <!-- Direccion -->
                                <label for="inputAddress">Direcci&oacute;n</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Calle Nro, Piso y Puerta" name="direccion" required>
                            </div>
                            <div class="form-row">              <!-- Localidad - Provincia - CP -->
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
                            <div class="form-row">              <!-- telefonos 1 y 2 -->
                                <div class="form-group col-md-6"> <!-- telefono 1 -->
                                    <label for="inputTel1">Tel&eacute;fono #1</label>
                                    <input type="text" class="form-control" id="inputTel1" placeholder="Fijo o Cell" name="tel1" required>
                                </div>
                                <div class="form-group col-md-6"> <!-- telefono 2 -->
                                    <label for="inputTel2">Tel&eacute;fono #2</label>
                                    <input type="text" class="form-control" id="inputTel2" placeholder="Fijo o Cell" name="tel2">
                                </div>
                            </div>
                            <!-- Comentario -->
                            <!-- <div class="form-group">            
                                <label for="ormControlTextarea1">Si desea puede exponer un breve comentario:</label>
                                <textarea class="form-control" id="FormControlTextarea1" rows="3" name="comentario"></textarea>
                            </div> -->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    </section>