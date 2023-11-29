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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch the record based on the ID
    $sql = "SELECT * FROM crud_application WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(["status" => "error", "message" => "Record not found"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}

// Close the database connection
$conn->close();
?>
