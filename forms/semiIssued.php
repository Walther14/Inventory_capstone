<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}
@include('../Controller/db.php');
// 
date_default_timezone_set('Asia/Manila');

?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <form class="row g-3" action="./components/semiIssuedPrint.php" method="post">
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
                                        <input type="text" class="form-control" id="serial" name="serial" placeholder="Place of Storage" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="place" class="form-label">Fund Cluster</label>
                                        <input type="text" class="form-control" id="fund" name="fund" placeholder="Place of Storage" required>
                                    </div>
                                    <div class="col-6">
                                        <label>Date</label>
                                        <input type="date" class="form-control" id="date1" name="date1" placeholder="Date" max="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                </div>
                    <tr style="text-align: center;">
                        <td colspan="6">To be filled up in the Supply and Property Unit</td>
                        <td colspan="6">To be filled up by Accounting Unit</td>
                    </tr>


                <tbody id="tableBodys">
                    <tr>
                        <td>
                            <div style="margin: 0.5rem;">
                                <label for="item" class="form-label">ICS No.</label>
                                <input type="text" class="form-control" name="RIS_No[]" placeholder="ICS No.">
                            </div>
                        </td>
                        <td>
                            <div style="margin: 0.5rem;">
                                <label for="item" class="form-label">Resp.Center Code</label>
                                <input type="text" class="form-control" name="RCC[]" placeholder="Responsibility Center Code">
                            </div>
                        </td>
                        <td>
                            <div style="margin: 0.5rem;">
                                <label for="item" class="form-label">Property No.</label>
                                <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%">
                                <datalist id="descriptions">
                                    <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                                    <?php
                                    $fund = "SELECT * FROM inventory_db WHERE  Asset_Category LIKE 'Semi%'";
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
                        </td>
                        <td>
                            <div style="margin: 0.5rem;">
                                <label for="item" class="form-label">Item Description</label>
                                <input type="text" class="form-control" id="ATitle" name="Asset_Title[]" placeholder="">
                            </div>


                        </td>

                        <td>
                            <div style="margin: 0.5rem;">
                                <label for="item" class="form-label">Unit</label>
                                <input type="text" class="form-control" name="unit[]" placeholder="Unit">
                            </div>
                        </td>
                        <td>
                            <div style="margin: 0.5rem;">
                                <label for="item" class="form-label">Qty. Issued</label>
                                <input type="number" class="form-control" name="quantity[]" placeholder="Quantity">
                            </div>
                        </td>
                        <td colspan="5">
                            <div style="margin: 0.5rem;">
                                <label for="item" class="form-label">Unit Cost</label>
                                <input type="text" class="form-control" name="unit_cost[]" placeholder="Unit Cost">
                            </div>
                        </td>

                        <td colspan="5">
                            <div style="margin: 0.5rem;">
                                <label for="item" class="form-label">Amount</label>
                                <input type="text" class="form-control" name="amount" placeholder="Amount" value="Automated" readonly>
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

                <button type="button" id="addRowButtonWasteReport" class="btn btn-primary" style="background-color: maroon;" onclick="(function createRow(){
                
                //create new row
                var tableBodys = document.getElementById('tableBodys');
                
                if(!(tableBodys.childElementCount >=5)){
                    var newRow = tableBodys.querySelector('tr').cloneNode(true);
                    var inputFields = newRow.querySelectorAll('input');
                    inputFields.forEach(function(input) {
                        input.value = '';
                    });
            
                    // Increment the index of each input field in the cloned row to ensure unique names
                    var index = tableBodys.children.length; // Get the number of existing rows
                    inputFields.forEach(function(input) {
                        // Update the name attribute by replacing the last set of square brackets and their content
                        input.name = input.name.replace(/\[\d+\]$/, '[' + index + ']');
                    });
                    
                    // Append the cloned row to the table body
                    tableBodys           .appendChild(newRow);
                    console.log(tableBodys)
                }else{
                    alert(`Maximum Rows Created`);
                }

        // Clear the input values in the cloned row
                //create new row
            })()">Additional row</button>
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