<?php
// Connect to the database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'capdata';

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve data
$sql = "SELECT Muscle FROM dht11";
$sql = "SELECT Swelling FROM dht11";
$result = $conn->query($sql);

// Create an array to store the data
$data = array();

// Fetch data from the result set
while($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the connection
$conn->close();

// Output the data as JSON
echo json_encode($data);