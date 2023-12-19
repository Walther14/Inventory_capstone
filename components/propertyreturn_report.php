<?php

include('../Controller/db.php');


$Agency = $_POST['agency'] ?? '';
$Purpose = $_POST['purpose'] ?? '';
$Other = $_POST ['other'] ?? '';

/* Row 1 */
$Qty1 = $_POST['qty1'] ?? '';
$Unit1 = $_POST['unit1'] ?? '';
$Description1 = $_POST['description1'] ?? '';
$Property_no1 = $_POST['property_no1'] ?? '';
$Par_ics1 = $_POST['par_ics1'] ?? '';
$End_User1 = $_POST['end_user1'] ?? '';
$Unit_value1 = $_POST['unit_value1'] ?? '';
$Total_value1 = $_POST['total_value1'] ?? '';

/* Row 2 */
$Qty2 = $_POST['qty2'] ?? '';
$Unit2 = $_POST['unit2'] ?? '';
$Description2 = $_POST['description2'] ?? '';
$Property_no2 = $_POST['property_no2'] ?? '';
$Par_ics2 = $_POST['par_ics2'] ?? '';
$End_User2 = $_POST['end_user2'] ?? '';
$Unit_value2 = $_POST['unit_value2'] ?? '';
$Total_value2 = $_POST['total_value2'] ?? '';

/* Row 3 */
$Qty3 = $_POST['qty3'] ?? '';
$Unit3 = $_POST['unit3'] ?? '';
$Description3 = $_POST['description3'] ?? '';
$Property_no3 = $_POST['property_no3'] ?? '';
$Par_ics3 = $_POST['par_ics3'] ?? '';
$End_User3 = $_POST['end_user3'] ?? '';
$Unit_value3 = $_POST['unit_value3'] ?? '';
$Total_value3 = $_POST['total_value3'] ?? '';

/* Row 4 */
$Qty4 = $_POST['qty4'] ?? '';
$Unit4 = $_POST['unit4'] ?? '';
$Description4 = $_POST['description4'] ?? '';
$Property_no4 = $_POST['property_no4'] ?? '';
$Par_ics4 = $_POST['par_ics4'] ?? '';
$End_User4 = $_POST['end_user4'] ?? '';
$Unit_value4 = $_POST['unit_value4'] ?? '';
$Total_value4 = $_POST['total_value4'] ?? '';


/* Row 5 */
$Qty5 = $_POST['qty5'] ?? '';
$Unit5 = $_POST['unit5'] ?? '';
$Description5 = $_POST['description5'] ?? '';
$Property_no5 = $_POST['property_no5'] ?? '';
$Par_ics5 = $_POST['par_ics5'] ?? '';
$End_User5 = $_POST['end_user5'] ?? '';
$Unit_value5 = $_POST['unit_value5'] ?? '';
$Total_value5 = $_POST['total_value5'] ?? '';




$Authority_Reason = $_POST['authority_reason'] ?? '';
$Status = $_POST['status'] ?? '' ;

$Date1 = $_POST['date1'] ?? '' ;
$Returned_to = $_POST['returned_to'] ?? '' ;
$Returned_by = $_POST['returned_by'] ?? '';
$Position1 = $_POST['position1'] ?? '' ;


$Date2 = $_POST['date2'] ?? '' ;
$Received_From = $_POST['received_from'] ?? '' ;
$Received_By = $_POST ['received_by'] ?? '' ;
$Position2 = $_POST ['position2'] ?? '' ;



?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
  
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Return Slip</title>
    <style>
    /* Your existing styles for the document go here */

    body {
        font-family: 'Century Gothic', sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
        position: relative; /* Added to position the footer relative to the body */
    }
    body, th, td, input, label {
        font-size: 12px !important;
    }

    .main-content {
        flex: 1;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 200px; /* Adjust the margin to accommodate the footer's height */
    }

    th, td {
        text-align: center;
        border: 1px solid #ced4da;
        padding: 8px;
    }

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        text-align: center;
        margin-top: auto; /* Set margin-top to auto for it to push to the bottom */
    }

    .footer img {
        width: 50rem;
    }

    .header {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    margin-top: auto; /* Set margin-top to auto for it to push to the bottom */
    height: 15vh; /* Set the height to 100% of the viewport height, adjust if necessary */
}

.header img {
    width: 50rem;}

 
    .form-group {
   display: flex;
   justify-content: center;
   align-items: center;
}.form-group {
   text-align: center;
}

.form-control {
    text-align: center;
    font-family: 'Century Gothic', sans-serif;
   border: none !important;
   border-bottom: 1px solid #ced4da !important;
   text-align: center !important;
   width: 100%;
}

.form-group label {
   text-align: center;
}


    /* Styles for the print media */
    @media print {
        body {
            display: block; /* Reset display value for printing */
        }

        .print-only {
            display: block;
        }

        body > *:not(.print-only) {
            display: none;
        }

        /* Remove padding for the specific div when printing */
        div.p-5 {
            padding: 0 !important;
        }
    }

    .form-control {
        margin: 0;
        padding: 0;
        line-height: 1;
        height: auto;
        border: none;
    }
/* Adjust the margin and width of the table for normal view */
table {
    border-collapse: collapse;
    width: 45%;
    margin: 20px auto 200px; /* Center the table with top and bottom margins */
}

/* Adjust padding for table cells */
th, td {
    border: 1px solid #ced4da;
    padding: 5px;
}

/* Styles for the print media */
@media print {
    /* Reset styles for body and other elements */
    body {
        display: block;
    }

    .main-content {
        flex: 1;
    }

    table {
        width: 100%; /* Use full width for printing */
        margin: 0; /* Reset margin for printing */
    }

    th, td {
        padding: 4px; /* Reset padding for printing if needed */
    }

    /* Add more print-specific styles if necessary */
}


</style>








</head>
<body>

    <!-- Bordered table -->
    <div class="print-only">
    <div class="header">
        <!-- Your header content goes here -->
        <img src="../img/document-header.png" alt="Logo" style="width: 50rem; align-items: center;">
    </div>


    <div class="p-5 d-flex justify-content-center align-items-center remove-print-padding">

        <table class="table table-bordered">
            <thead>
                <tr>
                       
                    <th colspan="18" class="">
                    <span style="display: block; text-align: left;">Form no. 12</span>
                    <br>
                
                    <div style="display: flex; align-items: center;  justify-content: center;">
                        <div style="text-align: center;">
                            <label style="font-size: 1.2rem;">PROPERTY RETURN SLIP</label>
                            <br>
                            <br>
                        </div>
                    </div>
                        <span style="display: block; text-align: left;">Name of Agency: &nbsp; <?php echo isset($Agency) ? $Agency : 'Not available'; ?> </span>
                        <span style="display: block; text-align: left;">Purpose: &nbsp; <?php echo isset($_POST['Purpose']) ? $_POST['Purpose'] : 'Not selected'; ?> </span>
                        <span style="display: block; text-align: left;">Other: &nbsp; <?php  echo isset($Other) ? $Other : 'Not available'; ?> </span>
                    </th>
                </tr>
        </thead>



        <tr style="width: 100%; text-align: center;">
            <td>QTY</td>
            <td>UNIT</td>
            <td>DESCRIPTION</td>
            <td>PROPERTY NO.</td>
            <td >PAR/ICS No.</td>
            <td >END USER</td>
            <td >UNIT VALUE</td>
            <td >TOTAL VALUE</td>
        </tr>

        <!-- ROW 1 -->
        <tr style="width: 100%; text-align: center;">
                    <td><?php echo ($Qty1) ?> </td>
                    <td><?php echo ($Unit1) ?> </td>
                    <td><?php echo ($Description1) ?></td>
                    <td><?php echo ($Property_no1) ?></td>
                    <td ><?php echo ($Par_ics1) ?></td>
                    <td ><?php echo ($End_User1) ?></td>
                    <td ><?php echo ($Unit_value1) ?></td>
                    <td ><?php echo ($Total_value1) ?></td>
        </tr>

        <!-- ROW 2 -->
        <tr style="width: 100%; text-align: center;">
                    <td><?php echo ($Qty2)  ? $Qty2 : ''; ?> </td>
                    <td><?php echo ($Unit2)  ? $Unit2 : ''; ?> </td>
                    <td><?php echo ($Description2) ? $Description2 : '';  ?></td>
                    <td><?php echo ($Property_no2) ? $Property_no2 : '';  ?></td>
                    <td ><?php echo ($Par_ics2) ? $Par_ics2 : ''; ?></td>
                    <td ><?php echo ($End_User3) ? $End_user2 : '';  ?></td>
                    <td ><?php echo ($Unit_value2) ? $Unit_value2 : ''; ?></td>
                    <td ><?php echo ($Total_value2) ? $Total_value2 : ''; ?></td>
        </tr>

        <!-- Row 3 -->
        <tr style="width: 100%; text-align: center;">
                    <td><?php echo ($Qty3)  ? $Qty3 : ''; ?> </td>
                    <td><?php echo ($Unit3)  ? $Unit3 : ''; ?> </td>
                    <td><?php echo ($Description3) ? $Description3 : '';  ?></td>
                    <td><?php echo ($Property_no3) ? $Property_no3 : '';  ?></td>
                    <td ><?php echo ($Par_ics3) ? $Par_ics3 : ''; ?></td>
                    <td ><?php echo ($End_User3) ? $End_user3 : '';  ?></td>
                    <td ><?php echo ($Unit_value3) ? $Unit_value3 : ''; ?></td>
                    <td ><?php echo ($Total_value3) ? $Total_value3 : ''; ?></td>
        </tr>

          <!-- Row 4 -->
          <tr style="width: 100%; text-align: center;">
                    <td><?php echo ($Qty4)  ? $Qty4 : ''; ?> </td>
                    <td><?php echo ($Unit4)  ? $Unit4 : ''; ?> </td>
                    <td><?php echo ($Description4) ? $Description4 : '';  ?></td>
                    <td><?php echo ($Property_no4) ? $Property_no3 : '';  ?></td>
                    <td ><?php echo ($Par_ics4) ? $Par_ics4 : ''; ?></td>
                    <td ><?php echo ($End_User4) ? $End_user4 : '';  ?></td>
                    <td ><?php echo ($Unit_value4) ? $Unit_value4 : ''; ?></td>
                    <td ><?php echo ($Total_value4) ? $Total_value4 : ''; ?></td>
        </tr>

        <!-- Row 5 -->
        <tr style="width: 100%; text-align: center;">
                    <td><?php echo ($Qty5)  ? $Qty5 : ''; ?> </td>
                    <td><?php echo ($Unit5)  ? $Unit5 : ''; ?> </td>
                    <td><?php echo ($Description5) ? $Description5 : '';  ?></td>
                    <td><?php echo ($Property_no5) ? $Property_no5 : '';  ?></td>
                    <td ><?php echo ($Par_ics5) ? $Par_ics5 : ''; ?></td>
                    <td ><?php echo ($End_User5) ? $End_user5 : '';  ?></td>
                    <td ><?php echo ($Unit_value5) ? $Unit_value5 : ''; ?></td>
                    <td ><?php echo ($Total_value5) ? $Total_value5 : ''; ?></td>
        </tr>
















            <!-- Add your table rows here -->

            <td colspan="15">
                <div style="margin: 0.5rem; text-align: left;">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <span style="display: block; text-align: left;">Authority/Reason: &nbsp; <?php echo ($Authority_Reason) ?> </span>
                        </div>
                        <br>
                        <div class="col-sm-6">
                            <span style="display: block; text-align: left;">Status: &nbsp; <?php echo ($Status)  ?> </span>
                        </div>
                    </div>
                </div>
            </td>
                    

        </tr>


        <thead>
            <tr>
                <th colspan="18" class="" style="font-size: 50px;"> <!-- Adjust the font size as needed -->
                    <span style="display: block; text-align: center;">C&nbsp;E&nbsp;R&nbsp;T&nbsp;I&nbsp;F&nbsp;I&nbsp;C&nbsp;A&nbsp;T&nbsp;I&nbsp;O&nbsp;N</span>
                </th>
            </tr>
        </thead>



            
    
         <td colspan="4">
      
                <div>
                    <label for="certified_correct" class="form-label">
                        I HEREBY CERTIFY that i have RETURNED this: &nbsp; <?php echo ($Date1) ?>   to &nbsp; <?php echo ($Returned_to) ?>  
                        &nbsp; <?php echo ($Position2) ?>  of the Supply and Property unit, the item/Article described above.
                        <br>
                        <br>
                        <br>
                        <input type="text" class="form-control"  name="position" placeholder=" &nbsp; <?php echo ($Received_From) ?> " required>
                        <input type="text" class="form-control" name="office" placeholder=" &nbsp; <?php echo ($Position1) ?>  " required>
                    </label>
                </div>
            </td>
          

                <td colspan="6">
                    <div>
                        <label for="certified_correct" class="form-label">
                            I HEREBY CERTIFY that i have RECEIVED this: &nbsp; <?php echo ($Date2) ?> from &nbsp; <?php echo ($Received_From) ?>  the
                            &nbsp; <?php echo ($Position1) ?> the item/Article described above.
                            <br>
                            <br>
                            <br>
                            <input type="text" class="form-control" i name="position" placeholder=" &nbsp; <?php echo ($Received_By) ?> " required>
                            <input type="text" class="form-control" name="office" placeholder=" &nbsp; <?php echo ($Position2) ?>  " required>
                        </label>
                    </div>
                </td>

                </table>

            </tbody>
        </table>

        




    </div>











    <div class="footer">
        <img src="../img/document-footer.png" alt="Logo">
    </div>

</div>

<!-- Cancel button -->
<div class="d-flex justify-content-end mt-3 fixed-top fixed-right" style="margin-top: 10px; margin-right: 10px; position: fixed; right: 10px; top: 10px;">
    <div style="margin-left: 10px;">

        <img src="../img/back.png" style="height: 60px;"  onclick="goBack()" >

    </div>
</div>


    <div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px; position: fixed; right: 10px; bottom: 10px;">
        <div style="margin-left: 10px;">
     
        <img src="../img/save.png" style="height: 70px;" onclick="saveImage()" >

        <img src="../img/print.png" style="height: 70px;" onclick="printReport()">
        </div>
    </div>
</body>
</html>
<style>
    /* Add this style to make the borders of the input fields invisible */
    .form-control {
        border: none;
        border-bottom: 1px solid #ced4da; /* Adding a bottom border for separation */
    }
</style>

<script>
    function saveImage() {
        // Specify the element to capture (in this case, the element with class "print-only")
        var elementToCapture = document.querySelector('.print-only');

        // Use html2canvas to capture the specified content
        html2canvas(elementToCapture).then(function (canvas) {
            // Convert the canvas to a data URL
            var dataUrl = canvas.toDataURL("image/jpeg");

            // Create a temporary link element
            var link = document.createElement("a");

            // Set the href attribute with the data URL
            link.href = dataUrl;

            // Set the download attribute with a filename (you can change "waste_report.jpg" to your desired filename)
            link.download = "waste_report.jpg";

            // Append the link to the document
            document.body.appendChild(link);

            // Trigger a click event on the link to start the download
            link.click();

            // Remove the link from the document
            document.body.removeChild(link);
        });
    }
</script>
<script>
     // Function to handle checkbox click for the "Distribution" section
     function handleDistributionCheckboxClick(checkbox) {
        // Get all checkboxes in the "Distribution" section
        var checkboxes = document.querySelectorAll('#supplyPropertyUnitCopy, #accountingCopy, #coaCopy');

        // Uncheck all checkboxes except the clicked one
        checkboxes.forEach(function (currentCheckbox) {
            if (currentCheckbox !== checkbox) {
                currentCheckbox.checked = false;
            }
        });
    }
    // Function to navigate back to the previous page
    function goBack() {
        console.log('Going back...');
        window.history.back();
    }

    // Function to print the report
    function printReport() {
        // Use window.print() to open the browser's print dialog
        window.print();
    }
</script>


<script>
    function printReport() {
        // Use window.print() to open the browser's print dialog
        window.print();
    }
</script>


<?php
include('../partials/footer.php')
?>
