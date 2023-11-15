<?php
@include('Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');

?>
<div style="position: relative;">

    <div style="position: sticky; top: 0; z-index: 10;">

        <!-- Top Bar -->
        <nav class="navbar navbar-expand-lg w-100" style="background-color: rgb(255, 255, 255); border-radius: 25px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 0 1px 0 rgba(0, 0, 0, 0.19);">
            <div class="container-fluid d-flex justify-content-between p-3">
                <a class="navbar-brand" href="#">
                    <img src="./img/prime.png" alt="Logo" height="24" class="d-inline-block align-text-top">

                </a>


                <div class="d-flex justify-content-end">
                    <a href="./components/addInventory.php" class="btn btn-dark p-2">
                        <i data-feather="circle"></i>
                        <i data-feather="circle"></i>
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


    <div class="d-flex" style="position: relative; top: 100">

        <div class="m-3 w-75" style="margin-right: 5rem">

            <table class="table table-bordered">


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
                                    <a type="button" class="btn btn-primary" id="view">View</a>
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


        <div class="m-3 w-25 card" style="margin-right: 5rem; height: 100%">

            <div class="card p-3">
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">

                        <h5>Property Description</h5>
                        <p>: 5</p>
                    </div>
                </div>
                <div class="row">

                    <h5>Property Description</h5>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    let button = document.querySelector("#view")

    button.addEventListener("click",  function(){
        alert('dont press me please')
    })
</script>

<?php
include('partials/footer.php')
?>