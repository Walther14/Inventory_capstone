<?php
include('Controller/db.php');
include('partials/header.php');
include('partials/sidebar.php');
include('partials/topbar.php');

// Retrieve values from the $_POST array
$assetTitle = $_POST['Asset_Title'] ?? '';
$selectedStaff = $_POST['staff'] ?? '';
$place = $_POST['place'] ?? '';
$assumed = $_POST['assumed'] ?? '';
$date = $_POST['date'] ?? '';
$WMR= $_POST['WMR'] ?? '';
$article = isset($_POST['article']) ? $_POST['article'] : [];
$description = isset($_POST['description']) ? $_POST['description'] : [];
$stock_no = isset($_POST['stock_no']) ? $_POST['stock_no'] : [];
$unit = isset($_POST['unit']) ? $_POST['unit'] : [];
$val = isset($_POST['val']) ? $_POST['val'] : [];
$balance = isset($_POST['balance']) ? $_POST['balance'] : [];
$onhand = isset($_POST['onhand']) ? $_POST['onhand'] : [];
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : [];
$value = isset($_POST['value']) ? $_POST['value'] : [];
$remarks = isset($_POST['remarks']) ? $_POST['remarks'] : [];


$name = $_POST['name'] ?? '';
$position = $_POST['position'] ?? '';
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
    
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Waste Report</title>
    <style>
    /* Your existing styles for the document go here */

    /* Styles for the print media */
    @media print {
        body {
            margin: 0; /* Remove default margins */
        }

        .print-only {
            display: block; /* Show elements with class "print-only" */
        }

        /* Hide other elements not meant for printing */
        body > *:not(.print-only) {
            display: none;
        }
    /* Set the page to landscape orientation */
    @page {
                size: landscape;
            }
        /* Remove padding for the specific div when printing */
        div.p-5 {
            padding: 0 !important;
        }
    }

    .form-control {
        margin: 0; /* Reset margin */
        padding: 0; /* Reset padding */
        line-height: 1; /* Reset line-height */
        height: auto; /* Reset height */
        border: none;
    }
</style>


</head>
<body>

<!-- Bordered table -->
<div class="print-only">
    

<div class="p-5 d-flex justify-content-center align-items-center remove-print-padding">

    <table class="table table-bordered">
      
        <tbody>
        <tr style="text-align: center;">
    <td colspan="12">
    <label style="text-align:center;">REPORT ON THE PHYSICAL COUNT OF INVENTORIES
 <br> <?php echo $assetTitle; ?></label>
 <br>
 <label style="text-align:center;">As of <?php echo htmlspecialchars(date('F j, Y', strtotime($date))); ?></label>
 <br>
 <label style="text-align:center;">For which <?php echo $selectedStaff;?> is accountable, having assumed such accountability on <?php echo $assumed;?></label>
</tr>
</tr>

<tr style="width: 100%; text-align: center;">
    <td colspan="2">Article</td>
    <td colspan="2">Description</td>
    <td>Stock No.</td>
    <td colspan="">Unit of Measure</td>
    <td colspan="">Unit of Value</td>
    <td >Balance per <br> card (Quantity)</td>
    <td colspan="">On Hand per <br> Count</td>

    <td>Qty</td>
    <td >Value</td>

    <td colspan="">Remarks</td>
    
</tr>

<?php
// Loop through the entered data and display each row
for ($i = 0; $i < count($article); $i++) {
    echo "<tr>";
    echo "<td colspan='2'>" . wordwrap($article[$i], 30, "<br/>", true) . "</td>";
    echo "<td colspan='2'>" . wordwrap($description[$i], 10, "<br/>", true) . "</td>";
    echo "<td>" . wordwrap($stock_no [$i], 20, "<br/>", true) . "</td>";
    echo "<td colspan=''>" . wordwrap($unit[$i], 50, "<br/>", true) . "</td>";
    echo "<td colspan=''>" . wordwrap($val[$i], 50, "<br/>", true) . "</td>";
    echo "<td colspan=''>" . wordwrap($balance[$i], 20, "<br/>", true) . "</td>";
    echo "<td>" . wordwrap($onhand[$i], 10,  "<br/>", true) . "</td>";
    echo "<td colspan=''>" . wordwrap($quantity[$i], 20, "<br/>", true) . "</td>";
    echo "<td>" . wordwrap($value[$i], 10,  "<br/>", true) . "</td>";
    echo "<td>" . wordwrap($remarks[$i], 10,  "<br/>", true) . "</td>";

    echo "</tr>";
}
?>


<tr style="text-align: left;">
    <td colspan="10">TOTAL</td>
    <td colspan="1"><?php echo number_format($total, 2, '.', ','); ?></td>
    <td colspan="1">TOTAL</td>
</tr>
<tr>
    <td colspan="12">
        <label for="inspected_by" class="form-label">Inspected by</label>
        <br>

        <!-- First set of input fields -->
        <div style="display: inline-block; margin-right: 10px;">
            <input type="text" class="form-control text-center" id="name_inspected" name="name_inspected" placeholder="Name" value="<?php echo $name_inspected; ?>" readonly>
        </div>

        <div style="display: inline-block;">
            <input type="text" class="form-control text-center" id="position_inspected" name="position_inspected" placeholder="Position" value="<?php echo $position_inspected; ?>" readonly>
        </div>

        <!-- Second set of input fields -->
        <div style="display: inline-block; margin-right: 10px;">
            <input type="text" class="form-control text-center" id="name_inspected" name="name_inspected" placeholder="Name" value="<?php echo $name_inspected; ?>" readonly>
        </div>

        <div style="display: inline-block;">
            <input type="text" class="form-control text-center" id="position_inspected" name="position_inspected" placeholder="Position" value="<?php echo $position_inspected; ?>" readonly>
        </div>

            <!-- Second set of input fields -->
            <div style="display: inline-block; margin-right: 10px;">
            <input type="text" class="form-control text-center" id="name_inspected" name="name_inspected" placeholder="Name" value="<?php echo $name_inspected; ?>" readonly>
        </div>

        <div style="display: inline-block;">
            <input type="text" class="form-control text-center" id="position_inspected" name="position_inspected" placeholder="Position" value="<?php echo $position_inspected; ?>" readonly>
        </div>
    </td>
</tr>



<td colspan="12" style="padding: 5px;">
    <label for="witness_to" class="form-label">Distribution</label>
    <!-- Add disabled checkboxes before each label -->
    <input type="checkbox" id="supplyPropertyUnitCopy" style="margin-left: 50px;" disabled>
    <label for="supplyPropertyUnitCopy" class="form-label" style="margin-left: 5px;">Supply and Property Unit Copy</label>
    <input type="checkbox" id="accountingCopy"style="margin-left: 15px;"disabled>
    <label for="accountingCopy" class="form-label" style="margin-left: 5px;">Accounting Copy</label>
    <input type="checkbox" id="coaCopy" style="margin-left: 15px;"disabled>
    <label for="coaCopy" class="form-label" style="margin-left: 5px;">COA Copy</label>
</td>


            <!-- Add your table rows here -->
        </tbody>
    </table>

  


</div>


</div>
</body>

<div class="col-sm-12">
    <div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px;">
        <div style="margin-left: 10px;">
            <button onclick="printReport()" class="btn btn-primary" style="background-color: maroon;">Print</button>
        </div>
    </div>


</div> 
</html>
<style>
    /* Add this style to make the borders of the input fields invisible */
    .form-control {
        border: none;
        border-bottom: 1px solid #ced4da; /* Adding a bottom border for separation */
    }
</style>
<script>
    function printReport() {
        // Use window.print() to open the browser's print dialog
        window.print();
    }
</script>
<?php
include('./partials/footer.php')
?>
