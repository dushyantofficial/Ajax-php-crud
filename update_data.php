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
    //echo print_r($_POST);die();
    // Collect form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $courses = implode(", ", $_POST['courses']);
    $hobbies = implode(", ", $_POST['hobby']);

    // Perform the update operation (replace with your actual update query)
    $sql = "UPDATE crud_application 
            SET name='$name', email='$email', password='$password', dob='$dob', contact='$contact', gender='$gender', 
                address='$address', city='$city', courses='$courses', hobby='$hobbies' 
            WHERE id = $id";

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
