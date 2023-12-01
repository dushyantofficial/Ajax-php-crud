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
    <link rel="stylesheet" href="dataTables.min.css">
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
                                    <input type="file" name="image" id="image" class="form-control">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="crud-app.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="dataTables.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".create-select").select2({
                placeholder: "Select Courses",
                tags: true,
            });
            $(".edit-select").select2({
                placeholder: "Select Courses",
                tags: true,
            });
        })
    </script>
    <script>
        function limitLength(element, maxLength) {
            if (element.value.length > maxLength) {
                element.value = element.value.slice(0, maxLength);
            }
        }

    </script>
    <!--    <script type="text/javascript">$('#dataTables').DataTable();</script>-->
    <!--  Show Data  -->
    <script>
        // Function to fetch and display data using Ajax
        function fetchData(page) {
            $.ajax({
                type: 'GET',
                url: 'fetch_data.php?page=' + page,
                dataType: 'json',
                success: function (data) {
                    // Clear existing data
                    $('#crudData').empty();

                    // Loop through the fetched data and append it to the table
                    $.each(data.data, function (index, row) {
                        //  var editButton = '<button class="btn btn-primary" onclick="editData(' + row.id + ')">Edit</button>';
                        var editButton = '<button class="btn btn-info" onclick="editData(' + row.id + ')"><i class="fa fa-edit"></i></button>';

                        var deleteButton = '<button class="btn btn-danger" onclick="deleteData(' + row.id + ')"><i class="fa fa-trash"></i></button>';

                        $('#crudData').append('<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + row.name + '</td>' +
                            '<td>' + row.email + '</td>' +
                            '<td>' + row.password + '</td>' +
                            '<td>' + row.dob + '</td>' +
                            '<td>' + row.contact + '</td>' +
                            '<td>' + row.gender + '</td>' +
                            '<td>' + row.address + '</td>' +
                            '<td>' + row.city + '</td>' +
                            '<td>' + row.courses + '</td>' +
                            '<td>' + row.hobby + '</td>' +
                            '<td><img src="' + row.image + '" alt="Image" style="width: 50px; height: 50px;"></td>' +
                            '<td>' + editButton + ' ' + deleteButton + '</td>' +
                            '</tr>');
                    });
                    // Update pagination links
                    updatePaginationLinks(page, data.totalPages);
                },
                // error: function () {
                //     Swal.fire({
                //         icon: 'error',
                //         title: 'Error',
                //         text: 'Error occurred while fetching data.',
                //     });
                // }
            });
        }

        function updatePaginationLinks(currentPage, totalPages) {
            // Clear existing pagination links
            $('.pagination').empty();

            // Add Previous link
            if (currentPage > 1) {
                $('.pagination').append('<a href="#" class="prev" onclick="fetchData(' + (currentPage - 1) + ')">&laquo; Prev</a>');
            } else {
                $('.pagination').append('<span class="disabled">&laquo; Prev</span>');
            }

            // Add page links
            for (let i = 1; i <= totalPages; i++) {
                var activeClass = i === currentPage ? 'active' : '';
                $('.pagination').append('<a class="page ' + activeClass + '" href="#" onclick="fetchData(' + i + ')">' + i + '</a>');
            }

            // Add Next link
            if (currentPage < totalPages) {
                $('.pagination').append('<a href="#" class="next" onclick="fetchData(' + (currentPage + 1) + ')">Next &raquo;</a>');
            } else {
                $('.pagination').append('<span class="disabled">Next &raquo;</span>');
            }
        }

        // Function to delete data using Ajax
        function deleteData(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed deletion
                    $.ajax({
                        type: 'POST',
                        url: 'delete_data.php', // Replace with the actual path to your PHP script for deletion
                        data: { id: id },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Data has been deleted.',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload(); // Reload the page
                                    }
                                });
                                // Refresh the table after successful deletion
                                //fetchData(page);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Error occurred while deleting data.',
                                });
                            }
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error occurred while deleting data.',
                            });
                        }
                    });
                }
            });
        }


        // Function to edit time show  using Ajax
        function editData(id) {
            $.ajax({
                type: 'GET',
                url: 'fetch_single_data.php?id=' + id, // Replace with the actual path to your PHP script
                dataType: 'json',
                success: function (data) {
                    // Assuming you have input fields with corresponding IDs in your modal
                    $('#editId').val(data.id);
                    $('#edit_name').val(data.name);
                    $('#edit_email').val(data.email);
                    $('#edit_password').val(data.password);
                    $('#edit_dob').val(data.dob);
                    $('#edit_contact').val(data.contact);
                    // Add similar lines for other fields

                    // Checkboxes and radio buttons
                    $('input[name="gender"][value="' + data.gender + '"]').prop('checked', true);
                    $('#edit_city').val(data.city);

                    // Multiselect (Courses)
                    var selectedCourses = data.courses;
                    var selectedCoursesArray = selectedCourses.split(',').map(function(course) {
                        return course.trim(); // Trim spaces around each course name
                    });

                    // Set the selected values
                    $(".edit-select").val(selectedCoursesArray).trigger("change");
                    $('#edit_courses').val(data.courses.split(','));

                    // Checkboxes (Hobby)
                    var hobbies = data.hobby.split(',');
                    $('input[name="hobby"]').prop('checked', false); // Uncheck all checkboxes
                    for (var i = 0; i < hobbies.length; i++) {
                        var hobbyValue = hobbies[i].trim(); // Remove leading/trailing spaces
                        $('#' + hobbyValue).prop('checked', true);
                    }

                    //Selected Option
                    var courses = data.courses.split(',');
                    // Unselect all options
                    $('#edit_courses option').prop('selected', false);

                    // Iterate through courses and select the corresponding options
                    for (var i = 0; i < courses.length; i++) {
                        var courseValue = courses[i].trim(); // Remove leading/trailing spaces
                        $('#edit_courses option[value="' + courseValue + '"]').prop('selected', true);
                    }

                    // Textarea (Address)
                    $('#edit_address').val(data.address);

                    //Image Url
                    var imageUrl = data.image;
                    $('#edit_image').attr('src', imageUrl);


                    // Show the modal
                    $('#editModal').modal('show');
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error occurred while fetching data for editing.',
                    });
                }
            });
        }


        // Function to update data
        function updateData() {
            //Update id
            var id = $('#editId').val();

            // Validate fields
            var name = $('#edit_name').val();
            var email = $('#edit_email').val();
            var password = $('#edit_password').val();
            var dob = $('#edit_dob').val();
            var contact = $('#edit_contact').val();
            var gender = $('input[name="gender"]:checked').val();
            var address = $('#edit_address').val();
            var city = $('#edit_city').val();
            var courses = $('#edit_courses').val();
            // var hobby = $('input[name="hobby"]:checked').map(function () {
            //     return this.value;
            // }).get();

            // Perform validation
            if (!name || !email || !dob || !contact || !gender || !address || !city || !courses || !password) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please fill in all required fields!.',
                })
                return;
            }
            // Get the form data using FormData for handling file uploads
            var formData = new FormData($('#editForm')[0]);

            // Make an Ajax request to update data
            $.ajax({
                url: 'update_data.php',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    // Handle the response from the server
                    if (response.status === 'success') {
                        // Close the modal
                        $('#editModal').modal('hide');
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Update!',
                                text: 'Data updated successfully!.',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(); // Reload the page
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error occurred while deleting data.',
                            });
                        }
                        // Fetch and display updated data
                       // fetchData();
                       // alert('Data updated successfully!');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error updating data:'+ response.message,
                        });
                       // alert('Error updating data: ' + response.message);
                    }
                },
                error: function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ajax request failed:' + error,
                    });
                    //console.log('Ajax request failed:', error);
                }
            });
        }

        // Fetch data when the page loads
        $(document).ready(function () {
            fetchData(1);
        });


    </script>
    <!--Create Data-->
    <script>
        $(document).ready(function () {
            $('#crudAppForm').submit(function (e) {
                e.preventDefault();
                // Validate required fields
                var requiredFields = ['name', 'email', 'password', 'dob', 'contact', 'gender', 'address', 'city', 'courses[]', 'hobby[]'];
                var isValid = true;

                requiredFields.forEach(function (field) {
                    if (!$('[name="' + field + '"]').val()) {
                        isValid = false;
                        return false; // exit loop early if any field is empty
                    }
                });

                if (!isValid) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please fill in all required fields.',
                    });
                    return;
                }
                // Disable the submit button to prevent multiple submissions
                $('#submitBtn').prop('disabled', true);

                // Show loading spinner
                $('#spinnerLoader').show();
                $('#buttonLabel').text('Saving...');

                // Serialize form data
                var formData = new FormData($(this)[0]);

                $.ajax({
                    type: 'POST',
                    url: 'save_data.php',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        var result = JSON.parse(response);

                        if (result.status === 'success') {
                            // Handle success with SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: result.message,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(); // Reload the page
                                }
                            });
                        } else {
                            // Handle error with SweetAlert
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: result.message,
                            });
                        }

                        // Enable the submit button and hide the loading spinner
                        $('#submitBtn').prop('disabled', false);
                        $('#spinnerLoader').hide();
                        $('#buttonLabel').text('Save');
                    },
                    error: function () {
                        // Handle AJAX error
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error occurred during AJAX request',
                        });


                        // Enable the submit button and hide the loading spinner
                        $('#submitBtn').prop('disabled', false);
                        $('#spinnerLoader').hide();
                        $('#buttonLabel').text('Save');
                    }
                });
            });
        });
    </script>
    <script>
        // Handle pagination link clicks
        $('.pagination').on('click', 'a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href');
            fetchData(page);
        });
    </script>
    <!-- Password Hide/Show -->
    <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var toggleIcon = document.querySelector('.toggle-password i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        }
    </script>
    <script>
        function togglePasswordVisibility1(inputId) {
            var passwordInput = document.getElementById(inputId);
            var toggleIcon = document.querySelector('.toggle-password1 i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        }
    </script>
</body>

</html>