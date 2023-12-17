<?php
include('../Controller/db.php');


// Retrieve values from the $_POST array
$type = $_POST['type'] ?? '';
$brand_model = $_POST['brand_model'] ?? '';
$serial_engine_no= $_POST['serial_engine_no'] ?? '';
$property_number= $_POST['property_number'] ?? '';
$acquisition_date = $_POST['acquisition_date'] ?? '';
$acquisition_cost = $_POST['acquisition_cost'] ?? '';
$latest_repair = $_POST['latest_repair'] ?? '';
$date_latest_repair = $_POST['date_latest_repair'] ?? '';
$defects_complains = $_POST['defects_complains'] ?? '';
$requested_by = $_POST['requested_by'] ?? '';

$position_designation = $_POST['position_designation'] ?? '';
$requested_date = $_POST['requested_date'] ?? '';
$findings= $_POST['findings'] ?? '';
$pre_inspected= $_POST['pre_inspected'] ?? '';
$pre_designation = $_POST['pre_designation'] ?? '';
$preDate = $_POST['preDate'] ?? '';
$noted_by = $_POST['noted_by'] ?? '';
$noted_position = $_POST['noted_position'] ?? '';
$noted_date = $_POST['noted_date'] ?? '';
$supplier= $_POST['supplier'] ?? '';

$job_order = $_POST['job_order'] ?? '';
$job_date= $_POST['job_date'] ?? '';
$invoice_no= $_POST['invoice_no'] ?? '';
$invoice_date= $_POST['invoice_date'] ?? '';
$amount = $_POST['amount'] ?? '';
$payable_amount = $_POST['payable_amount'] ?? '';
$findings= $_POST['findings'] ?? '';

$inspected_dat = $_POST['inspected_dat'] ?? '';
$inspected_dat = $_POST['inspected_dat'] ?? '';

$inspected_date = $_POST['inspected_date'] ?? '';
$noted_bylower = $_POST['noted_bylower'] ?? '';
$noted_datelower= $_POST['noted_datelower'] ?? '';

$PPR = $_POST['PPR'] ?? '';
$item_number= $_POST['item_number'] ?? '';

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
                        <?php echo $type = $_POST['item_number'] ?? ''; ?>
                        </th>
                    </tr>
                    <th colspan="12" class="text-center">
                        PRE and POST REPAIR INSPECTION
                        <br>
                        Batanes State College
                        <br>
                        <?php echo $type = $_POST['PPR'] ?? ''; ?>

                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4"> <label for="inspectionOffice" style="font-weight: bold;">Description of Property</label></td>
                        <td colspan="4"> <label for="inspectionOffice" style="font-weight: bold;">Description of Property</label></td>
                    </tr>
                    <tr>
                        <td colspan="2"> <label for="inspectionOffice">Type:</label></td>
                        <td colspan="2"> <label for="inspectionOffice"><?php echo $type = $_POST['type'] ?? ''; ?></td>
                        <td colspan="2"> <label for="inspectionOffice">Brand/Model:</label></td>
                        <td colspan="2"> <label for="inspectionOffice"><?php echo $type = $_POST['brand_model'] ?? ''; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"> <label for="inspectionOffice">Serial/Engine No.:</label></td>
                        <td colspan="2"> <label for="inspectionOffice"><?php echo $type = $_POST['serial_engine_no'] ?? ''; ?></td>
                        <td colspan="2"> <label for="inspectionOffice">Property No.:</label></td>
                        <td colspan="2"> <label for="inspectionOffice"><?php echo $type = $_POST['property_number'] ?? ''; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"> <label for="inspectionOffice">Acquisition Date:</label></td>
                        <td colspan="2"> <label for="inspectionOffice"><?php echo $type = $_POST['acquisition_date'] ?? ''; ?></td>
                        <td colspan="2"> <label for="inspectionOffice">Acquisition Cost:</label></td>
                        <td colspan="2"> <label for="inspectionOffice"><?php echo $type = $_POST['acquisition_cost'] ?? ''; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"> <label for="inspectionOffice">Date of Lates Repair:</label></td>
                        <td colspan="2"> <label for="inspectionOffice"><?php echo $type = $_POST['date_latest_repair'] ?? ''; ?></td>
                        <td colspan="2"> <label for="inspectionOffice">Nature of Latest Repair</label></td>
                        <td colspan="2"> <label for="inspectionOffice"><?php echo $type = $_POST['latest_repair'] ?? ''; ?></td>
                    </tr>

              
                    <tr>
                        <td colspan="4">
                            <label for="inspectionOffice" style="font-weight: bold;">Defects/Complaints: 
                            </label>
                            <br>
                            <label for="inspectionOffice">Nature or scope of work to be done:<?php echo $type = $_POST['defects_complains'] ?? ''; ?>
                            </label>
                        </td>
                        <td colspan="4">
                            <label for="inspectionOffice">Requested By: <?php echo $type = $_POST['requested_by'] ?? ''; ?></label>
                            <br>
                            <label for="inspectionOffice">Position/Designation: <?php echo $type = $_POST['position_designation'] ?? ''; ?></label>
                            <br>
                            <label for="inspectionOffice">Date: <?php echo $type = $_POST['requested_date'] ?? ''; ?></label>
                        </td>

                    </tr>

                    <tr>
                        <td colspan="12">
                            <label for="inspectionOffice" style="font-weight: bold;">Pre-Repair</label>

                            <br>
                            <label for="inspectionOffice">Findings:<?php echo $type = $_POST['findings'] ?? ''; ?>
                            </label>

                    </tr>

                    <tr>

                        <td colspan="4">
                            <label for="inspectionOffice">Pre-inpected by:</label>
                            <br>
                            <br>
                            <label for="inspectionOffice" style="padding-left: 100px;"><?php echo $type = $_POST['pre_inspected'] ?? ''; ?></label>
                            

                            <br>
                            <label for="inspectionOffice" style="padding-left: 100px;"><?php echo $type = $_POST['pre_designation'] ?? ''; ?></label>
                            <br>
                            <label for="inspectionOffice" style="padding-left: 100px;"><?php echo $type = $_POST['preDate'] ?? ''; ?></label>

                        </td>




                        <td colspan="4">
                            <label for="inspectionOffice">Noted by:</label>
                            <br>
                            <br>
                            <label for="inspectionOffice" style="padding-left: 100px;"><?php echo $type = $_POST['noted_by'] ?? ''; ?></label>
                      
                            <br>

                            <label for="inspectionOffice" style="padding-left: 100px;"><?php echo $type = $_POST['noted_position'] ?? ''; ?></label>
                            <br>
                            <label for="inspectionOffice" style="padding-left: 100px;"><?php echo $type = $_POST['noted_date'] ?? ''; ?></label>

                        </td>


                    </tr>

                    <tr>
                        <td colspan="12">
                            <label for="inspectionOffice" style="font-weight: bold;">Post-Repair</label>
                        </td>

                    </tr>
     

                    <tr>
                        <td colspan="4">
                            <label for="inspectionOffice">Repair Shop/Supplier: <?php echo $type = $_POST['supplier'] ?? ''; ?></label><br>
                            <label for="inspectionOffice">Job Order: <?php echo $type = $_POST['job_order'] ?? ''; ?></label><br>
                            <label for="inspectionOffice">Invoice No: <?php echo $type = $_POST['invoice_no'] ?? ''; ?></label><br>
                            <label for="inspectionOffice">Amount per Job Order: <?php echo $type = $_POST['amount'] ?? ''; ?></label>
                        </td>
                        <td colspan="4">
                            <label for="inspectionOffice">Findings: <?php echo $type = $_POST['findings'] ?? ''; ?></label><br>
                            <label for="inspectionOffice">Date <?php echo $type = $_POST['job_date'] ?? ''; ?></label><br>
                            <label for="inspectionOffice">Date <?php echo $type = $_POST['invoice_date'] ?? ''; ?></label><br>
                            <label for="inspectionOffice">Payable: <?php echo $type = $_POST['payable_amount'] ?? ''; ?></label>
                        </td>

                    </tr>



                    <tr>
                        <td colspan="4"><label for="inspectionOffice" style="text-align: left;">Inspected by:</label></td>
                        <td colspan="4"><label for="inspectionOffice" style="text-align: left;">Inspected by:</label></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td colspan="4">
                            <br>
                            <?php echo $inspected_by = $_POST['inspected_dat'] ?? ''; ?>
                            <br>
                            <label for="inspectionOffice">-------------------------------------------------</label>
                            <br>
                            <label for="inspectionOffice"><?php echo $type = $_POST['inspected_date'] ?? ''; ?></label>
                        </td>
                        <td colspan="4">
                            <br>
                            <?php echo $inspectionOffice = $_POST['noted_bylower'] ?? ''; ?>
                            <br>
                            <label for="inspectionOffice">-------------------------------------------------</label>
                            <br>
                            <label for="inspectionOffice"><?php echo $type = $_POST['noted_datelower'] ?? ''; ?></label>
                        </td>
                    </tr>

           
                    <td colspan="15" style="padding: 5px;">
                        <label for="witness_to" class="form-label">Distribution</label>

                        <!-- Add disabled checkboxes before each label -->
                        <input type="checkbox" id="supplyPropertyUnitCopy" style="margin-left: 50px;" onclick="handleDistributionCheckboxClick(this)">
                        <label for="supplyPropertyUnitCopy" class="form-label" style="margin-left: 5px;">Supply and Property Unit Copy</label>

                        <input type="checkbox" id="accountingCopy" style="margin-left: 15px;" onclick="handleDistributionCheckboxClick(this)">
                        <label for="accountingCopy" class="form-label" style="margin-left: 5px;">Accounting Copy</label>

                        <input type="checkbox" id="coaCopy" style="margin-left: 15px;" onclick="handleDistributionCheckboxClick(this)">
                        <label for="coaCopy" class="form-label" style="margin-left: 5px;">COA Copy</label>
                    </td>






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
