<?php 
    include 'db.inc.php';
    $bulk = new MongoDB\Driver\BulkWrite;

    $name = $_POST["name"];
    $member = $_POST["member"];


    $user = [
        '_id' => new MongoDB\BSON\ObjectId,
        'name' => $name,
        'member' => $member
      ];

    try{
        $bulk->insert($team);
        $result = $manager->executeBulkWrite($dbname, $bulk);
        header("Location: ../userlist.php");
    }   catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered: ".$e);
    }

?>

</<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>activate</title>
</head>
<body>
        <><>

</body>
</html>>