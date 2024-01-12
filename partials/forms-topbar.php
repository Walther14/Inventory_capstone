<div style="position: sticky; top: 0; z-index: 10;">

<!-- Top Bar -->
<nav class="navbar navbar-expand-lg w-100" style="background-image: url('./img/try.png'); background-size: cover; height: .63in; border-bottom: var(--bs-border-width) solid var(--bs-content-border-color); width: 100%;">
    <div class="container-fluid d-flex justify-content-between p-3">
        <a class="navbar-brand" href="#">
        </a>


        <div class="d-flex justify-content-end" >
            <select class="nav-link" id="inventoryDropdown" onchange="logSelectedOption(this)" style="max-width: 210px; background-color: white;border-radius: 5px; border: solid .5px; height: 2rem;">
            <option value="#" selected disabled>Select a Form</option>
            <!-- <option value="./forms/inspection_report.php">Inspection and Acceptance Report</option> -->
                <!-- <option value="./forms/PreAndPost_report.php">Pre and Post-Repair Inspection</option> -->
                <!-- <option value="./components/PreandPost_reportPrint.php">Pre and Post-Repair Inspection</option> -->
                <option value="./forms/waste_report.php">Waste Materials Report</option>
                <!-- <option value="./forms/materials_issued.php">Report of Supplies and Material Issued </option> -->
                <option value="./forms/semiIssued.php">Report of Semi-Expendable Property Issued</option>
                <option value="./forms/unserviceableSemi.php">Inventory and Inspection Report of Unserviceable Semi-Expendable Property </option>
                <option value="./forms/unserviceableProperty.php">Inventory and Inspection Report of Unserviceable Property</option>
                <!-- <option value="./forms/stock.php">Stock Card</option> -->
                <!-- <option value="#">Inventory Custodian Slip</option>
                <option value="./forms/returned_semi-expendable_property_receipt.php">Receipt of Returned Semi-Expendable Property </option>
                <option value="./forms/property_card.php">Semi-Expendable Property Card </option>
                <option value="./forms/acknwoledgement_receipt.php">Property Acknowledgement Receipt </option>
                <option value="./forms/acknowledgement_receipt_equipment.php">Acknowledgement Receipt for Equipment</option>
                <option value="./forms/PropertyReturn_Slip.php">Property Return Slip</option>
                <option value="#">Property Card</option> -->
            </select>
        </div>

    </div>
</nav>
</div>