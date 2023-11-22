<?php
session_start();
@include('Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');
@include('partials/topbar.php');
?>



<div style="margin: 5rem;">
    <form class="row g-3" action="./components/inspectionAndAcceptanceReport.php" method="post">
        
    <div class="p-5 d-flex justify-content-center align-items-center">

<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="6" style="text-align: right;">
                Apendix 9-2
            </th>
        </tr>
        <th colspan="6" class="text-center">
            INSPECTION AND ACCEPTANCE REPORT

            <div class="col-sm-6" style="margin: 20px auto; text-align: center;">
                
                <label for="agency" class="form-label">Agency</label>
                <input type="text" class="form-control" id="agency" name="agency" placeholder="Agency" >
            </div>

        </th>
    </thead>
    <tbody>
        <tr>
            <td colspan="6">
                <div style="margin: 0.5rem;">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="supplier" class="form-label">Supplier</label>
                            <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Supplier">
                        </div>
                        <div class="col-6">
                            <label for="IAR_No" class="form-label">IAR No.</label>
                            <input type="text" class="form-control" id="IAR_No" name="IAR_No" placeholder="IAR Number">
                        </div>
                        <div class="col-3">
                            <label for="PO_No" class="form-label">PO No.</label>
                            <input type="text" class="form-control" id="PO_No" name="PO_No" placeholder="PO Number">
                        </div>
                        <div class="col-sm-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="date" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="invoice" class="form-label">Invoice No.</label>
                            <input type="text" class="form-control" id="invoice" name="invoice" placeholder="invoice">
                        </div>
                        <div class="col-sm-3">
                            <label for="date2" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date2" name="date2" placeholder="date" required>
                        </div>
                        <div class="col-sm-12">
                            <label for="requisitioning_office" class="form-label">Requisitioning Office/Department</label>
                            <input type="text" class="form-control" id="requisitioning_office" name="requisitioning_office" placeholder="Requisitioning Office/Department">
                        </div>



                        <div class="col-3">
<label for="stock_No" class="form-label">Stock Number</label>
<input type="text" class="form-control" name="stock_No[]" placeholder="Stock Number">
</div>
<div class="col-sm-3">
<label for="unit" class="form-label">Unit</label>
<input type="text" class="form-control" name="unit[]" placeholder="unit">
</div>
<div class="col-sm-3">
<label for="description" class="form-label">Description</label>
<input type="text" class="form-control" name="description[]" placeholder="description">
</div>
<div class="col-sm-3">
<label for="quantity" class="form-label">Quantity</label>
<input type="number" class="form-control" name="quantity[]" placeholder="quantity">
</div>

                    </div>
                </div>
            </td>
        </tr>


 
    <tr style="text-align: center;">
        <td colspan="2">INSPECTION</td>
     
        <td colspan="2">ACCEPTANCE</td>
    </tr>
    
 
<tr>
    <td colspan="2">
        <div>
            <label for="date3" class="form-label">Date Inspected</label>
            <input type="date" class="form-control" id="date3" name="date3" placeholder="date" required>
        </div>
    </td>
    <td colspan="2">
        <div>
            <label for="date4" class="form-label">Date Received</label>
            <input type="date" class="form-control" id="date4" name="date4" placeholder="date" required>
        </div>
    </td>
</tr>

<!-- Indeterminate checkbox -->
<tr style="text-align: left;">
<td colspan="2">
  <input type="checkbox" id="checkbox1" name="checkbox1">
  <label for="checkbox1">Inspected, verified and found<br>in order as to quantity and specifications</label>
</td>

  <td colspan="2">
  <input type="checkbox" id="checkbox2" name="checkboxGroup" onclick="handleCheckboxClick(this)">
  <label for="checkbox2">Complete</label>
  <br>
  <input type="checkbox" id="checkbox3" name="checkboxGroup" onclick="handleCheckboxClick(this)">
  <label for="checkbox3">Partial</label>
</td>
</tr>

<td colspan="2">
        <div>
            <label for="inspectionOffice" class="form-label">Inspection Office/Inspection Committee</label>
            <input type="text" class="form-control" id="inspectionOffice" name="inspectionOffice" placeholder="Inspection Office/Inspection Committee" required>
        </div>
    </td><td colspan="2">
        <div>
            <label for="propertyOfficer" class="form-label">Property Officer</label>
            <input type="text" class="form-control" id="propertyOfficer" name="propertyOfficer" placeholder="Property Officer" required>
        </div>
    </td>


        <!-- Add your table rows here -->
    </tbody>
</table>
</div>
        <div class="col-sm-12">
    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-success" style="background-color: #ffa800;" onclick="addRow()">Add Row for stocks</button>

        <div style="margin-left: 10px;"> <!-- Add some margin between the buttons -->
            <button type="submit" class="btn btn-primary" style="background-color: maroon;">Submit for Printing</button>
        </div>
    </div>
</div>


    </form>
</div>




<script>
    document.getElementById('date').max = new Date().toISOString().split('T')[0];
    document.getElementById('date2').max = new Date().toISOString().split('T')[0];
    document.getElementById('date3').max = new Date().toISOString().split('T')[0];
    document.getElementById('date4').max = new Date().toISOString().split('T')[0];

    function addRow() {
        // Get the container of the entire row where you want to insert the new rows
        var insertContainer = document.querySelector('.col-sm-3 label[for="quantity"]').parentNode;

        for (var rowCounter = 0; rowCounter < 1; rowCounter++) {
            // Create a new row div
            var newRow = document.createElement("div");
            newRow.className = "row";

            // Append the set of Stock Number, Unit, Description, and Quantity inputs to the new row
            newRow.innerHTML = `
                <div class="col-3">
                    <label for="stock_No" class="form-label">Stock Number</label>
                    <input type="text" class="form-control" name="stock_No[]" placeholder="Stock Number">
                </div>
                <div class="col-sm-3">
                    <label for="unit" class="form-label">Unit</label>
                    <input type="text" class="form-control" name="unit[]" placeholder="unit">
                </div>
                <div class="col-sm-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description[]" placeholder="description">
                </div>
                <div class="col-sm-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="quantity[]" placeholder="quantity">
                </div>
            `;

            // Insert the new row after the current container
            insertContainer.parentNode.insertBefore(newRow, insertContainer.nextSibling);
        }
    }

    
</script>


<script>
  function handleCheckboxClick(clickedCheckbox) {
    var checkboxes = document.getElementsByName("checkboxGroup");

    checkboxes.forEach(function(checkbox) {
      if (checkbox !== clickedCheckbox) {
        checkbox.checked = false;
      }
    });
  }
</script>




<?php
include('partials/footer.php')
?>