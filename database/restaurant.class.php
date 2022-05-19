<?php
  declare(strict_types = 1);

  class Restaurant {
    public int $id;
    public string $name;
    public string $address;
    public string $photo;
    public string $category;
    public int $owner;

    public function __construct(int $id, string $name, string $address, string $photo, string $category, int $owner) {
      $this->id = $id;
      $this->name = $name;
      $this->address = $address;
      $this->photo = $photo;
      $this->category = $category;
      $this->owner = $owner;
    }

    static function getRestaurants(PDO $db) : array {
        $stmt = $db->prepare('
          SELECT idRestaurant, name, address, photo, category, idOwner
          FROM Restaurant
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
              intval($restaurant['idOwner'])
            );
          }
          return $restaurants;

      }

    static function getOwnerRestaurants(PDO $db, int $id) : array {
      $stmt = $db->prepare('
        SELECT idRestaurant, name, address, photo, category, idOwner
        FROM Restaurant
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
          intval($restaurant['idOwner'])
        );
      }
  
      return $restaurants;
    }

    static function getRestaurant(PDO $db, int $id) : Restaurant {
      $stmt = $db->prepare('
        SELECT idRestaurant, name, address, photo, category, idOwner
        FROM Restaurant
        WHERE idRestaurant = ?
      ');
      $stmt->execute(array($id));
  
      $restaurant = $stmt->fetch();

      return new Restaurant(
        intval($restaurant['idRestaurant']), 
        $restaurant['name'],
        $restaurant['address'],
        $restaurant['photo'],
        $restaurant['category'],
        intval($restaurant['idOwner'])
      );
    }
}
?>