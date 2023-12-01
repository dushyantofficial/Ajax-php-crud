<!--  Show Data  -->
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
                    '<td><img src="' + row.image + '" alt="Image" style="width: 50px; height: 50px; cursor: pointer;" onclick="openImageModal(\'' + row.image + '\')"></td>' +
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

    // Fetch data when the page loads
    $(document).ready(function () {
    fetchData(1);
});


    // Handle pagination link clicks
    $('.pagination').on('click', 'a', function (e) {
    e.preventDefault();
    var page = $(this).attr('href');
    fetchData(page);
});

function openImageModal(imageUrl) {
    // Set the image source in the modal
    $('#modalImage').attr('src', imageUrl);

    // Show the modal
    $('#imageModal').modal('show');
}