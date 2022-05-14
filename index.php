<?php
  $db = new PDO('sqlite:restDB.db');

  $stmt = $db->prepare('SELECT * FROM Dish');
  $stmt->execute();
  $dishes = $stmt->fetchAll();

  foreach( $dishes as $dish) {
    echo '<h1>' . $dish['name'] . '</h1>';
    echo '<h2>' . $dish['descrip'] . '</h2>';
  }
?>