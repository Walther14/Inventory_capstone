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

                <a class="navbar-brand" href="#"></a>
                <div class="d-flex justify-content-between">
                    <form method="get" action="" style="display: flex; align-items: center; margin-right: 30px;">
                        <select name="asset_category" id="asset_category" style="width: 130px; background-color: white; border-radius: 5px; border: solid .5px; height: 2rem;">
                            <option value="">Select Asset Category</option>
                            <?php
                            $categories = $data->query("SELECT DISTINCT Asset_Category FROM inventory_db");
                            while ($category = $categories->fetch_assoc()) {
                                $selected = isset($_GET['asset_category']) && $_GET['asset_category'] == $category['Asset_Category'] ? 'selected' : '';
                                echo "<option value='{$category['Asset_Category']}' $selected>{$category['Asset_Category']}</option>";
                            }
                            ?>
                        </select>
                        <select name="asset_number" id="asset_number" style="width: 130px; background-color: white; border-radius: 5px; border: solid .5px; height: 2rem;">
                            <option value="">Select Asset Number</option>
                            <?php
                            $categories = $data->query("SELECT DISTINCT asset_number FROM inventory_db");
                            while ($category = $categories->fetch_assoc()) {
                                $selected = isset($_GET['asset_number']) && $_GET['asset_number'] == $category['asset_number'] ? 'selected' : '';
                                echo "<option value='{$category['asset_number']}' $selected>{$category['asset_number']}</option>";
                            }
                            ?>
                        </select>
                        <input type="text" id="search" name="search" style="width: 130px; background-color: white; border-radius: 5px; border: solid .5px; height: 2rem;" placeholder="Enter your search term">

                        <button type="submit" style="width:50px; background-color: white; border-radius: 5px; border: solid .5px; height: 2rem;" onmouseenter="changeColor(this, '#ffa800')" onmouseleave="changeColor(this, 'white')" onclick="changeColor(this, 'maroon')">Search</button>
                    </form>
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

    $inventory = "SELECT * FROM inventory_db";

    // Check if a search term is provided
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    // Modify the query to include a search condition
    $inventory .= " WHERE Issued_To LIKE '%$searchTerm%'";
}

// Check if an asset category filter is provided
if (isset($_GET['asset_category']) && !empty($_GET['asset_category'])) {
    $assetCategoryFilter = $_GET['asset_category'];

    // Add an additional condition to filter by asset category
    $inventory .= (strpos($inventory, 'WHERE') !== false) ? " AND " : " WHERE ";
    $inventory .= "Asset_Category = '" . $data->real_escape_string($assetCategoryFilter) . "'";
}

// Check if an asset number filter is provided
if (isset($_GET['asset_number']) && !empty($_GET['asset_number'])) {
    $assetNumberFilter = $_GET['asset_number'];

    // Add an additional condition to filter by asset number
    $inventory .= (strpos($inventory, 'WHERE') !== false) ? " AND " : " WHERE ";
    $inventory .= "Asset_Number = '" . $data->real_escape_string($assetNumberFilter) . "'";
}

$result = $data->query($inventory);
    ?>

    <div class="d-flex" style="position: relative; top: 100;">

        <div style="position: relative; width: 100rem;">

            <div class="m-1 w-100" style="width: 100%; position: absolute;  overflow: auto; height: calc(100vh - 85.6px)">

                <table class="table table-bordered table table-hover">

                    <style>
                        .hidden-column {
                            display: none;
                        }
                    </style>

                    <!-- Your existing HTML code -->
                    <tr>
                        <th>Account Number</th>
                        <th>Article/Item</th>
                        <th>Description</th>
                        <th>Old Property Number</th>
                        <th>Currently Property Number</th>
                        <th>Unit of Measure</th>
                        <th>Unit Value</th>
                        <th>Qty</th>
                        <th>Location</th>
                        <th>Remarks</th>
                        <th>Issued to</th>
                        <th>Category</th>
                    </tr>
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
                                    <td><?php echo ($row['Remarks']) ?></td>
                                    <td><?php echo ($row['Issued_To']) ?></td>
                                    <td><?php echo ($row['Asset_Category']) ?></td>
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
        include('./partials/viewing.php')
        ?>
    </div>
</div>