
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


<form class="row g-3" action="./components/inspectionAndAcceptanceReport.php" method="post">

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

                        <label for="agency" class="form-label">Batanes State College</label>
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
                                    <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Supplier">
                                </div>
                                <div class="col-6">
                                    <label for="IAR_No" class="form-label">IAR No.</label>
                                    <input type="text" class="form-control" id="IAR_No" name="IAR_No" placeholder="IAR Number">
                                </div>
                                <div class="col-3">
                                    <label for="PO_No" class="form-label">PO No.</label>
                                    <input type="text" class="form-control" id="PO_No" name="PO_No" placeholder="PO Number">
                                </div>
                                <div class="col-sm-3">
                                    <label  for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                                <div class="col-sm-3">
                                    <label for="invoice" class="form-label">Invoice No.</label>
                                    <input type="text" class="form-control" id="invoice" name="invoice" placeholder="invoice">
                                </div>
                                <div class="col-sm-3">
                                    <label for="date2" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date2" name="date2" placeholder="date" required>
                                </div>
                                <div class="col-sm-12">
                                    <label for="requisitioning_office" class="form-label">Requisitioning Office/Department</label>
                                    <input type="text" class="form-control" id="requisitioning_office" name="requisitioning_office" placeholder="Requisitioning Office/Department">
                                </div>



                                <div class="col-3">
                                    <label for="stock_No" class="form-label">Stock Number</label>
                                    <input type="text" class="form-control" name="stock_No[]" placeholder="Stock Number">
                                </div>
                                <div class="col-sm-3">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input type="text" class="form-control" name="unit[]" placeholder="unit">
                                </div>
                                <div class="col-sm-3">
    <label for="description" class="form-label">Description</label>
    <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%" required>
    <datalist id="descriptions">
    <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->

        <?php
        $fund = "SELECT * FROM inventory_db";
        $result = $data->query($fund);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['Property_Description'] ?>"><?php echo $row['Property_Description'] ?></option>
                <?php
            }
        }
        ?>
    </datalist>
</div>


                                <div class="col-sm-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity[]" placeholder="quantity">
                                </div>

                                <div class="col-3">
                                    <label for="stock_No" class="form-label">Stock Number</label>
                                    <input type="text" class="form-control" name="stock_No[]" placeholder="Stock Number">
                                </div>
                                <div class="col-sm-3">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input type="text" class="form-control" name="unit[]" placeholder="unit">
                                </div>
                                <div class="col-sm-3">
    <label for="description" class="form-label">Description</label>
    <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%"  value="---Nothing follows---" required>
    <datalist id="descriptions">

        <?php
        $fund = "SELECT * FROM inventory_db";
        $result = $data->query($fund);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['Property_Description'] ?>"><?php echo $row['Property_Description'] ?></option>
                <?php
            }
        }
        ?>
    </datalist>
</div>


                                <div class="col-sm-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity[]" placeholder="quantity">
                                </div>

                                <div class="col-3">
                                    <label for="stock_No" class="form-label">Stock Number</label>
                                    <input type="text" class="form-control" name="stock_No[]" placeholder="Stock Number">
                                </div>
                                <div class="col-sm-3">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input type="text" class="form-control" name="unit[]" placeholder="unit">
                                </div>
                                <div class="col-sm-3">
    <label for="description" class="form-label">Description</label>
    <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%"  value="---Nothing follows---" required>
    <datalist id="descriptions">
        <?php
        $fund = "SELECT * FROM inventory_db";
        $result = $data->query($fund);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['Property_Description'] ?>"><?php echo $row['Property_Description'] ?></option>
                <?php
            }
        }
        ?>
    </datalist>
</div>


                                <div class="col-sm-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity[]" placeholder="quantity">
                                </div>


                                <div class="col-3">
                                    <label for="stock_No" class="form-label">Stock Number</label>
                                    <input type="text" class="form-control" name="stock_No[]" placeholder="Stock Number">
                                </div>
                                <div class="col-sm-3">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input type="text" class="form-control" name="unit[]" placeholder="unit">
                                </div>
                                <div class="col-sm-3">
    <label for="description" class="form-label">Description</label>
    <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%" value="---Nothing follows---" required>
    <datalist id="descriptions">
        <?php
        $fund = "SELECT * FROM inventory_db";
        $result = $data->query($fund);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['Property_Description'] ?>"><?php echo $row['Property_Description'] ?></option>
                <?php
            }
        }
        ?>
    </datalist>
</div>
                                <div class="col-sm-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity[]" placeholder="quantity">
                                </div> <div class="col-3">
                                    <label for="stock_No" class="form-label">Stock Number</label>
                                    <input type="text" class="form-control" name="stock_No[]" placeholder="Stock Number">
                                </div>
                                <div class="col-sm-3">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input type="text" class="form-control" name="unit[]" placeholder="unit">
                                </div>
                                <div class="col-sm-3">
    <label for="description" class="form-label">Description</label>
    <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%"  value="---Nothing follows---" required>
    <datalist id="descriptions">
        <?php
        $fund = "SELECT * FROM inventory_db";
        $result = $data->query($fund);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['Property_Description'] ?>"><?php echo $row['Property_Description'] ?></option>
                <?php
            }
        }
        ?>
    </datalist>
</div>
                                <div class="col-sm-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity[]" placeholder="quantity">
                                </div>


                                
                            </div>
                        </div>
                    </td>
                </tr>



                <tr style="text-align: center;">
                    <td colspan="2">INSPECTION</td>

                    <td colspan="2">ACCEPTANCE</td>
                </tr>


                <tr>
                    <td colspan="2">
                        <div>
                            <label for="date3" class="form-label">Date Inspected</label>
                            <input type="date" class="form-control" id="date3" name="date3" placeholder="date" required>
                        </div>
                    </td>
                    <td colspan="2">
                        <div>
                            <label for="date3"class="form-label">Date Received</label>
                             <input type="date" class="form-control" id="date4" name="date4" placeholder="date" required>                        </div>
                    </td>
                </tr>

                <!-- Indeterminate checkbox -->
                <tr style="text-align: left;">
                    <td colspan="2">
                        <input type="checkbox" id="checkbox1" name="checkbox1">
                        <label for="checkbox1">Inspected, verified and found<br>in order as to quantity and specifications</label>
                    </td>

                    <td colspan="2">
                        <input type="checkbox" id="checkbox2" name="checkboxGroup" onclick="handleCheckboxClick(this)">
                        <label for="checkbox2">Complete</label>
                        <br>
                        <input type="checkbox" id="checkbox3" name="checkboxGroup" onclick="handleCheckboxClick(this)">
                        <label for="checkbox3">Partial</label>
                    </td>
                </tr>

                <td colspan="2">
                    <div>
                        <label for="inspectionOffice" class="form-label">Inspection Office/Inspection Committee</label>
                        <input type="text" class="form-control" id="inspectionOffice" name="inspectionOffice" placeholder="Inspection Office/Inspection Committee" required>
                    </div>
                </td>
                <td colspan="2">
                    <div>
                        <label for="propertyOfficer" class="form-label">Property Officer</label>
                        <input type="text" class="form-control" id="propertyOfficer" name="propertyOfficer" placeholder="Property Officer" required>
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
   document.getElementById('date').max = new Date().toISOString().split('T')[0];
   document.getElementById('date2').max = new Date().toISOString().split('T')[0];
   document.getElementById('date3').max = new Date().toISOString().split('T')[0];
   document.getElementById('date4').max = new Date().toISOString().split('T')[0];
</script>




<!-- For Inspection report -->



<script>
    function handleCheckboxClick(clickedCheckbox) {
        var checkboxes = document.getElementsByName("checkboxGroup");

        checkboxes.forEach(function(checkbox) {
            if (checkbox !== clickedCheckbox) {
                checkbox.checked = false;
            }
        });
    }
</script>