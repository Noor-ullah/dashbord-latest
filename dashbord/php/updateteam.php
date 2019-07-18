<?php
    include 'db.inc.php';
    $bulk = new MongoDB\Driver\BulkWrite;

    $id = $_POST["id"];
    $name = $_POST["name"];
    $member = $_POST["member"];
    

    try {
        $bulk->update(['_id' => new MongoDB\BSON\ObjectId($id)],
        [
            'name' => $name,
            'member' => $member,
            
        ]);
        $result = $manager->executeBulkWrite($dbname1, $bulk);
        header("Location: ../teamlist.php");
    }catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered ".$e);
    }
?>