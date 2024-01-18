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
    <form name="semiIssued" class="row g-3" action="./components/semiIssuedPrint.php" method="post">
        <div class="p-5 d-flex justify-content-center align-items-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="12" style="text-align: right;">
                            Annex A-7
                        </th>
                    </tr>
                    <th colspan="16" class="text-center">
                        REPORT OF SEMI-EXPENDABLE PROPERTY ISSUED
                    </th>
                </thead>

                <tbody id="tableBody">
                    <tr>
                        <td colspan="12">
                            <div style="margin: 0.5rem;">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="place" class="form-label">Serial Number</label>
                                        <input type="text" class="form-control" id="serial" name="serial" placeholder="Serial Number" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="place" class="form-label">Fund Cluster</label>
                                        <input type="text" class="form-control" id="fund" name="fund" placeholder="Fund Cluster" required>
                                    </div>
                                    <div class="col-6">
                                        <label>Date</label>
                                        <input type="date" class="form-control" id="date1" name="date1" placeholder="Date" max="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                </div>

                <tbody id="tableBodys">

                    <tr id="insertRowTarget">
                        <td colspan="12">

                            <div style="margin: 0.5rem;">
                                <div class="row g-3">

                                    <div class="col-2">
                                        <label for="item" class="form-label">ICS No.</label>
                                        <input type="text" class="form-control" name="RIS_No[]" placeholder="ICS No.">
                                    </div>
                                    <div class="col-2">
                                        <label for="item" class="form-label">Resp.Center Code</label>
                                        <input type="text" class="form-control" name="RCC[]" placeholder="Responsibility Center Code">
                                    </div>

                                    <div class="col-sm-3">
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
                                    <div class="col-sm-5">
                                        <label for="descript" class="form-label">Item Description</label>
                                        <input type="text" class="form-control" name="descript[]" placeholder="Insert Description" required>
                                    </div>

                                    <div class="col-sm-2">
                                        <label for="unit" class="form-label">Unit of measure</label>
                                        <input type="text" class="form-control" name="unit[]" placeholder="Unit of measure" required>
                                    </div>
                             
                                    <div class="col-sm-2">
                                        <label for="quantity" class="form-label">Qty. Issued</label>
                                        <input type="text" class="form-control" name="quantity[]" placeholder="Quantity">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="item" class="form-label">Unit Cost</label>
                                        <input type="text" class="form-control" name="val[]" placeholder="Unit Cost">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="item" class="form-label">Amount</label>
                                        <input type="text" class="form-control" name="amount[]" placeholder="Amount">
                                    </div>


                                </div>
                        </td>
                    </tr>
                </tbody>
       


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

            <button type="button" id="addRowButtonWasteReport" class="btn btn-primary" style="background-color: maroon;" onclick="createRow()">Additional row</button>

<script>
    function createRow() {
        var tableBodys = document.getElementById('tableBodys');

        if (!(tableBodys.childElementCount >= 5)) {
            var newRow = tableBodys.querySelector('tr').cloneNode(true);
            var inputFields = newRow.querySelectorAll('input');
            inputFields.forEach(function (input) {
                input.value = '';
            });

            var index = tableBodys.children.length;
            inputFields.forEach(function (input) {
                input.name = input.name.replace(/\[\d+\]$/, '[' + index + ']');
            });

            tableBodys.appendChild(newRow);
            inputFieldEventListeners(); // Add event listeners to the new row
        } else {
            alert(`Maximum Rows Created`);
        }
    }

    function inputFieldEventListeners() {
        // Add an event listener to the description input fields
        document.querySelectorAll('input[name^="Current_Property_Number"]').forEach(function (input) {
            input.addEventListener('change', function () {
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
                        row.querySelector('input[name^="unit"]').value = data.unit_measure;
                        row.querySelector('input[name^="quantity"]').value = data.quantity;
                        row.querySelector('input[name^="descript"]').value = data.property_description;
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

</body>

</html>



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
                        row.querySelector('input[name^="val"]').value = data.unit_value.replace(",", "");
                        row.querySelector('input[name^="unit"]').value = data.unit_measure;
                        row.querySelector('input[name^="quantity"]').value = data.quantity;
                        row.querySelector('input[name^="descript"]').value = data.property_description;



                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
   
    <?php
    include('partials/footer.php')
    ?>