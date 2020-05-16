    <!-- NAVIGATION (menu) -->
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #9a5680;">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>#">
                <img src="<?= base_url('assets/img/logo01.svg') ?>" style="height: 40px;">
            </a>
            <div class="text-white">
                <?php if ($this->session->logged ):?>
                Bienvenida/o: <?= $this->session->userdata('username') ?>
                <?php endif; ?>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- Opciones del Administrador -->
                    <?php if ($this->session->logged && $this->session->nivel == 1):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administración
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= base_url('Pacientes') ?>">Pacientes</a>
                                <a class="dropdown-item" href="<?= base_url('#') ?>">Turnos Pendientes</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('Historial') ?>">Historias Clínicas</a>
                            </div>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('#servicios') ?>">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('#proyectos') ?>">Proyectos</a>
                    </li>
                    <li class="nav-item">
                     <a class="nav-link" href="<?= base_url('#contacto') ?>">Contacto</a>
                    </li>
                    <?php if ($this->session->logged ):?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/Agenda')?>">Turnos</a>
                        </li>              
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/Inicio/salir')?>">Cerrar Sesion </a>
                        </li>    
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>