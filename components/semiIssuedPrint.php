<?php
include('../Controller/db.php');

$inspectionOfficer = $_POST['inspectionOfficer'] ?? '';
$inspectionOffice = $_POST['inspectionOffice'] ?? '';
$propertyOfficer = $_POST['propertyOfficer'] ?? '';
$inspectionOffic = $_POST['inspectionOffic'] ?? '';
$pre_designation = $_POST['pre_designation'] ?? '';
$preDate = $_POST['preDate'] ?? '';
$noted_by = $_POST['noted_by'] ?? '';
$noted_position = $_POST['noted_position'] ?? '';
$noted_date = $_POST['noted_date'] ?? '';
$supplier = $_POST['supplier'] ?? '';


// Retrieve values from the $_POST array
$date1 = $_POST['date1'] ?? '';
$serial = $_POST['serial'] ?? '';
$fund = $_POST['fund'] ?? '';

// Initialize arrays for other corresponding values

$RIS_No = isset($_POST['RIS_No']) ? $_POST['RIS_No'] : [];
$RCC = isset($_POST['RCC']) ? $_POST['RCC'] : [];
$description = isset($_POST['description']) ? $_POST['description'] : [];
$Asset_Title = isset($_POST['Asset_Title']) ? $_POST['Asset_Title'] : [];
$unit = isset($_POST['unit']) ? $_POST['unit'] : [];
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : [];
$unit_cost = isset($_POST['unit_cost']) ? $_POST['unit_cost'] : [];
$RIS_No = isset($_POST['RIS_No']) ? $_POST['RIS_No'] : [];




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSP</title>
    <!-- Bordered table -->
    <style>
        /* Your existing styles for the document go here */

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            orientation: portrait;
            position: relative;
            /* Added to position the footer relative to the body */
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
            border: none !important;
            border-bottom: 1px solid #ced4da !important;
            text-align: center !important;
            width: 100%;
        }

        body,
        th,
        td,
        .form-control,
        .form-group label {
            font-family: 'Century Gothic', sans-serif;
        }

        .form-group label {
            text-align: center;
        }

        .footer {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            margin-top: auto;
        }

        .footer img {
            width: 50rem;
        }

        @page {
            size: A4 portrait;
            /* Set the paper size to A4 with portrait orientation */
            margin: 1cm;
            /* Set margins for printing */
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
            width: 50%;
            margin: 30px auto 200px;
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

                padding: 0px;
                padding-left: 3px;
                /* Reset padding for printing if needed */
            }

            /* Add more print-specific styles if necessary */
        }
    </style>

</head>

<body>

    <div class="print-only">
        <div class="header">
            <!-- Your header content goes here -->
            <img src="../img/document-header.png" alt="Logo" style="width: 50rem; align-items: center;">
        </div>
        <div class="p-5 d-flex justify-content-center align-items-center">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="12" style="text-align: right;">
                            Annex A-7
                        </th>
                    </tr>
                    <th colspan="12" class="text-center">
                        REPORT OF SEMI-EXPENDABLE PROPERTY ISSUED
                        <br>
                        Batanes State College
                    </th>
                </thead>

                <tr>
                    <td colspan="3"> Serial No.:<?php echo $type = $_POST['serial'] ?? ''; ?></td>
                    <td colspan="3"> Fund Cluster:<?php echo $type = $_POST['fund'] ?? ''; ?></td>
                    <td colspan="3">Date: <?php echo date('F j, Y', strtotime($_POST['date1'] ?? '')); ?></td>


                </tr>
                <tr>
                    <td colspan="6"> To be filled up in the Supply and Property Unit</td>
                    <td colspan="4"> To be filled up by Accounting Unit</td>
                </tr>

                <tbody>

                    <tr style="text-align: center;">
                        <td>ICS No.</td>
                        <td>Responsibility Center Code</td>
                        <td>Semi-Expendable Property No.</td>
                        <td>Item Description</td>
                        <td>Unit</td>
                        <td>Qty. Issued</td>
                        <td>Unit Cost</td>
                        <td>Amount</td>
                    </tr>

                   <!-- HERE -->
<?php

for($i = 0; $i < count($RIS_No); $i++){
?>
                    <tr>
                        <td><?php echo $RIS_No[$i]; ?></td>
                        <td><?php echo $RCC[$i]; ?></td>
                        <td><?php echo $description[$i]; ?></td>
                        <td><?php echo $Asset_Title[$i]; ?></td>
                        <td><?php echo $unit[$i]; ?></td>
                        <td><?php echo $quantity[$i]; ?></td>
                        <td><?php echo $unit_cost[$i]; ?></td>
                        <td><?php echo $quantity[$i] * $unit_cost[$i]; ?></td>
                    </tr>
<?php
}
?>
                    <td colspan="4" style="text-align: center;"> I hereby certify to the correctness of the above information
                        <br>
                        <br>
                        <?php echo $inspectionOfficer; ?>
                        <br>
                        <?php echo $inspectionOffice; ?>
                    </td>
                    <td colspan="5" style="text-align: center;"> Posted by:
                        <br>
                        <br>
                        <?php echo $propertyOfficer; ?>
                        <br>
                        <?php echo $inspectionOffic; ?>
                    </td>
                    </tr>

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

        </div>
    </div>


    <div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px; position: fixed; right: 10px; bottom: 10px;">
        <div style="margin-left: 10px;">

            <img src="../img/save.png" style="height: 70px;" onclick="saveImage()">

            <img src="../img/print.png" style="height: 70px; display:flex" onclick="printReport()">
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
            link.download = "inspection and acceptance report.jpg";

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
        history.back();
    }


    // Function to print the report
    function printReport() {
        // Use window.print() to open the browser's print dialog
        window.print();
    }
</script>