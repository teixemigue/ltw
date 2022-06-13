<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../database/restaurant.class.php');
  require_once(__DIR__ . '/../templates/review.tpl.php');
?>

<?php function drawRestaurantCategories(array $categories) { ?>
    <h2 class="title">Restaurants</h2>
  </header>
  <section id="categories">
    <?php foreach($categories as $category) { ?>
      <a id="category" href= "../pages/index.php?category=<?=$category?>"><?=$category?></a>
    <?php } ?>
  </section>
<?php } ?>

<?php function drawRestaurants(array $restaurants, ?array $favorites) { ?>
  <section id="restaurants">
    <?php if(empty($restaurants)): ?>
      <p class="none">No restaurants found</p>
    <?php else: ?>
      <?php if(isset($favorites)): ?>
        <button id="favorites" onclick="showFavoriteRestaurants()">Show Favorites</button>
      <?php endif; ?>
      <?php foreach($restaurants as $restaurant) { ?> 
        <article data-id="<?=$restaurant->id?>" class="places">
          <?php if(isset($favorites)): ?>
            <?php if(in_array($restaurant, $favorites)): ?>
              <button onclick="restaurantFavorite(this, <?=$restaurant->id?>)" id="favorite">&#9733;</button>
            <?php else: ?>
              <button onclick="restaurantFavorite(this, <?=$restaurant->id?>)" id="favorite">&#9734;</button>
            <?php endif; ?>
          <?php endif; ?>
          <a href="../pages/restaurant.php?id=<?=$restaurant->id?>" class="restname"><?=$restaurant->name?></a>
          <img src="https://picsum.photos/200?<?=$restaurant->id?>" class="restphoto">
          <a><b>Review Score: </b><?php drawReviewScore($restaurant) ?></a>
        </article>
      <?php } ?>
    <?php endif; ?>
  </section>
<?php } ?>

<?php function drawOwnerRestaurants(array $restaurants) { ?>
  <h2 class="title">Restaurant List</h2>
  <section id="restaurants">
    <?php if(empty($restaurants)): ?>
      <p class="none">You haven't added any restaurants</p>
    <?php else: ?>
      <?php foreach($restaurants as $restaurant) { ?> 
        <article class="places">
          <img src="https://picsum.photos/200?<?=$restaurant->id?>" class="restphoto">
          <a href="../pages/restaurant.php?id=<?=$restaurant->id?>" class="restname"><?=$restaurant->name?></a>
          <a><b>Review Score: </b><?php drawReviewScore($restaurant) ?></a>
          <a href="../pages/edit_restaurant.php?id=<?=$restaurant->id?>">Edit Restaurant Info</a>
          <button><a href="../actions/action_delete_restaurant.php?id=<?=$restaurant->id?>">Remove Restaurant</a></button>
        </article>
      <?php } ?>
    <?php endif; ?>
  </section>
  <button><a href="../pages/register_restaurant.php">Add Restaurant</a></button>
<?php } ?>

<?php function drawRestaurantForm(Restaurant $restaurant) { ?>
  <h2 class="title">Restaurant Info</h2>
  <form action="../actions/action_edit_restaurant.php?id=<?=$restaurant->id?>" method="post" class="restaurant" enctype="multipart/form-data">

    <label for="photo">Photo:</label>
    <input id="photo" type="file" name="photo" accept=".png, .jpeg, .jpg">

    <label for="name">Name:</label>
    <input id="name" type="text" name="name" value="<?=$restaurant->name?>">
    
    <label for="address">Address:</label>
    <input id="address" type="text" name="address" value="<?=$restaurant->address?>"> 
    
    <label for="category">Category:</label>
      <select id="category" name="category">
        <option value="<?=$restaurant->category?>" selected hidden><?=$restaurant->category?></option>
        <option value="Italian">Italian</option>
        <option value="Japanese">Japanese</option>
        <option value="Chinese">Chinese</option>
        <option value="Traditional">Traditional</option>
        <option value="American">American</option>
        <option value="Mexican">Mexican</option>
        <option value="Other">Other</option>
      </select>
    <button type="submit">Save</button>
  </form>
<?php } ?>
