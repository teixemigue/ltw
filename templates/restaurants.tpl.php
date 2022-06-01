<?php declare(strict_types = 1); ?>

<?php function drawRestaurantRegisterForm() { ?>
<h2>Add Restaurant</h2>
<form action="../actions/action_add_restaurant.php" method="post" class="profile" enctype="multipart/form-data">
  <div>
    <label for="photo">Photo:</label>
    <input id="photo" type="file" name="photo" accept=".png, .jpeg, .jpg">

    <label for="name">Name:</label>
    <input id="name" type="text" name="name" placeholder="Name" required>

    <label for="address">Address:</label>
    <input id="address" type="text" name="address" placeholder="Address" required>

    <label for="category">E-mail:</label>
    <input id="category" type="text" name="category" placeholder="Category" required>

    <button type="submit">Register</button>
  </div>
</form>
<?php } ?>