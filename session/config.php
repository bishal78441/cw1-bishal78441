<?php

$conn = mysqli_connect('localhost','root','','formuser');


// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the 'users' table
$query = mysqli_query($conn, 'SELECT * FROM user_form');

// Check if the query was successful
if (!$query) {
    die("Query failed: " . mysqli_error($conn));
}
?>