<?php
$_POST['agency'];
$_POST['supplier'];
$_POST['IAR_No'];
$_POST['PO_No'];
$_POST['date'];
$_POST['invoice'];
$_POST['date2'];
$_POST['requisitioning_office'];
$_POST['stock_No'];
$_POST['unit'];
$_POST['description'];
$_POST['quantity'];
$_POST['date3'];
$_POST['date4'];
$_POST['inspection_office'];
$_POST['property_officer'];


include('Controller/db.php');
include('partials/header.php');
include('partials/sidebar.php');
include('partials/topbar.php');

?>

<!-- Bordered table -->
<div class="p-5 d-flex justify-content-center align-items-center">

    <table class="table table-bordered">
        <th colspan="6" class="d-flex justify-content-center">
            dymmt
        </th>
        <tr>
            <td colspan="6" class="d-flex justify-content-center">
                <div style="margin: 1   rem;">
                    <div class="row g-3">

                        <div class="col-sm-6">
                            <label for="supplier" class="form-label">Supplier</label>
                            <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Supplier" required>
                        </div>
                        <div class="col-6">
                            <label for="IAR_No" class="form-label">IAR No.</label>
                            <input type="text" class="form-control" id="IAR_No" name="IAR_No" placeholder="IAR Number" required>
                        </div>
                        <div class="col-3">
                            <label for="PO_No" class="form-label">PO No.</label>
                            <input type="text" class="form-control" id="PO_No" name="PO_No" placeholder="PO Number">
                        </div>
                        <div class="col-sm-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="date">
                        </div>
                        <div class="col-sm-3">
                            <label for="invoice" class="form-label">Invoice No.</label>
                            <input type="text" class="form-control" id="invoice" name="invoice" placeholder="invoice">
                        </div>
                        <div class="col-sm-3">
                            <label for="date2" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date2" name="date2" placeholder="date">
                        </div>
                        <div class="col-sm-12">
                            <label for="requisitioning_office" class="form-label">Requisitioning Office/Departmenrt</label>
                            <input type="text" class="form-control" id="requisitioning_office" name="requisitioning_office" placeholder="Requisitioning Office/Departmenrt" required>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="0">Stock No.</td>

            <td colspan="1">Unit</td>
            <td colspan="2">Description</td>
            <td colspan="1">QTY</td>
        </tr>


</div>

</table>




<?php
include('./partials/footer.php')
?>