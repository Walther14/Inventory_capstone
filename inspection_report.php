<?php
session_start();
@include('Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');
@include('partials/topbar.php');
?>
<div style="margin: 5rem;">
    <form class="row g-3" action="./components/inspectionAndAcceptanceReport.php" method="post">
        <h2 style="text-align: center;">INSPECTION AND ACCEPTANCE REPORT</h2>
        <div class="col-sm-12">
            <label for="agency" class="form-label">Agency</label>
            <input type="text" class="form-control" id="agency" name="agency" placeholder="Agency" required>
        </div>
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
        <div class="col-3">
            <label for="stock_No" class="form-label">Stock Number</label>
            <input type="text" class="form-control" id="stock_No" name="stock_No" placeholder="Stock Number">
        </div>
        <div class="col-sm-3">
            <label for="unit" class="form-label">Unit</label>
            <input type="text" class="form-control" id="unit" name="unit" placeholder="unit">
        </div>
        <div class="col-sm-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="description">
        </div>
        <div class="col-sm-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="quantity">
        </div>
        <div class="col-sm-6">
            <label for="date3" class="form-label">Date Inspected</label>
            <input type="date" class="form-control" id="date3" name="date3" placeholder="date">
        </div>
        <div class="col-sm-6">
            <label for="date4" class="form-label">Date Received</label>
            <input type="date" class="form-control" id="date4" name="date4" placeholder="date">
        </div>
        <div class="col-sm-6">
            <label for="inspection_office" class="form-label">Inspection Office/Inspection Committee</label>
            <input type="text" class="form-control" id="inspection_office" name="inspection_office" placeholder="inspection_office">
        </div>
        <div class="col-sm-6">
            <label for="property_officer" class="form-label">Property Officer</label>
            <input type="text" class="form-control" id="property_officer" name="property_officer" placeholder="property_officer">
        </div>
        <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-primary ms-auto" style="background-color: maroon;">Submit for Printing</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('date').max = new Date().toISOString().split('T')[0];
    document.getElementById('date2').max = new Date().toISOString().split('T')[0];
    document.getElementById('date3').max = new Date().toISOString().split('T')[0];
    document.getElementById('date4').max = new Date().toISOString().split('T')[0];
</script>


<?php
include('partials/footer.php')
?>