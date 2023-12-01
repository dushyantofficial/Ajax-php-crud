<?php
// Create a database connection
include('config.php');

// Check the connection

// Fetch data from the database (replace with your actual query)
$recordsPerPage = 2;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$startFrom = ($page - 1) * $recordsPerPage;

$sql = "SELECT * FROM crud_application LIMIT $startFrom, $recordsPerPage";
$result = $connection->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
// Count total records
$totalRecords = $connection->query("SELECT COUNT(*) FROM crud_application")->fetch_row()[0];

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
$connection->close();
?>
