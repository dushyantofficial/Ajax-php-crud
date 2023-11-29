<?php
// Replace these values with your actual database details
$host = "localhost";
$username = "root";
$password = "";
$database = "codingbirds";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    // Perform the delete operation (replace with your actual delete query)
    $sql = "DELETE FROM crud_application WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
} else {
    echo json_encode(["status" => "error"]);
}

// Close the database connection
$conn->close();
?>
