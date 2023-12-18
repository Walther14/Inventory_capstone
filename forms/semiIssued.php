<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}
@include('../Controller/db.php');
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
                    <input type="date" class="form-control" id="date1" name="date1" placeholder="Date" 
               max="<?php echo date('Y-m-d'); ?>" required> 
                </div>
            </div>
            <tr style="text-align: center;">
    <td colspan="6">To be filled up in the Supply and Property Unit</td>
    <td colspan="6">To be filled up by Accounting Unit</td>
</tr>

<tr style="text-align: center;">
    <td>ICS No.</td>
    <td>Responsibility Center Code</td>
    <td>Semi-Expendable Property No.</td>
    <td>Item Description</td>
    <td>Unit</td>
    <td>Qty. Issued</td>
    <td colspan="5">Unit Cost</td>
    <td colspan="5">Amount</td>
</tr>

<tr>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control"  name="RIS_No" placeholder="RIS No.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RCC" placeholder="Responsibility Center Code">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">

    <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%" >
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
        <input type="text" class="form-control" id="ATitle" name="Asset_Title" placeholder="Item">
</div>
      
     
    </td>
   
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unit" placeholder="Unit">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="number" class="form-control" name="quantity" placeholder="Quantity">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unit_cost" placeholder="Unit Cost">
        </div>
    </td>
    
    <td colspan="5">
        <div style="margin: 0.5rem;">
        <input type="text" class="form-control" name="amount" placeholder="Amount" value="Automated" readonly>
        </div>
    </td>
</tr>

<tr>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control"  name="RIS_NoI" placeholder="RIS No.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RCCI" placeholder="Responsibility Center Code">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">

    <input list="descriptions" class="form-control mx-auto" name="descriptionI[]" placeholder="Enter or select description" style="width: 100%" >
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
        <input type="text" class="form-control" id="ATitle" name="Asset_TitleI" placeholder="Item" value="Nothing follows">
</div>
      
     
    </td>
   
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unitI" placeholder="Unit">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="number" class="form-control" name="quantityI" placeholder="Quantity">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unit_costI" placeholder="Unit Cost">
        </div>
    </td>
    
    <td colspan="5">
        <div style="margin: 0.5rem;">
        <input type="text" class="form-control" name="amountI" placeholder="Amount" value="Automated" readonly>
        </div>
    </td>
</tr>

<tr>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control"  name="RIS_NoII" placeholder="RIS No.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RCCII" placeholder="Responsibility Center Code">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">

    <input list="descriptions" class="form-control mx-auto" name="descriptionII[]" placeholder="Enter or select description" style="width: 100%" >
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
        <input type="text" class="form-control" id="ATitle" name="Asset_TitleII" placeholder="Item" value="Nothing follows">
</div>
      
     
    </td>
   
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unitII" placeholder="Unit">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="number" class="form-control" name="quantityII" placeholder="Quantity">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unit_costII" placeholder="Unit Cost">
        </div>
    </td>
    
    <td colspan="5">
        <div style="margin: 0.5rem;">
        <input type="text" class="form-control" name="amountII" placeholder="Amount" value="Automated" readonly>
        </div>
    </td>
</tr>

<tr>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control"  name="RIS_NoIII" placeholder="RIS No.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RCCIII" placeholder="Responsibility Center Code">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">

    <input list="descriptions" class="form-control mx-auto" name="descriptionIII[]" placeholder="Enter or select description" style="width: 100%" >
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
        <input type="text" class="form-control" id="ATitle" name="Asset_TitleIII" placeholder="Item" value="Nothing follows">
</div>
      
     
    </td>
   
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unitIII" placeholder="Unit">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="number" class="form-control" name="quantityIII" placeholder="Quantity">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unit_costIII" placeholder="Unit Cost">
        </div>
    </td>
    
    <td colspan="5">
        <div style="margin: 0.5rem;">
        <input type="text" class="form-control" name="amountIII" placeholder="Amount" value="Automated" readonly>
        </div>
    </td>
</tr>

<tr>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control"  name="RIS_NoIIII" placeholder="RIS No.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RCCIIII" placeholder="Responsibility Center Code">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">

    <input list="descriptions" class="form-control mx-auto" name="descriptionIIII[]" placeholder="Enter or select description" style="width: 100%" >
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
        <input type="text" class="form-control" id="ATitle" name="Asset_TitleIIII" placeholder="Item" value="Nothing follows">
</div>
      
     
    </td>
   
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unitIIII" placeholder="Unit">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="number" class="form-control" name="quantityIIII" placeholder="Quantity">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unit_costIIII" placeholder="Unit Cost">
        </div>
    </td>
    
    <td colspan="5">
        <div style="margin: 0.5rem;">
        <input type="text" class="form-control" name="amountIIII" placeholder="Amount" value="Automated" readonly>
        </div>
    </td>
</tr>
        

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