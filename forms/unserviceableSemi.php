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
    <form class="row g-3" action="./components/uncerviceableSemiPrint.php" method="post">
        <div class="p-5 d-flex justify-content-center align-items-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="12" style="text-align: right;">
                            Annex A.10
                        </th>
                    </tr>
                    <th colspan="12" class="text-center">
                        INVENTORY AND INSPECTION REPORT OF UNSERVICEABLE SEMI-EXPENDABLE PROPERTY
                    </th>
                </thead>
                <tbody id="tableBody">
                    <tr>
                        <th colspan="12" style="text-align: center;">
                            <label for="place" class="form-label">As at</label>
                            <input type="text" class="form-control" id="As" name="As" placeholder="enter data" required>
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
                                                    <option value="<?php echo $row['first_name'].' '. $row['last_name']?>"></option>
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
                        <td colspan="12" style="color: white;">To be filled up in the Supply and Property Unit</td>

                    </tr>

                    <tr style="text-align: center;">
                        <td>Date Acquired</td>
                        <td colspan="3">Particulars/Articles</td>
                        <td colspan="2">Semi-Expendable Property No.</td>
                        <td>Qty.</td>
                        <td>Cost</td>
                        <td>Total Cost</td>
                        <td>Accumulated Imapirment Losses</td>
                        <td>Carrying Ammount</td>
                        <td>Remarks</td>
                    </tr>

                    <tr>
                        <td>
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="date" placeholder="Date Acquired">
                            </div>
                        </td>
                        <td colspan="3">
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="particulars" placeholder="Particulars">
                            </div>
                        </td>
                        <td colspan="2">
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="property_number" placeholder="Property Number">
                            </div>
                        </td>
                        <td>
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="quantity" placeholder="Quantity">
                            </div>
                        </td>
                        <td>
                            <div style="margin: 0.5rem;">

                                <input type="text" class="form-control mx-auto" name="cost[]" placeholder="Enter or select description" style="width: 100%">
                            </div>
                        </td>
                        <td>
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" id="ATitle" name="total_cost" placeholder="Total Cost">
                            </div>


                        </td>

                        <td>
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="accumulated" placeholder="Accumulated Impairment Losses">
                            </div>
                        </td>
                        <td>
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="carrying_amount" placeholder="Carrying Amount">
                            </div>
                        </td>
                        <td>
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="remarks" placeholder="Remarks">
                            </div>
                        </td>


                    </tr>
                    <tr style="text-align: center;  background-color: darkgrey ;">
                        <td colspan="12">To be filled up by Accounting Unit</td>

                    </tr>
                    <tr style="text-align: center;">
                        <td colspan="9">Disposal</td>
                        <td colspan="1"></td>
                        <td colspan="2">Record of Sales</td>
                    </tr>
                    <tr style="text-align: center;">
                        <td>Sale</td>
                        <td colspan="3">Transfer</td>
                        <td colspan="3">Destruction</td>
                        <td>Others (Specify)</td>
                        <td>Total</td>
                        <td>Apraised Value</td>
                        <td>OR No.</td>
                        <td>Amount</td>
                    </tr>


                    <tr>
                        <td>
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="sale" placeholder="Sale">
                            </div>
                        </td>
                        <td colspan="3">
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="transfer" placeholder="Transfer">
                            </div>
                        </td>
                        <td colspan="3">
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="destruction" placeholder="Destruction">
                            </div>
                        </td>

                        <td>
                            <div style="margin: 0.5rem;">

                                <input type="text" class="form-control mx-auto" name="others[]" placeholder="Specify" style="width: 100%">

                            </div>
                        </td>
                        <td>
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="total" placeholder="Total">
                            </div>


                        </td>

                        <td>
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="appraised" placeholder="Appraised Value">
                            </div>
                        </td>
                        <td>
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="or" placeholder="OR No.">
                            </div>
                        </td>
                        <td>
                            <div style="margin: 0.5rem;">
                                <input type="text" class="form-control" name="amount" placeholder="Amount">
                            </div>
                        </td>
                    </tr>







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