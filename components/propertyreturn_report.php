<?php

include('../Controller/db.php');


$Agency = $_POST['agency'] ?? '';
$Purpose = $_POST['purpose'] ?? '';

$Qty1 = $_POST['qty1'] ?? '';
$Unit1 = $_POST['unit1'] ?? '';
$Description1 = $_POST['description1'] ?? '';
$Property_no1 = $_POST['property_no1'] ?? '';
$Par_ics1 = $_POST['par_ics1'] ?? '';
$End_User1 = $_POST['end_user1'] ?? '';
$Unit_value1 = $_POST['unit_value1'] ?? '';
$Total_value1 = $_POST['total_value1'] ?? '';



?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
  
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Return Slip</title>
    <style>
    /* Your existing styles for the document go here */

    body {
        font-family: 'Century Gothic', sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
        position: relative; /* Added to position the footer relative to the body */
    }
    body, th, td, input, label {
        font-size: 12px !important;
    }

    .main-content {
        flex: 1;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 200px; /* Adjust the margin to accommodate the footer's height */
    }

    th, td {
        text-align: center;
        border: 1px solid #ced4da;
        padding: 8px;
    }

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        text-align: center;
        margin-top: auto; /* Set margin-top to auto for it to push to the bottom */
    }

    .footer img {
        width: 50rem;
    }

    .header {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    margin-top: auto; /* Set margin-top to auto for it to push to the bottom */
    height: 15vh; /* Set the height to 100% of the viewport height, adjust if necessary */
}

.header img {
    width: 50rem;}

 
    .form-group {
   display: flex;
   justify-content: center;
   align-items: center;
}.form-group {
   text-align: center;
}

.form-control {
    text-align: center;
    font-family: 'Century Gothic', sans-serif;
   border: none !important;
   border-bottom: 1px solid #ced4da !important;
   text-align: center !important;
   width: 100%;
}

.form-group label {
   text-align: center;
}


    /* Styles for the print media */
    @media print {
        body {
            display: block; /* Reset display value for printing */
        }

        .print-only {
            display: block;
        }

        body > *:not(.print-only) {
            display: none;
        }

        /* Remove padding for the specific div when printing */
        div.p-5 {
            padding: 0 !important;
        }
    }

    .form-control {
        margin: 0;
        padding: 0;
        line-height: 1;
        height: auto;
        border: none;
    }
/* Adjust the margin and width of the table for normal view */
table {
    border-collapse: collapse;
    width: 45%;
    margin: 20px auto 200px; /* Center the table with top and bottom margins */
}

/* Adjust padding for table cells */
th, td {
    border: 1px solid #ced4da;
    padding: 5px;
}

/* Styles for the print media */
@media print {
    /* Reset styles for body and other elements */
    body {
        display: block;
    }

    .main-content {
        flex: 1;
    }

    table {
        width: 100%; /* Use full width for printing */
        margin: 0; /* Reset margin for printing */
    }

    th, td {
        padding: 4px; /* Reset padding for printing if needed */
    }

    /* Add more print-specific styles if necessary */
}


</style>








</head>
<body>

    <!-- Bordered table -->
    <div class="print-only">
    <div class="header">
        <!-- Your header content goes here -->
        <img src="../img/document-header.png" alt="Logo" style="width: 50rem; align-items: center;">
    </div>


    <div class="p-5 d-flex justify-content-center align-items-center remove-print-padding">

        <table class="table table-bordered">
            <thead>
                <tr>
                       
                    <th colspan="18" class="">
                    <span style="display: block; text-align: left;">Form no. 12</span>
                    <br>
                
                    <div style="display: flex; align-items: center;  justify-content: center;">
                        <div style="text-align: center;">
                            <label style="font-size: 1.2rem;">PROPERTY RETURN SLIP</label>
                            <br>
                            <br>
                        </div>
                    </div>

                        <span style="display: block; text-align: left;">Name of Agency: &nbsp; <?php echo isset($Agency) ? $Agency : 'Not available'; ?> </span>
                        <span style="display: block; text-align: left;">Purpose: &nbsp; <?php echo isset($_POST['Purpose']) ? $_POST['Purpose'] : 'Not selected'; ?> </span>
                    </th>
                </tr>
        </thead>



        <tr style="width: 100%; text-align: center;">
            <td>qty</td>
            <td>unit</td>
            <td colspan='7'>decription</td>
            <td>property no</td>
            <td >PAR/ICS No.</td>
            <td >end user</td>
            <td >unit value</td>
            <td >total value</td>
        </tr>

        <tr style="width: 100%; text-align: center;">
                    <td><?php echo $Qty1; ?> </td>
                    <td><?php echo $Unit1 ?> </td>
                    <td colspan='7'><?php echo isset($Description1) ?></td>
                    <td><?php echo isset($Property_no1) ?></td>
                    <td ><?php echo isset($Par_ics1) ?></td>
                    <td ><?php echo isset($End_User1) ?></td>
                    <td ><?php echo isset($Unit_value1) ?></td>
                    <td ><?php echo isset($Total_value1) ?></td>
        </tr>













                




            <!-- Add your table rows here -->
        
            </tbody>
        </table>

    </div>

    <div class="footer">
        <img src="../img/document-footer.png" alt="Logo">
    </div>

</div>

<!-- Cancel button -->
<div class="d-flex justify-content-end mt-3 fixed-top fixed-right" style="margin-top: 10px; margin-right: 10px; position: fixed; right: 10px; top: 10px;">
    <div style="margin-left: 10px;">

        <img src="../img/back.png" style="height: 60px;"  onclick="goBack()" >

    </div>
</div>


    <div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px; position: fixed; right: 10px; bottom: 10px;">
        <div style="margin-left: 10px;">
     
        <img src="../img/save.png" style="height: 70px;" onclick="saveImage()" >

        <img src="../img/print.png" style="height: 70px;" onclick="printReport()">
        </div>
    </div>
</body>
</html>
<style>
    /* Add this style to make the borders of the input fields invisible */
    .form-control {
        border: none;
        border-bottom: 1px solid #ced4da; /* Adding a bottom border for separation */
    }
</style>

<script>
    function saveImage() {
        // Specify the element to capture (in this case, the element with class "print-only")
        var elementToCapture = document.querySelector('.print-only');

        // Use html2canvas to capture the specified content
        html2canvas(elementToCapture).then(function (canvas) {
            // Convert the canvas to a data URL
            var dataUrl = canvas.toDataURL("image/jpeg");

            // Create a temporary link element
            var link = document.createElement("a");

            // Set the href attribute with the data URL
            link.href = dataUrl;

            // Set the download attribute with a filename (you can change "waste_report.jpg" to your desired filename)
            link.download = "waste_report.jpg";

            // Append the link to the document
            document.body.appendChild(link);

            // Trigger a click event on the link to start the download
            link.click();

            // Remove the link from the document
            document.body.removeChild(link);
        });
    }
</script>
<script>
     // Function to handle checkbox click for the "Distribution" section
     function handleDistributionCheckboxClick(checkbox) {
        // Get all checkboxes in the "Distribution" section
        var checkboxes = document.querySelectorAll('#supplyPropertyUnitCopy, #accountingCopy, #coaCopy');

        // Uncheck all checkboxes except the clicked one
        checkboxes.forEach(function (currentCheckbox) {
            if (currentCheckbox !== checkbox) {
                currentCheckbox.checked = false;
            }
        });
    }
    // Function to navigate back to the previous page
    function goBack() {
        console.log('Going back...');
        window.history.back();
    }

    // Function to print the report
    function printReport() {
        // Use window.print() to open the browser's print dialog
        window.print();
    }
</script>


<script>
    function printReport() {
        // Use window.print() to open the browser's print dialog
        window.print();
    }
</script>


<?php
include('../partials/footer.php')
?>
