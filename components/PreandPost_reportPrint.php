<?php
include('Controller/db.php');
include('partials/header.php');
include('partials/sidebar.php');
include('partials/topbar.php');



$Type = $_POST['type'] ?? '';
$Serial_Engine_no = $_POST['serial_engine_no']  ?? '';
$Acquisition_Date = $_POST['acquisition_date']  ?? '';
$Date_of_latest_repair = $_POST['acquisition_date'] ?? '';


$Brand_Model = $_POST['brand_model'] ?? '';
$Property_No = $_POST['property_number'] ?? '';
$Acquisition_Cost = $_POST['acquisition_cost'] ?? '';
$Latest_Repair = $_POST ['latest_repair'] ?? '';

$Defects_Complains = $_POST['defects_complains'] ?? '';

$Requested_By = $_POST['requested_by'] ?? '';
$Position_Designation = $_POST['position_designation'] ?? '';


?>

<!-- Bordered table -->

    <div class="p-5 d-flex justify-content-center align-items-center">
            <table class="table table-bordered">
                <thead>
                    
                    <th colspan="6" class="text-center">
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <img src="../img/BSC_LOGO.png" alt="Logo" style="height: 80px; width: 80px; margin-right: 30px;">

                    <div style="text-align: center;">
                        <label >REPUBLIC OF THE PHILIPPINES</label>
                        <br>
                        BATANES STATE COLLEGE
                        <br>
                        BASCO, BATANES
                    </div>

                    <thead>
                        <th colspan="6" class="">
                            <br>
                            <p class="fs-5 text-center">PRE AND POST-REPAIR INSPECTION</p>
                            <p class ="text-left">Description of Property </p>
                                    
                            <tr>
                                <td colspan="2 " class="fs-6 text-left" >
                                    <div>
                                        <label for="inspected_by" class="form-label">Type: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $Type; ?></label>
                                    </div>
                                    <div>
                                        <label for="Serial_Engine_No" class="form-label">Serial/Engine No: &nbsp; <?php echo $Serial_Engine_no; ?> </label>
                                    </div>
                                    <div>
                                        <label for="Acquisition_date" class="form-label">Acquisition Date: &nbsp; <?php echo $Acquisition_Date; ?></label>
                                    </div>
                                    <div>
                                        <label for="latest_repair" class="form-label">Date of latest repair: &nbsp; <?php echo $Date_of_latest_repair; ?></label>
                                    </div>
                                    <div>
                                        <label for="Latest_job_order" class="form-label">Attach Copy of latest job order:</label>
                                    </div>

                                </td>


                                <td colspan="2" class="fs-6  text-left" >
                                <div>
                                        <label for="inspected_by" class="form-label">Brand/Model: &nbsp; <?php echo $Brand_Model; ?> </label>
                                    </div>
                                    <div>
                                        <label for="property_no" class="form-label">Property No:  &nbsp; <?php echo $Property_No; ?></label>
                                    </div>
                                    <div>
                                        <label for="acquisition_cost" class="form-label">Acquisition Cost No: &nbsp; <?php echo $Acquisition_Cost; ?></label>
                                    </div>
                                    <div>
                                        <label for="latest_repair" class="form-label">Name of latest repair:  &nbsp; <?php echo $Latest_Repair; ?></label>
                                    </div>
                                    <div>
                                        <label for="date1" class="form-label"></label>
                                    </div>
                                </td>
                            </tr>

                        </th>
                    </thead>


               



                
                    <tr>
                        <td colspan="2">
                            <div>
                                <label for="pre_inspected" class="form-label">Defects/Complaints</label>
                                <input type="text" class="form-control" id="pre_inspected" name="pre_inspected" placeholder="&nbsp; <?php echo $Defects_Complains; ?>">
                            </div>
                        </td>

                        <td colspan="2">
                            <div>
                                <label for="requested_by" class="form-label">Requested By :  &nbsp; <?php echo $Requested_By; ?></label>
                            </div>
                            <div>
                                <label for="position_designation" class="form-label">Position/Designation: &nbsp; <?php echo $Requested_By; ?> </label>
                            </div>
                            <div>
                                <label for="date1" class="form-label">Date</label>
                            </div>
                        </td>
                    </tr>



                    <th colspan="12" class="text-center">
                              
                             <div class="col-sm-6" style=" text-align: left  ;">
                                <label for="agency" class="form-label">Re-Pepair</label>
                            </div>

                            <div class="col-sm-6" style="text-align: left;">
                                <label for="agency" class="form-label">Findings:</label>
                            </div>

                    </th>


                    
                
                    <tr>
                        <td colspan="2">

                         <div>
                                <label for="pre_inspected" class="form-label">Pre- Inspected by:</label>
                        </div>
                        <div>
                                <label for="position_designation" class="form-label">Position/Designation:</label>
                        </div>
                        <div>
                                <label for="date1" class="form-label">Date:</label>
                        </div>

                       
                        <td colspan="2">
                            <div>
                                <label for="requested_by" class="form-label">Noted By:</label>
                            </div>
                            <div>
                                <label for="position_designation" class="form-label">Position/Designation:</label>
                            </div>
                            <div>
                                <label for="date1" class="form-label">Date:</label>
                            </div>
                        </td>
                    </tr>



                    

                    <th colspan="12" class="text-center">
                              
                             <div class="col-sm-6" style=" text-align: left  ;">
                                <label for="agency" class="form-label">Post-Repair</label>
                            </div>

                            <div class="col-sm-6" style="text-align: left;">
                                <label for="agency" class="form-label">Findings:</label>
                            </div>

                    </th>




                    <tr>
                                <td colspan="2 " class="fs-6 text-left" >
                                    <div>
                                        <label for="inspected_by" class="form-label">Job Order:  &nbsp; <?php echo $Type; ?></label>
                                    </div>
                                    <div>
                                        <label for="date1" class="form-label">Invoice No:</label>
                                    </div>
                                    <div>
                                        <label for="date1" class="form-label">Amount per job order:</label>
                                    </div>
                                </td>


                                <td colspan="2" class="fs-6  text-left" >
                                <div>
                                        <label for="inspected_by" class="form-label">Date:</label>
                                    </div>
                                    <div>
                                        <label for="date1" class="form-label">Date:</label>
                                    </div>
                                    <div>
                                        <label for="date1" class="form-label">Payable Amount:</label>
                                    </div>
                                </td>
                            </tr>
                        </th>

                        
                    <th colspan="12" class="text-center">

                             <div class="col-sm-6" style="text-align: left;">
                                 <label for="agency" class="form-label">Findings:</label>
                             </div>
 
                     </th>

                     <tr>

                    <td colspan="2">
                        <label for="inspected_by" class="form-label">Inspected by:</label>
                        <input type="text" class="form-control text-center" id="name_inspected" name="name_inspected" placeholder="Name">
                        <input type="text" class="form-control text-center" id="position_inspected" name="position_inspected" placeholder="Date" >
                    </td>
                    <td colspan="2">
                        <label for="witness_to" class="form-label">Noted by:</label>
                        <input type="text" class="form-control text-center" id="name_witness" name="name_witness" placeholder="Name" >
                        <input type="text" class="form-control text-center" id="position_witness" name="position_witness" placeholder="Date">
                    </td>
                </tr>


                <tr>
                    <td colspan="12" style="padding-left: 50px;">
                      
                        <input type="radio" name="radio-group-3" class="btn-check" id="example-radio-10" autocomplete="off" disabled>
                        <label class="btn btn-outline-primary" for="example-radio-10">  </label>Accounting Section
                        <br>
                        <input type="radio" name="radio-group-3" class="btn-check" id="example-radio-10" autocomplete="off" disabled>
                        <label class="btn btn-outline-primary" for="example-radio-10"></label>Supply Section
                        <br>
                        <input type="radio" name="radio-group-3" class="btn-check" id="example-radio-10" autocomplete="off" disabled>
                        <label class="btn btn-outline-primary" for="example-radio-10"></label> Coa
                        <br>
                    </td>
                </tr>



                     
               
 




                    </thead>












                    <tbody>

            <!-- Add your table rows here -->
        </tbody>
    </table>
</div>

<style>
    /* Add this style to make the borders of the input fields invisible */
    .form-control {
        border: none;
        border-bottom: 1px solid #ced4da; /* Adding a bottom border for separation */
    }
</style>

<?php
include('./partials/footer.php')
?>
