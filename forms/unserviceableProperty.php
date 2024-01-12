<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}
@include('../Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');
@include('partials/topbar.php');

date_default_timezone_set('Asia/Manila');

?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <form name="unproperty" class="row g-3" action="./components/unProperty.php" method="POST">
        <div class="p-5 d-flex justify-content-center align-items-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="12" style="text-align: right;">
                            Appendix 9-18
                        </th>
                    </tr>
                    <th colspan="12" class="text-center">
                        INVENTORY AND INSPECTION REPORT OF UNSERVICEABLE PROPERTY
                    </th>
                </thead>
                <tbody id="tableBody">
                    <tr>
                        <th colspan="12" style="text-align: center;">
                            <label for="place" class="form-label">As of</label>
                            <input type="date" style="color: gray; width: 100%" name="Date" required max="<?php echo date('Y-m-d'); ?>">
                        </th>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <div style="margin: 0.5rem;">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label for="place" class="form-label">Name of Accountable Officer</label>
                                        <input list="IssuedTo" class="form-control" id="name" name="name" placeholder="Name of Accountable Officer" required>
                                        <datalist id="IssuedTo">
                                            <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                                            <?php
                                            $fund = "SELECT * FROM users";
                                            $result = $data->query($fund);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <option value="<?php echo $row['first_name'] . ' ' . $row['last_name'] ?>"></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </datalist>
                                    </div>
                                    <div class="col-6">
                                        <label for="place" class="form-label">Designation</label>
                                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="place" class="form-label">Station</label>
                                        <input type="text" class="form-control" id="station" name="station" placeholder="Station" required>
                                    </div>
                                    <div class="col-6">
                                        <label>Fund Cluster</label>
                                        <input type="text" class="form-control" id="fund" name="fund" placeholder="Fund Cluster" required>
                                    </div>
                                </div>
                    <tr style="text-align: center; background-color: dimgrey;">
                        <td colspan="12" style="color: white;">INVENTORY</td>

                    </tr>

                <tbody id="tableBodyWasteReport">

                    <tr id="insertRowTarget">
                        <td colspan="12">

                            <div style="margin: 0.5rem;">
                                <div class="row g-3">

                                    <div class="col-2">
                                        <label for="article" class="form-label">Particulars/Articles</label>
                                        <input type="text" class="form-control" name="description[]" placeholder="Particulars" id="particularsUnserviceable" disabled>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="description" class="form-label">Qty.</label>
                                        <input type="text" class="form-control" name="quantity[]" id="quantity" placeholder="Quantity">

                                    </div>

                                    <div class="col-sm-4">
                                        <label for="stock_no" class="form-label">Unit Cost</label>
                                        <input type="text" class="form-control" name="unit_cost[]" id="unitValueUnserviceable" placeholder="Unit Cost" disabled>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="unit" class="form-label">Total Cost</label>
                                        <input type="text" class="form-control" name="total_cost[]" placeholder="Total Cost" id="totalCostUnserviceable" disabled>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="val" class="form-label">Classification</label>
                                        <input type="text" class="form-control mx-auto" name="classification[]" placeholder="Classification" id="classificationUnserviceable" disabled>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="val" class="form-label">Property No.</label>
                                        <select list="descriptions" class="form-control mx-auto" name="property_no[]" placeholder="Property No." style="width: 100%" id="propertyUnservice">
                                            <option value="" disabled selected>Select an option</option>
                                            <?php
                                            $fund = "SELECT * FROM inventory_db";
                                            $result = $data->query($fund);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <option value="<?php echo $row['Current_Property_Number'] ?>"><?php echo $row['Current_Property_Number'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="balance" class="form-label">Date acquired</label>
                                        <input type="text" class="form-control" name="date_acquired[]" placeholder="date Acquired" id="dateAcquiredUnservice" disabled>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="onhand" class="form-label">How rendered unserviceable</label>
                                        <input type="text" class="form-control" name="how[]" placeholder="How rendered unsericeable" required>
                                    </div>

                                </div>
                        </td>
                    </tr>

                </tbody>
         

                <tr style="text-align: center;  background-color: darkgrey ;">
                    <td colspan="12">Inspection Report</td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="10">Disposition</td>
                    <td colspan="2"></td>
                </tr>

                <tbody id="tableBodyWasteReport">

<tr id="insertRowTarget">
    <td colspan="12">

        <div style="margin: 0.5rem;">
            <div class="row g-3">

                <div class="col-2">
                    <label for="article" class="form-label">Destroyed</label>
                    <input type="text" class="form-control" name="destroyed[]">
                </div>

                <div class="col-2">
                    <label for="description" class="form-label">Sold</label>
                    <input type="text" class="form-control" name="sold[]">

                </div>

                <div class="col-2">
                    <label for="stock_no" class="form-label">Continued in service</label>
                    <input type="text" class="form-control" name="continued[]">
                </div>
                <div class="col-2">
                    <label for="unit" class="form-label">To be salvaged</label>
                    <input type="text" class="form-control" name="salvaged[]">
                </div>
                <div class="col-2">
                    <label for="val" class="form-label">Total</label>
                    <input type="text" class="form-control mx-auto" name="total[]">
                </div>
                <div class="col-2">
                    <label for="val" class="form-label">Appraised Valuation</label>
                    <input type="text" class="form-control mx-auto" name="appraised[]" placeholder="Appraised Valuation">
                </div>
                <div class="col-sm-6">
                    <label for="balance" class="form-label">OR No. (Record of Sales)</label>
                    <input type="text" class="form-control" name="or[]" placeholder="date Acquired" required>
                </div>
                <div class="col-sm-6">
                    <label for="onhand" class="form-label">Amount (Record of Sales)</label>
                    <input type="text" class="form-control" name="amount[]" placeholder="How rendered unsericeable" required>
                </div>

            </div>
    </td>
</tr>

</tbody>
               



                <td colspan="3">
                    <div>
                        <label for="inspectionOffice" class="form-label">Requested by:</label>
                        <br>
                        <input type="text" class="form-control" id="requested_name" name="requested_name" placeholder="Name" required>
                        <input type="text" class="form-control" id="requested_position" name="requested_position" placeholder="Position" required>

                    </div>
                </td>
                <td colspan="3">
                    <div>
                        <label for="propertyOfficer" class="form-label">Approved by:</label>
                        <br>
                        <input type="text" class="form-control" id="approved_name" name="approved_name" placeholder="Name" required>
                        <input type="text" class="form-control" id="approved_position" name="approved_position" placeholder="Position" required>

                    </div>
                </td>
                <td colspan="3">
                    <div>
                        <label for="propertyOfficer" class="form-label">Inspection Officer</label>
                        <br>
                        <input type="text" class="form-control" id="inspection_name" name="inspection_name" placeholder="Name" required>
                        <input type="text" class="form-control" id="inspection_position" position="inspection_name" placeholder="Name" value="College Authorized Inspector" required>
                    </div>
                </td>
                <td colspan="3">
                    <div>
                        <label for="propertyOfficer" class="form-label">Witnessed by:</label>
                        <br>
                        <input type="text" class="form-control" id="witness_name" name="witness_name" placeholder="Name" required>

                    </div>
                </td>
                <!-- Add your table rows here -->
                </tbody>
            </table>


        </div>

        <div class="col-sm-12">
            <div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px;">
                <div style="margin-left: 10px;">
                    <button type="submit" class="btn btn-primary" style="background-color: maroon;">Submit for Printing</button>
                </div>
            </div>
        </div>
    </form>

    <script>
     



        // Function to calculate the amount and update the corresponding input field
        function calculateAmount() {
            // Get the quantity and unit_cost values
            var quantity = parseFloat(document.getElementsByName('quantity')[0].value) || 0;
            var unitCost = parseFloat(document.getElementsByName('unit_cost')[0].value) || 0;

            // Calculate the amount (quantity * unit_cost)
            var amount = quantity * unitCost;

            // Update the amount input field with the calculated value
            document.getElementsByName('amount')[0].value = amount.toFixed(2); // Assuming you want to display the amount with 2 decimal places
        }
    </script>
</body>

</html>