<?php
    session_start();
   //get email and pass from POST - set to empty string if not set
    $username = isset($_POST['username'])? $_POST['username'] : ''; //Your form html uses name="username" so thats the key we use here
    $password = isset($_POST['password'])? $_POST['password'] : '';
    $option = "";
    //storing login information
    $_SESSION['username'] = $username;
    $_SESSION['option'] = $option;
    //create PDO object with sqlite db
    
   
    $db = new PDO('sqlite:restDB.db');
    //prepare statement, with unnamed query parameters denoted by ? placeholder
    $stmt = $db->prepare('SELECT * FROM User WHERE username = ? and password = ?');

    //bind query parameters to placeholders and execute query
    $stmt->execute(array($username, $password));
    $res = $stmt->fetchAll();
    $_SESSION['option'] = $res[0]['option'];
    $db = NULL;
    //rowCount does not work for SQLITE, however empty array is 'falsy', an array with content (in the case of a successfull login) is 'truthy', so:
    if($res){
        //do something now user is authenticated, eg set a SESSION value, redirect etc
        header('Location: loggedin.php');
        exit();
        echo 'Logged In';
    }
    else{
        echo 'failed';
        session_destroy();
        header('Location: login.html');
        exit();
    }
?>