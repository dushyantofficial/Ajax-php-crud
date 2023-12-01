<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Application in PHP using AJAX - Coding Birds Online</title>
    <link rel="shortcut icon"
        href="https://demo.codingbirdsonline.com/website/img/coding-birds-online/coding-birds-online-favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="custom.css">
</head>

<body>
<style>
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        justify-content: end;
    }

    .pagination a, .pagination span {
        padding: 10px;
        margin: 2px;
        text-decoration: none;
        cursor: pointer;
        color: #007BFF;
        border: 1px solid #007BFF;
        border-radius: 3px;
    }

    .pagination a:hover {
        background-color: #007BFF;
        color: white;
    }

    .pagination .active {
        background-color: #007BFF;
        color: white;
        font-weight: bold;
    }

    .pagination .disabled {
        color: lightgray;
        pointer-events: none;
    }


</style>
    <div class="container"><br>
        <a href="javaScript:void(0);" data-toggle="modal" data-target="#myModal"
            class="btn btn-primary pull-right bottom-gap">Add New <i class="fa fa-plus" aria-hidden="true"></i></a>
        <table class="table table-bordered" id="dataTables">
            <thead id="thead" style="background-color:#135361">
                <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>DOB</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Courses</th>
                    <th>Hobby</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody id="crudData"></tbody>
        </table>
        <div class="pagination">

        </div>

    </div>

    <!-- Create Model Popup   -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">CRUD Application Form</h4>
                </div>
                <div class="modal-body">
                    <form id="crudAppForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name <span class="field-required">*</span></label>
                                    <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="field-required">*</span></label>
                                    <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password">Password <span class="field-required">*</span></label>
                                    <input type="password" name="password" id="password" placeholder="password"
                                        class="form-control">
                            <span class="toggle-password"
                                  onclick="togglePasswordVisibility('password')" style="margin: 140px !important;position: absolute;
    top: -108px;">
    <i class="fa fa-eye-slash" aria-hidden="true"></i>
</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dob">DOB<span class="field-required">*</span></label>
                                    <input type="date" name="dob" id="dob" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact">Contact <span class="field-required">*</span></label>
                                    <input type="number" min="1" maxlength="10" name="contact" id="contact" placeholder="Contact"
                                        class="form-control" oninput="limitLength(this, 10)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Gender <span class="field-required">*</span></label><br>
                                    <input type="radio" name="gender" id="gender" value="Male">Male
                                    <input type="radio" name="gender" id="gender" value="Female">Female
                                    <input type="radio" name="gender" id="gender" value="Other">Other
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City<span class="field-required">*</span></label>
                                    <br>
                                    <select class="form-control" name="city" id="city">
                                        <option value="">select...</option>
                                        <option value="Mumbai">Mumbai</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Ahmedabad">Ahmedabad</option>
                                        <option value="Banglore">Banglore</option>
                                        <option value="Hyderabad">Hyderabad</option>
                                        <option value="Kolkata">Kolkata</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hobby">Hobby <span class="field-required">*</span></label>
                                    <br>
                                    <input type="checkbox" name="hobby[]" value="Drawing" id="hobby" />Drawing
                                    <input type="checkbox" name="hobby[]" value="Singing" id="hobby" />Singing
                                    <input type="checkbox" name="hobby[]" value="Dancing" id="hobby" />Dancing
                                    <input type="checkbox" name="hobby[]" value="Sketching" id="hobby" />Sketching
                                    <input type="checkbox" name="hobby[]" value="Other" id="hobby">Other
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address <span class="field-required">*</span></label>
                                    <textarea name="address" id="address" placeholder="address"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="courses">Courses<span class="field-required">*</span></label><br>
                                    <select class="create-select form-control" name="courses[]" id="courses" multiple>
                                        <option value="Computer Science">Computer Science</option>
                                        <option value="Software engineering">Software engineering</option>
                                        <option value="BCA">BCA</option>
                                        <option value="Graphic design">Graphic design</option>
                                        <option value="Web design">Web design</option>
                                        <option value="Data science">Data science</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image<span class="field-required">*</span></label>
                                    <input type="file" name="image" id="image" class="form-control" >
                                </div>
                            </div>
                        </div>


                </div>
                <!-- <div id="preview">
                    <h3>Image Preview</h3>
                    <div class="imagePreview"></div>
                </div> -->
                <div class="modal-footer">
                    <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary"><i
                                class="fa fa-spinner fa-spin" id="spinnerLoader"></i> <span
                                id="buttonLabel">Save</span>
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Model Popup   -->
    <div class="modal fade" id="editModal" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">CRUD Application Form</h4>
                </div>
                <div class="modal-body">
                    <form id="editForm" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="editId" value=""/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name <span class="field-required">*</span></label>
                                    <input type="text" name="name" id="edit_name" placeholder="Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="field-required">*</span></label>
                                    <input type="text" name="email" id="edit_email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password">Password <span class="field-required">*</span></label>
                                    <input type="password" name="password" id="edit_password" placeholder="password"
                                           class="form-control">
                                    <span class="toggle-password1"
                                          onclick="togglePasswordVisibility1('edit_password')" style="margin: 140px !important;position: absolute;
    top: -108px;">
    <i class="fa fa-eye-slash" aria-hidden="true"></i>
</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dob">DOB<span class="field-required">*</span></label>
                                    <input type="date" name="dob" id="edit_dob" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact">Contact <span class="field-required">*</span></label>
                                    <input type="number" min="1" maxlength="10" name="contact" id="edit_contact" placeholder="Contact"
                                           class="form-control" oninput="limitLength(this, 10)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Gender <span class="field-required">*</span></label><br>
                                    <input type="radio" name="gender" id="gender" value="Male">Male
                                    <input type="radio" name="gender" id="gender" value="Female">Female
                                    <input type="radio" name="gender" id="gender" value="Other">Other
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City<span class="field-required">*</span></label>
                                    <br>
                                    <select class="form-control" name="city" id="edit_city">
                                        <option value="">select...</option>
                                        <option value="Mumbai" selected>Mumbai</option>
                                        <option value="Delhi" selected>Delhi</option>
                                        <option value="Ahmedabad" selected>Ahmedabad</option>
                                        <option value="Banglore" selected>Banglore</option>
                                        <option value="Hyderabad" selected>Hyderabad</option>
                                        <option value="Kolkata" selected>Kolkata</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hobby">Hobby <span class="field-required">*</span></label>
                                    <br>
                                    <input type="checkbox" name="hobby[]" value="Drawing" id="Drawing" />Drawing
                                    <input type="checkbox" name="hobby[]" value="Singing" id="Singing" />Singing
                                    <input type="checkbox" name="hobby[]" value="Dancing" id="Dancing" />Dancing
                                    <input type="checkbox" name="hobby[]" value="Sketching" id="Sketching" />Sketching
                                    <input type="checkbox" name="hobby[]" value="Other" id="Other">Other
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address <span class="field-required">*</span></label>
                                    <textarea name="address" id="edit_address" placeholder="address"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="courses">Courses<span class="field-required">*</span></label><br>
                                    <select class="edit-select form-control" name="courses[]" id="edit_courses" multiple>
                                        <option value="Computer Science">Computer Science</option>
                                        <option value="Software engineering">Software engineering</option>
                                        <option value="BCA">BCA</option>
                                        <option value="Graphic design">Graphic design</option>
                                        <option value="Web design">Web design</option>
                                        <option value="Data science">Data science</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image<span class="field-required">*</span></label>
                                    <input type="file" name="image" id="image12" class="form-control">
                                    <img id="edit_image" src="" alt="" width="50px" height="50px">
                                </div>
                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" name="submitBtn" id="editBtn" onclick="updateData()" class="btn btn-info">
                        <i class="fa fa-spinner fa-spin" id="spinnerLoader"></i>
                        <span id="buttonLabel">Update</span>
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>


<!-- Add this modal code to your HTML -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" alt="Image Preview" style="width: 100%;">
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--Data Show Js-->
<script src="Js/show_data_script.js"></script>

<!--Data Create Js-->
<script src="Js/create_script.js"></script>

<!--Data Edit / Update Js-->
<script src="Js/edit_update_script.js"></script>

<!--Data Delete Js-->
<script src="Js/delete_data.js"></script>

<!--Other Activity Js-->
<script src="Js/other_activity_script.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</body>

</html>