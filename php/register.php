<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Entête -->
  <?php include 'include/header.php'; ?>
</head>

<body class="body-wrapper">
  <!-- Barre de navigation -->
  <?php 
    include 'include/nav.php'; 
    include_once 'include/objDB.php';
		$connection = new objDB();
  ?>

  <section class="login py-5 border-top-1">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8 align-item-center">
          <div class="border border">
            <h3 class="bg-gray p-4">Créer un compte</h3>
            <form action="addUser.php" method="post">
              <fieldset class="p-4">
                <input type="text" id="firstname" name="firstName" placeholder="Prénom" class="border p-3 w-100 my-2" pattern="^[A-Z a-z-]{0,30}$" required>
                <input type="text" id="lastname" name="lastName" placeholder="Nom" class="border p-3 w-100 my-2" pattern="^[A-Z a-z-]{0,30}$" required>
                <input type="text" id="username" name="username" placeholder="Pseudo" class="border p-3 w-100 my-2" pattern="^[A-Z a-z_0-9-]{0,30}$" required>
                 <select id="meansofcontact" name="meansOfContact" class="border p-3 w-100 my-2" required>
                  <option selected disabled>Moyen de contact</option>
                  <option value="tel">Téléphone</option>
                  <option value="email">Email</option>
                  <option value="autre">Autre</option>
                </select> 
                <input type="text" id="contactinfo" name="contactInfo" placeholder="Numéro de téléphone ou email ou autre" class="border p-3 w-100 my-2" required>                 
                <input type="password" id="password" name="password" placeholder="Mot de passe" class="border p-3 w-100 my-2" pattern="^.{8,60}$" title="Minimum 8 caractères" required>
                <input type="password" id="verifypassword" name="verifypassword" placeholder="Confirmation du mot de passe" pattern="^.{8,60}$" class="border p-3 w-100 my-2" required>
                <script>
                  var password = document.getElementById("password")
                  , confirm_password = document.getElementById("verifypassword");

                  function validatePassword(){
                    if(password.value != confirm_password.value) {
                      confirm_password.setCustomValidity("Les mots de passe ne correspondent pas!");
                      } else {
                        confirm_password.setCustomValidity('');
                        }
                  }
                  
                  password.onchange = validatePassword;
                  confirm_password.onkeyup = validatePassword;
                </script>
                <br><br>
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