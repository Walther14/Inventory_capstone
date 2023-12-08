<?php
include('../Controller/db.php');


// Retrieve values from the $_POST array
$agency = $_POST['agency'] ?? '';
$supplier = $_POST['supplier'] ?? '';
$iarNo = $_POST['IAR_No'] ?? '';
$poNo = $_POST['PO_No'] ?? '';
$date = $_POST['date'] ?? '';
$invoice = $_POST['invoice'] ?? '';
$date2 = $_POST['date2'] ?? '';
$requisitioningOffice = $_POST['requisitioning_office'] ?? '';
$stockNumbers = isset($_POST['stock_No']) ? $_POST['stock_No'] : [];
$units = isset($_POST['unit']) ? $_POST['unit'] : [];
$descriptions = isset($_POST['description']) ? $_POST['description'] : [];
$quantities = isset($_POST['quantity']) ? $_POST['quantity'] : [];

$date3 = $_POST['date3'] ?? '';
$date4 = $_POST['date4'] ?? '';

$checkbox1 = isset($_POST['checkbox1']) ? $_POST['checkbox1'] : '';
$checkboxGroup = isset($_POST['checkboxGroup']) ? $_POST['checkboxGroup'] : [];

// Now $checkbox1 and $checkboxGroup contain the selected values
// You can use them as needed in your further processing

$inspectionOffice = $_POST['inspectionOffice'] ?? '';
$propertyOfficer = $_POST['propertyOfficer'] ?? '';

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
        position: relative; /* Added to position the footer relative to the body */
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
        line-height:1;
        height: auto;
        border: none;
    }
/* Adjust the margin and width of the table for normal view */
table {
    border-collapse: collapse;
    width: 50%;
    margin: 30px auto 200px; /* Center the table with top and bottom margins */
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
        padding: 8px; /* Reset padding for printing if needed */
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
                    Apendix 9-2
                </th>
            </tr>
            <th colspan="12" class="text-center">
                INSPECTION AND ACCEPTANCE REPORT

                <div class="col-sm-12" style="margin: 20px auto; text-align: center; margin-bottom: 0px;">
                    <input style="text-align: center;" type="text" class="form-control" id="supplier" name="supplier" placeholder="Supplier" required value="<?php echo $agency ?>" readonly>
                    <label for="supplier" class="form-label">Agency</label>
                </div>

            </th>
        </thead>
        <tbody>
            <tr>
                <td colspan="15">
                    <div style="margin: 0.5rem; margin-bottom: 0px; margin-top: 0px;">
                        <div class="row g-3">
                            <div class="col-6" style="display: inline-block; width: 45%;">
                                <label for="supplier" class="form-label">Supplier</label>
                                <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Supplier" required value="<?php echo $supplier; ?>" readonly>
                            </div>
                            <div class="col-3" style="display: inline-block; width: 45%;">
                                <label for="IAR_No" class="form-label">IAR No.</label>
                                <input type="text" class="form-control" id="IAR_No" name="IAR_No" placeholder="IAR Number" required value="<?php echo $iarNo; ?>" readonly>
                            </div>
                            <div class="col-3" style="display: inline-block; width: 30%;">
                                <label for="PO_No" class="form-label">PO No.</label>
                                <input type="text" class="form-control" id="PO_No" name="PO_No" placeholder="PO Number" value="<?php echo $poNo; ?>" readonly>
                            </div>
                            <div class="col-3" style="display: inline-block; width: 17%; margin-top: 10px;">
    <label for="date" class="form-label">Date</label>
    <?php
        $formattedDate = date_create($date2)->format('F j, Y');
    ?>
    <input type="text" class="form-control" id="date" name="date" placeholder="date" value="<?php echo htmlspecialchars($formattedDate); ?>" readonly>
</div>

                            <div class="col-3" style="display: inline-block; width: 30%; margin-top: 10px;">
                                <label for="invoice" class="form-label">Invoice No.</label>
                                <input type="text" class="form-control" id="invoice" name="invoice" placeholder="invoice" value="<?php echo $invoice; ?>" readonly>
                            </div>
                        
    <div class="col-3" style="display: inline-block; width: 17%;">
    <label for="date2" class="form-label">Date</label>
    <input type="text" class="form-control" id="date2" name="date2" placeholder="date" value="<?php echo htmlspecialchars(date('F j, Y', strtotime($date2)));  ?>" readonly>
</div>
                            <div class="col-sm-12" style="margin-top: 10px;">
                                <label for="requisitioning_office" class="form-label">Requisitioning Office/Department</label>
                                <input type="text" class="form-control" id="requisitioning_office" name="requisitioning_office" placeholder="Requisitioning Office/Department" required value="<?php echo $requisitioningOffice; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

        <tr style="text-align: center;">
            <td colspan="2">Stock No.</td>
            <td>Unit</td>
            <td colspan="3">Description</td>
            <td >QTY</td>
        </tr>

        <?php
        // Loop through the entered data and display each row
        for ($i = 0; $i < count($stockNumbers); $i++) {
            echo "<tr>";
            echo "<td colspan='2'>{$stockNumbers[$i]}</td>";
            echo "<td>{$units[$i]}</td>";
            echo "<td colspan='3'>{$descriptions[$i]}</td>";
            echo "<td >{$quantities[$i]}</td>";
            echo "</tr>";
        }
        ?>
        <tr style="text-align: center;">
            <td colspan="4">INSPECTION</td>
         
            <td colspan="4">ACCEPTANCE</td>
        </tr>
        
        <tr style="text-align: left;">
    <td colspan="4">Date Inspected: <?php echo htmlspecialchars(date('F j, Y', strtotime($date3))); ?></td>
    <td colspan="4">Date Received: <?php echo htmlspecialchars(date('F j, Y', strtotime($date4))); ?></td>
</tr>

<tr style="text-align: left;">
    <td colspan="4">
        <input type="checkbox" id="checkbox1" name="checkbox1" value="Inspected, verified and found">
        <label for="checkbox1">Inspected, verified and found<br>in order as to quantity and specifications</label>
    </td>
    <td colspan="4">
        <input type="checkbox" id="checkbox2" name="checkboxGroup[]" value="Complete">
        <label for="checkbox2">Complete</label>
        <br>
        <input type="checkbox" id="checkbox3" name="checkboxGroup[]" value="Partial">
        <label for="checkbox3">Partial</label>
    </td>
</tr>

<tr style="text-align: center;">
    <td colspan="4">
    <br>
        <?php echo $inspectionOffice = $_POST['inspectionOffice'] ?? ''; ?>
        <br>
        <label for="inspectionOffice">-------------------------------------------------</label>
        <br>
        <label for="inspectionOffice">Inspection Office/Inspection Committee:</label>
    </td>
    <td colspan="4">
    <br>
        <?php echo $inspectionOffice = $_POST['propertyOfficer'] ?? ''; ?>
        <br>
        <label for="inspectionOffice">-------------------------------------------------</label>
        <br>
        <label for="inspectionOffice">Property Officer</label>
    </td>
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
