<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

@include('Controller/db.php');
@include('partials/header.php');

// Check if the database connection is successful
if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}

$baseQuery = "SELECT * FROM inventory_db";
$conditions = [];

// Check if filter parameters are provided
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $conditions[] = "Issued_To LIKE '%$searchTerm%'";
}

if (isset($_GET['asset_category']) && !empty($_GET['asset_category'])) {
    $assetCategoryFilter = $_GET['asset_category'];
    $conditions[] = "Asset_Category = '" . $data->real_escape_string($assetCategoryFilter) . "'";
}

if (isset($_GET['asset_number']) && !empty($_GET['asset_number'])) {
    $assetNumberFilter = $_GET['asset_number'];
    $conditions[] = "Asset_Number = '" . $data->real_escape_string($assetNumberFilter) . "'";
}

// Combine conditions into the final query
if (!empty($conditions)) {
    $baseQuery .= " WHERE " . implode(" AND ", $conditions);
}

$result = $data->query($baseQuery);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page</title>
    <style>
        @media print {
            body {
                visibility: hidden;
                margin: 10px;
                font-family: 'Century Gothic', sans-serif;
                font-size: 12px;
            }


            .hidden-column {
                display: none;
            }

            @page {
                size: landscape;
                margin: 14vh 1cm;
            }

            .page-number {
                position: fixed;
                bottom: 10px;
                left: 10px;
                font-family: 'Century Gothic', sans-serif;
                font-size: 10px;
            }

            .printthis {
                visibility: visible;
            }

            p,
            th,
            td {
                font-family: 'Century Gothic', sans-serif;
                font-size: 12px;
            }

            tr {
                page-break-inside: avoid;
            }

            .note,
            .form-section {
                page-break-inside: avoid;
            }


        }
    </style>

<script>
       

 
        // Function to print the report
        function printReport() {
            // Add page numbers to the content
            updatePageNumbers();

            // Use window.print() to open the browser's print dialog
            window.print();
        }

        // Function to navigate back to the previous page
        function goBack() {
            console.log('Going back...');
            window.history.back();
        }


    </script>
</head>

<body onload="updatePageNumbers(); incrementPage();">
    <div class="printthis">


        <p style="text-align:right">Annex A</p>
        <h4 style="text-align:center">BATANES STATE COLLEGE <br>INVENTORY COUNT FORM</h4>
        <table id="tbl" class="table table-bordered table table-hover">
            <thead>
                <tr style="text-align: center;">
                    <th>Account Group</th>
                    <th>Article/Item</th>
                    <th>Description</th>
                    <th>Old Property No.</th>
                    <th>Property No.</th>
                    <th>Unit of Measure</th>
                    <th>Unit Value</th>
                    <th>Qty</th>
                    <th>Location</th>
                    <th>Remarks</th>
                    <th class="hidden-column">Issued to</th>
                    <th class="hidden-column">Category</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo ($row['Asset_Number']) ?></td>
                            <td><?php echo ($row['Asset_Title']) ?></td>
                            <td><?php echo ($row['Property_Description']) ?></td>
                            <td><?php echo ($row['Old_Property_Number']) ?></td>
                            <td><?php echo ($row['Current_Property_Number']) ?></td>
                            <td><?php echo ($row['Unit_Measure']) ?></td>
                            <td><?php echo ($row['Unit_Value']) ?></td>
                            <td><?php echo ($row['Quantity']) ?></td>
                            <td><?php echo ($row['Locator']) ?></td>
                            <td><input style="border:none;" value="<?php echo ($row['Remarks']) ?>"></input></td>
                            <td class="hidden-column"><?php echo ($row['Issued_To']) ?></td>
                            <td class="hidden-column"><?php echo ($row['Asset_Category']) ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </tbody>

        </table>
        <div class="note">
            <div>
                <P>NOTE: for PPE/Semi-Expendable/Inventory items without proper no. provide in the "Remarks" column other information such as Serial no./ Model. no/ Brand, brief description that can be useful during the reconciliation process. </P>
            </div>
            <br>
            <div style="display: flex;">
                <div style="margin-left: 0px; "> <label>Prepared by:
                    </label>
                    <br>
                    <br>
                    <br>
                    <br>
                    <input placeholder="NAME" style="border: none; width: 250px;" value="RICHARD B. VINALAY"></input>
                    <br>
                    <input placeholder="POSITION" style="border: none;" value="Secretariat"></input>
                    <br>
                    <label>Inventory Committee</label>
                </div>

                <div style="margin-left: 20px; "> <label>Reviewed by:
                    </label>
                    <br>
                    <br>
                    <br>
                    <br>
                    <input placeholder="NAME" style="border: none; width: 250px;" value="RANDY F. CABANILLAS"></input>
                    <br>
                    <input placeholder="POSITION" style="border: none;" value="Chairperson"></input>
                    <br>
                    <label>Inventory Committee</label>
                </div>


                <div style=" margin-left: 20px; text-align:center;"> <label>Acknowledgement and Certification
                    </label>
                    <p style="text-align: justify;">I hereby acknowledge receipt of an exact copy of this Inventory Count Form for my own reference, also I hereby certify that all entries made in the remarks column were the true narrative and filled-up in my presence without any objection, whatsoever.</p>

                    <br>

                    <i>End User(Signature over Printed Name and Date)</i>
                </div>


            </div>
        </div>
        
    </div>

    <div class="d-flex justify-content-end mt-3 fixed-top fixed-right" style="margin-top: 10px; margin-right: 10px; position: fixed; right: 10px; top: 10px;">
        <div style="margin-left: 10px;">

            <img src="./img/back.png" style="height: 60px;" onclick="goBack()">

        </div>
    </div>

    <div class="col-sm-12">
        <div class="d-flex justify-content-end mb-3 fixed-bottom fixed-right" style="margin-bottom: 10px; margin-right: 10px;">

            <div style="margin-left: 10px;">
                <a href="javascript:window.print()">
                    <img src="./img/print.png" style="height: 60px;"></img>
                </a>
            </div>
        </div>
    </div>

    </div>



</body>

</html>