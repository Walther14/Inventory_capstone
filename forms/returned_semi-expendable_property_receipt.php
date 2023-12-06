
<form class="row g-3" action="./components/wasteReport.php" method="post">
        
        <div class="p-5 d-flex justify-content-center align-items-center">
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="6" style="text-align: right;">
                    Annex A.6
                </th>
            </tr>

            <th colspan="6" class="text-center">
                RECEIPT OF RETURNED SEMI-EXPENDABLE PROPERTY
    
            </th>
        </thead>

         
    <td colspan="2">
            <div>
                <label for="certified_correct" class="form-label">Entity Name: </label>
                <input type="text" class="form-control" id="entity" name="entity" placeholder="Entity Name" required>

         
            </div>
        </td>
        <td colspan="2">
            <div>
            <label for="certified_correct" class="form-label">Date: </label>
                <input type="date" class="form-control" id="name" name="name" placeholder="Date" required>

                <label for="returned to" class="form-label">RRSP No::</label>
                <input type="text" class="form-control" id="rrsp" name="rrsp" placeholder="RRSP No." required>
          
            </div>
      </td>


      <tbody>
            <tr>
                <td colspan="6">
                    <div style="margin: 0.5rem;">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="stock_No" class="text-center">This is to acknowledge receipt of the returned Semi-expedable Property</label>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>


        <tbody>
                <tr>
                    <td colspan="6">
                        <div style="margin: 0.5rem;">
                            <div class="row g-3">
                              

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
        </tbody>




    
    <td colspan="2">
            <div>
                <label for="certified_correct" class="form-label">Returned by: </label>
                <br>
                <br>
                <input type="text" class="form-control" id="end_user" name="end_user" placeholder="End User" required>
                <input type="date" class="form-control" id="date" name="date" placeholder="Date" required>
    
    
            </div>
        </td>
        <td colspan="2">
            <div>
                <label for="certified_correct" class="form-label">Received by: </label>
                <br>
                <br>
                <input type="text" class="form-control" id="supply_division" name="supply_division" placeholder="Head, Property, and/or Supply Division Unit" required>
                <input type="date" class="form-control" id="date" name="date" placeholder="Date" required>
    

           
            </div>
      </td>
    
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
     {
        // Get the container of the row where you want to insert the new rows
        var insertContainer = document.querySelector('tr[style="text-align: center;"]');
    
        // Create a new row HTML string
        var newRowHTML = `
          <tr>
            <td colspan="6">
              <div style="margin: 0.5rem;">
                <div class="row g-3">
                  <div class="col-2">
                    <label for="item" class="form-label">Item</label>
                    <input type="text" class="form-control" name="item[]" placeholder="Item">
                  </div>
                  <div class="col-sm-2">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="quantity[]" placeholder="Quantity">
                  </div>
                  <div class="col-sm-1">
                    <label for="unit" class="form-label">Unit</label>
                    <input type="text" class="form-control" name="unit[]" placeholder="Unit">
                  </div>
                  <div class="col-sm-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description[]" placeholder="Description">
                  </div>
                  <div class="col-sm-2">
                    <label for="OR" class="form-label">O.R. No.</label>
                    <input type="text" class="form-control" name="OR[]" placeholder="O.R. No.">
                  </div>
                  <div class="col-sm-2">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" class="form-control" name="amount[]" placeholder="Amount">
                  </div>
                </div>
              </div>
            </td>
          </tr>
        `;
    
        // Insert the new row HTML after the current container
        insertContainer.insertAdjacentHTML('afterend', newRowHTML);
      }
    }
    
    
    </script>
    
    
    <!--<script>
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
    </script>-->
    
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
    
    
    