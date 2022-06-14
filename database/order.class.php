<?php
  declare(strict_types = 1);

  class Order {
    public int $idorder;
    public float $price;
    public int $quantity;
    public string $date;
    public string $state;
    public int $user;
    public int $restaurant;
    public int $dish;

    public function __construct(int $id, float $price, int $quantity, string $date, string $state, int $user,int $restaurant,int $dish) {
      $this->idorder = $id;
      $this->price = $price;
      $this->quantity = $quantity;
      $this->date = $date;
      $this->state = $state;
      $this->user = $user;
      $this->restaurant = $restaurant;
      $this->dish = $dish;
    }

    function save($db,string $state, int $idorder) {
      $stmt = $db->prepare('
        UPDATE Request SET idorder = ?, price = ?, quantity = ?, date = ?, state = ?, user = ?, restaurant = ?, dish = ? WHERE idorder = ?');

      $stmt->execute(array($idorder, $this->price, $this->quantity, $this->date, $state, $this->user, $this->restaurant, $this->$dish));
    }

    static function getUserOrders(PDO $db, int $id) : array {
      $stmt = $db->prepare('
        SELECT idorder, price, quantity, date, state, user, restaurant, dish
        FROM Request 
        WHERE user = ?
        GROUP BY idorder
      ');
      $stmt->execute(array($id));
      
      $orders = array();

      

      while ($order = $stmt->fetch()) {
        $orders[] = new Order(
          intval($order['idorder']), 
          floatval($order['price']),
          intval($order['quantity']),
          $order['date'],
          $order['state'],
          intval($order['user']),
          intval($order['restaurant']),
          intval($order['dish']),
        );
      }
      return $orders;
    }
    
    static function getOwnerOrders(PDO $db, int $id) : array {
      $stmt = $db->prepare('
        SELECT idorder, price, quantity, date, state, user, restaurant, dish
        FROM Request LEFT JOIN Restaurant ON Restaurant.idRestaurant = Request.restaurant
        WHERE user = ? AND user = Restaurant.idOwner  
        GROUP BY idorder
      ');
      $stmt->execute(array($id));
      
      $orders = array();

      

      while ($order = $stmt->fetch()) {
        $orders[] = new Order(
          intval($order['idorder']), 
          floatval($order['price']),
          intval($order['quantity']),
          $order['date'],
          $order['state'],
          intval($order['user']),
          intval($order['restaurant']),
          intval($order['dish']),
        );
      }
      return $orders;
    }

    

    
  
  }
?>