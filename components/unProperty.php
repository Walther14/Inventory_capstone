<?php

use function PHPSTORM_META\type;

include('../Controller/db.php');


// Retrieve values from the $_POST array

if (isset($_POST['unprop'])) {
    $formdata = $_POST['unprop'];
 }
 
$Date = $_POST['Date'] ?? '';

$name = $_POST['name'] ?? '';
$designation = $_POST['designation'] ?? '';
$station = $_POST['station'] ?? '';
$fund = $_POST['fund'] ?? '';

$date = $_POST['date'] ?? '';
$description = $_POST['description'] ?? '';
$quantity = $_POST['quantity'] ?? '';
$unit_cost = $_POST['unit_cost'] ?? '';
$total_cost = $_POST['total_cost'] ?? '';
$classification = $_POST['classification'] ?? '';
$property_no = $_POST['property_no'] ?? '';
$date_acquired = $_POST['date_acquired'] ?? '';
$carrying_amount = $_POST['carrying_amount'] ?? '';
$how = $_POST['how'] ?? '';

$destroyed = $_POST['destroyed'] ?? '';
$sold = $_POST['sold'] ?? '';
$continued = $_POST['continued'] ?? '';
$salvaged = $_POST['salvaged'] ?? '';
$total = $_POST['total'] ?? '';
$appraised = $_POST['appraised'] ?? '';
$or = $_POST['or'] ?? '';
$amount = $_POST['amount'] ?? '';

$witness_name = $_POST['witness_name'] ?? '';
$inspection_name = $_POST['inspection_name'] ?? '';
$approved_position = $_POST['approved_position'] ?? '';
$approved_name = $_POST['approved_name'] ?? '';
$requested_position = $_POST['requested_position'] ?? '';
$requested_name = $_POST['requested_name'] ?? '';
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
            size: A4 landscape;
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
            margin: 0px auto;
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

                /* Reset margin for printing */
            }

            th,
            td {
                text-align: center;
                padding: 0px;
                padding-right: 2px;
                padding-left: 2px;

                /* Reset padding for printing if needed */
            }

            tr {
                page-break-inside: avoid;
            }

            .note,
            .form-section {
                page-break-inside: avoid;
            }

            /* Add more print-specific styles if necessary */
        }
    </style>

</head>

<body>

    <div class="print-only">
        <div class="p-5 d-flex justify-content-center align-items-center">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="20" style="text-align: right;">
                            Annex A.10
                        </th>
                    </tr>
                    <th colspan="20" class="text-center">
                        INVENTORY AND INSPECTION REPORT OF UNSERVICEABLE PROPERTY
                        <br>
                        As of <?php echo date("F j, Y", strtotime($Date)); ?>
                        <br>
                        Batanes State College
                    </th>
                </thead>

                <tr>
                    <td colspan="7"> Accountable Officer:<br><?php echo $type = $_POST['name'] ?? ''; ?></td>
                    <td colspan="5"> Designation:<br><?php echo $type = $_POST['designation'] ?? ''; ?></td>
                    <td colspan="5"> Designation:<br><?php echo $type = $_POST['station'] ?? ''; ?></td>
                    <td colspan="5"> Fund Cluster:<br><?php echo $type = $_POST['fund'] ?? ''; ?></td>


                </tr>
                <tr>
                    <td colspan="12">INVENTORY</td>
                    <td colspan="6"> INSPECTION REPORT</td>
                    <td colspan="3"> RECORD OF SALES</td>

                </tr>

                <tbody>

                    <tr style="text-align: center;">
                        <td colspan="4">Articles</td>
                        <td>qty.</td>
                        <td>Unit Cost</td>
                        <td>Total Cost</td>
                        <td colspan="2">Classification</td>
                        <td>Property No.</td>
                        <td>Date Acquired</td>
                        <td>How rendered uncerviceable</td>
                        <td>Destroyed</td>
                        <td>Sold</td>
                        <td>Continued in service</td>
                        <td>To be salvaged</td>
                        <td>Total</td>
                        <td>Appraised Valuation</td>
                        <td>OR No.</td>
                        <td>Amount</td>
                    </tr>

                    <?php
var_dump($formdata['description']);
                    ?>
     
                    <?php
                // for($i = 0; $i < count($description); $i++){
                    ?>
                        <tr>
                            <td colspan="4"><?php echo $formdata['description']; ?></td>
                            <td><?php echo $formdata['quantity']; ?></td>
                            <td><?php echo $formdata['unit_cost']; ?></td>
                            <td><?php echo $formdata['total_cost']; ?></td>
                            <td colspan="2"><?php echo $formdata['classification']; ?></td>
                            <td><?php echo $formdata['property_no'] ?></td>
                            <td><?php echo $formdata['date_acquired']; ?></td>
                            <td><?php echo $formdata['how']; ?></td>
                            <td><?php echo $formdata['destroyed']; ?></td>
                            <td><?php echo $formdata['sold'] ; ?></td>
                            <td><?php echo $formdata['continued']; ?></td>
                            <td><?php echo $formdata['salvaged']; ?></td>
                            <td><?php echo $formdata['total']; ?></td>
                            <td><?php echo $formdata['appraised']; ?></td>
                            <td><?php echo $formdata['or']; ?></td>
                            <td><?php echo $formdata['amount']; ?></td>
                        </tr>
                    <?php
                // }
                    ?>


                    <td colspan="5" style="text-align:justify;"> I hereby request inspection and disposition, pursuant to Section 79 of P.D. No. 1445, of the property enumerated above
                        <br>
                        <br>
                        Requested by:
                        <br>
                        <p style="text-align: center;"><?php echo $requested_name; ?> </p>
                        <p style="text-align: center;"><?php echo $requested_position; ?></p>
                    </td>


                    <td colspan="5">
                        <p style="margin-top: 100px;"></p>



                        Approved by:
                        <p style="text-align: center;"><?php echo $approved_name; ?> </p>
                        <p style="text-align: center;"><?php echo $approved_position; ?></p>

                    </td>
                    <td colspan="5" style="text-align:justify;"> I certify that I have inspected each and every article enumerated in this report, and that the disposition made thereof was, in my judgement, the best for the public interest.
                        <p style="margin-top: 100px; text-align:center;">
                            <?php echo $inspection_name; ?> </p>

                    </td>



                    <td colspan="5" style="text-align: justify;"> I certify that i have witnessed the disposition of the articles enumerated on this report this ____ day of ____________, _______
                        <p style="margin-top: 100px; text-align:center;">
                            <?php echo $witness_name; ?> </p>

                    </td>

                    </tr>

                </tbody>
            </table>

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
            link.download = "INSPECTION REPORT OF UNSERVICEABLE SEMI-EXPENDABLE PROPERTY.jpg";

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