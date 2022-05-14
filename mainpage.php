<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Nome</title>
<link href="main.css" rel="stylesheet">
</head>
<body>
    <header id="maintitle">
        <h1><a href="mainpage.php">Nome do restaurante</a></h1>
        <h2><a href="mainpage.php">Where hungry is a thing of the past!</a></h2>
        <div id="signup">
            <a href="resgisterrest.html">Register</a>
            <a href="login.html">Login</a>
          </div>
    </header>
    
    <nav id="restmenu">
        <ul>
            <li><a href="mainpage.php">Japonesa</a></li>
            <li><a href="mainpage.php">Mexicana</a></li>
            <li><a href="mainpage.php">Italiana</a></li>
            
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
        
    ?>
    <div class="topnav">
        <div class="search-container">
            <form action="/" method="GET" class="form">
                <input type="search" placeholder="Search" class="search-field" />
                <button type="submit" class="search-button">
                  <img src="photos\lupa.png" >
                </button>
            </form>
        </div>
    </div>
    
</body>
</html>