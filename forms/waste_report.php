<?php

@include('../Controller/db.php');
?>
<?php
date_default_timezone_set('Asia/Manila');
?>

<form class="row g-3" action="./components/wasteReport.php" method="post">
        
    <div class="p-5 d-flex justify-content-center align-items-center">

    <table id="wasteTable" class="table table-bordered">    <thead>
        <th colspan="6" class="text-center">
            WASTE MATERIAL REPORT
            <div class="col-sm-12">
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
                    <label for="place" class="form-label">Place of Storage</label>
                    <input type="text" class="form-control" id="place" name="place" placeholder="Place of Storage" required>
                </div>
                <div class="col-6">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="IAR Number" required>

                    <br>
                    <label for="WMR" class="form-label">WMR Ref. No.</label>
<input type="text" class="form-control" id="WMR" name="WMR" placeholder="WMR Ref. No." value="<?php echo date('Y-m-d-HisA'); ?>" required>

            </div>

            <tr id="for_disposal" style="text-align: center;">
    <td colspan="12">ITEMS FOR DISPOSAL</td>
</tr>
        </div>
    </td>
</tr>
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
</div><div class="col-sm-1">
<label for="unit" class="form-label">Unit</label>
<input type="text" class="form-control" name="unit[]" placeholder="unit" required>
</div>
<div class="col-sm-3">
    <label for="description" class="form-label">Description</label>
    <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%" required>
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
   
                <tr>
                    <td colspan="6">
                        <div style="margin: 0.5rem;">
                            <div class="row g-3">
<div class="col-1">
<label for="item" class="form-label">Item</label>
<input type="text" class="form-control" name="item[]" placeholder="item">
</div>
<div class="col-1">
<label for="quantity" class="form-label">Quantity</label>
<input type="number" class="form-control" name="quantity[]" placeholder="quantity">
</div><div class="col-sm-1">
<label for="unit" class="form-label">Unit</label>
<input type="text" class="form-control" name="unit[]" placeholder="unit">
</div>
<div class="col-sm-3">
    <label for="description" class="form-label">Description</label>
    <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%" value="---Nothing follows---">
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
<div class="col-3">
    <label for="OR" class="form-label">O.R. No. (Record of sales)</label>
    <input type="text" class="form-control" name="OR[]" placeholder="OR No.">
</div>
<div class="col-3">
    <label for="amount" class="form-label">Amount (Record of sales)</label>
    <input type="text" class="form-control" name="amount[]" id="amount" placeholder="Amount" oninput="validateAmount(this)">
</div>


                               
</div>
                        </div>
                    </td>
                </tr>
   
                <tr>
                    <td colspan="6">
                        <div style="margin: 0.5rem;">
                            <div class="row g-3">
<div class="col-1">
<label for="item" class="form-label">Item</label>
<input type="text" class="form-control" name="item[]" placeholder="item">
</div>
<div class="col-1">
<label for="quantity" class="form-label">Quantity</label>
<input type="number" class="form-control" name="quantity[]" placeholder="quantity">
</div><div class="col-sm-1">
<label for="unit" class="form-label">Unit</label>
<input type="text" class="form-control" name="unit[]" placeholder="unit">
</div>
<div class="col-sm-3">
    <label for="description" class="form-label">Description</label>
    <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%" value="---Nothing follows---">
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

<div class="col-3">
    <label for="OR" class="form-label">O.R. No. (Record of sales)</label>
    <input type="text" class="form-control" name="OR[]" placeholder="OR No.">
</div>
<div class="col-3">
    <label for="amount" class="form-label">Amount (Record of sales)</label>
    <input type="text" class="form-control" name="amount[]" id="amount" placeholder="Amount" oninput="validateAmount(this)">
</div>


                               
</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <div style="margin: 0.5rem;">
                            <div class="row g-3">
<div class="col-1">
<label for="item" class="form-label">Item</label>
<input type="text" class="form-control" name="item[]" placeholder="item">
</div>
<div class="col-1">
<label for="quantity" class="form-label">Quantity</label>
<input type="number" class="form-control" name="quantity[]" placeholder="quantity">
</div><div class="col-sm-1">
<label for="unit" class="form-label">Unit</label>
<input type="text" class="form-control" name="unit[]" placeholder="unit">
</div>
<div class="col-sm-3">
    <label for="description" class="form-label">Description</label>
    <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%" value="---Nothing follows---">
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

<div class="col-3">
    <label for="OR" class="form-label">O.R. No. (Record of sales)</label>
    <input type="text" class="form-control" name="OR[]" placeholder="OR No.">
</div>
<div class="col-3">
    <label for="amount" class="form-label">Amount (Record of sales)</label>
    <input type="text" class="form-control" name="amount[]" id="amount" placeholder="Amount" oninput="validateAmount(this)">
</div>


                               
</div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="6">
                        <div style="margin: 0.5rem;">
                            <div class="row g-3">
<div class="col-1">
<label for="item" class="form-label">Item</label>
<input type="text" class="form-control" name="item[]" placeholder="item">
</div>
<div class="col-1">
<label for="quantity" class="form-label">Quantity</label>
<input type="number" class="form-control" name="quantity[]" placeholder="quantity">
</div><div class="col-sm-1">
<label for="unit" class="form-label">Unit</label>
<input type="text" class="form-control" name="unit[]" placeholder="unit">
</div>
<div class="col-sm-3">
    <label for="description" class="form-label">Description</label>
    <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%" value="---Nothing follows---">
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

<div class="col-3">
    <label for="OR" class="form-label">O.R. No. (Record of sales)</label>
    <input type="text" class="form-control" name="OR[]" placeholder="OR No.">
</div>
<div class="col-3">
    <label for="amount" class="form-label">Amount (Record of sales)</label>
    <input type="text" class="form-control" name="amount[]" id="amount" placeholder="Amount" oninput="validateAmount(this)">
</div>


                               
</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <div style="margin: 0.5rem;">
                            <div class="row g-3">
<div class="col-1">
<label for="item" class="form-label">Item</label>
<input type="text" class="form-control" name="item[]" placeholder="item">
</div>
<div class="col-1">
<label for="quantity" class="form-label">Quantity</label>
<input type="number" class="form-control" name="quantity[]" placeholder="quantity">
</div><div class="col-sm-1">
<label for="unit" class="form-label">Unit</label>
<input type="text" class="form-control" name="unit[]" placeholder="unit">
</div>
<div class="col-sm-3">
    <label for="description" class="form-label">Description</label>
    <input list="descriptions" class="form-control mx-auto" name="description[]" placeholder="Enter or select description" style="width: 100%" value="---Nothing follows---">
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

<div class="col-3">
    <label for="OR" class="form-label">O.R. No. (Record of sales)</label>
    <input type="text" class="form-control" name="OR[]" placeholder="OR No.">
</div>
<div class="col-3">
    <label for="amount" class="form-label">Amount (Record of sales)</label>
    <input type="text" class="form-control" name="amount[]" id="amount" placeholder="Amount" oninput="validateAmount(this)">
</div>


                               
</div>
                        </div>
                    </td>
                </tr>

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

            <div style="margin-left: 10px;">
                <button type="submit" class="btn btn-primary" style="background-color: maroon;">Submit for Printing</button>
                </div>
                </div>
            </div>
    </form>

    <script>
    // Get the current date and time in the format "YYYY-MM-DD-HHMMSS"
    var currentDate = new Date();
    var formattedDate = currentDate.toISOString().slice(0, 19).replace(/[-T:]/g, '');

    // Set the value of the WMR input field
    document.getElementById('WMR').value = formattedDate;
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


