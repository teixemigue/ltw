<?php
  declare(strict_types = 1);

  class Restaurant {
    public int $id;
    public string $name;
    public string $address;
    public string $photo;
    public string $category;
    public int $owner;
    public ?float $avgscore;

    public function __construct(int $id, string $name, string $address, string $photo, string $category, int $owner, ?float $avgscore) {
      $this->id = $id;
      $this->name = $name;
      $this->address = $address;
      $this->photo = $photo;
      $this->category = $category;
      $this->owner = $owner;
      $this->avgscore = $avgscore;
    }

    static function getRestaurantCategories(PDO $db) : array {
      $stmt = $db->prepare('
          SELECT DISTINCT category
          FROM Restaurant
        ');
      $stmt->execute();

      $categories = array();

      while($category = $stmt->fetch()) {
        $categories[] = $category['category'];
      }

      return $categories;
    }

    static function getRestaurants(PDO $db) : array {
        $stmt = $db->prepare('
          SELECT idRestaurant, name, address, photo, category, idOwner, AVG(grade) AS avgscore
          FROM Restaurant LEFT JOIN Review ON Restaurant.idRestaurant = Review.restaurant
          GROUP BY idRestaurant
        ');
        $stmt->execute();
    
        $restaurants = array();
        
        while ($restaurant = $stmt->fetch()) {
          $restaurants[] = new Restaurant(
            intval($restaurant['idRestaurant']), 
            $restaurant['name'],
            $restaurant['address'],
            $restaurant['photo'],
            $restaurant['category'],
            intval($restaurant['idOwner']),
            floatval($restaurant['avgscore'])
          );
        }
          return $restaurants;

      }
    
    static function getRestaurantsByCategory(PDO $db, string $category) : array {
      $stmt = $db->prepare('
      SELECT idRestaurant, name, address, photo, category, idOwner, AVG(grade) AS avgscore
      FROM Restaurant LEFT JOIN Review ON Restaurant.idRestaurant = Review.restaurant
      WHERE category = ?
      GROUP BY idRestaurant
      ');
      $stmt->execute(array($category));
    
      $restaurants = array();
        
      while ($restaurant = $stmt->fetch()) {
          $restaurants[] = new Restaurant(
            intval($restaurant['idRestaurant']), 
            $restaurant['name'],
            $restaurant['address'],
            $restaurant['photo'],
            $restaurant['category'],
            intval($restaurant['idOwner']),
            floatval($restaurant['avgscore'])
          );
        }
      return $restaurants;
    }

    static function getRestaurantsWithName(PDO $db, string $name) : array {
      $stmt = $db->prepare('
        SELECT idRestaurant, name, address, photo, category, idOwner, AVG(grade) AS avgscore
        FROM Restaurant LEFT JOIN Review ON Restaurant.idRestaurant = Review.restaurant
        GROUP BY idRestaurant
      ');

      $stmt->execute();

      $restaurants = array();

      while($restaurant = $stmt->fetch()) {
        if(strpos(strtolower($restaurant['name']), strtolower($name)) !== false) {
          $restaurants[] = new Restaurant(
            intval($restaurant['idRestaurant']), 
            $restaurant['name'],
            $restaurant['address'],
            $restaurant['photo'],
            $restaurant['category'],
            intval($restaurant['idOwner']),
            floatval($restaurant['avgscore'])
          );
        }
      }

      return $restaurants;
    }
    
    static function getOwnerRestaurants(PDO $db, int $id) : array {
      $stmt = $db->prepare('
      SELECT idRestaurant, name, address, photo, category, idOwner, AVG(grade) AS avgscore
      FROM Restaurant LEFT JOIN Review ON Restaurant.idRestaurant = Review.restaurant
      WHERE idOwner = ?
      GROUP BY idRestaurant
      ');
      
      $stmt->execute(array($id));
  
      $restaurants = array();
  
      while ($restaurant = $stmt->fetch()) {
        $restaurants[] = new Restaurant(
          intval($restaurant['idRestaurant']), 
          $restaurant['name'],
          $restaurant['address'],
          $restaurant['photo'],
          $restaurant['category'],
          intval($restaurant['idOwner']),
          floatval($restaurant['avgscore'])
        );
      }
  
      return $restaurants;
    }
    
    static function getRestaurant(PDO $db, int $id) : Restaurant {
      $stmt = $db->prepare('
        SELECT idRestaurant, name, address, photo, category, idOwner, AVG(grade) AS avgscore
        FROM Restaurant LEFT JOIN Review ON Restaurant.idRestaurant = Review.restaurant
        WHERE idRestaurant = ?
        GROUP BY idRestaurant
      ');
      $stmt->execute(array($id));
  
      $restaurant = $stmt->fetch();

      return new Restaurant(
        intval($restaurant['idRestaurant']), 
        $restaurant['name'],
        $restaurant['address'],
        $restaurant['photo'],
        $restaurant['category'],
        intval($restaurant['idOwner']),
        floatval($restaurant['avgscore'])
      );
    }
  }
?>