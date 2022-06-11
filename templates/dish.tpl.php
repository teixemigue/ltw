<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../database/restaurant.class.php');
  require_once(__DIR__ . '/../database/dish.class.php');
  require_once(__DIR__ . '/../templates/review.tpl.php');
?>

<?php function drawDishCategories(Restaurant $restaurant, array $categories) { ?>
  </header>
  <section id="categories">
    <?php foreach($categories as $category) { ?>
      <a id="category" href="#<?=$category?>"><?=$category?></a>
    <?php } ?>
  </section>
<?php } ?>

<?php function drawDishesFromRestaurant(Restaurant $restaurant, array $dishes, array $categories, Session $session) { ?>
  <h2 class="drawrest"><?=$restaurant->name?></h2>
  <?php drawReviewScore($restaurant) ?>
  <?php if($session->isOwner()) : ?>
    <a href="../pages/register_dish.php?id=<?=$restaurant->id?>">Add Dish</a>
  <?php endif; ?>
  <section id="dishes">
    <?php foreach($categories as $category) { ?>
        <h2 id="<?=$category?>"><?=$category?></h2>
        <?php foreach ($dishes[$category] as $dish) { ?>
        <article data-id = "<?=$dish->id?>" class="dishinfo">
        <img class="dishphoto" src="https://picsum.photos/200?<?=$dish->id?>">
            <?php if($session->isOwner()) : ?>
            <button><a href="../pages/edit_dish.php?id=<?=$dish->id?>"><i class="fa fa-edit"></i></a></button>
            <button><a href="../actions/action_delete_dish.php?id=<?=$dish->id?>"><i class="fa fa-trash"></i></a></button>
            <?php endif; ?>
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
    <?php } ?>
  </section>
  <script>
      prices = document.getElementsByClassName('price');
      for(var i = 0; i < prices.length; i++) {
        prices[i].textContent = parseFloat(prices[i].textContent, 10).toFixed(2);
      }
  </script>
<?php } ?>

<?php function drawDishForm(Dish $dish) { ?>
  <h2 class="title">Dish Info</h2>
  <form action="../actions/action_edit_dish.php?id=<?=$dish->id?>" method="post" class="dish" enctype="multipart/form-data">

    <label for="photo">Photo:</label>
    <input id="photo" type="file" name="photo" accept=".png, .jpeg, .jpg">

    <label for="name">Name:</label>
    <input id="name" type="text" name="name" value="<?=$dish->name?>">

    <label for="price">Price:</label>
    <input id="price" type="text" name="price" pattern="^\d{0,4}(\.\d{1,2})" value="<?=$dish->price?>">

    <label for="description">Description:</label>
    <input id="description" type="text" name="description" value="<?=$dish->description?>"> 
    
    <label for="category">Category:</label>
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