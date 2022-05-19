<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../database/restaurant.class.php')
?>

<?php function drawRestaurants(array $restaurants) { ?>
  <header>
    <h2>Restaurants</h2>
    <input id="searchrestaurants" type="text" placeholder="search">
  </header>
  <section id="restaurants">
    <?php foreach($restaurants as $restaurant) { ?> 
      <article>
        <img src="https://picsum.photos/200?<?=$restaurant->id?>">
        <a href="../pages/restaurant.php?id=<?=$restaurant->id?>"><?=$restaurant->name?></a>
      </article>
    <?php } ?>
  </section>
<?php } ?>


<?php function drawRestaurant(Restaurant $restaurant, array $dishes) { ?>
  <h2><?=$restaurant->name?></h2>
  <section id="dishes">
    <?php foreach ($dishes as $dish) { ?>
    <article>
      <img src="https://picsum.photos/200?<?=$dish->id?>">
      <p class="name"><?=$dish->name?></p>
      <p class="description"><?=$dish->description?></p>
      <p class="price"><?=$dish->price?> &euro;</p>
    </article>
    <?php } ?>
  </section>
<?php } ?>