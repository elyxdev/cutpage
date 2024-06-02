<?php 
require 'header.php';
if ($_SESSION['lg_in'] != 1) {
  header("Location: login.php"); exit;
}
?>

      <form class="papaya" action="new_route.php" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Código de rastreo</label>
          <input type="password" placeholder="Deje en blanco para generarlo automáticamente." name="trackcode" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Página de destino</label>
          <input placeholder="Ej: www.youtube.com" class="form-control" id="exampleInputPassword1" name="url_destino" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Custom URL</label>
            <input placeholder="Deje en blanco si usará una url autogenerada" name="url_acortada" class="form-control">
          </div>
        <button type="submit" class="btn btn-primary">Crear</button>
      </form>

<?php 
require 'footer.php';
?>