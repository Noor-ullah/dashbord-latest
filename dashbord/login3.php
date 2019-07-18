<? PHP      
session_start();

include_once("functions.php");
//include 'db.inc.php';
?>

<html>
<head>
<title>  Dashboard </title>
</head>

<?PHP

$_SESSION["loggedInUser"] = $email;


    try {
        // open connection to MongoDB server
        $conn = new MongoDB\Driver\Manager();

        // access database
        $db = $conn->phpbasics;

        // access collection
        $collection = $db->test;


        $email = $_POST['email'];
        $password = $_POST['password'];


        $user = $db->$collection->find(array('email'=> '$email', 'password'=> '$password'));

        foreach ($user as $obj) {
            echo 'email' . $obj['email'];
            echo 'password: ' . $obj['password'];
            if($email == 'user1' && $userPass == 'pass1'){
                echo 'found' ;           
            }
            else{
                echo 'not found' ;           
            }

        }

        // disconnect from server
        $conn->close();

    } catch (MongoConnectionException $e) {
        die('Error connecting to MongoDB server');
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