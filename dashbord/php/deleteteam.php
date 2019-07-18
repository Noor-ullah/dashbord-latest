<?php
    include 'db.inc.php';
    $bulk = new MongoDB\Driver\BulkWrite;

    $id = $_GET["id"];

    try {
        $bulk->delete(['_id' => new MongoDB\BSON\ObjectId($id)]);
        $result = $manager->executeBulkWrite($dbname1, $bulk);
        header("Location: ../teamlist.php");
    }catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered ".$e);
    }

?>