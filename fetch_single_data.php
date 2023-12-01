<?php
include('config.php');
// Create a database connection


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch the record based on the ID
    $sql = "SELECT * FROM crud_application WHERE id = $id";
    $result = $connection->query($sql);

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
$connection->close();
?>
