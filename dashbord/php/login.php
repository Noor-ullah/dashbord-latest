<?php 
    session_start();
    include 'db.inc.php';

    //$name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $filter = [
        'email' => $email,
        'password' => $password
    ];
    $query = new MongoDB\Driver\Query($filter);

    try{
        $result = $manager->executeQuery($dbname, $query);
        $row = $result->toArray();
        //$_SESSION['name'] = $user;
        if(sizeof($row)>0){
            $user = $row[0]->email;
            $_SESSION['email'] = $user;

            header("Location: ../index.php");
            $_SESSION['result'] = "";
        }else{
            $_SESSION['result'] = "No email or password found";
            header("Location: ../login.php");
        }
    }   catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered: ".$e);
    }
?>
