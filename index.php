<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <!-- CSS only Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- Icons Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <title>Send E-Mail PHP | alejandroalsa</title>
</head>
<body>
  <div class="container py-5 px-5 mx-auto">
    <h1>Envía un formulario a un E-Mail desde PHP</h1>
    <?php if (isset($_SESSION["flash"])): ?>
      <div class="alert alert-success alert-dismissible  bg-success text-white fade show mt-3" role="alert">
        <i class="bi bi-check-circle-fill"></i>
        <strong>Mensaje Enviado!</strong> El mensaje a sido enviado correctamente a <strong><?= $_SESSION["flash"]["email"] ?>  
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION["flash"]) ?>
    <?php endif ?>
    <form class="row g-3" action="send_mail.php" method="POST">
      <div class="col-md-4">
        <label class="form-label" for="name">Nombre</label>
        <input type="text" class="form-control" placeholder="Su nombre" id="name" name="name" required>
      </div>
      <div class="col-md-4">
        <label class="form-label" for="surename">Apellidos</label>
        <input type="text" class="form-control" placeholder="Sus apellidos" id="surename" name="surename" required>
      </div>
      <div class="col-md-4">
        <label class="form-label" for="user">Usuario</label>
        <div class="input-group">
          <span class="input-group-text" id="inputGroupPrepend2">@</span>
          <input type="text" class="form-control" placeholder="Usuario habitual" id="user" name="user" aria-describedby="inputGroupPrepend2" required>
        </div>
      </div>
      <div class="col-md-4">
        <label class="form-label" user="email">Correo Electrónico</label>
        <input type="text" class="form-control" placeholder="Un correo que use" id="email" name="email" required>
      </div>
      <div class="col-md-4">
        <label class="form-label" for="phone_number">Teléfono</label>
        <input type="text" class="form-control" placeholder="Su número de teléfono" id="phone_number" name="phone_number" required>
      </div>
      <div class="col-md-4">
        <label class="form-label"for="country">País</label>
        <input type="text" class="form-control" placeholder="País de residencia" id="country" name="country" required>
      </div>
      <div>
        <label class="form-label" for="menssage">Mensaje</label>
        <textarea class="form-control" placeholder="Escriba aquí su mensaje" id="menssage" name="menssage" style="height: 100px"></textarea>
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="Aceptada" id="privacy_policy" name="privacy_policy" required>
          <label class="form-check-label">
            <a href="###">Política de Privacida</a>
          </label>
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Enviar Mensaje</button>
      </div>
    </form>
  </div>
</body>
</html>
