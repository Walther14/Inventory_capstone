<?php
session_start();
@include('../Controller/db.php');
?>
<form class="row g-3" action="./components/wasteReport.php" method="post">
        
    <div class="p-5 d-flex justify-content-center align-items-center">

    <table id="wasteTable" class="table table-bordered">    <thead>
        <th colspan="6" class="text-center">
            WASTE MATERIAL REPORT

        </th>
    </thead>
    <tbody>
    <tr>
    <td colspan="6">
        <div style="margin: 0.5rem;">
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="place" class="form-label">Place of Storage</label>
                    <input type="text" class="form-control" id="place" name="place" placeholder="Place of Storage">
                </div>
                <div class="col-6">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="IAR Number">

                    <br>

                    <label for="WMR" class="form-label">WMR Ref. No.</label>
                    <input type="text" class="form-control" id="WMR" name="WMR" placeholder="WMR Ref. No.">
                </div>
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
<div class="col-2">
<label for="item" class="form-label">Item</label>
<input type="text" class="form-control" name="item[]" placeholder="item">
</div>
<div class="col-sm-2">
<label for="quantity" class="form-label">Quantity</label>
<input type="number" class="form-control" name="quantity[]" placeholder="quantity" required>
</div><div class="col-sm-1">
<label for="unit" class="form-label">Unit</label>
<input type="text" class="form-control" name="unit[]" placeholder="unit">
</div>
<div class="col-sm-3">
<label for="description" class="form-label">Description</label>
<input type="text" class="form-control" name="description[]" placeholder="description">
</div>
<div class="col-sm-2">
    <label for="OR" class="form-label">O.R. No.</label>
    <input type="text" class="form-control" name="OR[]" placeholder="OR No.">
</div>
<div class="col-sm-2">
    <label for="amount" class="form-label">Amount</label>
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
<div class="col-2">
<label for="item" class="form-label">Item</label>
<input type="text" class="form-control" name="item[]" placeholder="item">
</div>
<div class="col-sm-2">
<label for="quantity" class="form-label">Quantity</label>
<input type="number" class="form-control" name="quantity[]" placeholder="quantity">
</div><div class="col-sm-1">
<label for="unit" class="form-label">Unit</label>
<input type="text" class="form-control" name="unit[]" placeholder="unit">
</div>
<div class="col-sm-3">
<label for="description" class="form-label">Description</label>
<input type="text" class="form-control" name="description[]" placeholder="description" value="---nothing follows---">
</div>
<div class="col-sm-2">
    <label for="OR" class="form-label">O.R. No.</label>
    <input type="text" class="form-control" name="OR[]" placeholder="OR No.">
</div>
<div class="col-sm-2">
    <label for="amount" class="form-label">Amount</label>
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
<div class="col-2">
<label for="item" class="form-label">Item</label>
<input type="text" class="form-control" name="item[]" placeholder="item">
</div>
<div class="col-sm-2">
<label for="quantity" class="form-label">Quantity</label>
<input type="number" class="form-control" name="quantity[]" placeholder="quantity">
</div><div class="col-sm-1">
<label for="unit" class="form-label">Unit</label>
<input type="text" class="form-control" name="unit[]" placeholder="unit">
</div>
<div class="col-sm-3">
<label for="description" class="form-label">Description</label>
<input type="text" class="form-control" name="description[]" placeholder="description" value="---nothing follows---">
</div>
<div class="col-sm-2">
    <label for="OR" class="form-label">O.R. No.</label>
    <input type="text" class="form-control" name="OR[]" placeholder="OR No.">
</div>
<div class="col-sm-2">
    <label for="amount" class="form-label">Amount</label>
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
            <input type="text" class="form-control" id="office" name="office" placeholder="Office/Department" required>


        </div>
    </td>
    <td colspan="2">
        <div>
            <label for="disposal_approved" class="form-label">Disposal Approved</label>
            <input type="text" class="form-control" id="name_disposal" name="name_disposal" placeholder="Name" required>
            <input type="text" class="form-control" id="by_authority" name="by_authority" placeholder="By the Authority of the Board of Trustees" required>

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
<input type="checkbox" id="checkbox2" name="checkboxGroup" onclick="handleCheckboxClick(this)">
<label for="checkbox2" style="margin-left: 15vh;">Destroyed</label>

    <br>
    <label for="checkbox3" style="margin-right: 10px;">Item</label>
    <input type="checkbox" id="checkbox3" name="checkboxGroup" onclick="handleCheckboxClick(this)">
    <label for="checkbox3" style="margin-left: 15vh;">Sold at private sale</label>
    <br>

    <label for="checkbox4" style="margin-right: 10px;">Item</label>
    <input type="checkbox" id="checkbox4" name="checkboxGroup" onclick="handleCheckboxClick(this)">
    <label for="checkbox4" style="margin-left: 15vh;">Sold at public auction</label>
    <br>
    <label for="checkbox1" style="margin-right: 10px;">Item</label>
    <input type="checkbox" id="checkbox1" name="checkboxGroup" onclick="handleCheckboxClick(this)">
    <label for="checkbox1" style="margin-left: 15vh;">Transferred without cost</label>
  </td>
</tr>

<td colspan="2">
        <div>
            <label for="inspected_by" class="form-label">Inspected by</label>
            <input type="text" class="form-control" id="name_inspected" name="name_inspected" placeholder="Name" required>
            <input type="text" class="form-control" id="position_inspected" name="position_inspected" placeholder="Position" required>

        </div>
    </td>
    <td colspan="2">
        <div>
            <label for="witness_to" class="form-label">Witness to</label>
            <input type="text" class="form-control" id="name_witness" name="name_witness" placeholder="Name" required>
            <input type="text" class="form-control" id="position_witness" name="position_witness" placeholder="Position" required>

        </div>
    </td>



        <!-- Add your table rows here -->
    </tbody>
</table>


              
   

 
</div>
<div class="col-sm-12">
        <div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px;">
<!-- Add this button after the table -->
<button type="button" class="btn btn-success" onclick="addRow()">Add Row</button>

            <div style="margin-left: 10px;">
                <button type="submit" class="btn btn-primary" style="background-color: maroon;">Submit for Printing</button>
                </div>
                </div>
            </div>
    </form>



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


