<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../database/restaurant.class.php')
?>

<?php function drawSearchBar() { ?>
  <header>
    <form id="searchform" action="../actions/action_search_restaurant.php" method="post" class="search">
      <input id="searchrestaurants" type="text" name="name" placeholder="Search" required>
      <button form="searchform" id="searchbutton" type="submit" formmethod="post"><i class="fa fa-search"></i></button>
    </form>
    <script>
    var input = document.getElementById("searchrestaurants");
    input.addEventListener("keypress", function(event) {
      if (event.key === "Enter") {
        event.preventDefault();
        document.getElementById("searchbutton").click();
      }
    });
  </script>
<?php } ?>

<?php function drawCategories(array $categories) { ?>
    <h2 class="rests">Restaurants</h2>
  </header>
  <section id="categories">
    <?php foreach($categories as $category) { ?>
      <a id="category" href= "../pages/index.php?category=<?=$category?>"><?=$category?></a>
    <?php } ?>
  </section>
<?php } ?>

<?php function drawRestaurants(array $restaurants) { ?>
  <section id="restaurants">
    <?php if(empty($restaurants)): ?>
      <p style="color: black">No restaurants found</p>
    <?php else: ?>
      <?php foreach($restaurants as $restaurant) { ?> 
        <article class="places">
          <img src="https://picsum.photos/200?<?=$restaurant->id?>" class="restphoto">
          <a href="../pages/restaurant.php?id=<?=$restaurant->id?>" class="restname"><?=$restaurant->name?></a>
          <?php drawReviewScore($restaurant) ?>
        </article>
      <?php } ?>
    <?php endif; ?>
  </section>
<?php } ?>

<?php function drawRestaurant(Restaurant $restaurant, array $dishes) { ?>
  <h2 class="drawrest"><?=$restaurant->name?></h2>
  <?php drawReviewScore($restaurant) ?>
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

<?php function drawReviewScore(Restaurant $restaurant) { ?>
  <?php if($restaurant->avgscore == 0): ?>
    <p style="color: black">No reviews yet</p>
  <?php else: ?>
    <p class="avgscore" id="avgscore<?=$restaurant->id?>" style="color: black"></p>
    <script>
      document.getElementById("avgscore<?=$restaurant->id?>").innerHTML = (Math.round(<?=$restaurant->avgscore?> * 100) / 100).toFixed(1);
    </script>
  <?php endif; ?>
<?php } ?>