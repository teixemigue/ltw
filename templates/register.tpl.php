<?php declare(strict_types = 1); ?>

<?php function drawRegisterForm() { ?>
<h2>Register User</h2>
<form action="../actions/action_register_user.php" method="post" class="profile" enctype="multipart/form-data">
  <div>
    <label for="photo">Photo:</label>
    <input id="photo" type="file" name="photo" accept=".png, .jpeg, .jpg">

    <label for="name">Name:</label>
    <input id="name" type="text" name="name" placeholder="Name" required>
    
    <label for="username">Username:</label>
    <input id="username" type="text" name="username" placeholder="Username" required> 
    
    <label for="password">Password:</label>
    <input id="password" type="password" name="password" placeholder="Password" required>

    <label for="address">Address:</label>
    <input id="address" type="text" name="address" placeholder="Address" required>

    <label for="email">E-mail:</label>
    <input id="email" type="email" name="email" placeholder="E-mail" required>

    <label for="phone">Phone number:</label>
    <input id="phone" type="text" name="phone" placeholder="Phone number" required>
    
    <label for="option">User type:</label>
    <select id="option" name="option" required>
      <option value="customer">Customer</option>
      <option value="owner">Restaurant owner</option>
    </select>
    
    <button type="submit">Register</button>
  </div>
</form>
<?php } ?>