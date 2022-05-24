<?php 
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawHeader(Session $session) { ?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Eats</title>
    <link rel = "icon" href = "../photos/site/whitelogo.png" type = "image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/common.css">
    <script src="javascript/script.js" defer></script>
  </head>
  <body>

    <header class="header">
      <img src="photos/site/whitelogo.png" class="logo">
      <h1 class="title">Let's Eat</h1>
      <h4 class="catch">Where hungry is a thing of the past!</h4>
    </header>
    <section id="messages">
      <?php foreach ($session->getMessages() as $messsage) { ?>
        <article class="<?=$messsage['type']?>">
          <?=$messsage['text']?>
        </article>
      <?php } ?>
    </section>
  
    <main>
    <?php 
        if ($session->isLoggedIn())
        {
          drawLogoutForm($session);
          drawSidebar($session);
        } 
        else drawLoginForm($session);
    ?>
<?php } ?>

<?php function drawFooter() { ?>
    </main>

    <footer>
      <div>
        <h3 id="foot">Let's Eat &copy; 2022</h3>
      </div>
    </footer>
  </body>
</html>
<?php } ?>

<?php function drawLoginForm() { ?>
  <a href="../pages/register.php" class="register">Register</a> 
  <form action="../actions/action_login.php" method="post" enctype="multipart/form-data">
    <div class="login">
      <label for="Username">Username</label>
      <input type="text" name="username" placeholder="username">
      <label for="Password">Password</label>
      <input type="password" name="password" placeholder="password">
      <button type="submit">Login</button>
    </div>
  </form>
<?php } ?>

<?php function drawLogoutForm(Session $session) { ?>
  <form action="../actions/action_logout.php" method="post" class="logout">
    <button type="submit">Logout</button>
  </form>
<?php } ?>

<?php function drawSidebar(Session $session) { ?>
  <div id="mySidebar" class="sidebar">
    <nav class="menu">
      <ul>
        <li id="user">
          <img class="userphoto" src=<?=$session->getImagePath()?> alt="Profile picture" width=50 height=50>
          <p class ="username"><?=$session->getName()?> </p>
        </li>
        <li><a href="../pages/profile.php">Edit Profile</a></li>
        <li><a href="#">Clients</a></li>
        <li><a href="#">&#128722;</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="javascript:void(0)" class="closebar" onclick="closeNav()">×</a></li>
      </ul>
</div>
</nav>

  <div id="main">
    <button id="buttonsidebar" class="openbar" onclick="openNav()">☰</button>  
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
