<?php
require 'header.php';
if ($_SESSION['lg_in'] == 1) {
    header("Location: index.php"); exit;
}
?>

<section class="vh-100" style="background-color: #000; text-align:center; width:700px; margin:auto;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="./reg_auth.php" method="post">

                  <div class="align-items-center" style="margin: 10px;">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0" >Cutpage</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Registrar un usuario</h5>

                  <div class="form-outline mb-4">
                    <input name="nombre" id="form2Example17" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form2Example17">Nombre de usuario</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input name="correo_electronico" type="email" id="form2Example17" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form2Example17">Correo electrónico</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="contrasena" id="form2Example27" name="contrasena" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form2Example27">Contraseña</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="confirmar_contrasena" id="form2Example27" name="contrasena" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form2Example27">Confirmar contraseña</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Registrarse</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Ya tienes una cuenta? <a href="login.php" style="color: #393f81;">Inicia sesión</a></p>
                  <a href="#!" class="small text-muted">Términos de uso.</a>
                  <a href="#!" class="small text-muted">Política de privacidad</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require 'footer.php';
?>