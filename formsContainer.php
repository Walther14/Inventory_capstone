<?php
session_start();
@include('Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');
@include('partials/forms-topbar.php')
?>


<div style="margin: 5rem;">
<h1>Lagay mo na Christopher lahat ng forms sa loob ng forms folder</h1>
<div class="container" id="formContainer">
        <?php
        include('./forms/inspection_report.php');
        ?>
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