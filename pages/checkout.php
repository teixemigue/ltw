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
  $_SESSION['counter'] = 0;
  drawHeader($session);
  
?>  
  <script>
    for (i = 0; i < localStorage.length; i++) {
      $data = array();
      key = localStorage.key(i);

      
      $data['idorder'] = $_SESSION['counter'];
      $data['price'] = 0;
      $data['quantity'] = localStorage.getItem(key);
      $data['date'] = "1/3/2020";
      $data['state'] = "orderes";
      $data['iduser'] = $session->getId();
      $data['idrest'] = 1;
      $data['dishid'] = intval(localStorage.key(i));
      
      $_SESSION['counter'] += 1;
      $stmt = $db->prepare('INSERT INTO Request VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
      $stmt->execute(array($data['idorder'], $data['price'], $data['quantity'],$data['date'],$data['state'],$data['iduser'],$data['idrest'],$data['dishid']));
     console.log(localStorage.key(i));
     console.log(localStorage.getItem(key));

     $stmt = $db->prepare('select * from Request');
     $stmt->execute();
     var_dump($stmt);
   }
    /*
    var table = document.getElementById("carttable");
    for (var i = 0, row; row = table.rows[i]; i++) {
        console.log(row['id'])
        for (var j = 0, col; col = row.cells[j]; j++) {
            
        }    
    }  
    */
  </script>

<?php 
  drawFooter();
?>

