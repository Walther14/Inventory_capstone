<form class="row g-3" action="./components/PreandPost_reportPrint.php" method="post">

    <div class="p-5 d-flex justify-content-center align-items-center">

        <table class="table table-bordered">
            <thead>
                <th colspan="6" class="text-center">
                    PRE AND POST-REPAIR INSPECTION
                </th>
            </thead>

            <thead>
                <th colspan="2" class="text-center">
                <label for="item_number" class="form-label">Item No.</label>
                <input type="text" class="form-control" id="item_number" name="item_number" placeholder="Item Number">
                
                </th>
                <th colspan="2" class="text-center">
                <label for="PPR" class="form-label">PPR #</label>
                <input type="text" class="form-control" id="PPR" name="PPR" placeholder="PPR">
                
                </th>
            </thead>

            <tbody>
                <tr>
                    <td colspan="6">
                        <div style="margin: 0.5rem;">
                            <div class="row g-3">


                                <div class="col-sm-6">
                                    <label for="type" class="form-label">Type</label>
                                    <input type="text" class="form-control" id="type" name="type" placeholder="Type">
                                </div>
                                <div class="col-6">
                                    <label for="brand_model" class="form-label">Brand/Model</label>
                                    <input type="text" class="form-control" id="brand_model" name="brand_model" placeholder="Brand/Model">
                                </div>



                                <div class="col-sm-6">
                                    <label for="serial_engine_no" class="form-label">Serial/Engine No.</label>
                                    <input type="text" class="form-control" id="serial_engine_no" name="serial_engine_no" placeholder="Serial/Engine No.">
                                </div>
                                <div class="col-6">
                                    <label for="property_number" class="form-label">Property Number</label>
                                    <input type="text" class="form-control" id="property_number" name="property_number" placeholder="Property Number">
                                </div>



                                <div class="col-sm-6">
                                    <label for="acquisition_date" class="form-label">Acquisition Date</label>
                                    <input type="text" class="form-control" id="acquisition_date" name="acquisition_date" placeholder="Acquisition Date">
                                </div>
                                <div class="col-6">
                                    <label for="acquisition_cost" class="form-label">Acquisition Cost</label>
                                    <input type="text" class="form-control" id="acquisition_cost" name="acquisition_cost" placeholder="Acquisition Cost">
                                </div>




                                <div class="col-sm-6">
                                    <label for="date_latest_repair" class="form-label">Date of Latest Repair</label>
                                    <input type="text" class="form-control" id="date_latest_rapair" name="date_latest_repair" placeholder="Acquisition Date">
                                </div>
                                <div class="col-6">
                                    <label for="latest_repair" class="form-label">Name of Latest Repair</label>
                                    <input type="text" class="form-control" id="latest_repair" name="latest_repair" placeholder="Acquisition Cost">
                                </div>

                                <br></br>
                                <br></br>

                            </div>
                        </div>
                    </td>
                </tr>



                <tr style="text-align: center;">
                    <td colspan="2">Defects/Complaints</td>

                    <td colspan="2">Requested by</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>
                            <label for="defects_complains" class="form-label">Defects/Complaints</label>
                            <input type="" class="form-control" id="defects_complains" name="defects_complains" placeholder="Defects/Complains">
                        </div>

                    </td>

                    <td colspan="2">
                        <div>
                            <label for="requested_by" class="form-label">Requested By</label>
                            <input type="text" class="form-control" id="requested_by" name="requested_by" placeholder="Requested by">
                        </div>
                        <div>
                            <label for="position_designation" class="form-label">Position/Designation</label>
                            <input type="text" class="form-control" id="position_designation" name="position_designation" placeholder="Position/Designation">
                        </div>
                        <div>
                            <label for="requested_date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="requested_date" name="requested_date" placeholder="Date" >
                        </div>
                    </td>
                </tr>



                <th colspan="6" class="text-center">

                    <div class="col-sm-6" style="margin: 20px auto; text-align: center;">
                        <label for="findings" class="form-label">Pre-Repair Findings</label>
                        <input type="text" class="form-control" id="findings" name="findings" placeholder="Findings">
                    </div>

                </th>




                <tr style="text-align: center;">
                    <td colspan="2">Pre-Inspected By</td>

                    <td colspan="2">Noted By</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>
                            <label for="pre_inspected" class="form-label">Pre-Inspected By</label>
                            <input type="text" class="form-control" id="pre_inspected" name="pre_inspected" placeholder="Pre-Inspected by">
                        </div>
                        <div>
                            <label for="pre_designation" class="form-label">Position/Designation</label>
                            <input type="text" class="form-control" id="pre_designation" name="pre_designation" placeholder="Position/Designation">
                        </div>
                        <div>
                            <label for="preDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="preDate" name="preDate" placeholder="Date" >
                        </div>
                    </td>



                    <td colspan="2">
                        <div>
                            <label for="noted_by" class="form-label">Noted By</label>
                            <input type="text" class="form-control" id="noted_by" name="noted_by" placeholder="Noted by">
                        </div>
                        <div>
                            <label for="noted_position" class="form-label">Position/Designation</label>
                            <input type="text" class="form-control" id="noted_position" name="noted_position" placeholder="Position/Designation">
                        </div>
                        <div>
                            <label for="noted_date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="noted_date" name="noted_date" placeholder="Date" >
                        </div>
                    </td>
                </tr>



                <th colspan="6" class="text-center">
                    POST REPAIR
                </th>
            <tbody>
                <tr>
                    <td colspan="6">
                        <div style="margin: 0.5rem;">
                            <div class="row g-3">



                                <div class="col-sm-12">
                                    <label for="supplier" class="form-label">Repair Shop/Supplier</label>
                                    <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Repair Shop/Supplier">
                                </div>



                                <div class="col-sm-6">
                                    <label for="job_order" class="form-label">Job Order</label>
                                    <input type="text" class="form-control" id="job_order" name="job_order" placeholder="Job Order">
                                </div>
                                <div class="col-6">
                                    <label for="job_date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="job_date" name="job_date" placeholder="Date">
                                </div>



                                <div class="col-sm-6">
                                    <label for="invoice_no" class="form-label">Invoice No.</label>
                                    <input type="text" class="form-control" id="invoice_no" name="invoice_no" placeholder="Invoice No ">
                                </div>
                                <div class="col-6">
                                    <label for="invoice_date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="invoice_date" name="invoice_date" placeholder="Date">
                                </div>



                                <div class="col-sm-6">
                                    <label for="amount" class="form-label">Amount per job order.</label>
                                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount per job order">
                                </div>
                                <div class="col-6">
                                    <label for="payable_amount" class="form-label">Payable Amount</label>
                                    <input type="text" class="form-control" id="payable_amount" name="payable_amount" placeholder="Payble Amount">
                                </div>

                                <div class="col-sm-12">
                                    <label for="findings" class="form-label">Findings</label>
                                    <input type="text" class="form-control" id="findings" name="findings" placeholder="Findings">
                                </div>

                            </div>
                        </div>
                    </td>
                </tr>

                <tr style="text-align: center;">
                    <td colspan="2">Inspected By</td>

                    <td colspan="2">Noted By</td>
                </tr>
                <tr>
                    <td colspan="2">
                    <div>
                            <label for="inspected_dat" class="form-label">Inspected by</label>
                            <input type="text" class="form-control" id="inspected_dat" name="inspected_dat" placeholder="Date">
                        </div>

                        <div>
                            <label for="inspected_date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="inspected_date" name="inspected_date" placeholder="Date">
                        </div>
                    </td>



                    <td colspan="2">
                        <div>
                            <label for="noted_bylower" class="form-label">Noted By</label>
                            <input type="text" class="form-control" id="noted_bylower" name="noted_bylower" placeholder="Noted by">
                        </div>

                        <div>
                            <label for="noted_datelower" class="form-label">Date</label>
                            <input type="date" class="form-control" id="noted_datelower" name="noted_datelower" placeholder="Date" >
                        </div>
                    </td>
                </tr>

                <!-- Add your table rows here -->
            </tbody>
        </table>
    </div>
    <div class="col-sm-12">
        <div class="d-flex justify-content-end mb-3">

            <div style="margin-left: 10px;"> <!-- Add some margin between the buttons -->
                <button type="submit" class="btn btn-primary" style="background-color: maroon;">Submit for Printing</button>
            </div>
        </div>

</form>

