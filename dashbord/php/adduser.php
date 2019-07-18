<?php 
    include 'db.inc.php';
    $bulk = new MongoDB\Driver\BulkWrite;

    $name = $_POST["name"];
    $member = $_POST["member"];


    $team = [
        '_id' => new MongoDB\BSON\ObjectId,
        'name' => $name,
        'member' => $member
      ];

    try{
        $bulk->insert($team);
        $result = $manager->executeBulkWrite($dbname1, $bulk);
        header("Location: ../teamlist.php");
    }   catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered: ".$e);
    }

?>
