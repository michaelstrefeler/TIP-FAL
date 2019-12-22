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
          <div class="border">
            <h3 class="bg-gray p-4">Se connecter</h3>
            <form action="#">
              <fieldset class="p-4">
                <input type="text" placeholder="Username" class="border p-3 w-100 my-2">
                <input type="password" placeholder="Password" class="border p-3 w-100 my-2">
                <div class="loggedin-forgot">
                  <input type="checkbox" id="keep-me-logged-in">
                  <label for="keep-me-logged-in" class="pt-3 pb-2">Se souvenir de moi</label>
                </div>
                <button type="submit"
                  class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Se connecter</button>
                <!-- TODO: faire fonctionner la modification du mot de passe s'il est oublié -->  
                <a class="mt-3 d-block  text-primary" href="#">Mot de passe oublié?</a>
                <a class="mt-3 d-inline-block text-primary" href="register.php?page=Créer un compte">Créer un compte</a>
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