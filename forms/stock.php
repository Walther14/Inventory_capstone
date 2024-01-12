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
                                    <input type="text" class="form-control" id="place" name="place" placeholder="Place of Storage" value="BATANES STATE COLLEGE">
                                </div>
                                <div class="col-6">

                                    <label for="WMR" class="form-label">Fund Cluster</label>
                                    <input type="text" class="form-control" id="WMR" name="WMR" placeholder="Fund Cluster">
                                </div>

                            </div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="16">
                        <div style="margin: 0.5rem;">
                            <div class="row g-3">
                                <div class="col-4">
                                    <label for="place" class="form-label">Semi-Expendable Property</label>
                                    <input type="text" class="form-control" id="place" name="place" placeholder="Place of Storage">
                                </div>
                                <div class="col-4">

                                    <label for="WMR" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="WMR" name="WMR" placeholder="Description">
                                </div>
                                <div class="col-4">

                                    <label for="WMR" class="form-label">Property Number</label>
                                    <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%">
                                    <datalist id="descriptions">
                                        <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                                        <?php
                                        $fund = "SELECT * FROM inventory_db WHERE  Current_Property_Number";
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



                            </div>

                        </div>
                    </td>
                </tr>


                <tr>
                    <td colspan="16">
                        <div style="margin: 0.5rem;">

                <tr style="text-align: center;">
                    <td>Date</td>
                    <td>Refrence</td>
                    <td>Qty.</td>
                    <td>Unit Cost</td>
                    <td>Total Cost</td>
                    <td>Item No.</td>
                </tr>

                <tr>
                    <td>
                        <div style="margin: 0.5rem;">
                            <input type="text" class="form-control" name="Date[]" placeholder="Date">
                        </div>
                    </td>
                    <td>
                        <div style="margin: 0.5rem;">
                            <input type="text" class="form-control" name="refrence[]" placeholder="Reference">
                        </div>
                    </td>
                    <td>
                        <div style="margin: 0.5rem;">
                            <input type="text" class="form-control" name="qty[]" placeholder="Qty.">
                        </div>
                    </td>
                    <td>
                        <div style="margin: 0.5rem;">
                            <input type="text" class="form-control" name="Unit_cost[]" placeholder="Unit Cost">
                        </div>
                    </td>
                    <td>
                        <div style="margin: 0.5rem;">
                            <input type="text" class="form-control" name="Total_cost[]" placeholder="Total Cost">
                        </div>
                    </td>
                    <td>
                        <div style="margin: 0.5rem;">
                            <input type="text" class="form-control" name="item_no[]" placeholder="Item no.">
                        </div>
                    </td>
                </tr>

                <td colspan="16" style="text-align: justify;">
                    NOTE: Physical transferring of PPEs among college personnel or officers themselves by virtue of designation,
                    transfer, termination or by promotion does not relieve the original end-user of the accountability that goes with the Property,
                    Plant and Equipment (PPE) being transferred. The Supply and Property unit shall always rely on the issued Acknowledgement
                    Receipt of Equipment (ARE), Inventory Custodial Slip (ICS) and Property Acknowledgement Receipt (PAR) under the personnel or officers’ name.
                    Source: page 21 of BOT Approved Supply and Property Management System Manual (RPCPPE2022)

                </td>


            <tbody>
                <td colspan="3">
                    <div>
                        <label for="certified_correct" class="form-label">Received by:</label>
                        <br>
                        <br>
                        <br>
                        <br>

                        <label for="certified_correct" class="form-label">Date:</label>



                    </div>
                </td>
                <td colspan="3">
                    <div>
                        <label for="disposal_approved" class="form-label">Issued by:</label>
                        <input type="text" class="form-control" id="name_disposal" name="name_disposal" placeholder="Name" required>
                        <input type="text" class="form-control" id="by_authority" name="by_authority" placeholder="Position" required>
                        <label for="certified_correct" class="form-label" style="display: flex; justify-content: space-between; align-items: center;">
                            Date:
                            <input type="date" class="form-control" id="name_disposal" name="name_disposal" placeholder="Date" required>
                        </label>
                    </div>
                </td>
    </div>
    </td>
    </tr>


    <!-- Add your table rows here -->
    </tbody>
    </div>
    </td>
    </tr>



    </table>



    </div>

    <div class="col-sm-12">
        <div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px;">
            <button type="button" class="btn btn-success" style="background-color: #ffa800;" onclick="addRow()">Add Row for stocks</button>

            <div style="margin-left: 10px;">
                <button type="submit" class="btn btn-primary" style="background-color: maroon;">Submit for Printing</button>
            </div>
        </div>
    </div>
</form>