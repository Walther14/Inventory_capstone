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


<form class="row g-3" action="./components/receiptReport.php" method="post">


        <div class="p-5 d-flex justify-content-center align-items-center">

            <table class="table table-bordered">
                <thead>

                    <th colspan="6" class="text-center">
                        RECEIPT OF RETURNED SEMI-EXPENDABLE PROPERTY
                        
                        <div class="text-center">
                            <tr>
                                <td colspan="6">
                                    <div style="margin: 0.5rem;">
                                        <div class="row g-3">
                                            <div class="col-sm-6">
                                                <label for="place" class="form-label">Entity Name:</label>
                                                <input type="text" class="form-control" id="place" name="place" value="Batanes State College" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="date" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="date" name="date" placeholder="IAR Number" max="<?php echo date('Y-m-d'); ?>">

                                                <br>
                                                <label for="WMR" class="form-label">RRSP No.</label>
                                                <input type="text" class="form-control" id="WMR" name="WMR" placeholder="WMR Ref. No." value="<?php echo date('Y-m-d-His'); ?>" required>

                                            </div>

                            <tr id="for_disposal" style="text-align: center;">
                                <td colspan="12">This is to acknowledge receipt of the returned Semi-Expendable Property</td>
                            </tr>
                        </div>
                        </td>
                        </tr>


        </div>

        </th>

        </thead>




        <tbody id="tableBodys">

<tr id="insertRowTarget">
    <td colspan="12">

        <div style="margin: 0.5rem;">
            <div class="row g-3">


                <div class="col-sm-2">
                    <label for="Current_Property_Number" class="form-label" style="color: maroon; font-weight: bold;">Property Number</label>
                    <input list="descriptions" class="form-control mx-auto" name="Current_Property_Number[]" placeholder="Enter or select property number" style="width: 100%" required>
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
                <div class="col-sm-3">
                    <label for="descript" class="form-label">Item Description</label>
                    <input type="text" class="form-control" name="descript[]" placeholder="Insert Description" required>
                </div>

               
         
                <div class="col-sm-1">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control" name="quantity[]" placeholder="Quantity">
                </div>
                <div class="col-sm-2">
                    <label for="item" class="form-label">ICS No.</label>
                    <input type="text" class="form-control" name="OR[]" placeholder="Unit Cost">
                </div>
                <div class="col-sm-2">
                    <label for="item" class="form-label">End User</label>
                    <input type="text" class="form-control" name="amount[]" placeholder="Name of End User" required>
                </div>
                <div class="col-sm-2">
                    <label for="item" class="form-label">Remarks</label>
                    <input type="text" class="form-control" name="remarks[]" placeholder="Remarks" required>
                </div>


            </div>
    </td>
</tr>
</tbody>

    <td colspan="2">
        <div>
            <label for="certified_correct" class="form-label">Returned by:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="End User" required>
            <input type="date" class="form-control" id="date" name="date2" placeholder="IAR Number" max="<?php echo date('Y-m-d'); ?>" required>


        </div>
    </td>
    <td colspan="2">
        <div>
            <label for="disposal_approved" class="form-label">Received By:</label>
            <input type="text" class="form-control" id="name_disposal" name="name_disposal" placeholder="Name of Head of Property and/or Supply  Division/Unit" required>
            <input type="date" class="form-control" id="date" name="date3" placeholder="IAR Number" max="<?php echo date('Y-m-d'); ?>" required>

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

        if (!(tableBodys.childElementCount >= 7)) {
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
                        row.querySelector('input[name^="OR"]').value = data.are_par_ics_number;
                        row.querySelector('input[name^="quantity"]').value = data.quantity;
                        row.querySelector('input[name^="descript"]').value = data.property_description;

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
               
                        row.querySelector('input[name^="OR"]').value = data.are_par_ics_number;
                        row.querySelector('input[name^="quantity"]').value = data.quantity;
                        row.querySelector('input[name^="descript"]').value = data.property_description;



                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
   

</script>
<?php
include('partials/footer.php')
?>