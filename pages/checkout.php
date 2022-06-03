<?php 
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  if (!$session->isLoggedIn()) die(header('Location: /'));

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/user.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/user.tpl.php');

  $db = getDatabaseConnection();

  $user = User::getUser($db, $session->getId());

  drawHeader($session);
?>  
  <script>
      var table = document.getElementById("carttable");
    for (var i = 0, row; row = table.rows[i]; i++) {
        console.log(row['id'])
        for (var j = 0, col; col = row.cells[j]; j++) {
            
        }    
    }  

  </script>

<?php 
  drawFooter();
?>

