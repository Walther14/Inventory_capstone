<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}
@include('./Controller/db.php');
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
    <form name="unprop" class="row g-3" action="./components/unProperty.php" method="POST">
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
                            <br>
                            <input type="date" style="color: gray; width: 20%" name="unprop[Date]" required max="<?php echo date('Y-m-d'); ?>">
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


                                    <div class="col-sm-5">
                                        <label for="descript" class="form-label">Particulars/Articles</label>
                                        <input type="text" class="form-control" name="descript[]" placeholder="Insert Description" required>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" class="form-control" name="quantity[]" placeholder="Quantity">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="item" class="form-label">Unit Cost</label>
                                        <input type="text" class="form-control" name="val[]" placeholder="Unit Cost">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="item" class="form-label">Total Cost</label>
                                        <input type="text" class="form-control" name="amount[]" placeholder="Amount" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="val" class="form-label">Classification</label>
                                        <input type="text" class="form-control mx-auto" name="class[]" placeholder="Classification" id="classificationUnserviceable" readonly>
                                    </div>
                                    <div class="col-sm-5">
                                        <label for="Current_Property_Number" class="form-label" style="color: maroon; font-weight: bold;">Property Number</label>
                                        <input list="descriptions" class="form-control mx-auto" name="Current_Property_Number[]" placeholder="Enter or select description" style="width: 100%">
                                        <datalist id="descriptions">
                                            <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                                            <?php
                                            $fund = "SELECT * FROM inventory_db";
                                            $result = $data->query($fund);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <option value="<?php echo $row['Current_Property_Number'] ?>"></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </datalist>

                                    </div>
                                    <div class="col-2">
                                        <label for="article" class="form-label">Date Acquired</label>
                                        <input type="text" class="form-control" name="date[]" placeholder="Date Acquired" required>
                                    </div>


                                 
                                    <div class="col-sm-5">
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

                <tbody id="tableBodyWasteReports">

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
                                        <input type="text" class="form-control mx-auto" name="total[]" required>
                                    </div>
                                    <div class="col-2">
                                        <label for="val" class="form-label">Appraised Valuation</label>
                                        <input type="text" class="form-control mx-auto" name="appraised[]" placeholder="Appraised Valuation" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="balance" class="form-label">OR No. (Record of Sales)</label>
                                        <input type="text" class="form-control" name="or[]" placeholder="date Acquired" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="onhand" class="form-label">Amount (Record of Sales)</label>
                                        <input type="text" class="form-control" name="amt[]" placeholder="How rendered unsericeable" required>
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
                
            <button type="button" id="addRowButtonWasteReport" class="btn btn-primary" style="background-color: maroon;" onclick="createRow()">Additional row</button>

<script>
    function createRow() {
        var tableBodyWasteReport = document.getElementById('tableBodyWasteReport');

        if (!(tableBodyWasteReport.childElementCount >= 3)) {
            var newRow = tableBodyWasteReport.querySelector('tr').cloneNode(true);
            var inputFields = newRow.querySelectorAll('input');
            inputFields.forEach(function(input) {
                input.value = '';
            });

            var index = tableBodyWasteReport.children.length;
            inputFields.forEach(function(input) {
                input.name = input.name.replace(/\[\d+\]$/, '[' + index + ']');
            });

            tableBodyWasteReport.appendChild(newRow);
            inputFieldEventListeners(); // Add event listeners to the new row
        } else {
            alert(`Maximum Rows Created`);
        }
        var tableBodyWasteReports = document.getElementById('tableBodyWasteReports');

if(!(tableBodyWasteReports.childElementCount >=3)){
    var newRow = tableBodyWasteReports.querySelector('tr').cloneNode(true);
    var inputFields = newRow.querySelectorAll('input');
    inputFields.forEach(function(input) {
        input.value = '';
    });

    // Increment the index of each input field in the cloned row to ensure unique names
    var index = tableBodyWasteReports.children.length; // Get the number of existing rows
    inputFields.forEach(function(input) {
        // Update the name attribute by replacing the last set of square brackets and their content
        input.name = input.name.replace(/\[\d+\]$/, '[' + index + ']');
    });

    // Append the cloned row to the table body
    tableBodyWasteReports.appendChild(newRow);
}else{
    alert(`Maximum Rows Created`);
}
    }

    function inputFieldEventListeners() {
        // Add an event listener to the description input fields
        document.querySelectorAll('input[name^="Current_Property_Number"]').forEach(function(input) {
            input.addEventListener('change', function() {
                var Current_Property_Number = this.value;
                var row = this.parentElement.parentElement;

                fetch('getUnit.php?Current_Property_Number=' + encodeURIComponent(Current_Property_Number))
                    .then(response => response.json())
                    .then(data => {
                        console.log(Current_Property_Number)
                        row.querySelector('input[name^="val"]').value = Intl.NumberFormat("en", {
                            style: "currency",
                            currency: 'php'
                        }).format (data.unit_value.replace(",", ""));
                        row.querySelector('input[name^="quantity"]').value = data.quantity;
                        row.querySelector('input[name^="class"]').value = data.asset_title;

                        row.querySelector('input[name^="date"]').value = data.date_acquired;
                        row.querySelector('input[name^="descript"]').value = data.property_description;
                        console.log(data.quantity, ' ', data.unit_value)
                        row.querySelector('input[name ^= "amount"]').value = Intl.NumberFormat("en", {
                            style: "currency",
                            currency: 'php'
                        }).format(data.quantity * data.unit_value.replace(",", ""));

                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    }

    // Call the input field event listeners when the page loads
    window.addEventListener('load', inputFieldEventListeners);
</script>


            
            <div style="margin-left: 10px;">
                    <button type="submit" class="btn btn-primary" style="background-color: maroon;">Submit for Printing</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Add an event listener to the description input fields
        document.querySelectorAll('input[name^="Current_Property_Number"]').forEach(function(input) {
            input.addEventListener('change', function() {
                // Fetch the corresponding unit value and unit measure from the database using AJAX
                var Current_Property_Number = this.value;
                var row = this.parentElement.parentElement;

                fetch('getUnit.php?Current_Property_Number=' + encodeURIComponent(Current_Property_Number))
                    .then(response => response.json())
                    .then(data => {
                        console.log(Current_Property_Number)
                        // Update the Unit of Value input field with the fetched data
                        // row.querySelector('input[name^="article"]').value = data.asset_number;
                        row.querySelector('input[name^="val"]').value =Intl.NumberFormat("en", {
                            style: "currency",
                            currency: 'php'
                        }).format (data.unit_value.replace(",", ""));
                        row.querySelector('input[name^="quantity"]').value = data.quantity;
                        row.querySelector('input[name^="class"]').value = data.asset_title;
                        row.querySelector('input[name^="date"]').value = data.date_acquired;
                        row.querySelector('input[name^="descript"]').value = data.property_description;
                        console.log(data.quantity, ' ', data.unit_value)
                        row.querySelector('input[name ^= "amount"]').value = Intl.NumberFormat("en", {
                            style: "currency",
                            currency: 'php'
                        }).format(data.quantity * data.unit_value.replace(",", ""));


                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
</body>

</html>