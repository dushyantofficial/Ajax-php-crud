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

    // Check if an image file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        // Update data including the image file
        $sql = "UPDATE crud_application 
                SET name='$name', email='$email', password='$password', dob='$dob', contact='$contact', gender='$gender', 
                    address='$address', city='$city', courses='$courses', hobby='$hobbies', image='$target_file' 
                WHERE id = $id";
    } else {
        // Update data without changing the image
        $sql = "UPDATE crud_application 
                SET name='$name', email='$email', password='$password', dob='$dob', contact='$contact', gender='$gender', 
                    address='$address', city='$city', courses='$courses', hobby='$hobbies' 
                WHERE id = $id";
    }

    // Perform the update operation (replace with your actual update query)
//    $sql = "UPDATE crud_application
//            SET name='$name', email='$email', password='$password', dob='$dob', contact='$contact', gender='$gender',
//                address='$address', city='$city', courses='$courses', hobby='$hobbies'
//            WHERE id = $id";

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
