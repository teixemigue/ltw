<?php 
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawHeader(Session $session) { ?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>LTW Eats</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/script.js" defer></script>
  </head>
  <body>

    <header>
      <h1><a href="/">LTW Eats</a></h1>
      <?php 
        if ($session->isLoggedIn()) drawLogoutForm($session);
        else drawLoginForm($session);
      ?>
    </header>
  
    <main>
<?php } ?>

<?php function drawFooter() { ?>
    </main>

    <footer>
      LTW Eats &copy; 2022
    </footer>
  </body>
</html>
<?php } ?>

<?php function drawLoginForm() { ?>
  <form action="../actions/action_login.php" method="post" class="login">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <a href="../pages/register.php">Register</a>
    <button type="submit">Login</button>
  </form>
<?php } ?>

<?php function drawLogoutForm(Session $session) { ?>
  <form action="../actions/action_logout.php" method="post" class="logout">
    <a href="../pages/profile.php"><?=$session->getName()?></a>
    <img class="userphoto" src=<?=$session->getImagePath()?> alt="Profile picture" width=50 height=50>
    <button type="submit">Logout</button>
  </form>
<?php } ?>
