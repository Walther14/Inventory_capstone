<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}
@include('../Controller/db.php');
?>

<form class="row g-3" action="./components/wasteReport.php" method="post">
        
        <div class="p-5 d-flex justify-content-center align-items-center">
    
    <table class="table table-bordered">
        <thead>
            <th colspan="16" class="text-center">
            SEMI-EXPENDABLE PROPERTY CARD
    
            </th>
        </thead>
        <tbody>
        <tr>
        <td colspan="16">
            <div style="margin: 0.5rem;">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="place" class="form-label">Entity Name:</label>
                        <input type="text" class="form-control" id="place" name="place" placeholder="Place of Storage">
                    </div>
                    <div class="col-6">
    
                        <label for="WMR" class="form-label">Fund Cluster</label>
                        <input type="text" class="form-control" id="WMR" name="WMR" placeholder="WMR Ref. No.">
                    </div>
                </div>

            </div>
        </td>
    </tr>

    <tr>
        <td colspan="16">
            <div style="margin: 0.5rem;">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="place" class="form-label">Semi-Expendable Property</label>
                        <input type="text" class="form-control" id="place" name="place" placeholder="Place of Storage">
                    </div>
                    <div class="col-6">
                  <label for="WMR" class="form-label">Semi-Expendable Property Number</label>
                  
               <select class="form-select mx-auto" name="staff" aria-label="Select example" style="width: 60%;">
    <?php
    $fund = "SELECT * FROM inventory_db";

    $result = $data->query($fund);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            ?>
            <option value="<?php echo $row['Current_Property_Number'] ?>"><?php echo $row['Current_Property_Number'] ?></option>
            <?php
        }
    }
    ?>
</select>
                    </div>

                    <div class="col-sm-6">
                        <label for="place" class="form-label">Description</label>
                        <input type="text" class="form-control" id="place" name="place" placeholder="Place of Storage">
                    </div>
                </div>
                <tr style="text-align: center;">
    <td>Date</td>
    <td>Refrence</td>
    <td>Qty.</td>
    <td>Unit Cost</td>
    <td>Total Cost</td>
    <td>Item No.</td>
    <td>Qty.</td>
    <td>Office/Officer</td>
    <td>Qty.</td>
    <td>Amount</td>
    <td colspan="4">Remarks</td>
</tr>

<tr>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RIS_No[]" placeholder="RIS No.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RIS_No[]" placeholder="RIS No.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RIS_No[]" placeholder="RIS No.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RIS_No[]" placeholder="RIS No.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RCC[]" placeholder="Responsibility Center Code">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="stock_Nos[]" placeholder="Stock Nos.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="item[]" placeholder="Item">
            
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unit[]" placeholder="Unit">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="number" class="form-control" name="quantity[]" placeholder="Quantity">
        </div>
    </td>
    <td >
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unit_cost[]" placeholder="Unit Cost">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="amount[]" placeholder="Amount">
        </div>
    </td>
</tr>
                <tbody>

        </div>
    </td>
</tr>


        <!-- Add your table rows here -->
    </tbody>
            </div>
        </td>
    </tr>

    
   
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