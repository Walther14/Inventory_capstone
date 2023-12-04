<form class="row g-3" action="./components/inspectionAndAcceptanceReport.php" method="post">
    <div class="p-5 d-flex justify-content-center align-items-center">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="12" style="text-align: right;">
                        Apendix 9-10
                    </th>
                </tr>
                <th colspan="16" class="text-center">
                    REPORT OF SUPPLIES AND MATERIALS ISSUED
                </th>
                </thead>
                <tbody id="tableBody">
            <tr>
                    <td colspan="12">
        <div style="margin: 0.5rem;">
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="place" class="form-label">Entity Name</label>
                    <input type="text" class="form-control" id="place" name="place" placeholder="Place of Storage">
                </div>
                <div class="col-6">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="Date">

                    <br>

                    <label for="WMR" class="form-label">Ref. No.</label>
                    <input type="text" class="form-control" id="WMR" name="WMR" placeholder="Ref. No.">
                </div>
            </div>
            <tr style="text-align: center;">
    <td colspan="6">To be filled up in the Supply and Property Unit</td>
    <td colspan="6">To be filled up by Accounting Unit</td>
</tr>

<tr style="text-align: center;">
    <td>RIS No.</td>
    <td>Responsibility Center Code</td>
    <td>Stock Nos.</td>
    <td>Item</td>
    <td>Unit</td>
    <td>Quantity</td>
    <td colspan="5">Unit Cost</td>
    <td colspan="5">Amount</td>
</tr>

<tr>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RIS_No[]" placeholder="RIS No.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RCC[]" placeholder="Responsibility Center Code">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="stock_Nos[]" placeholder="Stock Nos.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="item[]" placeholder="Item">
            
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unit[]" placeholder="Unit">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="number" class="form-control" name="quantity[]" placeholder="Quantity">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unit_cost[]" placeholder="Unit Cost">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="amount[]" placeholder="Amount">
        </div>
    </td>
</tr>

<tr>
    <td>
        <div style="margin: 0.5rem;">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
        </div>
    </td>
    <td colspan="2">
        <div style="margin: 0.5rem; text-align:center;">
        <label>---Nothing follows---</label>
        </div>
 
        <div style="margin: 0.5rem;">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
        </div>
    </td>
    
</tr>
<tr style="text-align: center;">
    <td colspan="6">Recapitulation</td>
    <td colspan="6">Recapitulation</td>
</tr>
          
<tr style="text-align: center;">
    <td>RIS No.</td>
    <td>Stock Nos.</td>
    <td>Quantity</td>
    <td>Item</td>
    <td>Unit</td>
    <td>Unit Cost</td>
    <td colspan="5">Total Cost</td>
    <td colspan="5">Account Code</td>
</tr>
<tr>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="RIS_NoL[]" placeholder="RIS No.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
        <input type="text" class="form-control" name="stock_NosL[]" placeholder="Stock Nos.">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="quantityL[]" placeholder="Quantity">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="itemL[]" placeholder="Item">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="unitL[]" placeholder="Unit">
        </div>
    </td>
    <td>
        <div style="margin: 0.5rem;">
        <input type="text" class="form-control" name="unit_costL[]" placeholder="Unit Cost">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="total_cost[]" placeholder="Total Cost">
        </div>
    </td>
    <td colspan="5">
        <div style="margin: 0.5rem;">
            <input type="text" class="form-control" name="account_code[]" placeholder="Amccount Code">
        </div>
    </td>
</tr>



<td colspan="6">
                    <div>
                        <label for="inspectionOffice" class="form-label">I hereby certify to the correctness of the above information</label>
                       <br>
                        <input type="text" class="form-control" id="inspectionOffice" name="inspectionOffice" placeholder="Name" required>
                        <input type="text" class="form-control" id="inspectionOffice" name="inspectionOffice" placeholder="Position" required>

                    </div>
                </td>
                <td colspan="6">
                    <div>
                        <label for="propertyOfficer" class="form-label">Posted by/Date</label>
                        <br>
                        <input type="text" class="form-control" id="propertyOfficer" name="propertyOfficer" placeholder="Name" required>
                        <input type="text" class="form-control" id="inspectionOffice" name="inspectionOffice" placeholder="Position" required>

                    </div>
                </td>
<!-- Add your table rows here -->
            </tbody>
        </table>


    </div>

    <div class="col-sm-12">
        <div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px;">
        <button type="button" class="btn btn-success" style="background-color: #ffa800;" id="addRowButton">Add Row for stocks</button>

            <div style="margin-left: 10px;">
                <button type="submit" class="btn btn-primary" style="background-color: maroon;">Submit for Printing</button>
            </div>
        </div>
    </div>
</form>

