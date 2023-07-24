<?php
require 'vendor/autoload.php';

$sdk = new Aws\Sdk([
    'region'   => 'us-west-2',
    'version'  => 'latest',
    'credentials' => [
        'key'    => 'AKIATCHXLAL4DUMBQ2GW',
        'secret' => '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',
    ],
]);

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];

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
$stmt = $conn->prepare("insert into Loginpage(name, email) values (?, ?)");
$stmt->bind_param("ss", $name, $email);

// Execute the statement
$stmt->execute();
echo "registration sucessfully";

// Close the connection
$stmt->close();
$conn->close();

// Redirect back to the form page
header('Location: loggin.html');
exit();

?>
