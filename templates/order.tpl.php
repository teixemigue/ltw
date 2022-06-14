<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/user.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/user.tpl.php');
  require_once(__DIR__ . '/../database/dish.class.php');
  require_once(__DIR__ . '/../database/order.class.php');
?>
<?php function drawOwnerOrders(array $orders, Session $session) { ?>
  <section id="orders">    
    <?php foreach ($orders as $order) { ?>
        <?php $db = getDatabaseConnection();
              $dish = Dish::getDish($db,intval($order->dish)); ?>
    <article data-id = "<?=$order->idorder?>" class="orderinfo">
        <img class="dishphoto" src="https://picsum.photos/200?<?=$dish->id?>">
        <span>Product: </span>
        <a class="prodctid"><?=$dish->name?></a>
        <br>
        <span>Order number: </span>
        <a class="ordernumber"><?=$order->idorder?></a>
        <br>
        <span>Price: </span>
        <a class="price"><?=$order->price?></a>
        <span>&euro;</span>
        <br>
        <span>Quantity: </span>
        <a class="quantity"><?=$order->quantity?></a>
        <br>
        <span>State: </span>
        <a class="state"><?=$order->state?></a>
        <?php if($session->isOwner()) : ?>
            <button onclick="">Delete</button>
            <button onclick="save()">Next State</button>
        <?php endif; ?>
    </article>
    <?php } ?>
    
  </section>
<?php } ?>

<?php function drawOrders(array $orders, Session $session) { ?>
  <?php if($session->isOwner()) : ?>
  <?php endif; ?>
  <section id="orders">    
    <?php foreach ($orders as $order) { ?>
        <?php $db = getDatabaseConnection();
              $dish = Dish::getDish($db,intval($order->dish)); ?>
    <article data-id = "<?=$order->idorder?>" class="orderinfo">
        <img class="dishphoto" src="https://picsum.photos/200?<?=$dish->id?>">
        <span>Product: </span>
        <a class="prodctid"><?=$dish->name?></a>
        <br>
        <span>Order number: </span>
        <a class="ordernumber"><?=$order->idorder?></a>
        <br>
        <span>Price: </span>
        <a class="price"><?=$order->price?></a>
        <span>&euro;</span>
        <br>
        <span>Quantity: </span>
        <a class="quantity"><?=$order->quantity?></a>
        <br>
        <span>State: </span>
        <a class="state"><?=$order->state?></a>
    </article>
    <?php } ?>
    
  </section>
<?php } ?>