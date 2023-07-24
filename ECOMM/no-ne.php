<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';

// Get the form data
$name = $_POST['uname'];
$password = $_POST['psw'];

// Create a new MySQL connection
$host = 'demo-db-001.cz3mivvmc4cj.ap-southeast-2.rds.amazonaws.com';
$user = 'root';
$password = 'Aditya090';
$dbname = 'Alpha_DB';

$conn = new mysqli($host, $user, $password, $dbname);

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare("insert into Loginpage(Email, password) values (?, ?)");
$stmt->bind_param("ss", $name, $password);

// Execute the statement
$stmt->execute();
echo "registration sucessfully";

// Close the connection
$stmt->close();
$conn->close();

// Redirect back to the form page
header('Location: login.html');
exit();

?>