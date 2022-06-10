<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../database/restaurant.class.php');
  require_once(__DIR__ . '/../templates/review.tpl.php');
?>

<?php function drawRestaurantCategories(array $categories) { ?>
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
    <article data-id = "<?=$dish->id?>" class="dishinfo">
      <img class="dishphoto" src="https://picsum.photos/200?<?=$dish->id?>">
        <button><a href="../pages/edit_dish.php?id=<?=$dish->id?>"><i class="fa fa-edit"></i></a></button>
        <button><a href="../actions/action_delete_dish.php?id=<?=$dish->id?>"><i class="fa fa-trash"></i></a></button>
        <span>Name: </span>
        <a class="dishname"><?=$dish->name?></a>
        <br>
        <a class="description">Description: <?=$dish->description?></a>
        <br>
        <span>Price: </span>
        
        <a class="price"><?=$dish->price?></a>
        <span>&euro;</span>
        <input class="quantity" type="number" value="1">
        <button class="order">Order</button>
      
    </article>
    <?php } ?>
  </section>
<?php } ?>

<?php function drawOwnerRestaurants(array $restaurants) { ?>
  <h2 style="color: black">Restaurant List</h2>
  <section id="restaurants">
    <?php if(empty($restaurants)): ?>
      <p style="color: black">You haven't added any restaurants</p>
    <?php else: ?>
      <?php foreach($restaurants as $restaurant) { ?> 
        <article class="places">
          <img src="https://picsum.photos/200?<?=$restaurant->id?>" class="restphoto">
          <a href="../pages/restaurant.php?id=<?=$restaurant->id?>" class="restname"><?=$restaurant->name?></a>
          <?php drawReviewScore($restaurant) ?>
          <a href="../pages/edit_restaurant.php?id=<?=$restaurant->id?>">Edit Restaurant Info</a>
          <button><a href="../actions/action_delete_restaurant.php?id=<?=$restaurant->id?>">Remove Restaurant</a></button>
        </article>
      <?php } ?>
    <?php endif; ?>
  </section>
  <button><a href="../pages/register_restaurant.php">Add Restaurant</a></button>
<?php } ?>

<?php function drawRestaurantForm(Restaurant $restaurant) { ?>
  <h2 style="color: black" >Restaurant Info</h2>
  <form action="../actions/action_edit_restaurant.php?id=<?=$restaurant->id?>" method="post" class="restaurant" enctype="multipart/form-data">

    <label style="color: black" for="photo">Photo:</label>
    <input id="photo" type="file" name="photo" accept=".png, .jpeg, .jpg">

    <label style="color: black" for="name">Name:</label>
    <input id="name" type="text" name="name" value="<?=$restaurant->name?>">
    
    <label style="color: black" for="address">Address:</label>
    <input id="address" type="text" name="address" value="<?=$restaurant->address?>"> 
    
    <label style="color: black" for="category">Category:</label>
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

<?php function drawDishForm(Dish $dish) { ?>
  <h2 style="color: black" >Dish Info</h2>
  <form action="../actions/action_edit_dish.php?id=<?=$dish->id?>" method="post" class="dish" enctype="multipart/form-data">

    <label style="color: black" for="photo">Photo:</label>
    <input id="photo" type="file" name="photo" accept=".png, .jpeg, .jpg">

    <label style="color: black" for="name">Name:</label>
    <input id="name" type="text" name="name" value="<?=$dish->name?>">

    <label style="color: black" for="price">Price:</label>
    <input id="price" type="text" name="price" pattern="^\d{0,4}(\.\d{1,2})" value="<?=$dish->price?>">

    <label style="color: black" for="description">Description:</label>
    <input id="description" type="text" name="description" value="<?=$dish->description?>"> 
    
    <label style="color: black" for="category">Category:</label>
      <select id="category" name="category">
        <option value="<?=$dish->category?>" selected hidden><?=$dish->category?></option>
        <option value="Beef">Beef</option>
        <option value="Pork">Pork</option>
        <option value="Chicken">Chicken</option>
        <option value="Fish">Fish</option>
        <option value="Burger">Burger</option>
        <option value="Pizza">Pizza</option>
        <option value="Drink">Drink</option>
        <option value="Other">Other</option>
      </select>
    <button type="submit">Save</button>
  </form>
<?php } ?>