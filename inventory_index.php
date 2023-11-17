<?php
@include('Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');

?>
<div style="position: relative; height: 100%; overflow: hidden">

    <div style="position: sticky; top: 0; z-index: 10;">

        <!-- Top Bar -->
        <nav class="navbar navbar-expand-lg w-100" style="background-color: rgb(255, 255, 255); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 0 1px 0 rgba(0, 0, 0, 0.19);">
            <div class="container-fluid d-flex justify-content-between p-3">
                <a class="navbar-brand" href="#">
                    <img src="./img/prime.png" alt="Logo" height="24" class="d-inline-block align-text-top">

                </a>


                <div class="d-flex justify-content-end">
                    <a href="./components/addInventory.php" class="btn btn-dark p-2">

                        <span>
                            <ion-icon name="add-outline"></ion-icon>
                        </span>

                        Add Inventory</a>
                </div>

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
                                        <a type="button" class="btn btn-primary" data-id="<?php echo $row['id'] ?>">View</a>
                                        <a type="button" class="btn btn-secondary" href="./components/editinventory.php?id=<?php echo $row['id'] ?>">Edit</a>
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

    buttons.forEach(function(button) {
        button.addEventListener("click", function() {

            let rightSideBar = document.querySelector("#rightSidebar");
            let empty = document.querySelector("#empty");
            let tabs = document.querySelector("#js-tabs-1")

            rightSideBar.style.display = "block"
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
                // Display the result in the specified container
                document.getElementById('propertyDescription').innerHTML = data.Property_Description;

                document.getElementById('propertyNumber').innerHTML = data.Current_Property_Number;

                document.getElementById('unitMeasure').innerHTML = data.Unit_Measure;

                document.getElementById('quantity').innerHTML = data.Quantity;

                document.getElementById('dateAcquired').innerHTML = data.Date_Acquired;

                document.getElementById('assetNumber').innerHTML = data.Asset_Number;


                document.getElementById('issuedTo').innerHTML = data.Issued_To;

                document.getElementById('apiNumber').innerHTML = data.ARE_PAR_ICS_Number;


                document.getElementById('prsNumber').innerHTML = data.PRS_Number;

                document.getElementById('fundCluster').innerHTML = data.Fund_Cluster;

                document.getElementById('fundAdmin').innerHTML = data.Fund_Admin_Code;

                document.getElementById('supplier').innerHTML = data.Supplier;

                document.getElementById('yearLapse').innerHTML = data.Year_Lapsed;

                document.getElementById('locator').innerHTML = data.Locator;


                document.getElementById('oldPropertyNumber').innerHTML = data.Old_Property_Number;

                document.getElementById('unitValue').innerHTML = data.Unit_Value;

                document.getElementById('yearAcquired').innerHTML = data.Year_Acquired;


                document.getElementById('assetCategory').innerHTML = data.Asset_Category;

                document.getElementById('assetTitle').innerHTML = data.Asset_Title;

                document.getElementById('issuedFrom').innerHTML = data.Issued_From;


                document.getElementById('cancelledAPI').innerHTML = data.ARE_PAR_ICS_Number;


                document.getElementById('estimatedLife').innerHTML = data.Estimated_Useful_Life;

                document.getElementById('purchaseOrder').innerHTML = data.Purchase_Order_Contract_Number;


                document.getElementById('acquiredThrough').innerHTML = data.Acquired_Through;

                document.getElementById('remarks').innerHTML = data.Remarks;

            })
            .catch(error => console.error('Error:', error));
    }
</script>

<?php
include('./partials/footer.php')
?>