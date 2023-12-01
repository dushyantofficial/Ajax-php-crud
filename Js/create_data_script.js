<!--Create Data-->
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
            // Validate email format
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var email = $('[name="email"]').val();

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
            var contact = $('[name="contact"]').val();

            if (!contactRegex.test(contact)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Contact Number Error',
                    text: 'Contact number must be 10 digits.',
                });
                return;
            }
            // Validate image file
            var imageInput = $('#image')[0];
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

