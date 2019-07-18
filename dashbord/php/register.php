<?php 
    include 'db.inc.php';
    $bulk = new MongoDB\Driver\BulkWrite;

    $compnyname = $_POST["compnyname"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = [
        '_id' => new MongoDB\BSON\ObjectId,
        'compnyname' => $compnyname,
        'name' => $name,
        'email' => $email,
        'password' => $password
    ];

    try{
        $bulk->insert($user);
        $result = $manager->executeBulkWrite($dbname, $bulk);
        header("Location: ../login.php");
    }   catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered: ".$e);
    }
?>
