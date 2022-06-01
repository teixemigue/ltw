<?php
  declare(strict_types = 1);

  class Order {
    public int $id;
    public float $price;
    public int $quantity;
    public string $date;
    public string $state;
    public int $user;
    public int $restaurant;
    public int $dish;

    public function __construct(int $id, string $name, float $price, string $photo, string $description, string $category, int $restaurant) {
      $this->id = $id;
      $this->name = $name;
      $this->price = $price;
      $this->photo = $photo;
      $this->description = $description;
      $this->category = $category;
      $this->restaurant = $restaurant;
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

    function save($db) {
      $stmt = $db->prepare('
        UPDATE Dish SET name = ?, price = ?, photo = ?, descrip = ?, category = ?, restaurant = ?
        WHERE idDish = ?
      ');

      $stmt->execute(array($this->name, $this->price, $this->photo, $this->descrip, $this->category, $this->restaurant, $this->id));
    }
  
  }
?>