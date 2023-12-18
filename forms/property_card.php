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



<!---------------------------  TABLE --------------------------------->
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
                                        <select class="form-select mx-auto" name="staff" aria-label="Select example" style="width: 80%;">
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



 


                <div style="position: relative; height: 100%; overflow: hidden">

                    <div style="position: sticky; top: 0; z-index: 10;">


                    <?php
                    // Include your database connection logic here
                    // For example: $data = new mysqli("localhost", "username", "password", "database_name");

                    // Check if the database connection is successful
                    if ($data->connect_error) {
                        die("Connection failed: " . $data->connect_error);
                    }

                    $inventory = "SELECT * FROM inventory_db";

                    // Check if a search term is provided
                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $searchTerm = $_GET['search'];
                        // Modify the query to include a search condition
                        $inventory .= " WHERE Issued_To LIKE '%$searchTerm%'";
                    }

                    // Check if an asset category filter is provided
                    if (isset($_GET['asset_category']) && !empty($_GET['asset_category'])) {
                        $assetCategoryFilter = $_GET['asset_category'];

                        // Add an additional condition to filter by asset category
                        $inventory .= (strpos($inventory, 'WHERE') !== false) ? " AND " : " WHERE ";
                        $inventory .= "Asset_Category = '" . $data->real_escape_string($assetCategoryFilter) . "'";
                    }

                    // Check if an asset number filter is provided
                    if (isset($_GET['asset_number']) && !empty($_GET['asset_number'])) {
                        $assetNumberFilter = $_GET['asset_number'];

                        // Add an additional condition to filter by asset number
                        $inventory .= (strpos($inventory, 'WHERE') !== false) ? " AND " : " WHERE ";
                        $inventory .= "Asset_Number = '" . $data->real_escape_string($assetNumberFilter) . "'";
                    }

                    $result = $data->query($inventory);
                        ?>

                        <div class="d-flex" style="position: relative; top: 100;">

                            <div style="position: relative; width: 100rem;">

                                <div class="m-1 w-100" style="width: 100%; position: absolute;  overflow: auto; height: calc(100vh - 85.6px)">

                                    <table class="table table-bordered table table-hover">

                                        <style>
                                            .hidden-column {
                                                display: none;
                                            }
                                        </style>

                                        <!-- Your existing HTML code -->
                                        <tr>
                                            <th>Date</th>
                                            <th>Reference/PAR No.</th>
                                            <th>Qty</th>
                                            <th>Amount</th>
                                            <th>Office/Officer</th>
                                            <th>Qty</th>
                                            <th>Amount</th>
                                            <th>Remarks</th>                                   
                                        </tr>
                                        <tbody>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <tr>

                                                    <td  style="margin: 0.5rem;">
                                                        <?php echo ($row['Asset_Number']) ?>
                                                    </td>         
                                                    
                                                    <td  style="margin: 0.5rem;">
                                                        <?php echo ($row['ARE_PAR_ICS_Number']) ?>
                                                    </td>     
                                                    
                                                    <td  style="margin: 0.5rem;">
                                                        <?php echo ($row['Quantity']) ?>
                                                    </td>
                                                    
                                                    <td  style="margin: 0.5rem;">
                                                        <?php echo ($row['Unit_Value']) ?>
                                                    </td>

                                                    <td  style="margin: 0.5rem;">
                                                        <?php echo ($row['Issued_To']) ?>
                                                    </td>

                                                    <td  style="margin: 0.5rem;">
                                                        <?php echo ($row['Quantity']) ?>
                                                    </td>

                                                    <td  style="margin: 0.5rem;">
                                                        <?php echo ($row['Unit_Value']) ?>
                                                    </td>

                                                    <td  style="margin: 0.5rem;">
      
                                                    </td>

                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <?php
                            include('../partials/viewing.php')
                            ?>
                        </div>
                    </div>




                


        


     






























        <!--
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








        Add your table rows here -->





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