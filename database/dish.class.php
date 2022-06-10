<?php
  declare(strict_types = 1);

  class Dish {
    public int $id;
    public string $name;
    public float $price;
    public string $photo;
    public string $description;
    public string $category;
    public int $restaurant;

    public function __construct(int $id, string $name, float $price, string $photo, string $description, string $category, int $restaurant) {
      $this->id = $id;
      $this->name = $name;
      $this->price = $price;
      $this->photo = $photo;
      $this->description = $description;
      $this->category = $category;
      $this->restaurant = $restaurant;
    }

    function save($db) {
      if(!empty($photo))
        $this->photo = self::uploadPhoto($photo, strval($this->id));

      $stmt = $db->prepare('
        UPDATE Dish SET name = ?, price = ?, photo = ?, descrip = ?, category = ?, restaurant = ?
        WHERE idDish = ?
      ');

      $stmt->execute(array($this->name, $this->price, $this->photo, $this->description, $this->category, $this->restaurant, $this->id));
    }

    static function uploadPhoto(string $photo, string $id) : string {
      $path = "/../photos/dish/$id.jpg";

      unlink(__DIR__ . $path);
      move_uploaded_file($photo, __DIR__ . $path);

      return $path;
    }

    static function removeDish(PDO $db, int $id) {
    $stmt = $db->prepare('
      DELETE FROM Dish
      WHERE idDish = ?
    ');

    $stmt->execute(array($id));
    
    }

    static function getRestaurantDishes(PDO $db, int $id) : array {
      $stmt = $db->prepare('
        SELECT idDish, name, price, photo, descrip, category, restaurant
        FROM Dish 
        WHERE restaurant = ?
        GROUP BY idDish
      ');
      $stmt->execute(array($id));

      $dishes = array();

      while ($dish = $stmt->fetch()) {
        $dishes[] = new Dish(
          intval($dish['idDish']), 
          $dish['name'],
          floatval($dish['price']),
          $dish['photo'],
          $dish['descrip'],
          $dish['category'],
          intval($dish['restaurant']),
        );
      }
  
      return $dishes;
    }

    static function getDish(PDO $db, int $id) : Dish {
      $stmt = $db->prepare('
        SELECT idDish, name, price, photo, descrip, category, restaurant
        FROM Dish 
        WHERE idDish = ?
      ');
      $stmt->execute(array($id));
  
      $dish = $stmt->fetch();
  
      return new Dish(
        intval($dish['idDish']), 
        $dish['name'],
        floatval($dish['price']),
        $dish['photo'],
        $dish['descrip'],
        $dish['category'],
        intval($dish['restaurant']),
      );
    }
  }
?>