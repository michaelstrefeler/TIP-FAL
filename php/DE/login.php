<?php
if(session_status() == PHP_SESSION_NONE){
  session_start();
}
?>
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
    $objDB = new objDB();
    $users = $objDB->getAllUsers();
    unset($objDB);
    $nbrUsers = count($users);
  ?>

  <section class="login py-5 border-top-1">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8 align-item-center">
          <div class="border">
            <h3 class="bg-gray p-4">Anmelden</h3>
            <form method="post">
              <fieldset class="p-4">
                <input type="text" name="username" id="username" placeholder="Benutzername" class="border p-3 w-100 my-2"
                  required>
                <input type="password" name="password" id="password" placeholder="Passwort"
                  class="border p-3 w-100 my-2" required>
                <button type="submit"
                  class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Anmelden</button>
                <a class="mt-3 d-inline-block text-primary" href="register.php?seite=Konto-erstellen">Ein Konto erstellen</a>
              </fieldset>
            </form>

            <?php
              //Si le formulaire a été rempli
              if(isset($_POST['username']) && isset($_POST['password'])){
                $isRealAccount=false;
                for($x = 0; $x<$nbrUsers; $x++){
                  //If pour vérifier le login et le mot de passe
                  if($_POST['username'] == $users[$x]['username'] && password_verify($_POST['password'], $users[$x]['password'])){
                    $_SESSION['username']= $users[$x]['username'];
                    $isRealAccount = true;
                  }
                }
                if($isRealAccount == true){
                  echo "<meta http-equiv='refresh' content='0; URL=user-profile.php?seite=Konto&lang=DE'>";
                }else{
                  echo "<p style='color: red'>Benutzername oder Passwort falsch!</p>";
                }
              }
            ?>
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