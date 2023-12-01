<?php
include('../Controller/db.php');
include('../partials/header.php');
include('../partials/sidebar.php');
include('../partials/topbar.php');

// Retrieve values from the $_POST array
$place = $_POST['place'] ?? '';
$date = $_POST['date'] ?? '';
$WMR= $_POST['WMR'] ?? '';
$item = isset($_POST['item']) ? $_POST['item'] : [];
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : [];
$unit = isset($_POST['unit']) ? $_POST['unit'] : [];
$description = isset($_POST['description']) ? $_POST['description'] : [];
$OR = isset($_POST['OR']) ? $_POST['OR'] : [];
$amount = isset($_POST['amount']) ? $_POST['amount'] : [];

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
$total = array_sum($amount);

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
        <thead>
           
        <th colspan="12" class="text-center">
    <div style="display: flex; align-items: center; justify-content: center;">
        <img src="../img/BSC_LOGO.png" alt="Logo" style="height: 80px; width: 80px; margin-right: 20px;">
        <div style="text-align: center;">
            <label style="font-size: 1.5rem;">WASTE REPORT</label>
            <br>
            Batanes State College
            <br>
            Agency
        </div>
    </div>
</th>




        </thead>
        <tbody>
        <tr>
    <td colspan="9">
        <div style="margin: 0.5rem;">
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="place" class="form-label">Place of Storage</label>
                    <input type="text" class="form-control" id="place" name="place" placeholder="Place of Storage" value="<?php echo $place; ?>" readonly>
                </div>
                <div class="col-6">
            
                <td colspan="4">Date:&nbsp; <?php echo htmlspecialchars(date('F j, Y', strtotime($date))); ?>
                <br>
                <br>
                WMR Ref. No.  &nbsp; <?php echo $WMR; ?></td>

                </div>
            </div>

            <tr style="text-align: center;">
    <td colspan="12">ITEMS FOR DISPOSAL</td>
</tr>
        </div>
    </td>
</tr>

<tr style="width: 100%; text-align: center;">
    <td colspan="4">Item</td>
    <td colspan="1">Qty</td>
    <td>Unit</td>
    <td colspan="4">Description</td>
    <td colspan="1">OR No.</td>
    <td >Amount</td>
</tr>

<?php
// Loop through the entered data and display each row
for ($i = 0; $i < count($item); $i++) {
    echo "<tr>";
    echo "<td colspan='4'>" . wordwrap($item[$i], 30, "<br/>", true) . "</td>";
    echo "<td colspan='1'>" . wordwrap($quantity[$i], 10, "<br/>", true) . "</td>";
    echo "<td>" . wordwrap($unit[$i], 20, "<br/>", true) . "</td>";
    echo "<td colspan='4'>" . wordwrap($description[$i], 50, "<br/>", true) . "</td>";
    echo "<td colspan='1'>" . wordwrap($OR[$i], 20, "<br/>", true) . "</td>";
    echo "<td>" . wordwrap(number_format($amount[$i], 2, '.', ','), 15, "<br/>", true) . "</td>";

    echo "</tr>";
}
?>

<tr style="text-align: left;">
    <td colspan="11">TOTAL</td>
    <td colspan="1"><?php echo number_format($total, 2, '.', ','); ?></td>
</tr>


<td colspan="6">
    <div>
        <label for="certified_correct" class="form-label">Certified Correct:</label>
        <input type="text" class="form-control text-center" id="name" name="name" placeholder="Name" value="<?php echo $name; ?>" readonly>
        <input type="text" class="form-control text-center" id="position" name="position" placeholder="Position" value="<?php echo $position; ?>" readonly>
        <input type="text" class="form-control text-center" id="office" name="office" placeholder="Office/Department" value="<?php echo $office; ?>" readonly>
    </div>
</td>
<td colspan="9">
    <div>
        <label for="disposal_approved" class="form-label">Disposal Approved</label>
        <input type="text" class="form-control text-center" id="name_disposal" name="name_disposal" placeholder="Name" value="<?php echo $name_disposal; ?>" readonly>
        <input type="text" class="form-control text-center" id="by_authority" name="by_authority" placeholder="By the Authority of the Board of Trustees" value="<?php echo $by_authority; ?>" readonly>
    </div>
</td>

    <tr style="text-align: center;">
    <td colspan="12">CERTIFICATE OF INSPECTION</td>
</tr>


<tr style="text-align: center;">
    <td colspan="12">
    <label style="text-align:center;">I hereby certify that the property enumerated above was disposed as follows</label>
    </td>
</tr>
<!-- Indeterminate checkbox -->
<tr>
  <td colspan="12" style="padding-left: 240px;">
    <br>
    <label for="checkbox2">Item</label>
    <input type="checkbox" id="checkbox2" name="checkboxGroup" onclick="handleCheckboxClick(this)">
    <label for="checkbox2">Destroyed</label>
    <br>
    <label for="checkbox3">Item</label>
    <input type="checkbox" id="checkbox3" name="checkboxGroup" onclick="handleCheckboxClick(this)">
    <label for="checkbox3">Sold at private sale</label>
    <br>
    <label for="checkbox4">Item</label>
    <input type="checkbox" id="checkbox4" name="checkboxGroup" onclick="handleCheckboxClick(this)">
    <label for="checkbox4">Sold at public auction</label>
    <br>
    <label for="checkbox1">Item</label>
    <input type="checkbox" id="checkbox1" name="checkboxGroup" onclick="handleCheckboxClick(this)">
    <label for="checkbox1">Transferred without cost</label>
  </td>
</tr>




<tr>
    <td colspan="6">
        <label for="inspected_by" class="form-label">Inspected by</label>
        <input type="text" class="form-control text-center" id="name_inspected" name="name_inspected" placeholder="Name" value="<?php echo $name_inspected; ?>" readonly>
        <input type="text" class="form-control text-center" id="position_inspected" name="position_inspected" placeholder="Position" value="<?php echo $position_inspected; ?>" readonly>
    </td>
    <td colspan="9">
        <label for="witness_to" class="form-label">Witness to</label>
        <input type="text" class="form-control text-center" id="name_witness" name="name_witness" placeholder="Name" value="<?php echo $name_witness; ?>" readonly>
        <input type="text" class="form-control text-center" id="position_witness" name="position_witness" placeholder="Position" value="<?php echo $position_witness; ?>" readonly>
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
