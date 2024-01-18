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


<form class="row g-3" action="./components/wasteReport.php" method="post">


        <div class="p-5 d-flex justify-content-center align-items-center">

            <table class="table table-bordered">
                <thead>

                    <th colspan="6" class="text-center">
                        WASTE MATERIAL REPORT
                        <div class="col-sm-12">
                            <label for="agency" class="form-label">Batanes State College</label>
                        </div>
                        <div class="text-center">
                            <tr>
                                <td colspan="6">
                                    <div style="margin: 0.5rem;">
                                        <div class="row g-3">
                                            <div class="col-sm-6">
                                                <label for="place" class="form-label">Place of Storage</label>
                                                <input type="text" class="form-control" id="place" name="place" placeholder="Place of Storage" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="date" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="date" name="date" placeholder="IAR Number" max="<?php echo date('Y-m-d'); ?>">

                                                <br>
                                                <label for="WMR" class="form-label">WMR Ref. No.</label>
                                                <input type="text" class="form-control" id="WMR" name="WMR" placeholder="WMR Ref. No." value="<?php echo date('Y-m-d-His'); ?>" required>

                                            </div>

                            <tr id="for_disposal" style="text-align: center;">
                                <td colspan="12">ITEMS FOR DISPOSAL</td>
                            </tr>
                        </div>
                        </td>
                        </tr>


        </div>

        </th>

        </thead>



        <tbody id="tableBodyWasteReport">
            <tr>
                <td colspan="6">
                    <div style="margin: 0.5rem;">
                        <div class="row g-3">
                            <div class="col-1">
                                <label for="item" class="form-label">Item</label>
                                <input type="text" class="form-control" name="item[]" placeholder="item" required>
                            </div>
                            <div class="col-1">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="quantity[]" placeholder="quantity" required>
                            </div>
                            <div class="col-sm-1">
                                <label for="unit" class="form-label">Unit</label>
                                <input type="text" class="form-control" name="unit[]" placeholder="unit" required>
                            </div>


                            <div class="col-sm-3">
                                <label for="description" class="form-label" style="color: maroon; font-weight: bold;">Description</label>
                                <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%">
                                <datalist id="descriptions">
                                    <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                                    <?php
                                    $fund = "SELECT * FROM inventory_db WHERE Asset_Category LIKE 'Semi%'";
                                    $result = $data->query($fund);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $row['Property_Description'] ?>"></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </datalist>

                            </div>


                            <div class="col-3">
                                <label for="OR" class="form-label">O.R. No. (Record of sales)</label>
                                <input type="text" class="form-control" name="OR[]" placeholder="OR No." required>
                            </div>
                            <div class="col-3">
                                <label for="amount" class="form-label">Amount (Record of sales)</label>
                                <input type="text" class="form-control" name="amount[]" id="amount" placeholder="Amount" oninput="validateAmount(this)" required>
                            </div>



                        </div>
                    </div>
                </td>
            </tr>

        </tbody>



    <td colspan="2">
        <div>
            <label for="certified_correct" class="form-label">Certified Correct:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            <input type="text" class="form-control" id="position" name="position" placeholder="Position" required>
            <input type="text" class="form-control" id="office" name="office" placeholder="Office/Department" required value="Supply and Property Unit">


        </div>
    </td>
    <td colspan="2">
        <div>
            <label for="disposal_approved" class="form-label">Disposal Approved</label>
            <input type="text" class="form-control" id="name_disposal" name="name_disposal" placeholder="Name" required>
            <input type="text" class="form-control" id="by_authority" name="by_authority" placeholder="By the Authority of the Board of Trustees" required value="By the Authority of the Board of Trustees">

        </div>
    </td>

    <tr style="text-align: center;">
        <td colspan="12">CERTIFICATE OF INSPECTION</td>
    </tr>


    <tr style="text-align: center;">
        <td colspan="12">
            <label style="text-align:center;">I hereby certify that the property enumerated above was disposed as follows</label>
        </td>
    </tr>
    <!-- Indeterminate checkbox -->
    <tr style="text-align: left;">

        <td colspan="12" style="padding-left: 300px;">

            <br>

            <label for="checkbox2" style="margin-right: 10px;">Item</label>
            <input type="checkbox" id="destroyedCheckbox" name="destroyedCheckbox" onclick="handleCheckboxClick(this)">
            <label for="destroyedCheckbox">Destroyed</label>

            <br>
            <label for="checkbox3" style="margin-right: 10px;">Item</label>
            <input type="checkbox" id="privateSaleCheckbox" name="privateSaleCheckbox" onclick="handleCheckboxClick(this)">
            <label for="privateSaleCheckbox">Sold at private sale</label>
            <br>

            <label for="checkbox4" style="margin-right: 10px;">Item</label>
            <input type="checkbox" id="publicAuctionCheckbox" name="publicAuctionCheckbox" onclick="handleCheckboxClick(this)">
            <label for="publicAuctionCheckbox">Sold at public auction</label>
            <br>
            <label for="checkbox1" style="margin-right: 10px;">Item</label>
            <input type="checkbox" id="transferredCheckbox" name="transferredCheckbox" onclick="handleCheckboxClick(this)">
            <label for="transferredCheckbox">Transferred without cost</label>
        </td>
    </tr>


    <td colspan="2">
        <div>
            <label for="inspected_by" class="form-label">Inspected by</label>
            <input type="text" class="form-control" id="name_inspected" name="name_inspected" placeholder="Name" required>
            <input type="text" class="form-control" id="position_inspected" name="position_inspected" placeholder="Position" required value="Inspector Officer">

        </div>
    </td>
    <td colspan="2">
        <div>
            <label for="witness_to" class="form-label">Witness to</label>
            <input type="text" class="form-control" id="name_witness" name="name_witness" placeholder="Name" required>
            <input type="text" class="form-control" id="position_witness" name="position_witness" placeholder="Position" required value="Leader">

        </div>
    </td>



    <!-- Add your table rows here -->
    </tbody>
    </table>






    </div>
    <div class="col-sm-12">
        <div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px;">
            <!-- Add this button after the table -->
            <!-- Add this button after the table -->
            <!-- Add this button after the table -->
            <button type="button" id="addRowButtonWasteReport" class="btn btn-primary" style="background-color: maroon;" onclick="createRow()">Additional row</button>

<script>
    function createRow() {
        var tableBodyWasteReport = document.getElementById('tableBodyWasteReport');

        if (!(tableBodyWasteReport.childElementCount >= 5)) {
            var newRow = tableBodyWasteReport.querySelector('tr').cloneNode(true);
            var inputFields = newRow.querySelectorAll('input');
            inputFields.forEach(function (input) {
                input.value = '';
            });

            var index = tableBodyWasteReport.children.length;
            inputFields.forEach(function (input) {
                input.name = input.name.replace(/\[\d+\]$/, '[' + index + ']');
            });

            tableBodyWasteReport.appendChild(newRow);
        } else {
            alert(`Maximum Rows Created`);
        }

        inputFieldEventListeners();
    }

    function inputFieldEventListeners() {
        // Add an event listener to the description input fields
        document.querySelectorAll('input[name^="description"]').forEach(function (input) {
            input.addEventListener('change', function () {
                var description = this.value;
                var row = this.parentElement.parentElement;

                fetch('getUnitValue.php?description=' + encodeURIComponent(description))
                    .then(response => response.json())
                    .then(data => {
                        row.querySelector('input[name^="unit"]').value = data.unit_measure;
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
    // var tableBodyWasteReport = document.getElementById('tableBodyWasteReport');
    // // Select the addRowButtonWasteReport
    // var addRowButtonWasteReport = document.querySelector('#addRowButtonWasteReport');

    // // Attach click event listener to the addRowButtonWasteReport
    // addRowButtonWasteReport.addEventListener('click', function() {
    //     console.log("hello")
    //     // Clone the first row of the table (you can clone any row as per your requirement)
    //     var newRow = tableBodyWasteReport.querySelector('tr').cloneNode(true);

    //     // Clear the input values in the cloned row
    //     var inputFields = newRow.querySelectorAll('input');
    //     inputFields.forEach(function(input) {
    //         input.value = '';
    //     });

    //     // Increment the index of each input field in the cloned row to ensure unique names
    //     var index = tableBodyWasteReport.children.length; // Get the number of existing rows
    //     inputFields.forEach(function(input) {
    //         // Update the name attribute by replacing the last set of square brackets and their content
    //         input.name = input.name.replace(/\[\d+\]$/, '[' + index + ']');
    //     });

    //     // Append the cloned row to the table body
    //     tableBodyWasteReport.appendChild(newRow);
    // });
    // document.onload = function() {
    //     // Select the table body element
    //     console.log(addRowButtonWasteReport.textContent)

    // };

    // Get the current date and time in the format "YYYY-MM-DD-HHMMSS"
    var currentDate = new Date();
    var formattedDate = currentDate.toISOString().slice(0, 19).replace(/[-T:]/g, '');

    // Set the value of the WMR input field
    document.getElementById('WMR').value = formattedDate;

    function handleCheckboxClick(clickedCheckbox) {
        var checkboxes = document.getElementsByName("checkboxGroup");

        checkboxes.forEach(function(checkbox) {
            if (checkbox !== clickedCheckbox) {
                checkbox.checked = false;
            } else {
                // Perform additional actions when the clicked checkbox is checked
                if (checkbox.checked) {
                    // Add your custom logic here
                    console.log("Checkbox checked:", checkbox.id);
                }
            }
        });
    }
</script>



       



<!-- Add this script after your existing scripts -->
<script>
    // Add an event listener to the quantity input fields
    document.querySelectorAll('input[name^="quantity"]').forEach(function(input) {
        input.addEventListener('input', function() {
            // Get the corresponding row
            var row = this.parentElement.parentElement;

            // Fetch values from "Unit of Value" and "Quantity"
            var unitValue = parseFloat(row.querySelector('input[name^="val"]').value) || 0;
            var quantity = parseFloat(this.value) || 0;

            // Calculate the value and update the "Value" input field
            var calculatedValue = unitValue * quantity;
            row.querySelector('input[name^="value"]').value = calculatedValue.toFixed(2);
        });
    });
</script>


<script>
    function validateAmount(input) {
        // Remove non-numeric characters and leading zeros
        let sanitizedValue = input.value.replace(/[^0-9.]/g, '').replace(/^0+/, '');

        // Update the input value with the sanitized value
        input.value = sanitizedValue;

        // Check if the value is a valid non-negative number
        if (isNaN(parseFloat(sanitizedValue)) || parseFloat(sanitizedValue) < 0) {
            // If not a valid number or negative, set the value to an empty string
            input.value = '';
            alert('Please enter a valid non-negative number.');
        }
    }
</script>



<script>
    function handleCheckboxClick(clickedCheckbox) {
        var checkboxes = document.getElementsByName("checkboxGroup");

        checkboxes.forEach(function(checkbox) {
            if (checkbox !== clickedCheckbox) {
                checkbox.checked = false;
            } else {
                // Perform additional actions when the clicked checkbox is checked
                if (checkbox.checked) {
                    // Add your custom logic here
                    console.log("Checkbox checked:", checkbox.id);
                }
            }
        });
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#assumedSelect').change(function() {
            var selectedOption = $(this).val();
            var currentDate = new Date();

            if (selectedOption === 'lastDayDecember') {
                // Set the date to the last day of December
                currentDate.setMonth(11); // December is 11 in JavaScript (0-indexed)
                currentDate.setDate(31);
            } else if (selectedOption === 'lastDayJune') {
                // Set the date to the last day of June
                currentDate.setMonth(6); // June is 5 in JavaScript (0-indexed)
                currentDate.setDate(30);
            }

            // Format the date as 'Month day, year'
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var formattedDate = currentDate.toLocaleDateString('en-US', options);

            // Set the value of the input field
            $('#assumed').val(formattedDate);
        });
    });
</script>

</script>
<?php
include('partials/footer.php')
?>