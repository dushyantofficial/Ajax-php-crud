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