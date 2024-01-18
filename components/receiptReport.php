<?php

include('../Controller/db.php');

// Retrieve values from the $_POST array
$place = $_POST['place'] ?? '';
$agency = $_POST['agency'] ?? '';
$date = $_POST['date'] ?? '';
$WMR = $_POST['WMR'] ?? '';
$item = $_POST['item'] ?? '';

$property_number = isset($_POST['Current_Property_Number']) ? $_POST['Current_Property_Number'] : [];
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : [];
$unit = isset($_POST['unit']) ? $_POST['unit'] : [];
$description = isset($_POST['descript']) ? $_POST['descript'] : [];
$OR = isset($_POST['OR']) ? $_POST['OR'] : [];
$amount = isset($_POST['amount']) ? $_POST['amount'] : [];
$remarks = isset($_POST['remarks']) ? $_POST['remarks'] : [];

$name = $_POST['name'] ?? '';
$date2 = $_POST['date2'] ?? '';
$name3 = $_POST['name_disposal'] ?? '';
$date3 = $_POST['date3'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Waste Report</title>
    <style>
        /* Your existing styles for the document go here */

        body {
            font-family: 'Century Gothic', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            position: relative;
            /* Added to position the footer relative to the body */
        }

        body,
        th,
        td,
        input,
        label {
            font-size: 12px !important;
        }

        .main-content {
            flex: 1;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 200px;
            /* Adjust the margin to accommodate the footer's height */
        }

        th,
        td {
            text-align: center;
            border: 1px solid #ced4da;
            padding: 8px;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            margin-top: auto;
            /* Set margin-top to auto for it to push to the bottom */
        }

        .footer img {
            width: 50rem;
        }

        .header {
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            margin-top: auto;
            /* Set margin-top to auto for it to push to the bottom */
            height: 15vh;
            /* Set the height to 100% of the viewport height, adjust if necessary */
        }

        .header img {
            width: 50rem;
        }


        .form-group {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-group {
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
                display: block;
                /* Reset display value for printing */
            }

            .print-only {
                display: block;
            }

            body>*:not(.print-only) {
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
            margin: 20px auto 200px;
            /* Center the table with top and bottom margins */
        }

        /* Adjust padding for table cells */
        th,
        td {
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
                width: 100%;
                /* Use full width for printing */
                margin: 0;
                /* Reset margin for printing */
            }

            th,
            td {
                padding: 4px;
                /* Reset padding for printing if needed */
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
                <tr style="text-align: right;">
                        <th colspan="12" style="text-align: right;">
                            Annex A-7
                        </th>
                    </tr>
                    <tr>

                        <th colspan="15" class="text-center">
                            
                            <div style="display: flex; align-items: center; justify-content: center;">

                                <div style="text-align: center;">
                                    <label style="font-size: 1.5rem;"> RECEIPT OF RETURNED SEMI-EXPENDABLE PROPERTY
                                    </label>
                                 
                                </div>
                            </div>

                        </th>


                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td colspan="10">
                            <div style="margin: 0.5rem;">
                                <div class="row g-3">
                                    <div colspan="4">
                                        <label for="place" class="form-label">Entity Name:</label>
                                        <input type="text" class="form-control" id="place" name="place" placeholder="Place of Storage" value="<?php echo $place; ?>" readonly>
                                    </div>
                                    <div colspan="4">

                        <td colspan="6">Date:&nbsp; <?php echo htmlspecialchars(date('F j, Y', strtotime($date))); ?>
                            <br>
                            <br>
                            RRSP No. &nbsp; <?php echo $WMR; ?>
                        </td>

        </div>
    </div>
    </td>

    </tr>
    <tr style="text-align: center;">
        <td colspan="15">This is to acknowledge receipt of the returned Semi-Expendable Property</td>

    </tr>
    </div>


    <tr style="width: 100%; text-align: center;">
        <td colspan="4">Item Description</td>
        <td>Quantity</td>
        <td>ICS No.</td>
        <td colspan="4">End User</td>
        <td colspan="3">Remarks</td>
 
    </tr>





    <?php
;

for($i = 0; $i < count($description); $i++){
    ?>
                    <tr>
                        <td colspan="4"><?php echo $description[$i]; ?></td>
                        <td><?php echo $quantity[$i]; ?></td>
                        <td><?php echo $OR [$i]; ?></td>
                        <td colspan="4"><?php echo $amount[$i]; ?></td>
                        <td colspan="3"><?php echo $remarks[$i]; ?></td>
              
                       
                    </tr>
                    <?php
}
?>


    <tr>
        <td colspan="9">
            <div>
                <label for="certified_correct" class="form-label">Returned By:</label>
                <br>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control text-center" id="name" name="name" placeholder="Name" value="<?php echo $name; ?>" readonly><br>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control text-center" id="position" name="position" placeholder="Position" value="<?php echo htmlspecialchars(date('F j, Y', strtotime($date2)));?>" readonly><br>
                </div>
               
            </div>

        </td>
        <td colspan="6">
            <div>
                <label for="disposal_approved" class="form-label">Disposal Approved</label> <br>
                <br>

                <div class="form-group">
                    <input type="text" class="form-control text-center" id="name" name="name" placeholder="Name" value="<?php echo $name3; ?>" readonly><br>
                </div>
                <div class="form-group">
                    <input class="form-control text-center" id="position" name="position" placeholder="Position" value="<?php echo htmlspecialchars(date('F j, Y', strtotime($date3))); ?>" readonly><br>
                </div>

        </td>
    </tr>
    
    <!-- <td colspan="15" style="padding: 5px;">
        <label for="witness_to" class="form-label">Distribution</label>

        <input type="checkbox" id="supplyPropertyUnitCopy" style="margin-left: 50px;" onclick="handleDistributionCheckboxClick(this)">
        <label for="supplyPropertyUnitCopy" class="form-label" style="margin-left: 5px;">Supply and Property Unit Copy</label>

        <input type="checkbox" id="accountingCopy" style="margin-left: 15px;" onclick="handleDistributionCheckboxClick(this)">
        <label for="accountingCopy" class="form-label" style="margin-left: 5px;">Accounting Copy</label>

        <input type="checkbox" id="coaCopy" style="margin-left: 15px;" onclick="handleDistributionCheckboxClick(this)">
        <label for="coaCopy" class="form-label" style="margin-left: 5px;">COA Copy</label>
    </td> -->


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

            <img src="../img/back.png" style="height: 60px;" onclick="goBack()">

            <img src="../img/save.png" style="height: 70px;" onclick="saveImage()">

            <img src="../img/print.png" style="height: 70px;" onclick="printReport()">

        </div>
    </div>


    <div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px; position: fixed; right: 10px; bottom: 10px;">
        <div style="margin-left: 10px;">
        </div>
    </div>
</body>

</html>
<style>
    /* Add this style to make the borders of the input fields invisible */
    .form-control {
        border: none;
        border-bottom: 1px solid #ced4da;
        /* Adding a bottom border for separation */
    }
</style>

<script>
    function saveImage() {
        // Specify the element to capture (in this case, the element with class "print-only")
        var elementToCapture = document.querySelector('.print-only');

        // Use html2canvas to capture the specified content
        html2canvas(elementToCapture).then(function(canvas) {
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
        checkboxes.forEach(function(currentCheckbox) {
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