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



<div style="margin: 5rem;">
    <form class="row g-3" action="./components/physicalcountinventory.php" method="post">

        <div class="p-5 d-flex justify-content-center align-items-center">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="6" style="text-align: right;">
                            Apendix 9-16
                        </th>
                    </tr>
                    <th colspan="6" class="text-center">
                        REPORT ON THE PHYSICAL COUNT OF INVENTORIES
                        <div class="text-center">

                            <select class="form-select mx-auto asset-dropdown" name="Asset_Title" aria-label="Select example" style="width: 60%;" required>
                                <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->

                                <?php
                                $fund = "SELECT * FROM itemcategory_db WHERE NOT Account_Title LIKE 'Semi%'";
                                $result = $data->query($fund);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <option value="<?php echo $row['Account_Title'] ?>"><?php echo $row['Account_Title'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>

                            <label>As of</label>
                            <input type="date" class="form-control mx-auto" name="Date_Acquired" required max="<?php echo date('Y-m-d'); ?>" style="width: 60%;">
                            <label>For which</label>
                            <select class="form-select mx-auto" name="staff" aria-label="Select example" style="width: 60%;" required>
                                <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->

                                <?php
                                $fund = "SELECT * FROM users";
                                $result = $data->query($fund);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <option value="<?php echo $row['user_id'] ?>"><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>

                            <div>
                                <label for="assumed">of Batanes State College is accountable, having assumed such accountability on:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="assumed" name="assumed" placeholder="Enter a date" style="width: 60%;" required>
                                    <select class="form-control" id="assumedSelect" name="assumedSelect" style="width: 40%;" onchange="updateDateFormat()">
                                        <option value="" disabled selected>Select an option</option>
                                        <option value="lastDayDecember">Last day of December</option>
                                        <option value="lastDayJune">Last day of July</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </th>

                </thead>
                <tbody id="tableBody">

                    <tr id="insertRowTarget
    ">
                        <td colspan="12">

                            <div style="margin: 0.5rem;">
                                <div class="row g-3">

                                    <div class="col-4">
                                        <label for="article" class="form-label">Article</label>
                                        <input type="text" class="form-control" name="article[]" placeholder="Article" required>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="description" class="form-label">Description</label>
                                        <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%">
                                        <datalist id="descriptions">
                                            <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                                            <?php
                                            $fund = "SELECT * FROM inventory_db WHERE Asset_category LIKE 'I%'";
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

                                    <div class="col-sm-2">
                                        <label for="stock_no" class="form-label">Stock No.</label>
                                        <input type="text" class="form-control" name="stock_no[]" placeholder="Stock No." required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="unit" class="form-label">Unit of measure</label>
                                        <input type="text" class="form-control" name="unit[]" placeholder="Unit of measure" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="val" class="form-label">Unit of Value</label>
                                        <input type="text" class="form-control" name="val[]" id="unitValue" placeholder="Unit of measure" required readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="balance" class="form-label">Balance per card (Quantity)</label>
                                        <input type="number" class="form-control" name="balance[]" placeholder="Balance per card (Quantity)" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="onhand" class="form-label">On hand per count</label>
                                        <input type="number" class="form-control" name="onhand[]" placeholder="On hand per count" required>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" name="quantity[]" id="quantity" placeholder="Quantity" required>
                                    </div>

                                    <div class="col-sm-1">
                                        <label for="value" class="form-label">Value</label>
                                        <input type="text" class="form-control" name="value[]" id="value" placeholder="Value" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="remarks" class="form-label">Remarks</label>
                                        <input type="text" class="form-control" name="remarks[]" id="remarks" placeholder="Remarks" required>
                                    </div>


                                </div>
                        </td>
                    </tr>



                    <!-- Add your table rows here -->
                </tbody>
                <tr>
                    <th colspan="6" style="text-align: left;">
                        Inventory Committee:
                    </th>
                </tr>
                <td colspan="1">
                    <div>

                        <input type="text" class="form-control" id="nameChair" name="nameChair" placeholder="Name" required>
                        <input type="text" class="form-control" id="positionChair" name="positionChair" placeholder="Chairperson" value="Chairperson" required>

                    </div>
                </td>
                <td colspan="1">
                    <div>

                        <input type="text" class="form-control" id="name1" name="name1" placeholder="Name" required>
                        <input type="text" class="form-control" id="position1" name="position1" placeholder="Member" value="Member" required>


                    </div>
                </td>
                <td colspan="1">
                    <div>

                        <input type="text" class="form-control" id="name2" name="name2" placeholder="Name" required>
                        <input type="text" class="form-control" id="position2" name="position2" placeholder="Member" value="Member" required>


                    </div>
                </td>
                <td colspan="1">
                    <div>

                        <input type="text" class="form-control" id="name3" name="name3" placeholder="Name" required>
                        <input type="text" class="form-control" id="position3" name="position3" placeholder="Position" value="Member" required>


                    </div>
                </td>

                <td colspan="1">
                    <div>

                        <input type="text" class="form-control" id="name4" name="name4" placeholder="Name" required>
                        <input type="text" class="form-control" id="position4" name="position4" placeholder="Position" value="Member" required>

                    </div>
                </td>
                <td colspan="1">
                    <div>

                        <input type="text" class="form-control" id="name5" name="name5" placeholder="Name" required>
                        <input type="text" class="form-control" id="position5" name="position5" placeholder="Position" value="Member" required>

                    </div>
                </td>
                <tr colspan="12">

                    <td colspan="12">
                        <div>

                            <input type="text" class="form-control" id="name6" name="name6" placeholder="Name" required>
                            <input type="text" class="form-control" id="position6" name="position6"" placeholder=" Position" value="College President" required>

                        </div>
                    </td>

                </tr>
            </table>



        </div>

        <div class="col-sm-12">
            <div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px;">
            <button type="button" id="addRowButton" class="btn btn-primary" style="background-color: maroon;">Additional row</button>

                <div style="margin-left: 10px;">
                <button type="submit" class="btn btn-primary" style="background-color: maroon;">Submit for Printing</button>                </div>

            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Initialize the counter
        var clickCount = 0;

        // Function to add a new row
        function addNewRow() {
            var newRowHtml = `
            <tr id="insertRowTarget
    ">
                        <td colspan="12">

                            <div style="margin: 0.5rem;">
                                <div class="row g-3">

                                    <div class="col-4">
                                        <label for="article" class="form-label">Article</label>
                                        <input type="text" class="form-control" name="article[]" placeholder="Article" required>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="description" class="form-label">Description</label>
                                        <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%">
                                        <datalist id="descriptions">
                                            <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                                            <?php
                                            $fund = "SELECT * FROM inventory_db WHERE Asset_category LIKE 'I%'";
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

                                    <div class="col-sm-2">
                                        <label for="stock_no" class="form-label">Stock No.</label>
                                        <input type="text" class="form-control" name="stock_no[]" placeholder="Stock No." required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="unit" class="form-label">Unit of measure</label>
                                        <input type="text" class="form-control" name="unit[]" placeholder="Unit of measure" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="val" class="form-label">Unit of Value</label>
                                        <input type="text" class="form-control" name="val[]" id="unitValue" placeholder="Unit of measure" required readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="balance" class="form-label">Balance per card (Quantity)</label>
                                        <input type="number" class="form-control" name="balance[]" placeholder="Balance per card (Quantity)" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="onhand" class="form-label">On hand per count</label>
                                        <input type="number" class="form-control" name="onhand[]" placeholder="On hand per count" required>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" name="quantity[]" id="quantity" placeholder="Quantity" required>
                                    </div>

                                    <div class="col-sm-1">
                                        <label for="value" class="form-label">Value</label>
                                        <input type="text" class="form-control" name="value[]" id="value" placeholder="Value" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="remarks" class="form-label">Remarks</label>
                                        <input type="text" class="form-control" name="remarks[]" id="remarks" placeholder="Remarks" required>
                                    </div>


                                </div>
                        </td>
                    </tr>
            `;

       // Append the new row to the table body
       $('#tableBody').append(newRowHtml);

// Increment the click count
clickCount++;

// Disable the button after 3 clicks
if (clickCount >= 3) {
    $('#addRowButton').prop('disabled', true);
}

// Add an event listener to the description input fields in the newly added row
$('input[name^="description"]').last().on('change', function () {
    // Fetch the corresponding unit value and unit measure from the database using AJAX
    var description = $(this).val();
    var row = $(this).closest('tr');

    $.ajax({
        url: 'getUnitValue.php',
        type: 'GET',
        data: { description: description },
        dataType: 'json',
        success: function (data) {
            // Update the Unit of Value input field with the fetched data
            row.find('input[name^="article"]').val(data.asset_number);
            row.find('input[name^="val"]').val(data.unit_value.replace(",", ""));
            row.find('input[name^="unit"]').val(data.unit_measure);
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
});
}

// Event handler for the "Additional row" button
$('#addRowButton').click(function (e) {
e.preventDefault();
addNewRow();
});

// Event handler for the "Submit for Printing" button
$('#submitPrintingButton').click(function (e) {
e.preventDefault();
// Implement your logic for submitting the form here
});
});

// Add an event listener to the quantity input fields (Pure JavaScript)
document.addEventListener('input', function(e) {
var target = e.target;
if (target.tagName.toLowerCase() === 'input' && target.name.startsWith('quantity')) {
// Get the corresponding row
var row = target.closest('tr');

// Fetch values from "Unit of Value" and "Quantity"
var unitValue = parseFloat(row.querySelector('input[name^="val"]').value) || 0;
var quantity = parseFloat(target.value) || 0;

// Calculate the value and update the "Value" input field only if the quantity is valid
var calculatedValue = isNaN(quantity) ? '' : unitValue * quantity;
row.querySelector('input[name^="value"]').value = calculatedValue;
}
});
</script>



    <script>
        document.getElementById('date').max = new Date().toISOString().split('T')[0];
        document.getElementById('date2').max = new Date().toISOString().split('T')[0];
        document.getElementById('date3').max = new Date().toISOString().split('T')[0];
        document.getElementById('date4').max = new Date().toISOString().split('T')[0];
    </script>
    <script>
        // Add an event listener to the description input fields
        document.querySelectorAll('input[name^="description"]').forEach(function(input) {
            input.addEventListener('change', function() {
                // Fetch the corresponding unit value and unit measure from the database using AJAX
                var description = this.value;
                var row = this.parentElement.parentElement;

                fetch('getUnitValue.php?description=' + encodeURIComponent(description))
                    .then(response => response.json())
                    .then(data => {
                        // Update the Unit of Value input field with the fetched data
                        row.querySelector('input[name^="article"]').value = data.asset_number;
                        row.querySelector('input[name^="val"]').value = data.unit_value.replace(",", "");
                        row.querySelector('input[name^="unit"]').value = data.unit_measure;


                    })
                    .catch(error => console.error('Error:', error));
            });
        });
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
                row.querySelector('input[name^="value"]').value = calculatedValue;
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
        // Function to update the input field based on the checkbox state
        function updateMonthField() {
            var assumedField = document.getElementById('assumed');
            var autoFillCheckbox = document.getElementById('autoFillMonth');

            if (autoFillCheckbox.checked) {
                // Auto-fill current month
                var currentDate = new Date();
                var monthNames = [
                    "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                var currentMonth = monthNames[currentDate.getMonth()];
                assumedField.value = currentMonth;
                assumedField.setAttribute('readonly', true); // Make the field readonly
            } else {
                // Allow manual input
                assumedField.value = '';
                assumedField.removeAttribute('readonly'); // Remove readonly attribute
            }
        }

        // Attach the function to the checkbox change event
        var autoFillCheckbox = document.getElementById('autoFillMonth');
        autoFillCheckbox.addEventListener('change', updateMonthField);

        // Initial call to set the initial state
        updateMonthField();
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