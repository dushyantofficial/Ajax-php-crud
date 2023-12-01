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

// Fetch data from the database (replace with your actual query)
$recordsPerPage = 2;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$startFrom = ($page - 1) * $recordsPerPage;

$sql = "SELECT * FROM crud_application LIMIT $startFrom, $recordsPerPage";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
// Count total records
$totalRecords = $conn->query("SELECT COUNT(*) FROM crud_application")->fetch_row()[0];

// Calculate total pages
$totalPages = ceil($totalRecords / $recordsPerPage);

$response = array(
    'data' => $data,
    'totalPages' => $totalPages
);
// Return data as JSON
header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
$conn->close();
?>
