
<form class="row g-3" action="./components/propertyreturn_report.php" method="post">
        
        <div class="p-5 d-flex justify-content-center align-items-center">
    
    <table class="table table-bordered">
        <thead>
            <th colspan="6" class="text-center">
                PROPERTY RETURN SLIP
    
            </th>
        </thead>
        <tbody>
        <tr>
        <td colspan="6">
            <div style="margin: 0.5rem;">
                <div class="row g-3">

                    <div class="col-sm-6">
                        <label for="place" class="form-label">Name of Agency</label>
                        <input type="text" class="form-control" id="agency" name="agency" placeholder="Name of Agency">
                    </div>

                    <div class="col-sm-6">
                        <label for="purpose" class="form-label" id='purpose'>Purpose</label>
                        <select class="form-select" name="Purpose"> <!-- Add name attribute here -->
                            <option selected>Select a purpose</option>
                            <option value="Disposal">Disposal</option>
                            <option value="Repair">Repair</option>
                            <option value="ReturnedToStock">Returned to Stock</option>
                        </select>
                    </div>


                    <div class="col-sm-6">
                        <label for="other" class="form-label">Other</label>
                        <input type="text" class="form-control" id="other" name="place" placeholder="Name of Agency">
                    </div>
      
    
  
                </div>
            </td>
        </tr>

        <tbody>
                <tr>
                    <td colspan="6">
                        <div style="margin: 0.5rem;">
                            <div class="row g-3">
                              
                                <!-- Row 1 -->
                                <div class="col-1">
                                    <label for="qty" class="form-label">Qty</label>
                                    <input type="number" class="form-control" id="qty1" name="qty1" placeholder="qty">
                                </div>


                                <div class="col-sm-1">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input type="text" class="form-control" name="unit1" placeholder="unit">
                                </div>
                                
                                <div class="col-sm-2">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" name="description1" placeholder="description">
                                </div>

                                <div class="col-sm-2">
                                    <label for="Property No." class="form-label">Property No.</label>
                                    <input type="text" class="form-control" name="property_no1" placeholder="Property No.">
                                </div>

                                <div class="col-sm-2">
                                    <label for="par_ics" class="form-label">PAR/ICS No.</label>
                                    <input type="text" class="form-control" name="par_ics1" placeholder="par/ics no">
                                </div>
                                
                                <div class="col-sm-2">
                                    <label for="end_user" class="form-label">End User</label>
                                    <input type="text" class="form-control" name="end_user1" placeholder="Name">
                                </div>
                                

                                <div class="col-sm-1">
                                    <label for="unit_va;ue" class="form-label">Unit Value</label>
                                    <input type="number" class="form-control" name="unit_value1" placeholder="">
                                </div>
                                

                                <div class="col-sm-1">
                                    <label for="total_value" class="form-label">Total Value</label>
                                    <input type="number" class="form-control" name="total_value" placeholder="">
                                </div>
                                

                                <!-- Row 1 -->

                                <!-- Row 1 -->
                                <div class="col-1">
                                    <label for="qty" class="form-label">Qty</label>
                                    <input type="text" class="form-control" name="qty1" placeholder="qty">
                                </div>


                                <div class="col-sm-1">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input type="text" class="form-control" name="unit1" placeholder="unit">
                                </div>
                                
                                <div class="col-sm-2">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" name="description1" placeholder="description">
                                </div>

                                <div class="col-sm-2">
                                    <label for="Property No." class="form-label">Property No.</label>
                                    <input type="text" class="form-control" name="property_no1" placeholder="Property No.">
                                </div>

                                <div class="col-sm-2">
                                    <label for="par_ics" class="form-label">PAR/ICS No.</label>
                                    <input type="text" class="form-control" name="par_ics1" placeholder="par/ics no">
                                </div>
                                
                                <div class="col-sm-2">
                                    <label for="end_user" class="form-label">End User</label>
                                    <input type="text" class="form-control" name="end_user1" placeholder="Name">
                                </div>
                                

                                <div class="col-sm-1">
                                    <label for="unit_va;ue" class="form-label">Unit Value</label>
                                    <input type="number" class="form-control" name="unit_value1" placeholder="">
                                </div>
                                

                                <div class="col-sm-1">
                                    <label for="total_value" class="form-label">Total Value</label>
                                    <input type="number" class="form-control" name="total_value1" placeholder="">
                                </div>
                                
         
                              
                            </div>
                        </div>
                    </td>
                </tr>
        </tbody>
        
        


        <td colspan="6">
            <div style="margin: 0.5rem;">
                <div class="row g-3">

                    <div class="col-sm-6">
                        <label for="authority_reason" class="form-label">Authority/Reason:</label>
                        <input type="text" class="form-control" id="authority_reason" name="authority_reason" placeholder="Authority/Reason">
                    </div>

                    <div class="col-sm-6">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                    </div>
      
                </div>
            </td>
        </tr>




    
    <td colspan="2">
            <div>
                <label for="certified_correct" class="form-label">I HEREBY CERTIFY that i have RETURNED this: </label>
                <input type="date" class="form-control" id="name" name="name" placeholder="Date" required>

                <label for="returned to" class="form-label">Returned to:</label>
                <input type="text" class="form-control" id="returned_to" name="returned_to" placeholder="Returned to" required>
                <br>
                <br>

                <input type="text" class="form-control" id="position" name="position" placeholder="Returned by" required>
                <input type="text" class="form-control" id="office" name="office" placeholder="Position" required>
    
    
            </div>
        </td>
        <td colspan="2">
            <div>
            <label for="certified_correct" class="form-label">I HEREBY CERTIFY that i have RECEIVED this: </label>
                <input type="date" class="form-control" id="name" name="name" placeholder="Date" required>

                <label for="returned to" class="form-label">Received From:</label>
                <input type="text" class="form-control" id="received_from" name="received_from" placeholder="Received From" required>
                <br>
                <br>

                <input type="text" class="form-control" id="position" name="position" placeholder="Received By" required>
                <input type="text" class="form-control" id="position" name="position" placeholder="Position" required>

            </div>
      </td>
    
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
    
  
   