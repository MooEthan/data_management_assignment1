<?php

   // db_connect.php
session_start(); // Start the session at the beginning of your script

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_system";

$conn = null;

// Check if the database connection is already set in the session
if (!isset($_SESSION['db_connection']) || !is_resource($_SESSION['db_connection'])) {
    // If the session does not have a valid db_connection, create a new one
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Store the connection in a session variable
    $_SESSION['db_connection'] = $conn;

} else {
    // Use the existing connection from the session
    $conn = $_SESSION['db_connection'];
}

?>
