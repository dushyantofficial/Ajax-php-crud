
    $(document).ready(function () {
    $(".create-select").select2({
        placeholder: "Select Courses",
        tags: true,
    });
    $(".edit-select").select2({
    placeholder: "Select Courses",
    tags: true,
});
})

    function limitLength(element, maxLength) {
    if (element.value.length > maxLength) {
    element.value = element.value.slice(0, maxLength);
}
}





<!-- Password Hide/Show -->
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
