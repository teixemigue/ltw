<?php declare(strict_types = 1); ?>

<?php function drawProfileForm(User $user) { ?>
<h2 class="title">User Profile</h2>
<form action="../actions/action_edit_profile.php" method="post" class="profile" enctype="multipart/form-data">

  <label for="photo">Photo:</label>
  <input id="photo" type="file" name="photo" accept=".png, .jpeg, .jpg">

  <label for="name">Name:</label>
  <input id="name" type="text" name="name" value="<?=$user->name?>">
  
  <label for="username">Username:</label>
  <input id="username" type="text" name="username" value="<?=$user->username?>"> 
  
  <label for="password">Password:</label>
  <input id="password" type="password" name="password" value="<?=$user->password?>">

  <label for="address">Address:</label>
  <input id="address" type="text" name="address" value="<?=$user->address?>">

  <label for="email">E-mail:</label>
  <input id="email" type="email" name="email" value="<?=$user->email?>">

  <label for="phone">Phone number:</label>
  <input id="phone" type="text" name="phone" value="<?=$user->phone?>">
  
  <button type="submit">Save</button>
</form>
<?php } ?>