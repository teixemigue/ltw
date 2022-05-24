<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../database/restaurant.class.php')
?>

<?php function drawRestaurants(array $restaurants) { ?>
  <header>
    <h2 class="rests">Restaurants</h2>
    <input id="searchrestaurants" type="text" placeholder="search">
  </header>
  <section id="restaurants">
    <?php foreach($restaurants as $restaurant) { ?> 
      <article class="places">
        <img src="https://picsum.photos/200?<?=$restaurant->id?>" class="restphoto">
        <a href="../pages/restaurant.php?id=<?=$restaurant->id?>" class="restname"><?=$restaurant->name?></a>
      </article>
    <?php } ?>
  </section>
<?php } ?>


<?php function drawRestaurant(Restaurant $restaurant, array $dishes) { ?>
  <h2 class="drawrest"><?=$restaurant->name?></h2>
  <section id="dishes">
    <?php foreach ($dishes as $dish) { ?>
    <article>
      <img class="dishphoto" src="https://picsum.photos/200?<?=$dish->id?>">
      <div class="dishinfo">
        <a class="name">Name: <?=$dish->name?></a>
        <br>
        <a class="description">Description: <?=$dish->description?></a>
        <br>
        <a class="price">Price: <?=$dish->price?> &euro;</a>
      </div>
    </article>
    <?php } ?>
  </section>
<?php } ?>