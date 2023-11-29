<?php
include "config.php";
include_once "CrudOperations.php";
$crudObj = new CrudOperations();

if ($_POST['crudOperation'] == "saveData") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $courses = implode(',',$_POST['courses']);
    //echo "<pre>"; print_r($_POST['courses']);exit;

    $hobby = implode(',',$_POST['hobby']);
    //echo "<pre>"; print_r($_POST['hobby']);exit;
    
    $image = $_POST['image'];
    // $image = $_FILES['image']['tmp_name'];
    // $tmp_image = $_FILES["image"]["tmp_name"];
    // $folder = "images/".$image;
    // echo $_FILES["image"];

    $editId = $_POST['editId'];
    $save = $crudObj->saveData($connection,$name,$email,$password,$dob,$contact,$gender,$address,$city,$courses,$hobby,$image,$editId);
    if ($save){
        echo "saved";
    }
}

if ($_POST['crudOperation'] == "getData") {
    $sr = 1;
    $tableData = '';
    $allData = $crudObj->getAllData($connection);
    if ($allData->num_rows>0) {
        while ($row = $allData->fetch_object()) {
            $tableData .= ' <tr>
                <td>'.$sr.'</td>
                <td>'.$row->name.'</td>
                <td>'.$row->email.'</td>
                <td>'.$row->password.'</td>
                <td>'.$row->dob.'</td>
                <td>'.$row->contact.'</td>
                <td>'.$row->gender.'</td>
                <td>'.$row->address.'</td>
                <td>'.$row->city.'</td>
                <td>'.$row->courses.'</td>
                <td>'.$row->hobby.'</td>
                <td>'.$row->image.'</td>
                <td><a href="javaScript:void(0)" onclick="editData(\''.$row->id.'\',\''.$row->name.'\',\''.$row->email.'\',\''.$row->password.'\',\''.$row->dob.'\',\''.$row->contact.'\',\''.$row->gender.'\',\''.$row->address.'\',\''.$row->city.'\',\''.$row->courses.'\',\''.$row->hobby.'\',\''.$row->image.'\');" class="btn btn-success btn-sm">Edit <i class="fa fa-pencil-square-o"></i></a>
                <a href="javaScript:void(0)" onclick="deleteData(\''.$row->id.'\');" class="btn btn-danger btn-sm">Delete <i class="fa fa-trash-o"></i></a>
                <i class="fa fa-spinner fa-spin" id="deleteSpinner'.$row->id.'" style="color: #ff195a;display: none"></i></td>
            </tr>';
            $sr++;
        }
    }
    echo $tableData;
}

if ($_POST['crudOperation'] == "deleteData"){
    $deleteId = $_POST['deleteId'];
    $delete = $crudObj->deleteData($connection,$deleteId);
    if ($delete){
        echo "deleted";
    }
}