<?php
include('config.php');

// Create a database connection



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    // Perform the delete operation (replace with your actual delete query)
    $sql = "DELETE FROM crud_application WHERE id = $id";

    if ($connection->query($sql) === TRUE) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
} else {
    echo json_encode(["status" => "error"]);
}

// Close the database connection
$connection->close();
?>
