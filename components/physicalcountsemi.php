<?php
include('../Controller/db.php');


// Retrieve values from the $_POST array
$assetTitle = $_POST['Asset_Title'] ?? '';
$staff = $_POST['staff'] ?? '';
$place = $_POST['place'] ?? '';
$assumed = $_POST['assumed'] ?? '';
$Date_Acquired = $_POST['Date_Acquired'] ?? '';
$WMR= $_POST['WMR'] ?? '';
$article = isset($_POST['article']) ? $_POST['article'] : [];
$description = isset($_POST['description']) ? $_POST['description'] : [];
$stock_no = isset($_POST['Current_Property_Number']) ? $_POST['Current_Property_Number'] : [];
$unit = isset($_POST['unit']) ? $_POST['unit'] : [];
$val = isset($_POST['val']) ? $_POST['val'] : [];
$balance = isset($_POST['balance']) ? $_POST['balance'] : [];
$onhand = isset($_POST['onhand']) ? $_POST['onhand'] : [];
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : [];
$value = isset($_POST['value']) ? $_POST['value'] : [];
$remarks = isset($_POST['remarks']) ? $_POST['remarks'] : [];

$nameChair = $_POST['nameChair'] ?? '';
$positionChair= $_POST['positionChair'] ?? '';
$name1 = $_POST['name1'] ?? '';
$position1 = $_POST['position1'] ?? '';
$name2 = $_POST['name2'] ?? '';
$position2 = $_POST['position2'] ?? '';
$name3= $_POST['name3'] ?? '';
$position3 = $_POST['position3'] ?? '';
$name4 = $_POST['name4'] ?? '';
$position4 = $_POST['position4'] ?? '';
$name5 = $_POST['name5'] ?? '';
$position5 = $_POST['position5'] ?? '';
$name6 = $_POST['name6'] ?? '';
$position6 = $_POST['position6'] ?? '';
$office= $_POST['office'] ?? '';

$name_disposal = $_POST['name_disposal'] ?? '';
$by_authority = $_POST['by_authority'] ?? '';

$name_inspected = $_POST['name_disposal'] ?? '';
$position_inspected = $_POST['position_inspected'] ?? '';

$name_witness = $_POST['name_witness'] ?? '';
$position_witness = $_POST['position_witness'] ?? '';


$checkbox1 = isset($_POST['checkbox1']) ? $_POST['checkbox1'] : '';
$checkboxGroup = isset($_POST['checkboxGroup']) ? $_POST['checkboxGroup'] : [];
$total = array_sum($value);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
  
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORT ON THE PHYSICAL COUNT OF SEMI-EXPENDABLE PROPERTY
</title>
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

  
    .main-content {
        flex: 1;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 0px; /* Adjust the margin to accommodate the footer's height */
    }

    th, td {
        border: 1px solid #ced4da;
        padding: 0px;
        font-size: 12; /* Adjust font size as needed */

    }

    .footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    text-align: center;
    margin-top: 0; /* Adjust the margin-top value */
}


    .footer img {
        width: 60rem;
    }

    .header {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    margin-top: auto; /* Set margin-top to auto for it to push to the bottom */
    height: 15vh; /* Set the height to 100% of the viewport height, adjust if necessary */
}

.header img {
    width: 60rem;}

 
    .form-group {
   display: flex;
   justify-content: center;
   align-items: center;
}.form-group {
   text-align: center;
}

.form-control {
    
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
    width: 60%;
    margin: 50px auto 200px; /* Center the table with top and bottom margins */
}

/* Adjust padding for table cells */
th, td {
    font-size: 12; /* Adjust font size as needed */

    text-align: center;
    border: 1px solid #ced4da;
    padding-left: 5px;
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
        width: 99%; /* Use full width for printing */
        margin: 1px auto 200px; /* Center the table with top and bottom margins */
    }

    th, td {
    padding-left: 5px;
    }

    /* Add more print-specific styles if necessary */
}


</style>


</head>
<body>

<div class="print-only">
<div class="header">
    <!-- Your header content goes here -->
    <img src="../img/document-header.png" alt="Logo" style="width: 60rem; align-items: center;">
</div>

<div class="p-5 d-flex justify-content-center align-items-center remove-print-padding">

    <table class="table table-bordered">
      
        <tbody>
        <tr style="text-align: center;">
        <tr>
                        <td colspan="12" style="text-align: right; padding-right: 3px;">
                            Annex A.8
                        </td>
                    </tr>
    <td colspan="12">
    <label style="text-align:center;">REPORT ON THE PHYSICAL COUNT OF SEMI-EXPENDABLE PROPERTIES
 <br> <?php echo $assetTitle; ?></label>
 <br>
 <label style="text-align:center;">As of <?php echo htmlspecialchars(date('F j, Y', strtotime($Date_Acquired))); ?></label>
 <br>
 <label style="text-align:center;">For which <?php echo $staff;?> is accountable, having assumed such accountability on <?php echo $assumed;?></label>
</tr>
</tr>
<tr style="width: 100%; text-align: center; font-size: 12px;">
<td>   </td>
    <td colspan="3"></td>
    <td>   </td>
    <td>   </td>
    <td>   </td>  <td>   </td>
    <td></td>
    <td colspan="2">Shortage/Overage</td>
  
    <td></td>

   

    
</tr>

<tr style="width: 100%; text-align: center;">
    <td> Article</td>
    <td colspan="3">Description</td>
    <td>Property No.</td>
    <td>Unit of Measure</td>
    <td >Unit of Value</td>
    <td >Balance per <br> card (Qty)</td>
    <td>On Hand per <br> (Count)</td>

    <td>Qty</td>
    <td >Value</td>

    <td>Remarks</td>
    
</tr>

<?php
// Function to break the text into lines with a maximum length of $lineLength characters
function breakText($text, $lineLength) {
    return str_split($text, $lineLength);
}

// Loop through the entered data and display each row
for ($i = 0; $i < count($article); $i++) {
    echo "<tr>";
    echo "<td>" . wordwrap($article[$i], 30, "<br/>", true) . "</td>";

    // Break the description into lines with a maximum length of 35 characters
    $descriptionLines = breakText($description[$i], 100);

    // Display each line in a separate cell
    echo "<td colspan='3'>";
    foreach ($descriptionLines as $line) {
        echo $line . "<br/>";
    }
    echo "</td>";

    echo "<td>" . wordwrap($stock_no[$i], 20, "<br/>", true) . "</td>";
    echo "<td>" . wordwrap($unit[$i], 5, "<br/>", true) . "</td>";
    echo "<td>₱" . number_format($val[$i], 2, '.', ',') . "</td>";
    echo "<td>" . wordwrap($balance[$i], 20, "<br/>", true) . "</td>";
    echo "<td>" . wordwrap($onhand[$i], 10, "<br/>", true) . "</td>";
    echo "<td>" . wordwrap($quantity[$i], 10, "<br/>", true) . "</td>";
    echo "<td>₱" . number_format($value[$i], 2, '.', ',') . "</td>";
    echo "<td>" . wordwrap($remarks[$i], 50, "<br/>", true) . "</td>";

    echo "</tr>";
}
?>



<tr style="text-align: left;">
    <td colspan="10" style="text-align: left;">  TOTAL</td>
    <td colspan="1">₱<?php echo number_format($total, 2, '.', ','); ?></td>
    <td colspan="1"></td>
</tr>

    
        <td colspan="12" for="inspected_by" style="text-align: left;">Certified Correct by:</td>    

<td style="padding: 0px;">
        <br>
        <tr style="width: 100%; text-align: center; margin-bottom: 10px;">
    <td colspan="4" style="margin-bottom: 10;">
        <div style="margin-top: 7px; margin-bottom: 0;"><?php echo $nameChair; ?> <br> <?php echo $positionChair; ?></div>
    </td>
    <td colspan="4" style="margin-bottom: 10px;">
        <div style="margin-top: 7px; margin-bottom: 0;"><?php echo $name1; ?> <br> <?php echo $position1; ?></div>
    </td>
    <td colspan="4" style="margin-bottom: 10px;">
        <div style="margin-top: 7px; margin-bottom: 0;"><?php echo $name2; ?> <br> <?php echo $position2; ?></div>
    </td>
</tr>


<tr style="width: 100%; text-align: center; margin-bottom: 10px;">
    <td colspan="6" style="margin-bottom: 10px;">
        <div style="margin-top: 7px;"><?php echo $name3; ?> <br> <?php echo $position3; ?></div>
    </td>
    <td colspan="6" style="margin-bottom: 10px;">
        <div style="margin-top: 7px;"><?php echo $name4; ?> <br> <?php echo $position4; ?></div>
    </td>
    

</tr>
<td colspan="6" for="inspected_by" style="text-align: left;">Approved by:</td>    
<td colspan="6" for="inspected_by" style="text-align: left;">Witnessed by:</td>    

<tr style="width: 100%; text-align: center; margin-bottom: 10px;">

<td colspan="6" style="margin-bottom: 10px;">
        <div style="margin-top: 7px;"><?php echo $name5; ?> <br> <?php echo $position5; ?></div>
    </td>
    <td colspan="6" style="margin-bottom: 10px;">
        <div style="margin-top: 7px;"><?php echo $name6; ?> <br> <?php echo $position6; ?></div>
    </td>


</tr>

</td>   




<td colspan="12" style="padding: 1px; text-align: left;">
    <label for="witness_to" class="form-label" style="padding-left: 5px;">Distribution</label>
    <!-- Add disabled checkboxes before each label -->
    <input type="checkbox" id="supplyPropertyUnitCopy" style="margin-left: 50px;">
    <label for="supplyPropertyUnitCopy" class="form-label" style="margin-left: 5px;">Supply and Property Unit Copy</label>
    <input type="checkbox" id="accountingCopy"style="margin-left: 15px;">
    <label for="accountingCopy" class="form-label" style="margin-left: 5px;">Accounting Copy</label>
    <input type="checkbox" id="coaCopy" style="margin-left: 15px;">
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

        <img src="../img/back.png" style="height: 60px;"  onclick="goBack()" >
        
           <img src="../img/save.png" style="height: 70px;" onclick="saveImage()" >
        
           <img src="../img/print.png" style="height: 70px;" onclick="printReport()">

    </div>
</div>

<div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px; position: fixed; right: 10px; bottom: 10px;">
        <div style="margin-left: 10px;">
     
        <!-- <img src="../img/save.png" style="height: 70px;" onclick="saveImage()" >

        <img src="../img/print.png" style="height: 70px;" onclick="printReport()"> -->
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
            link.download = "Physical Count of Inventories.jpg";

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
