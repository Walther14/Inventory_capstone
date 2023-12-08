<?php
include('../Controller/db.php');

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
                                <td colspan="2"  >
                                    <div>
                                        <label for="inspected_by" class="form-label">Type:</label>
                                    </div>
                                    <div>
                                        <label for="date1" class="form-label">Serial/Engine No:</label>
                                    </div>
                                    <div>
                                        <label for="date1" class="form-label">Acquisition Date:</label>
                                    </div>
                                    <div>
                                        <label for="date1" class="form-label">Date of latest repair:</label>
                                    </div>

                                </td>

                                <td colspan="2"  >
                                <div>
                                        <label for="inspected_by" class="form-label">Brand/Model:</label>
                                    </div>
                                    <div>
                                        <label for="date1" class="form-label">Property No:</label>
                                    </div>
                                    <div>
                                        <label for="date1" class="form-label">Acquisition Cost No:</label>
                                    </div>
                                    <div>
                                        <label for="date1" class="form-label">Name of latest repair:</label>
                                    </div>
                                </td>
                            </tr>


   
                        </th>
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
include('../partials/footer.php')
?>
