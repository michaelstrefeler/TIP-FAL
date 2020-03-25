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
            <h3 class="bg-gray p-4">Ein Konto erstellen</h3>
            <form action="add-user.php" method="post">
              <fieldset class="p-4">
                <input type="text" id="firstname" name="firstName" placeholder="Vorname" class="border p-3 w-100 my-2" pattern="^[A-Z a-z-]{0,30}$" required>
                <input type="text" id="lastname" name="lastName" placeholder="Nachname" class="border p-3 w-100 my-2" pattern="^[A-Z a-z-]{0,30}$" required>
                <input type="text" id="username" name="username" placeholder="Benutzername" class="border p-3 w-100 my-2" pattern="^[A-Z a-z_0-9-]{0,30}$" required>
                <select id="meansofcontact" name="meansOfContact" class="border p-3 w-100 my-2" required>
                  <option selected disabled>Kontaktmittel</option>
                  <option value="tel">Handy</option>
                  <option value="email">E-mail</option>
                  <option value="autre">Anderes</option>
                </select>
                <input type="text" id="contactinfo" name="contactInfo" placeholder="Handynummer, E-mail oder anderes" class="border p-3 w-100 my-2" required>
                <input type="password" id="password" name="password" placeholder="Password" class="border p-3 w-100 my-2" pattern="^.{8,60}$" title="Minimum 8 caractères" required>
                <input type="password" id="verifypassword" name="verifypassword" placeholder="Passwort bestätigen" pattern="^.{8,60}$" class="border p-3 w-100 my-2" required>
                <script>
                  var password = document.getElementById("password"),
                    confirm_password = document.getElementById("verifypassword");

                  function validatePassword() {
                    if (password.value != confirm_password.value) {
                      confirm_password.setCustomValidity("Die Passwörter sind nicht gleich!");
                    } else {
                      confirm_password.setCustomValidity('');
                    }
                  }

                  password.onchange = validatePassword;
                  confirm_password.onkeyup = validatePassword;
                </script>
                <br><br>
                <button type="submit"
                  class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Ein Konto erstellen</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Pied de seite -->
  <?php include_once "include/footer.php"; ?>

  <!-- JAVASCRIPT -->
  <?php include_once "include/scripts.php"; ?>

</body>

</html>