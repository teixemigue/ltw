<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');

  require_once(__DIR__ . '/../database/restaurant.class.php');
  require_once(__DIR__ . '/../database/dish.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/restaurant.tpl.php');
  require_once(__DIR__ . '/../templates/review.tpl.php');

  $db = getDatabaseConnection();

  $restaurant = Restaurant::getRestaurant($db, intval($_GET['id']));
  $dishes = Dish::getRestaurantDishes($db, intval($_GET['id']));
  $reviews = Review::getReviewsFromRestaurant($db, intval($_GET['id']));

  drawHeader($session);
  drawRestaurant($restaurant, $dishes);

  if($session->isLoggedIn()) {
    $userreview = getUserReview($session->getId(), $reviews);
    echo var_dump($userreview);
    if(is_null($userreview) && ($session->getId() !== $restaurant->owner))
      drawAddReview(intval($_GET['id']));
    else if(!is_null($userreview))
      drawUserReview($userreview);
  }

  drawReviews($reviews);
  drawFooter();
?>