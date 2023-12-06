
<form class="row g-3" action="./components/wasteReport.php" method="post">
        
        <div class="p-5 d-flex justify-content-center align-items-center">
    
    <table class="table table-bordered">
        <thead>
            <th colspan="6" class="text-center">
                ACKNOWLDEGEMENT RECEIPT FOR EQUIPMENT
    
            </th>
        </thead>
        <tbody>
        <tr>
        <td colspan="6">
            <div style="margin: 0.5rem;">
                <div class="row g-3">

                    <div class="col-sm-6">
                        <label for="entity" class="form-label">Entity Name:</label>
                        <input type="text" class="form-control" id="entity" name="entity" placeholder="Name of Agency">
                    </div>

                    <div class="col-sm-6">
                        <label for="purpose" class="form-label">Fund Cluster: Sir Roy Dito Is direct na naka link don sa Fund code natin</label>
                        <select class="form-select" id="purpose"> <!-- Direct Select from Fund code in the System -->
                            <option value="fullstack"></option>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="refference_no" class="form-label">Refference No:</label>
                        <input type="text" class="form-control" id="refference_no" name="refference_no" placeholder="Refference No.">
                    </div>
      
    
  
                </div>
            </td>
        </tr>


        
        <th colspan="12" class="text-left">
            <div class="col-sm-6" style="text-align: left;">
                <label for="findings" class="form-label">Cancles</label>
                <input type="text" class="form-control" id="findings" name="findings" placeholder="">
            </div>
        </th>


        <tbody>
                <tr>
                    <td colspan="6">
                        <div style="margin: 0.5rem;">
                            <div class="row g-3">
                            
                                <div class="col-12">
                                    <label for="stock_No" class="form-label">Note: Physical transfering of PPEs among collge personnel or office themeselves
                                      by virtue of designation, transfer, termination or by promotion does not relieve the orginal end-user of the accountability 
                                      that goes with the Property, Plant and Equipment (PPE) being transferred. The Supply and Property unit shall always rely on the 
                                      issued acknowledgement Receipt (PAR) under the personnel or officers' name. Source: page 21 BOT Approved Supply and Property 
                                      Management System Manual (RPCPPE2022)
                                    </label>
                                </div>

                                
                           
                               
                            </div>
                        </div>
                    </td>
                </tr>
        </tbody>
    
    <td colspan="2">
            <div>
                <label for="certified_correct" class="form-label">Received By </label>
                <br>
                <br>
                <input type="text" class="form-control" id="position" name="position" placeholder="Received by" required>
                <input type="text" class="form-control" id="received_by" name="received_by" placeholder="Position" required>
    
    
            </div>
        </td>
        <td colspan="2">
            <div>
            <label for="certified_correct" class="form-label">Issued by </label>
                <br>
                <br>
                <input type="text" class="form-control" id="position" name="position" placeholder="Issued by" required>
                <input type="text" class="form-control" id="issued_by" name="issued_by" placeholder="Position" required>
  
           
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
    
    
    