<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}
@include('Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');
@include('partials/forms-topbar.php')
?>


<div style="margin: 5rem;">
<div class="container" id="formContainer" style="display: flex; justify-content: center; align-items: center;">
    <img src="./img/FORMS.png" style="height: 500px; margin-top: 90px;" alt="Description of the image">
</div>




</div>



<script>
    function logSelectedOption(selectElement) {
        var selectedOption = selectElement.value;

        if (selectedOption !== "select form") {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('formContainer').innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', selectedOption, true);
            xhr.send()
        }
    }
</script>




<?php
include('partials/footer.php')
?>