<!DOCTYPE html>

<?php
  try
{
//open the database
$db = new PDO('sqlite:restDB.db');
//$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$name = $_POST["name"];
$username = $_POST["username"];
$password = $_POST["password"];
$address = $_POST["address"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
$option = $_POST["option"];
$photoname = $_POST["photo"];
$photo = "photos/user/original/".$username.".jpeg";
$finalpath = "photos/user/thumbs/".$username.".jpeg";

move_uploaded_file($_FILES['photo']['tmp_name'], $photo);

// Crete an image representation of the original image
$original = imagecreatefromjpeg($photo);
if (!$original) $original = imagecreatefrompng($photo);
if (!$original) $original = imagecreatefromgif($photo);
 

$width = imagesx($original);     // width of the original image
$height = imagesy($original);    // height of the original image
$square = min($width, $height);  // size length of the maximum square

// Create and save a small square thumbnail
$small = imagecreatetruecolor(200, 200);
imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 200, 200, $square, $square);
imagejpeg($small, $finalpath);
//Insert record  
//.............
$db->exec("INSERT INTO User (idUser, name, userName, password, address, email, phoneNumber, photo, option) VALUES (null,'$name', '$username', '$password', '$address', '$email', '$phonenumber', '$photo','$option');");

//now output the data to a simple html table...

 print "<table border=1>";
 print "<tr><td>Name</td><td>Username</td><td>Password</td><td>address</td><td>email</td><td>phonenumber</td><td>photo</td><td>option</td></tr>";
$result = $db->query('SELECT * FROM User');
foreach($result as $row)
{
  print "<tr><td>".$row['name']."</td>";
  print "<td>".$row['userName']."</td>";
  print "<td>".$row['password']."</td>";
  print "<td>".$row['address']."</td>";
  print "<td>".$row['email']."</td>";
  print "<td>".$row['phoneNumber']."</td>";
  print "<td>".$row['photo']."</td>";
  print "<td>".$row['option']."</td>";
  
}
print "</table>";

$db = NULL;
}
catch(PDOException $e)
{
print 'Exception : ' .$e->getMessage();
}

?>
<html>
    <head>
        <title>
            Registration complete
        </title>
    </head>
    <body>
        <h1>Registration complete!</h1>
        <meta http-equiv="Refresh" content="20; url='mainpage.php'" />
        
    </body>
</html>