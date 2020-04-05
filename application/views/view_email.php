    <!-- EMAIL -->
    <section class=" py-5" id="contacto">
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <h3>Consultas</h3>
            <p>
              Env&iacute;enos su consulta:
            </p>
            <form action="<?= base_url() ?>Email/enviar" method="POST">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <i class="fas fa-user input-group-text" style="color: #9a5680;"></i>
                </div>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <i class="fas fa-envelope input-group-text" style="color: #9a5680;"></i>
                </div>
                <input type="email" class="form-control" name="mail" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <i class="fas fa-pencil-alt input-group-text" style="color: #9a5680;"></i>
                </div>
                <textarea name="cuerpomail" cols="30" rows="10" placeholder="Mensage" class="form-control"></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            </form>
          </div>
          <div class="col-sm-3 align-self-center">
            <img src="<?= base_url() ?>assets/img/logo01.svg"  style="width: 100%;" alt="Logo">
          </div>
        </div>
      </div>
    </section>