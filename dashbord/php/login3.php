<?php

use MongoDB\Driver\Manager;

session_start();


?>

<html>
<head>
<title>  Dashboard </title>
</head>

<?PHP
include "db.inc.php";
$_SESSION["loggedInUser"] = $email;


    try {
        // open managerection to MongoDB server
/*         $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

        // access database
        $db = $manager->phpbasics;

        // access collection
        $collection = $db->test; */


        $email = $_POST['email'];
        $password = $_POST['password'];


        $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

        $user = $manager->executeManager($dbname , $manager);
        find(array('email'=> '$email', 'password'=> '$password'));

        foreach ($user as $obj) {
            echo 'email' . $obj['email'];
            echo 'password: ' . $obj['password'];
            if($email == 'user1' && $password == 'pass1'){
                echo 'found' ;           
            }
            else{
                echo 'not found' ;
            }

        }

        // dismanagerect from server
        //$manager->close();

    } catch (MongomanagerectionException $e) {
        die('Error managerecting to MongoDB server');
    } catch (MongoException $e) {
        die('Error: ' . $e->getMessage());
    }

$_SESSION["loggedInUser"] = $correct;

?>

<body>
<br>
<center><h1> Welcome to CS348 Login Page </h1></center>
<br>
<form action="page2.php" METHOD="POST">
<label>email :</label>
<input type="text" Name="email">
<br>
<label>Password :</label>
<input type="password" Name="password">
<br>
<br>
<input type="submit" value="Login">
<br>
</FORM>
</body>
</html>