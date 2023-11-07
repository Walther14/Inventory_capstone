<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules//halfmoon/css/halfmoon.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <title>Document</title>
</head>

<body>
    <?php
    @include('../Controller/db.php');
    @include('../partials/sidebar.php');
    @include('../partials/topbar.php');
    ?>
    <form action="../Controller/addInventory_Controller.php" method="post">
        <div class="row g-3 p-5 d-flex justify-content-around">


            <div class="col-sm-6">
                <label for="first-name" class="form-label">Property Description</label>
                <input type="text" class="form-control" name="Property_Description" placeholder="Property Description" required>
            </div>

            <div class="col-sm-6">
                <label for="last-name" class="form-label">Locator</label>
                <input type="text" class="form-control" name="Locator" placeholder="Enter Locator" required>
            </div>

            <div class="col-sm-6">
                <label for="first-name" class="form-label">Current Property Number</label>
                <input type="text" class="form-control" name="Current_Property_Number" placeholder="Enter Current Property Number" required>
            </div>

            <div class="col-sm-6">
                <label for="last-name" class="form-label">Old Property Number</label>
                <input type="text" class="form-control" name="Old_Property_Number" placeholder="Old Property Number" required>
            </div>

            <div class="col-sm-6">
                <label for="first-name" class="form-label">Unit of Measure</label>
                <input type="text" class="form-control" name="Unit_Measure" placeholder="Enter Unit of measure" required>
            </div>

            <div class="col-sm-6">
                <label for="last-name" class="form-label">Unit Value</label>
                <input type="text" class="form-control" name="Unit_Value" placeholder="Enter Unit Value" required>
            </div>

            <div class="col-sm-6">
                <label for="first-name" class="form-label">Quantity</label>
                <input type="text" class="form-control" name="Quantity" placeholder="Quantity" required>
            </div>

            <div class="col-sm-6">
                <label for="last-name" class="form-label">Year Acquired</label>
                <input type="text" class="form-control" name="Year_Acquired" placeholder="Enter Year acquired" required>
            </div>

            <div class="col-sm-6">
                <label for="first-name" class="form-label">Date Acquired</label>
                <input type="text" class="form-control" name="Date_Acquired" placeholder="First name" required>
            </div>



            <div class="col-sm-6">
                <label for="first-name" class="form-label">Asset Category</label>
                <select class="form-select" name="Asset_Category" aria-label="Select example">
                    <?php
                    $fund = "SELECT * FROM asset_db";

                    $result = $data->query($fund);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                    ?>

                            <option value="<?php echo $row['Asset_Code'] ?>"><?php echo $row['Asset_Title'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>



            <div class="col-sm-6">
                <label for="first-name" class="form-label">Asset Number</label>
                <select class="form-select" name="Asset_Number" aria-label="Select example">
                    <?php
                    $fund = "SELECT * FROM itemcategory_db";

                    $result = $data->query($fund);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                    ?>

                            <option value="<?php echo $row['Account_ID'] ?>"><?php echo $row['Account_Number'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>



         

            <div class="col-sm-6">
                <label for="last-name" class="form-label">Asset Title</label>
                <input type="text" class="form-control" name="Asset_Title" placeholder="Last name" required>
            </div>


            <div class="col-sm-6">
                <label for="last-name" class="form-label">Issued To</label>
                <input type="text" class="form-control" name="Issued_To" placeholder="Enter Issued to" required>
            </div>


            <div class="col-sm-6">
                <label for="last-name" class="form-label">Issued From</label>
                <input type="text" class="form-control" name="Issued_From" placeholder="Enter Issued From" required>
            </div>


            <div class="col-sm-6">
                <label for="last-name" class="form-label">ARE/PAR/ICS Number</label>
                <input type="text" class="form-control" name="ARE_PAR_ICS_Number" placeholder="Enter ARE/PAR/ICS Number" required>
            </div>

            <div class="col-sm-6">
                <label for="last-name" class="form-label">Cancelled ARE/PAR/ICS Number</label>
                <input type="text" class="form-control" name="Cancelled_Number" placeholder="Enter Cancelled ARE/PAR/ICS Number" required>
            </div>


            <div class="col-sm-6">
                <label for="last-name" class="form-label">PRS Number</label>
                <input type="text" class="form-control" name="PRS_Number" placeholder="Enter PRS Number" required>
            </div>


            <div class="col-sm-6">
                <label for="last-name" class="form-label">Estimated Useful Life</label>
                <input type="text" class="form-control" name="Estimated_Useful_Life" placeholder="Enter Estimated Useful Life" required>
            </div>


            <div class="col-sm-6">
                <label for="last-name" class="form-label">Fund Cluster</label>
                <input type="text" class="form-control" name="Fund_Cluster" placeholder="Enter Fund Cluster" required>
            </div>

            <div class="col-sm-6">
                <label for="first-name" class="form-label">Fund Admin Title</label>
                <select class="form-select" name="Fund_Admin_Code" aria-label="Select example">
                    <?php
                    $fund = "SELECT * FROM fundcode_db";

                    $result = $data->query($fund);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                    ?>

                            <option value="<?php echo $row['fund_ID'] ?>"><?php echo $row['Fund_Admin_Code'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>



            <div class="col-sm-6">
                <label for="first-name" class="form-label">Fund Admin Title</label>
                <input type="text" class="form-control" name="Fund_Admin_Title" placeholder="First name" required>
            </div>


            <div class="col-sm-6">
                <label for="last-name" class="form-label">Purchase Order/Contract Numbere</label>
                <input type="text" class="form-control" name="Purchase_Order_Contract_Number" placeholder="Enter Purchase Order/Contract Number" required>
            </div>



            <div class="col-sm-6">
                <label for="last-name" class="form-label">Supplier</label>
                <input type="text" class="form-control" name="Supplier" placeholder="Enter Fund Supplier/Contructor" required>
            </div>



            <div class="col-sm-6">
                <label for="last-name" class="form-label">Acquired through</label>
                <input type="text" class="form-control" name="Acquired_through" placeholder="Enter Acquired through designation or position" required>
            </div>


            <div class="col-sm-6">
                <label for="last-name" class="form-label">Years Lapse</label>
                <input type="text" class="form-control" name="Remarks" placeholder="Enter Acquired through designation or position" required>
            </div>

            <div class="col-sm-6">
                <label for="last-name" class="form-label">Remarks</label>
                <input type="text" class="form-control" name="Remarks" placeholder="Enter Acquired through designation or position" required>
            </div>


            <div class="d-flex align-items-center">

                <button type="submit" class="btn btn-primary ms-auto">Submit</button>
            </div>
        </div>
    </form>




    <?php
    include('../partials/footer.php')
    ?>