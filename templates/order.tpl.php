<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/user.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/user.tpl.php');

?>
<?php function drawOrders(array $orders, Session $session) { ?>
  <?php if($session->isOwner()) : ?>
  <?php endif; ?>
  <section id="orders">    
    <?php foreach ($orders as $order) { ?>
    <article data-id = "<?=$order->idorder?>" class="orderinfo">
        <?php if($session->isOwner()) : ?>
        <?php endif; ?>
        <span>Product id: </span>
        <a class="prodctid"><?=$order->dish?></a>
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