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
    <link rel="stylesheet" href="../css/common.css">
    <script src="javascript/script.js" defer></script>
  </head>
  <body>

    <header>
      <h1><a href="/">LTW Eats</a></h1>
      <?php 
        if ($session->isLoggedIn())
        {
          drawLogoutForm($session);
          drawSidebar($session);
        } 
        else drawLoginForm($session);
      ?>
    </header>
    <section id="messages">
      <?php foreach ($session->getMessages() as $messsage) { ?>
        <article class="<?=$messsage['type']?>">
          <?=$messsage['text']?>
        </article>
      <?php } ?>
    </section>
  
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
    
    
    <button type="submit">Logout</button>
  </form>
<?php } ?>

<?php function drawSidebar(Session $session) { ?>
  <div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <img class="userphoto" src=<?=$session->getImagePath()?> alt="Profile picture" width=50 height=50>
  <p><?=$session->getName()?> </p>
  <a href="../pages/profile.php">Edit Profile</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
  <a href="#">&#128722;</a>
  
  </div>

  <div id="main">
    <button id="buttonsidebar" class="openbtn" onclick="openNav()">☰</button>  
    
  </div>

  <script>
  function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.getElementById("buttonsidebar").style.visibility = "hidden";
  }

  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("buttonsidebar").style.visibility = "visible";
  }
  </script>
<?php } ?>
