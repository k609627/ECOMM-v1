<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Step 1: Establish a database connection
$host = "localhost"; // replace with your database host
$user = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "ECOMM"; // replace with your database name
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Process form data

    $name = $_POST["uname"];
    $password = $_POST["psw"];

    // Step 3: Insert form data into database
    $sql = "INSERT INTO Loginpage (Email,password) VALUES ('$name','$password')";
    if (mysqli_query($conn, $sql)) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Step 4: Close database connection
    mysqli_close($conn);

?>
