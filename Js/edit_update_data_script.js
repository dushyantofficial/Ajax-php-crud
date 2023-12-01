
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

    // Validate email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var email = $('#edit_email').val();

    if (!emailRegex.test(email)) {
        Swal.fire({
            icon: 'error',
            title: 'Email Error',
            text: 'Invalid email format.',
        });
        return;
    }

    // Validate contact number format (10 digits)
    var contactRegex = /^\d{10}$/;
    var contact = $('#edit_contact').val();

    if (!contactRegex.test(contact)) {
        Swal.fire({
            icon: 'error',
            title: 'Contact Number Error',
            text: 'Contact number must be 10 digits.',
        });
        return;
    }

    // Validate image file
    var imageInput = $('#image12')[0];
    var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    var maxSize = 5 * 1024 * 1024; // 5 MB

    if (imageInput.files.length > 0) {
        var fileType = imageInput.files[0].type;
        var fileSize = imageInput.files[0].size;

        if (!allowedTypes.includes(fileType)) {
            Swal.fire({
                icon: 'error',
                title: 'Image Error',
                text: 'Invalid image type. Only JPG, JPEG, PNG, and GIF are allowed.',
            });
            return;
        }

        if (fileSize > maxSize) {
            Swal.fire({
                icon: 'error',
                title: 'Image Error',
                text: 'Image size exceeds the limit. Maximum size allowed is 5 MB.',
            });
            return;
        }
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