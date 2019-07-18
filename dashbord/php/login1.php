<?PHP

use MongoDB\Driver\BulkWrite;

session_start();
?>

<html>
<head>
<title> login</title>
</head>

<?PHP

$_SESSION["loggedInUser"] = $email;

    try {
        // open connection to MongoDB server
        $manager = new MongoDB\Driver\BulkWrite;;

        // access database
        $db = $manager->phpbasics;

        // access collection
        $collection = $db->test;


        $email = $_POST['email'];
        $password = $_POST['password'];


        $user = $db->$collection->findOne(array('email'=> 'user1', 'password'=> 'pass1'));

        foreach ($user as $obj) {
            echo 'email' . $obj['email'];
            echo 'password: ' . $obj['password'];
            if($email == 'user1' && $password == 'pass1'){
                echo 'found';            
            }
            else{
                echo 'not found';            
            }

        }

        // disconnect from server
        $manager->close();

    } catch (MongoConnectionException $e) {
        die('Error connecting to MongoDB server');
    } catch (MongoException $e) {
        die('Error: ' . $e->getMessage());
    }

$_SESSION["loggedInUser"] = $manager;

?>

<body>
<br>
<center><h1> Welcome to  Login Page </h1></center>
<br>
<form action="index.php" METHOD="POST">
<label>User Email :</label>
<input type="text" Name="username">
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