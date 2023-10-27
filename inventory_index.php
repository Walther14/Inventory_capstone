<?php
@include('Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');
@include('partials/topbar.php');
?>

<!-- Bordered table -->


<?php
$inventory = "SELECT * FROM inventory_db";

$result = $data->query($inventory);
?>

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
                        <a type="button" class="btn btn-primary" href="inventory.php?id=<?php echo $row['id']
                                                                                        ?>">View</a>
                        <a type="button" class="btn btn-secondary" href="./components/editinventory.php?id=<?php echo $row['id']?>">Edit</a>
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



<?php
include('partials/footer.php')
?>