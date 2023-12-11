<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}
@include('Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');
@include('partials/topbar.php');
?>
<!-- Vertical alignment -->
<br>


<br>
<div class="row g-3 p-5 d-flex justify-content-around">

    <?php
    $inventory_id = $_GET['id'];
    $inventory = "SELECT id FROM inventory_db WHERE  id = '$inventory_id'";

    $result = $data->query($inventory);
    ?>
        <?php if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

        ?>

                <div class="col-sm-6">
                    <label for="first-name" class="form-label">Property Description</label>
                    <input type="text" class="form-control" name="Property_Description" value="<?php echo $row['Property_Description']?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Locator</label>
                    <input type="text" class="form-control" name="Locator" value="<?php echo $row['Locator']?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="first-name" class="form-label">Current Property Number</label>
                    <input type="text" class="form-control" name="Current_Property_Number" value="<?php echo $row['Current_Property_Number']?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Old Property Number</label>
                    <input type="text" class="form-control" name="Old_Property_Number" value="<?php echo $row['Old_Property_Number']?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="first-name" class="form-label">Unit of Measure</label>
                    <input type="text" class="form-control" name="Unit_Measure" value="<?php echo $row['Unit_Measure']?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Unit Value</label>
                    <input type="text" class="form-control" name="Unit_Value" value="<?php echo $row['Unit_Value']?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="first-name" class="form-label">Quantity</label>
                    <input type="text" class="form-control" name="Quantity" value="<?php echo $row['Quantity']?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Year Acquired</label>
                    <input type="text" class="form-control" name="Year_Acquired" value="<?php echo $row['Year_Acquired']?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="first-name" class="form-label">Date Acquired</label>
                    <input type="text" class="form-control" name="Date_Acquired" value="<?php echo $row['Date_Acquired']?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="first-name" class="form-label">Asset Category</label>
                    <input type="text" class="form-control" name="Asset_Category" value="<?php echo $row['Asset_Category']?>" disabled>
                </div>


                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Asset Number</label>
                    <input type="text" class="form-control" name="Asset_Number" value="<?php echo $row['Asset_Number']?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Asset Title</label>
                    <input type="text" class="form-control" name="Asset_Title" value="<?php echo $row['Asset_Title']?>" disabled>
                </div>


                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Issued To</label>
                    <input type="text" class="form-control" name="Issued_To"  value="<?php echo $row['Issued_To']?>" disabled>
                </div>


                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Issued From</label>
                    <input type="text" class="form-control" name="Issued_From" value="<?php echo $row['Issued_From']?>" disabled>
                </div>


                <div class="col-sm-6">
                    <label for="last-name" class="form-label">ARE/PAR/ICS Number</label>
                    <input type="text" class="form-control" name="ARE_PAR_ICS_Number" value="<?php echo $row['ARE_PAR_ICS_Number']?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Cancelled ARE/PAR/ICS Number</label>
                    <input type="text" class="form-control" name="Cancelled_Number" value="<?php echo $row['Cancelled_Number']?>" disabled>
                </div>


                <div class="col-sm-6">
                    <label for="last-name" class="form-label">PRS Number</label>
                    <input type="text" class="form-control" name="PRS_Number" value="<?php echo $row['PRS_Number']?>" disabled>
                </div>


                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Estimated Useful Life</label>
                    <input type="text" class="form-control" name="Estimated_Useful_Life" value="<?php echo $row['Estimated_Useful_Life']?>" disabled>
                </div>


                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Fund Cluster</label>
                    <input type="text" class="form-control" name="Fund_Cluster" value="<?php echo $row['Fund_Cluster']?>" disabled>
                </div>


                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Fund Admin Title</label>
                    <input type="text" class="form-control" name="Fund_Admin_Code" value="<?php echo $row['Fund_Admin_Code']?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="first-name" class="form-label">Fund Admin Title</label>
                    <input type="text" class="form-control" name="Fund_Admin_Title"  value="<?php echo $row['Fund_Admin_Title']?>" disabled>
                </div>


                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Purchase Order/Contract Number</label>
                    <input type="text" class="form-control" name="Purchase_Order_Contract_Number" value="<?php echo $row['Purchase_Order_Contract_Number']?>" disabled>
                </div>



                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Supplier</label>
                    <input type="text" class="form-control" name="Supplier" value="<?php echo $row['Supplier']?>" disabled>
                </div>



                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Acquired through</label>
                    <input type="text" class="form-control" name="Acquired_through" value="<?php echo $row['Acquired_Through']?>" disabled>
                </div>


                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Monthly Dep</label>
                    <input type="text" class="form-control" name="Remarks" value="<?php echo $row['Monthly_Dep']?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="last-name" class="form-label">Remarks</label>
                    <input type="text" class="form-control" name="Remarks" value="<?php echo $row['Remarks']?>" disabled>
                </div>





        <?php }
        } ?>
</div>
</div>





<?php
include('partials/footer.php')
?>