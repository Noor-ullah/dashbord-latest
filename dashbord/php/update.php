<?php
    include 'db.inc.php';
    $bulk = new MongoDB\Driver\BulkWrite;

    $id = $_POST["id"];
    $compnyname = $_POST["compnyname"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        $bulk->update(['_id' => new MongoDB\BSON\ObjectId($id)],
        [
            'compnyname' => $compnyname,
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
        $result = $manager->executeBulkWrite($dbname, $bulk);
        header("Location: ../userlist.php");
    }catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered ".$e);
    }
?>