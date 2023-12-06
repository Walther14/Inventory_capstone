<?php
session_start();
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
            Annex A.8
            </th>
        </tr>
        <th colspan="6" class="text-center">
    REPORT ON THE PHYSICAL COUNT OF SEMI-EXPENDABLE PROPERTIES
    <div class="text-center">
    
    <select class="form-select mx-auto asset-dropdown" name="Asset_Title" aria-label="Select example" style="width: 60%;">
    <?php
    $fund = "SELECT * FROM itemcategory_db";
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
                <input type="date" class="form-control mx-auto" id="date" name="date" placeholder="Place of Storage" style="width: 60%;">
               <label>For which</label>
               <select class="form-select mx-auto" name="staff" aria-label="Select example" style="width: 60%;">
    <?php
    $fund = "SELECT * FROM staff_db";

    $result = $data->query($fund);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            ?>
            <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
            <?php
        }
    }
    ?>
</select>

                <label>having assumed such accountability on</label>
                <input type="text" class="form-control mx-auto" id="assumed" name="assumed" placeholder="On what" style="width: 30%;">

   
            </div>

</th>

    </thead>
    <tbody>

    <tr id="insertRowTarget">
    <td colspan="12">

        <div style="margin: 0.5rem;">
            <div class="row g-3">

            <div class="col-3">
    <label for="article" class="form-label">Article</label>
    <select class="form-select mx-auto" name="staff" aria-label="Select example" style="width: 100%;">
    <?php
    $fund = "SELECT * FROM inventory_db";

    $result = $data->query($fund);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            ?>
            <option value="<?php echo $row['Asset_Number'] ?>"><?php echo $row['Asset_Number'] ?></option>
            <?php
        }
    }
    ?>
</select> </div>





<div class="col-sm-2">
<label for="description" class="form-label">Description</label>
<input type="text" class="form-control" name="description[]" placeholder="Description">
</div>
<div class="col-sm-3">
<label for="property_no" class="form-label">Semi-Expendable Property No.</label>
<select class="form-select mx-auto" name="staff" aria-label="Select example" style="width: 80%;">
    <?php
    $fund = "SELECT * FROM inventory_db";

    $result = $data->query($fund);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            ?>
            <option value="<?php echo $row['Current_Property_Number'] ?>"><?php echo $row['Current_Property_Number'] ?></option>
            <?php
        }
    }
    ?>
</select></div>
<div class="col-sm-2">
<label for="unit" class="form-label">Unit of measure</label>
<input type="text" class="form-control" name="unit[]" placeholder="Unit of measure">
</div>
<div class="col-sm-2">
<label for="val" class="form-label">Unit Value</label>
<input type="text" class="form-control" name="val[]" placeholder="Unit of measure">
</div>
<div class="col-sm-3">
<label for="balance" class="form-label">Balance per card (Quantity)</label>
<input type="text" class="form-control" name="balance[]" placeholder="Balance per card (Quantity)">
</div>
<div class="col-sm-3">
    <label for="onhand" class="form-label">On hand per count (Quantity)</label>
    <input type="text" class="form-control" name="onhand[]" placeholder="On hand per count">
</div>
<div class="col-sm-3">
    <label for="quantity" class="form-label">Shortage/Overage (Quantity)</label>
    <input type="text" class="form-control" name="quantity[]" id="quantity" placeholder="Quantity">
</div>
<div class="col-sm-3">
    <label for="value" class="form-label">Shortage/Overage (Value)</label>
    <input type="text" class="form-control" name="value[]" id="value" placeholder="Value">
</div>
<div class="col-sm-3">
    <label for="remarks" class="form-label">Remarks</label>
    <input type="text" class="form-control" name="remarks[]" id="remarks" placeholder="Remarks">
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
          
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            <input type="text" class="form-control" id="position" name="position" placeholder="Chairperson" required>

        </div>
    </td>
    <td colspan="1">
        <div>
          
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            <input type="text" class="form-control" id="position" name="position" placeholder="Member" required>


        </div>
    </td>
    <td colspan="1">
        <div>
          
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            <input type="text" class="form-control" id="position" name="position" placeholder="Member" required>


        </div>
    </td>
    <td colspan="1">
        <div>
          
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            <input type="text" class="form-control" id="position" name="position" placeholder="Position" required>


        </div>
    </td>
    
    <td colspan="1">
        <div>
          
            <input type="text" class="form-control" id="name_disposal" name="name_disposal" placeholder="Name" required>
            <input type="text" class="form-control" id="by_authority" name="by_authority" placeholder="Secretariat" required>

        </div>
    </td>
    <td colspan="1">
        <div>
          
            <input type="text" class="form-control" id="name_disposal" name="name_disposal" placeholder="Name" required>
            <input type="text" class="form-control" id="by_authority" name="by_authority" placeholder="Secretariat" required>

        </div>
    </td>
       <tr colspan="12">
         
            <td colspan="2">
        <div>
          
            <input type="text" class="form-control" id="name_disposal" name="name_disposal" placeholder="Name" required>
            <input type="text" class="form-control" id="by_authority" name="by_authority" placeholder="Observer" required>

        </div>
    </td>
    <td colspan="6">
        <div>
           
            <input type="text" class="form-control" id="name_disposal" name="name_disposal" placeholder="Name" required>
            <input type="text" class="form-control" id="by_authority" name="by_authority" placeholder="College President" required>
           
        </div>
    </td>
      
        </tr>
</table>


 
</div>

<div class="col-sm-12">
    <div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px;">
        <button type="button" class="btn btn-success" style="background-color: #ffa800;" onclick="addRow()">Add Row for items</button>

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

function addRow() {
    // Get the container of the row where you want to insert the new rows
    var insertContainer = document.getElementById('insertRowTarget');

    // Create a new row HTML string
    var newRowHTML = `
    <tr>
    <td colspan="12">

<div style="margin: 0.5rem;">
    <div class="row g-3">

    <div class="col-3">
<label for="article" class="form-label">Article</label>
<select class="form-select mx-auto" name="staff" aria-label="Select example" style="width: 100%;">
<?php
$fund = "SELECT * FROM inventory_db";

$result = $data->query($fund);

if ($result->num_rows > 0) {
// output data of each row
while ($row = $result->fetch_assoc()) {
    ?>
    <option value="<?php echo $row['Asset_Number'] ?>"><?php echo $row['Asset_Number'] ?></option>
    <?php
}
}
?>
</select> </div>





<div class="col-sm-2">
<label for="description" class="form-label">Description</label>
<input type="text" class="form-control" name="description[]" placeholder="Description">
</div>
<div class="col-sm-3">
<label for="property_no" class="form-label">Semi-Expendable Property No.</label>
<select class="form-select mx-auto" name="staff" aria-label="Select example" style="width: 80%;">
<?php
$fund = "SELECT * FROM inventory_db";

$result = $data->query($fund);

if ($result->num_rows > 0) {
// output data of each row
while ($row = $result->fetch_assoc()) {
    ?>
    <option value="<?php echo $row['Current_Property_Number'] ?>"><?php echo $row['Current_Property_Number'] ?></option>
    <?php
}
}
?>
</select></div>
<div class="col-sm-2">
<label for="unit" class="form-label">Unit of measure</label>
<input type="text" class="form-control" name="unit[]" placeholder="Unit of measure">
</div>
<div class="col-sm-2">
<label for="val" class="form-label">Unit Value</label>
<input type="text" class="form-control" name="val[]" placeholder="Unit of measure">
</div>
<div class="col-sm-3">
<label for="balance" class="form-label">Balance per card (Quantity)</label>
<input type="text" class="form-control" name="balance[]" placeholder="Balance per card (Quantity)">
</div>
<div class="col-sm-3">
<label for="onhand" class="form-label">On hand per count (Quantity)</label>
<input type="text" class="form-control" name="onhand[]" placeholder="On hand per count">
</div>
<div class="col-sm-3">
<label for="quantity" class="form-label">Shortage/Overage (Quantity)</label>
<input type="text" class="form-control" name="quantity[]" id="quantity" placeholder="Quantity">
</div>
<div class="col-sm-3">
<label for="value" class="form-label">Shortage/Overage (Value)</label>
<input type="text" class="form-control" name="value[]" id="value" placeholder="Value">
</div>
<div class="col-sm-3">
<label for="remarks" class="form-label">Remarks</label>
<input type="text" class="form-control" name="remarks[]" id="remarks" placeholder="Remarks">
</div>


</div>
</td>
    </tr>
    `;

    // Insert the new row HTML after the current container
    insertContainer.insertAdjacentHTML('afterend', newRowHTML);
}

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

</script>

<?php
include('partials/footer.php')
?>