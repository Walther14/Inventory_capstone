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

<form class="row g-3" action="./components/materials_issuedPrint.php" method="post">
    <div class="p-5 d-flex justify-content-center align-items-center">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="12" style="text-align: right;">
                        Apendix 9-10
                    </th>
                </tr>
                <th colspan="16" class="text-center">
                    REPORT OF SUPPLIES AND MATERIALS ISSUED
                </th>
                </thead>
                <tbody id="tableBody">
            <tr>
                    <td colspan="12">
        <div style="margin: 0.5rem;">
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="place" class="form-label">Entity Name</label>
                    <input type="text" class="form-control" id="place" name="place" placeholder="Place of Storage">
                </div>
                <div class="col-6">
                    <label for="date1" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date1" name="date1" placeholder="Date">

                    <br>

                    <label for="WMR" class="form-label">Ref. No.</label>
                    <input type="text" class="form-control" id="WMR" name="WMR" placeholder="WMR Ref. No." value="<?php echo date('Y-m-d-His'); ?>" required>
                </div>
            </div>
            <tr style="text-align: center;">
    <td colspan="6">To be filled up in the Supply and Property Unit</td>
    <td colspan="6">To be filled up by Accounting Unit</td>
</tr>

<tr style="text-align: center;">
    <td>RIS No.</td>
    <td>Responsibility Center Code</td>
    <td>Stock Nos.</td>
    <td>Item</td>
    <td>Unit</td>
    <td>Qty. Issued</td>
    <td colspan="5">Unit Cost</td>
    <td colspan="5">Amount</td>
</tr>

<tr>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control"  name="RIS_No" placeholder="RIS No.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RCC" placeholder="Responsibility Center Code">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">

    <input list="AssetNumbers" style="color: gray; width: 100%" id="ANum" name="Asset_Number" placeholder="Enter or select Account Number" required onchange="fetchAssetTitle(this.value)">
                        <datalist id="AssetNumbers">
                            <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                            <?php
                            $fund = "SELECT * FROM itemcategory_db";
                            $result = $data->query($fund);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $row['Account_Number'] ?>"><?php echo $row['Account_Number'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </datalist>
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
        <input type="text" class="form-control" id="ATitle" name="Asset_Title" placeholder="Item">
</div>
      
     
    </td>
   
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unit" placeholder="Unit">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="number" class="form-control" name="quantity" placeholder="Quantity">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unit_cost" placeholder="Unit Cost">
        </div>
    </td>
    
    <td colspan="5">
        <div style="margin: 0.5rem;">
        <input type="text" class="form-control" name="amount" placeholder="Amount" oninput="calculateAmount()">
        </div>
    </td>
</tr>

<tr>
    <td>
        <div style="margin: 0.5rem;">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
        </div>
    </td>
    <td colspan="2">
        <div style="margin: 0.5rem; text-align:center;">
        <label>---Nothing follows---</label>
        </div>
 
        <div style="margin: 0.5rem;">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
        </div>
    </td>
    
</tr>

        

<td colspan="6">
                    <div>
                        <label for="inspectionOffice" class="form-label">I hereby certify to the correctness of the above information</label>
                       <br>
                        <input type="text" class="form-control" id="inspectionOfficer" name="inspectionOfficer" placeholder="Name" required>
                        <input type="text" class="form-control" id="inspectionOffice" name="inspectionOffice" placeholder="Position" required>

                    </div>
                </td>
                <td colspan="6">
                    <div>
                        <label for="propertyOfficer" class="form-label">Posted by/Date</label>
                        <br>
                        <input type="text" class="form-control" id="propertyOfficer" name="propertyOfficer" placeholder="Name" required>
                        <input type="text" class="form-control" id="inspectionOffic" name="inspectionOffic" placeholder="Position" required>

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
