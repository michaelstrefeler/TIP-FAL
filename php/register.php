<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Entête -->
  <?php include 'include/header.php'; ?>
</head>

<body class="body-wrapper">
  <!-- Barre de navigation -->
  <?php include 'include/nav.php'; ?>

  <section class="login py-5 border-top-1">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8 align-item-center">
          <div class="border border">
            <h3 class="bg-gray p-4">Créer un compte</h3>
            <form action="#">
              <fieldset class="p-4">
                <input type="email" placeholder="Email" class="border p-3 w-100 my-2">
                <input type="password" placeholder="Mot de passe" class="border p-3 w-100 my-2">
                <input type="password" placeholder="Confirmation du mot de passe" class="border p-3 w-100 my-2">
                <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Créer un compte</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Pied de page -->
  <?php include_once "include/footer.php"; ?>

  <!-- JAVASCRIPT -->
  <?php include_once "include/scripts.php"; ?>

</body>

</html>