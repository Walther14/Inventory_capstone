<?php

session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}
$id = $_SESSION['user_id'];

@include('Controller/db.php');
@include('partials/header.php');

?>


<div style="position: relative; height: 100%; overflow: hidden">

    <div style="position: sticky; top: 0; z-index: 10;">

        <!-- Top Bar -->
        <nav class="navbar navbar-expand-lg w-100" style="background-image: url('./img/try.png'); background-size: cover; height: .63in; border-bottom: var(--bs-border-width) solid var(--bs-content-border-color); width: 100%;">
            <div class="container-fluid d-flex justify-content-between p-3">


                <a class="navbar-brand" href="#">

                </a>
                <div class="d-flex justify-content-between">
                    <!-- <form method="get" action="" style="display: flex; align-items: center; margin-right: 30px;">
                        <input type="text" id="search" name="search" style="width: 130px; background-color: white; border-radius: 5px; border: solid .5px; height: 2rem;" placeholder="Enter your search term">
                        <button type="submit" style="width:50px; background-color: white; border-radius: 5px; border: solid .5px; height: 2rem;" onmouseenter="changeColor(this, '#ffa800')" onmouseleave="changeColor(this, 'white')" onclick="changeColor(this, 'maroon')"">Search</button>
    </form> -->

   
                </div>


                <script>
                    function changeColor(element, color) {
                        element.style.backgroundColor = color;
                    }
                </script>

                  <button type=" button" class="btn btn-primary position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                            <span>
                                <i class="fa-regular fa-bell"></i>
                            </span>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php
                                // SELECT COUNT(*) FROM transfer_db WHERE user_id = '$id' AND (archive IS NULL OR archive = 1)
                                $sql = "SELECT COUNT(*) as row_count FROM transfer_db WHERE user_id = $id AND (archive =1)";
                                $result = $data->query($sql);

                                // Fetch the row count
                                $row = $result->fetch_assoc();
                                $rowCount = $row['row_count'];

                                // Output the row count
                                echo $rowCount;
                                // 
                                ?>

                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>


                </div>
                <li class="nav-item dropdown">
        <img src="./img/user.png" class="nav-link dropdown-toggle" title="click to access back up and restore, log out and manage account" style="margin: 0; padding: 0; margin-left: 10px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" height="50" width="50">


        <ul class="dropdown-menu dropdown-menu-end mt-md-2 rounded-top-0">


      <li><a class="dropdown-item" href="./logout.php">
      <li>
        <hr class="dropdown-divider">
      </li>
      <span>
        <span>
          <i class="fa-solid  fa-right-from-bracket" data-bs-title="Logout"></i>
        </span>
      </span>
      Logout
      </a>
      </li>
      <li><a class="dropdown-item" href="manageAccountCustodian.php">
      <li>
        <hr class="dropdown-divider">
      </li>

      <span>
        <i class="fa-solid  fa-user"></i>
      </span>
      </span>
      Manage Account
      </a>
      </li>
 
      </ul>
      </li>
        </nav>
    </div>


    <!-- End of Topbar -->











    <?php
    // Include your database connection logic here
    // For example: $data = new mysqli("localhost", "username", "password", "database_name");

    // Check if the database connection is successful
    if ($data->connect_error) {
        die("Connection failed: " . $data->connect_error);
    }

    $archive = "SELECT * FROM inventory_db WHERE issued_To = '$id'";

    // Check if a search term is provided
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $searchTerm = $_GET['search'];
        // Modify the query to include a search condition
        $archive .= " WHERE Property_Description LIKE '%$searchTerm%' OR Asset_Category LIKE '%$searchTerm%' OR Locator LIKE '%$searchTerm%' OR Current_Property_Number LIKE '%$searchTerm%'";
    }

    $result = $data->query($archive);
    ?>



    <div class=" d-flex p-5" style="position: relative; top: 100;">

        <div style="position: relative; width: 100rem;">

            <div class="m-1 w-100" style="width: 100%; position: absolute;  overflow: auto; height: calc(100vh - 85.6px)">

                <table class="table table-bordered table table-hover">


                    <thead style="text-align: center;">
                        <th>Property Description</th>
                        <th>Locator</th>
                        <th>Currently Property Number</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {


                        ?>
                                <tr>

                                    <td>
                                        <?php echo ($row['Property_Description']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['Locator']) ?>
                                    </td>

                                    <td>
                                        <?php echo ($row['Current_Property_Number']) ?>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-primary" style="background-color: maroon; width: 90px;" data-id="<?php echo $row['id'] ?>">View</a>
                                        <!-- <a type="button" class="btn btn-secondary" data-id="data_edit?id=<?php echo $row['id'] ?>">Edit</a> -->
                                        </td>




<td>
                                        <!-- Vertically centered modal -->
                                        <div class="modal fade" id="archivesModal<?php echo $row['id'] ?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="modal-title-1" >Transfer</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="./Controller/transfer.php" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                                                            <input type="hidden" name="issued_to" value="<?php echo $row['Issued_To'] ?>">
                                                            <div class="mb-3">
                                                                <label for="exampleDropdownFormEmail1" class="form-label">Request a Transfer</label>
                                                                <input type="text" class="form-control" name="message" placeholder="Reason to Transfer">
                                                            </div>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Transfer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#archivesModal<?php echo $row['id'] ?>" class="btn btn-primary archive-btn" style="background-color: maroon; width: 90px;">Transfer</button>

                                    </td>

                                </tr>





                        <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>


        <?php
        include('./partials/right-sidebar-custodian.php')
        ?>
    </div>
</div>





<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Custodian Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">




        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Notifications</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Archive</button>
            </div>
        </nav>


        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">




                <div class="container mt-1">

                    <ul class="list-group list-group-flush">
                        <?php
                        $transfer_db2 = "SELECT *
                        FROM transfer_db
                        JOIN users ON transfer_db.user_id = users.user_id
                        WHERE transfer_db.user_id = '$id' AND (transfer_db.archive IS NULL OR transfer_db.archive != 2);
                         ";
                        $transfer_db_query2 = mysqli_query($data, $transfer_db2);

                        if ($transfer_db_query2->num_rows > 0) {
                            // output data of each row
                            while ($row = $transfer_db_query2->fetch_assoc()) {
                        ?>
                                <li class="list-group-item">
                                    <div class="media d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <span><i class="fa-solid fa-user"></i></span>
                                            <div class="d-flex flex-column align-items-end" style="margin-left: 2rem; padding: 1rem">

                                                <?php
                                                if ($row['custodian_notif'] == 1) {
                                                ?>
                                                    <div style="background-color: rgba(0, 0, 0, 0.2);; padding: 10px; border-radius: 8px">
                                                        <h6 class="mt-0"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h6>
                                                        <?php
                                                        echo 'transfer has been approved by the supplier at' . $row['dateTime'];
                                                        ?>
                                                        <form action="./Controller/archive_Custodian.php" method="POST">

                                                            <input type="hidden" name="transfer_id" value="<?php echo $row['transfer_id'] ?>">
                                                            <button type="submit" class="btn btn-success">Read</button>
                                                        </form>
                                                    </div>

                                                <?php
                                                } elseif (($row['custodian_notif'] == 0)) {
                                                ?>
                                                    <div style="background-color: rgba(255, 255, 255, 0.2); padding: 5px">
                                                        <h6 class="mt-0"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h6>
                                                        <?php
                                                        echo 'transfer has been rejected by the supplier at' . $row['dateTime'];
                                                        echo 'Reason: ' . $row['reject_message'];
                                                        ?>
                                                        <form action="./Controller/archive_Custodian.php" method="POST">

                                                            <input type="hidden" name="transfer_id" value="<?php echo $row['transfer_id'] ?>">
                                                            <button type="submit" class="btn btn-success">Read</button>
                                                        </form>
                                                    </div>
                                                <?php

                                                }
                                                ?>
                                            </div>
                                        </div>








                                    </div>
                                </li>
                        <?php
                            }
                        }
                        ?>

                    </ul>

                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">




                <div class="container mt-1">

                    <ul class="list-group list-group-flush">
                        <?php
                        $transfer_db3 = "SELECT * FROM transfer_db 
JOIN users ON transfer_db.user_id = users.user_id
WHERE transfer_db.user_id = $id AND archive = 2";
                        $transfer_db_query3 = mysqli_query($data, $transfer_db3);

                        if ($transfer_db_query3->num_rows > 0) {
                            // output data of each row
                            while ($row = $transfer_db_query3->fetch_assoc()) {
                        ?>
                                <li class="list-group-item">
                                    <div class="media d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <span><i class="fa-solid fa-user"></i></span>
                                            <div class="d-flex flex-column align-items-end" style="margin-left: 2rem; padding: 1rem">

                                                <?php
                                                if ($row['custodian_notif'] == 1) {
                                                ?>
                                                    <div style="background-color: rgba(0, 0, 0, 0.2);; padding: 10px; border-radius: 8px">
                                                        <h6 class="mt-0"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h6>
                                                        <?php
                                                        echo 'transfer has been approved by the supplier at' . $row['dateTime'];
                                                        ?>
                                                    </div>

                                                <?php
                                                } elseif (($row['custodian_notif'] == 0)) {
                                                ?>
                                                    <div style="background-color: rgba(255, 255, 255, 0.2); padding: 5px">
                                                        <h6 class="mt-0"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h6>
                                                        <?php
                                                        echo 'transfer has been rejected by the supplier at' . $row['dateTime'];
                                                        echo 'Reason: ' . $row['reject_message'];
                                                        ?>

                                                    </div>
                                                <?php

                                                }
                                                ?>
                                            </div>
                                        </div>








                                    </div>
                                </li>
                        <?php
                            }
                        }
                        ?>

                    </ul>

                </div>




            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
        </div>












    </div>
</div>




<script>
    let buttons = document.querySelectorAll("[data-id]");






    buttons.forEach(function(button) {
        button.addEventListener("click", function() {


            let rightSideBar = document.querySelector("#rightSidebarArchives");
            let empty = document.querySelector("#empty");




            rightSideBar.style.display = "block"
            empty.style.display = "none"

            // Get the data-id attribute value
            let id = button.getAttribute("data-id");

            // Call the fetchData function with the id
            fetchData(id);
        });
    });

    // Function to make the AJAX call
    function fetchData(id) {

        fetch('./Controller/viewCustodian.php?id=' + id)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
                console.log(response)
            })
            .then(receivedata => {

                const data = receivedata[0]

                // Handle the image
                const photoElement = document.getElementById('photo');
                if (data.photo) {
                    // Set the src attribute with the base64-encoded image data
                    photoElement.src = 'data:image/jpeg;base64,' + data.photo;
                    // Ensure the alt attribute is set for accessibility
                    photoElement.alt = 'Image';
                } else {
                    console.log('No photo data available. Using default image.');

                    // Set a default image path or hide the image if no photo is available
                    photoElement.src = './img/def.png'; // Replace with your default image path
                    // Optional: Set alt attribute for accessibility
                    photoElement.alt = 'Default Image';
                }



                document.getElementById('CustodianpropertyDescription').innerHTML = data.Property_Description;

                document.getElementById('CustodianpropertyNumber').innerHTML = data.Current_Property_Number;

                document.getElementById('CustodianunitMeasure').innerHTML = data.Unit_Measure;

                document.getElementById('Custodianquantity').innerHTML = data.Quantity;

                document.getElementById('CustodiandateAcquired').innerHTML = data.Date_Acquired;

                document.getElementById('CustodianassetNumber').innerHTML = data.Asset_Number;


                document.getElementById('CustodianissuedTo').innerHTML = data.Issued_To;

                document.getElementById('CustodianapiNumber').innerHTML = data.ARE_PAR_ICS_Number;


                document.getElementById('CustodianprsNumber').innerHTML = data.PRS_Number;

                document.getElementById('CustodianfundCluster').innerHTML = data.Fund_Cluster;

                document.getElementById('CustodianfundAdminCode').innerHTML = data.Fund_Admin_Code;

                document.getElementById('CustodianfundAdmin').innerHTML = data.Fund_Admin_Title;

                document.getElementById('Custodiansupplier').innerHTML = data.Supplier;

                document.getElementById('CustodianyearLapse').innerHTML = data.Year_Lapsed;

                document.getElementById('Custodianlocator').innerHTML = data.Locator;


                document.getElementById('CustodianoldPropertyNumber').innerHTML = data.Old_Property_Number;

                document.getElementById('CustodianunitValue').innerHTML = data.Unit_Value;

                document.getElementById('CustodianyearAcquired').innerHTML = data.Year_Acquired;


                document.getElementById('CustodianassetCategory').innerHTML = data.Asset_Category;

                document.getElementById('CustodianassetTitle').innerHTML = data.Asset_Title;

                document.getElementById('CustodianissuedFrom').innerHTML = data.Issued_From;


                document.getElementById('CustodiancancelledAPI').innerHTML = data.Cancelled_Number;


                document.getElementById('CustodianestimatedLife').innerHTML = data.Estimated_Useful_Life;

                document.getElementById('CustodianpurchaseOrder').innerHTML = data.Purchase_Order_Contract_Number;


                document.getElementById('CustodianacquiredThrough').innerHTML = data.Acquired_Through;

                document.getElementById('Custodianremarks').innerHTML = data.Remarks;


                const unit_val = data.Unit_Value.replace(",", "")
                const residualValue_mod = data.Unit_Value.replace(",", "") * 0.1

                // document.getElementById('residualValue').textContent = data.Unit_Value * 0.1;
                document.getElementById('residualValue').textContent = residualValue_mod.toFixed(2);
                // Assuming Estimated_Useful_Life is defined and accessible
                var Estimated_Useful_Life = parseInt(data.Estimated_Useful_Life);

                // Calculate depreciation using the residualValue and Estimated_Useful_Life
                // var residualValue = data.Unit_Value * 0.1;
                var residualValue = residualValue_mod;

                // Calculate A (Unit_Value - residualValue)
                // var A = data.Unit_Value - (data.Unit_Value * 0.1); // Assuming 0.1 is the residual value percentage
                var A = unit_val - (unit_val * 0.1); // Assuming 0.1 is the residual value percentage

                // Calculate B (Estimated_Useful_Life * 12)
                // var B = Estimated_Useful_Life * 12;
                var B = parseInt(data.Estimated_Useful_Life) * 12;

                // Calculate depreciation using the simplified formula A / B
                // var depreciation = (A / B);
                var depreciation = B > 0 ? (A / B) : 0;
                // console.log(A,B)
                // console.log("depreceation", data.Estimated_Useful_Life * 12)

                // Set the result in the 'depreciation' element
                document.getElementById('depreciation').textContent = depreciation.toFixed(2);

                // Get the Date_Acquired from the data array
                var dateAcquired = new Date(data.Date_Acquired);
                var currentDate = new Date();

                // Calculate the difference in years
                var yearDifference = currentDate.getFullYear() - dateAcquired.getFullYear();

                // Calculate the difference in months
                var monthDifference = currentDate.getMonth() - dateAcquired.getMonth();

                // Account for the day of the month
                if (dateAcquired.getDate() > currentDate.getDate()) {
                    monthDifference--;
                }

                // Convert the year difference to months and add it to the month difference
                monthDifference += yearDifference * 12;

                // Display the result in the 'yearLapse' element
                document.getElementById('yearLapse').textContent = yearDifference + ' years';

                // Display the result in the 'monthLapse' element
                document.getElementById('monthLapse').textContent = monthDifference + ' months';


                function roundToDecimal(number, decimalPlaces) {
                    var factor = Math.pow(10, decimalPlaces);
                    return Math.round(number * factor) / factor;
                }

                function fixRounding(value, precision) {
                    var power = Math.pow(10, precision || 0);
                    return Math.round(value * power) / power;
                }
                // Calculate the accumulated depreciation correctly
                // var multipliedResult = roundToDecimal(monthDifference, 1) * roundToDecimal(depreciation, 2);
                var multipliedResult = fixRounding(depreciation.toFixed(3) * monthDifference.toFixed(3), 2);
                // console.log(monthDifference, depreciation, multipliedResult.toFixed(2))
                document.getElementById('accu').textContent = multipliedResult;

                var AB = parseFloat(data.Unit_Value.replace(',', ''));
                var AC = parseInt(multipliedResult);

                // Ensure AA is at least 0
                var AA = Math.max(unit_val - multipliedResult, 0);

                // console.log(residualValue_mod, monthDifference, depreciation)

                document.getElementById('net').textContent = AA.toFixed(2);




            })
            .catch(error => console.error('Error:', error));
    }
</script>






<?php
include('./partials/footer.php')
?>