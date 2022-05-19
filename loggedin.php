<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Nome</title>
<link href="main.css" rel="stylesheet">
</head>
<body>
    <?php
      session_start();
      $username = $_SESSION['username'];
      echo "$username";
      $db = new PDO('sqlite:restDB.db');

      $stmt = $db->prepare('SELECT * FROM User WHERE username = ?');

      //bind query parameters to placeholders and execute query
      $stmt->execute(array($username));
      $res = $stmt->fetchAll();
      $photo = $res[0]['photo'];
      echo "<img src='".$photo."'>";
      $db = NULL;
    ?>
    <header id="maintitle">
        <h1><a href="loggedin.php">Nome do restaurante</a></h1>
        <h2><a href="loggedin.php">Where hungry is a thing of the past!</a></h2>
        
    </header>
    
    <nav id="restmenu">
        <ul>
            <li><a href="loggedin.php">Japonesa</a></li>
            <li><a href="loggedin.php">Mexicana</a></li>
            <li><a href="loggein.php">Italiana</a></li>
            
        </ul>

    </nav>
    <?php
        $db = new PDO('sqlite:restDB.db');

        $stmt = $db->prepare('SELECT * FROM Dish');
        $stmt->execute();
        $dishes = $stmt->fetchAll();

        foreach( $dishes as $dish) {
          //echo '<h1>' . $dish['name'] . '</h1>';
          
          echo "<img src='".$dish['photo']."'>";
        }
        $db = NULL;
        
    ?>
    <div class="topnav">
        <div class="search-container">
            <form action="" method="post" class="form">
                <input type="search" placeholder="Search" class="search-field" name="search" />
                <button type="submit" class="search-button">
                  <img src="photos\lupa.png" >
                </button>
            </form>
        </div>
    </div>
    <?php
        $db = new PDO('sqlite:restDB.db');

        $stmt = $db->prepare('SELECT * FROM Restaurant WHERE name=?');
        $stmt->execute(array($_POST['search']));
        $rests = $stmt->fetchAll();

        $photo = $rests[0]['name'];
      
        echo '<h3>' . $photo . '</h3>';
          
        
        $db = NULL;
    ?>
    <section id="cart">
        <table>
          <thead>
            <tr><th>Id</th><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th></tr>
          </thead>
          <tfoot>
            <tr><th colspan="4">Total:</th><th>0</th></tr>
          </tfoot>
        </table>
      </section>
</body>
</html>