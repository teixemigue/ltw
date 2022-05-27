<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/restaurant.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/restaurant.tpl.php');

  $db = getDatabaseConnection();
  if($_GET['search'] != null)
    $restaurants = Restaurant::getRestaurantsWithName($db, $_GET['search']);
  else {
    if($_GET['category'] != null)
      $restaurants = Restaurant::getRestaurantsByCategory($db, $_GET['category']);
    else
      $restaurants = Restaurant::getRestaurants($db);
  }

  $categories = Restaurant::getRestaurantCategories($db);

  drawHeader($session);
  drawSearchBar();
  drawCategories($categories);
  drawRestaurants($restaurants);
  drawFooter();
?>
