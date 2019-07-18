<?php

session_start();

include 'db.inc.php';
    
	$bulk = new MongoDB\Driver\BulkWrite;
   
    $url = $_POST['url'];
    $name = $_POST['name'];
    $Region = $_POST['Region'];

    $user = [
        '_id' => new MongoDB\BSON\ObjectId,
        'url' => $url,
        'name' => $name,
        'Region' => $Region
         ];

    try{
        $bulk->insert($user);
        $result = $manager->executeBulkWrite($dbname2, $bulk);
		//header("Location: ./addchck.php");
    }   catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered: ".$e);
 
		      $_SESSION['success'] = "Site created successfully";
			  header("Location: ./addchck.php");	  
 }
?>
