<?php
include('Controller/db.php');
include('partials/header.php');
include('partials/sidebar.php');
include('partials/topbar.php');

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

<!-- Bordered table -->

<div class="p-5 d-flex justify-content-center align-items-center">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="6" style="text-align: right;">
                    Apendix 9-2
                </th>
            </tr>
            <th colspan="6" class="text-center">
                INSPECTION AND ACCEPTANCE REPORT

                <div class="col-sm-6" style="margin: 20px auto; text-align: center;">
                    <input style="text-align: center;" type="text" class="form-control" id="supplier" name="supplier" placeholder="Supplier" required value="<?php echo $agency ?>" readonly>
                    <label for="supplier" class="form-label">Agency</label>
                </div>

            </th>
        </thead>
        <tbody>
            <tr>
                <td colspan="6">
                    <div style="margin: 0.5rem;">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="supplier" class="form-label">Supplier</label>
                                <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Supplier" required value="<?php echo $supplier; ?>" readonly>
                            </div>
                            <div class="col-6">
                                <label for="IAR_No" class="form-label">IAR No.</label>
                                <input type="text" class="form-control" id="IAR_No" name="IAR_No" placeholder="IAR Number" required value="<?php echo $iarNo; ?>" readonly>
                            </div>
                            <div class="col-3">
                                <label for="PO_No" class="form-label">PO No.</label>
                                <input type="text" class="form-control" id="PO_No" name="PO_No" placeholder="PO Number" value="<?php echo $poNo; ?>" readonly>
                            </div>
                            <div class="col-sm-3">
    <label for="date" class="form-label">Date</label>
    <?php
        $formattedDate = date_create($date)->format('F j, Y');
    ?>
    <input type="text" class="form-control" id="date" name="date" placeholder="date" value="<?php echo htmlspecialchars($formattedDate); ?>" readonly>
</div>

                            <div class="col-sm-3">
                                <label for="invoice" class="form-label">Invoice No.</label>
                                <input type="text" class="form-control" id="invoice" name="invoice" placeholder="invoice" value="<?php echo $invoice; ?>" readonly>
                            </div>
                        
    <div class="col-sm-3">
    <label for="date2" class="form-label">Date</label>
    <?php
        $formattedDate = date_create($date2)->format('F j, Y');
    ?>
    <input type="text" class="form-control" id="date2" name="date2" placeholder="date" value="<?php echo htmlspecialchars($formattedDate); ?>" readonly>
</div>
                            <div class="col-sm-12">
                                <label for="requisitioning_office" class="form-label">Requisitioning Office/Department</label>
                                <input type="text" class="form-control" id="requisitioning_office" name="requisitioning_office" placeholder="Requisitioning Office/Department" required value="<?php echo $requisitioningOffice; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

        <tr style="text-align: center;">
            <td>Stock No.</td>
            <td>Unit</td>
            <td>Description</td>
            <td colspan="2">QTY</td>
        </tr>

        <?php
        // Loop through the entered data and display each row
        for ($i = 0; $i < count($stockNumbers); $i++) {
            echo "<tr>";
            echo "<td>{$stockNumbers[$i]}</td>";
            echo "<td>{$units[$i]}</td>";
            echo "<td>{$descriptions[$i]}</td>";
            echo "<td colspan='2'>{$quantities[$i]}</td>";
            echo "</tr>";
        }
        ?>
        <tr style="text-align: center;">
            <td colspan="2">INSPECTION</td>
         
            <td colspan="2">ACCEPTANCE</td>
        </tr>
        
        <tr style="text-align: left;">
    <td colspan="2">Date Inspected: <?php echo htmlspecialchars(date('F j, Y', strtotime($date3))); ?></td>
    <td colspan="2">Date Received: <?php echo htmlspecialchars(date('F j, Y', strtotime($date4))); ?></td>
</tr>

<tr style="text-align: left;">
    <td colspan="2">
        <input type="checkbox" id="checkbox1" name="checkbox1" value="Inspected, verified and found">
        <label for="checkbox1">Inspected, verified and found<br>in order as to quantity and specifications</label>
    </td>
    <td colspan="2">
        <input type="checkbox" id="checkbox2" name="checkboxGroup[]" value="Complete">
        <label for="checkbox2">Complete</label>
        <br>
        <input type="checkbox" id="checkbox3" name="checkboxGroup[]" value="Partial">
        <label for="checkbox3">Partial</label>
    </td>
</tr>

<tr style="text-align: center;">
    <td colspan="2">
    <br>
        <?php echo $inspectionOffice = $_POST['inspectionOffice'] ?? ''; ?>
        <br>
        <label for="inspectionOffice">-------------------------------------------------</label>
        <br>
        <label for="inspectionOffice">Inspection Office/Inspection Committee:</label>
    </td>
    <td colspan="2">
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

<style>
    /* Add this style to make the borders of the input fields invisible */
    .form-control {
        border: none;
        border-bottom: 1px solid #ced4da; /* Adding a bottom border for separation */
    }
</style>

<?php
include('./partials/footer.php')
?>
