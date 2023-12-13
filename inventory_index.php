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

                <div class="d-flex justify-content-end">
                    <button id="addInventoryID" style="width: 210px; background-color: white; border-radius: 5px; border: solid .5px; height: 2rem;" onmouseenter="changeColor(this, '#ffa800')" onmouseleave="changeColor(this, 'white')" onclick="changeColor(this, 'maroon')">
                        <span>
                            <ion-icon name="add-outline"></ion-icon>
                        </span>
                        Add Inventory
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







    <!-- Bordered table -->



    <?php
    $inventory = "SELECT * FROM inventory_db";

    $result = $data->query($inventory);
    ?>


    <div class="d-flex" style="position: relative; top: 100;">

        <div style="position: relative; width: 100rem;">

            <div class="m-1 w-100" style="width: 100%; position: absolute;  overflow: auto; height: calc(100vh - 85.6px)">

                <table class="table table-bordered table table-hover">


                    <thead>
                        <th>Property Description</th>
                        <th>Locator</th>
                        <th>Currently Property Number</th>
                        <th>Action</th>
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
        include('./partials/right-sidebar.php')
        ?>
    </div>
</div>






<script>
    // Event listener for buttons with data-id attribute
    let buttons = document.querySelectorAll("[data-id]");
    let button1 = document.querySelector('#addInventoryID');


    button1.addEventListener("click", function() {
        let rightSideBar = document.querySelector("#rightSidebar");
        let rightSideBar2 = document.querySelector("#rightSidebar2");
        let empty = document.querySelector("#empty");
        let tabs = document.querySelector("#js-tabs-1")
        let buttonAdd = document.querySelector('#addInventoryIDBLOCK');

        console.log(buttonAdd.style.display)

        buttonAdd.style.display = "block"
        rightSideBar.style.display = "none"
        rightSideBar2.style.display = "none"
        tabs.style.display = "none"
        empty.style.display = "none"
    })



    buttons.forEach(function(button) {
        button.addEventListener("click", function() {

            let rightSideBar = document.querySelector("#rightSidebar");
            let rightSideBar2 = document.querySelector("#rightSidebar2");
            let empty = document.querySelector("#empty");
            let tabs = document.querySelector("#js-tabs-1")
            let buttonAdd = document.querySelector('#addInventoryIDBLOCK');


            buttonAdd.style.display = "none"

            rightSideBar.style.display = "block"
            rightSideBar2.style.display = "block"
            tabs.style.display = "flex"
            empty.style.display = "none"

            // Get the data-id attribute value
            let id = button.getAttribute("data-id");

            // Call the fetchData function with the id
            fetchData(id);
        });
    });

    // Function to make the AJAX call
    function fetchData(id) {
        fetch('./Controller/view.php?id=' + id)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
console.log(data)
             
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
        photoElement.src = 'path/to/default/image.jpg'; // Replace with your default image path
        // Optional: Set alt attribute for accessibility
        photoElement.alt = 'Default Image';
    }

                // console.log(data.id)
                document.getElementById('idInventory').value = data[0].id;
                // Display the result in the specified container
                document.getElementById('propertyDescription').innerHTML = data[0].Property_Description;
                document.getElementById('editPropertyDescription').value = data[0].Property_Description;

                document.getElementById('propertyNumber').innerHTML = data[0].Current_Property_Number;
                document.getElementById('editpropertyNumber').value = data[0].Current_Property_Number;

                document.getElementById('unitMeasure').innerHTML = data[0].Unit_Measure;
                document.getElementById('editunitMeasure').value = data[0].Unit_Measure;

                document.getElementById('quantity').innerHTML = data[0].Quantity;
                document.getElementById('editquantity').value = data[0].Quantity;

                document.getElementById('dateAcquired').innerHTML = data[0].Date_Acquired;
                document.getElementById('editdateAcquired').value = data[0].Date_Acquired;

                document.getElementById('assetNumber').innerHTML = data[0].Asset_Number;
                document.getElementById('editassetNumber').value = data[0].Asset_Number;


                document.getElementById('issuedTo').innerHTML = data[0].Issued_To;
                document.getElementById('editissuedTo').value = data[0].Issued_To;

                document.getElementById('apiNumber').innerHTML = data[0].ARE_PAR_ICS_Number;
                document.getElementById('editapiNumber').value = data[0].ARE_PAR_ICS_Number;


                document.getElementById('prsNumber').innerHTML = data[0].PRS_Number;
                document.getElementById('editprsNumber').value = data[0].PRS_Number;

                document.getElementById('fundCluster').innerHTML = data[0].Fund_Cluster;
                document.getElementById('editfundCluster').value = data[0].Fund_Cluster;

                document.getElementById('fundAdminCode').innerHTML = data[0].Fund_Admin_Code;
                document.getElementById('editfundAdminCode').value = data[0].Fund_Admin_Code;

                document.getElementById('fundAdmin').innerHTML = data[0].Fund_Admin_Title;
                document.getElementById('editfundAdmin').value = data[0].Fund_Admin_Title;

                document.getElementById('supplier').innerHTML = data[0].Supplier;
                document.getElementById('editsupplier').value = data[0].Supplier;

                document.getElementById('yearLapse').innerHTML = data[0].Year_Lapsed;
                document.getElementById('edityearLapse').value = data[0].Year_Lapsed;

                document.getElementById('locator').innerHTML = data[0].Locator;
                document.getElementById('editlocator').value = data[0].Locator;


                document.getElementById('oldPropertyNumber').innerHTML = data[0].Old_Property_Number;
                document.getElementById('editoldPropertyNumber').value = data[0].Old_Property_Number;

                document.getElementById('unitValue').innerHTML = data[0].Unit_Value;
                document.getElementById('editunitValue').value = data[0].Unit_Value;

                document.getElementById('yearAcquired').innerHTML = data[0].Year_Acquired;
                document.getElementById('edityearAcquired').value = data[0].Year_Acquired;


                document.getElementById('assetCategory').innerHTML = data[0].Asset_Category;
                document.getElementById('editassetCategory').value = data[0].Asset_Category;

                document.getElementById('assetTitle').innerHTML = data[0].Asset_Title;
                document.getElementById('editassetTitle').value = data[0].Asset_Title;

                document.getElementById('issuedFrom').innerHTML = data[0].Issued_From;
                document.getElementById('editissuedFrom').value = data[0].Issued_From;


                document.getElementById('cancelledAPI').innerHTML = data[0].Cancelled_Number;
                document.getElementById('editcancelledAPI').value = data[0].Cancelled_Number;


                document.getElementById('estimatedLife').innerHTML = data[0].Estimated_Useful_Life;
                document.getElementById('editestimatedLife').value = data[0].Estimated_Useful_Life;

                document.getElementById('purchaseOrder').innerHTML = data[0].Purchase_Order_Contract_Number;
                document.getElementById('editpurchaseOrder').value = data[0].Purchase_Order_Contract_Number;


                document.getElementById('acquiredThrough').innerHTML = data[0].Acquired_Through;
                document.getElementById('editacquiredThrough').value = data[0].Acquired_Through;

                document.getElementById('remarks').innerHTML = data[0].Remarks;
                document.getElementById('editremarks').value = data[0].Remarks;


                document.getElementById('residualValue').textContent = data[0].Unit_Value * 0.1;
                // document.getElementById('photo').innerHTML = data.Photo;


            })
            .catch(error => console.error('Error:', error));
    }
</script>

<?php
include('./partials/footer.php')
?>