<?php
// Create a database connection
include('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
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

    // Image upload
    $targetDir = "uploads/";
    $targetFile = $targetDir . rand('0000','1111').basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo json_encode(["status" => "error", "message" => "File is not an image."]);
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo json_encode(["status" => "error", "message" => "Sorry, file already exists."]);
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 5000000) {
        echo json_encode(["status" => "error", "message" => "Sorry, your file is too large."]);
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo json_encode(["status" => "error", "message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."]);
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo json_encode(["status" => "error", "message" => "Sorry, your file was not uploaded."]);
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Database insert query
            $sql = "INSERT INTO crud_application (name, email, password, dob, contact, gender, address, city, courses, hobby, image) 
                    VALUES ('$name', '$email', '$password', '$dob', '$contact', '$gender', '$address', '$city', '$courses', '$hobbies', '$targetFile')";

            if ($connection->query($sql) === TRUE) {
                echo json_encode(["status" => "success", "message" => "Data inserted successfully"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error: " . $connection->error]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Sorry, there was an error uploading your file."]);
        }
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}

// Close the database connection
$connection->close();
?>
