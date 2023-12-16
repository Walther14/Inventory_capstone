<?php

session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}

@include('Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');

?>


<div style="position: relative; height: 100%; overflow: hidden">

    <div style="position: sticky; top: 0; z-index: 10;">

        <!-- Top Bar -->
        <nav class="navbar navbar-expand-lg w-100" style="background-image: url('./img/try.png'); background-size: cover; height: .63in; border-bottom: var(--bs-border-width) solid var(--bs-content-border-color); width: 100%;">
            <div class="container-fluid d-flex justify-content-between p-3">


                <a class="navbar-brand" href="#">

                </a>
                <div class="d-flex justify-content-between">
                    <form method="get" action="" style="display: flex; align-items: center; margin-right: 30px;">
                        <input type="text" id="search" name="search" style="width: 130px; background-color: white; border-radius: 5px; border: solid .5px; height: 2rem;" placeholder="Enter your search term">
                        <button type="submit" style="width:50px; background-color: white; border-radius: 5px; border: solid .5px; height: 2rem;" onmouseenter="changeColor(this, '#ffa800')" onmouseleave="changeColor(this, 'white')" onclick="changeColor(this, 'maroon')"">Search</button>
    </form>

    <button id=" addarchiveID" style="width: 210px; background-color: white; border-radius: 5px; border: solid .5px; height: 2rem;" onmouseenter="changeColor(this, '#ffa800')" onmouseleave="changeColor(this, 'white')" onclick="changeColor(this, 'maroon')">
                            <span>
                                <ion-icon name="add-outline"></ion-icon>
                            </span>
                            Add archive
                        </button>
                </div>


                <script>
                    function changeColor(element, color) {
                        element.style.backgroundColor = color;
                    }
                </script>


            </div>
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

    $archive = "SELECT * FROM archive_db";

    // Check if a search term is provided
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $searchTerm = $_GET['search'];
        // Modify the query to include a search condition
        $archive .= " WHERE Property_Description LIKE '%$searchTerm%' OR Asset_Category LIKE '%$searchTerm%' OR Locator LIKE '%$searchTerm%' OR Current_Property_Number LIKE '%$searchTerm%'";
    }

    $result = $data->query($archive);
    ?>



    <div class="d-flex" style="position: relative; top: 100;">

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
                                        <a type="button" class="btn btn-primary" style="background-color: maroon;" data-id="<?php echo $row['id'] ?>">View</a>
                                        <!-- <a type="button" class="btn btn-secondary" data-id="data_edit?id=<?php echo $row['id'] ?>">Edit</a> -->
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
        include('./partials/right-sidebar-archives.php')
        ?>
    </div>
</div>



<script>
    // Event listener for buttons with data-id attribute
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
        
        fetch('./Controller/viewArchives.php?id=' + id)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
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


                // console.log(data.id)
                // document.getElementById('idInventory').value = data.id;
                // Display the result in the specified container
                document.getElementById('ArchivespropertyDescription').innerHTML = data.Property_Description;

                document.getElementById('ArchivespropertyNumber').innerHTML = data.Current_Property_Number;

                document.getElementById('ArchivesunitMeasure').innerHTML = data.Unit_Measure;

                document.getElementById('Archivesquantity').innerHTML = data.Quantity;

                document.getElementById('ArchivesdateAcquired').innerHTML = data.Date_Acquired;

                document.getElementById('ArchivesassetNumber').innerHTML = data.Asset_Number;


                document.getElementById('ArchivesissuedTo').innerHTML = data.Issued_To;

                document.getElementById('ArchivesapiNumber').innerHTML = data.ARE_PAR_ICS_Number;


                document.getElementById('ArchivesprsNumber').innerHTML = data.PRS_Number;

                document.getElementById('ArchivesfundCluster').innerHTML = data.Fund_Cluster;

                document.getElementById('ArchivesfundAdminCode').innerHTML = data.Fund_Admin_Code;

                document.getElementById('ArchivesfundAdmin').innerHTML = data.Fund_Admin_Title;

                document.getElementById('Archivessupplier').innerHTML = data.Supplier;

                document.getElementById('ArchivesyearLapse').innerHTML = data.Year_Lapsed;

                document.getElementById('Archiveslocator').innerHTML = data.Locator;


                document.getElementById('ArchivesoldPropertyNumber').innerHTML = data.Old_Property_Number;

                document.getElementById('ArchivesunitValue').innerHTML = data.Unit_Value;

                document.getElementById('ArchivesyearAcquired').innerHTML = data.Year_Acquired;


                document.getElementById('ArchivesassetCategory').innerHTML = data.Asset_Category;

                document.getElementById('ArchivesassetTitle').innerHTML = data.Asset_Title;

                document.getElementById('ArchivesissuedFrom').innerHTML = data.Issued_From;


                document.getElementById('ArchivescancelledAPI').innerHTML = data.Cancelled_Number;


                document.getElementById('ArchivesestimatedLife').innerHTML = data.Estimated_Useful_Life;

                document.getElementById('ArchivespurchaseOrder').innerHTML = data.Purchase_Order_Contract_Number;


                document.getElementById('ArchivesacquiredThrough').innerHTML = data.Acquired_Through;

                document.getElementById('Archivesremarks').innerHTML = data.Remarks;


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