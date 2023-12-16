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
@include('partials/topbar.php');

$sqlTotalCount = "SELECT COUNT(*) AS total_count FROM inventory_db";
$sqlTotalCountResult = mysqli_query($data, $sqlTotalCount);

// Check if the query was successful for total count
if ($sqlTotalCountResult) {
    // Fetch the result as an associative array
    $totalCountResult = mysqli_fetch_assoc($sqlTotalCountResult);
    // Get the total count from the result
    $totalCount = $totalCountResult['total_count'];
} else {
    // Handle the case when the query fails for total count
    $totalCount = "N/A";
    echo "Total Count Query failed: " . mysqli_error($data);
}

// Query for category counts
$sqlQueryInventory = mysqli_query($data, "SELECT COUNT(*) AS inventoryCount FROM inventory_db WHERE asset_category = 'Inventory'");
$sqlQuerySemiExpendable = mysqli_query($data, "SELECT COUNT(*) AS semiExpendableCount FROM inventory_db WHERE asset_category = 'semi-expendable'");
$sqlQueryEquipment = mysqli_query($data, "SELECT COUNT(*) AS equipmentCount FROM inventory_db WHERE asset_category = 'Property, Plant and Equipment'");

// Check if the queries for category counts were successful
if ($sqlQueryInventory && $sqlQuerySemiExpendable && $sqlQueryEquipment) {
    // Fetch the results as associative arrays
    $resultInventory = mysqli_fetch_assoc($sqlQueryInventory);
    $resultSemiExpendable = mysqli_fetch_assoc($sqlQuerySemiExpendable);
    $resultEquipment = mysqli_fetch_assoc($sqlQueryEquipment);

    // Get the counts from the results
    $inventoryCount = $resultInventory['inventoryCount'];
    $semiExpendableCount = $resultSemiExpendable['semiExpendableCount'];
    $equipmentCount = $resultEquipment['equipmentCount'];
} else {
    // Handle the case when the queries fail for category counts
    echo "Category Counts Query failed: " . mysqli_error($data);
}

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="card">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .card {
            /* height: 100vh; */
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* background-color: #fff; */
            background-color: rgba(255, 255, 255, 0.7);
            /* White background with 70% opacity */
            background-image: url('img/abstract-yellow-color-landing-page-design-web-page-background-free-vector.png');
        background-size: cover;
            /* Set the background image to cover the entire container */
          

        }

        .table-up {
            background-color: #fff;
            width: 100%;
            border: 1px solid #ccc;
            border-collapse: collapse;
            width: 100%;
           
        }

        .table-up, th, td {
            text-align:center ;
            padding: 10px;
            border: 1px solid lightgray;
        }

   

        .table {
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            min-width: 100%;
        }

        .table th,
        .table td {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .table th, .table-up th {
            
            background-color: #f09f03;
            color: #530000;
        }

        .p-5 {
            padding: 4px !important;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-center {
            justify-content: center;
        }

        .flex-column {
            flex-direction: column;
        }

        .border-solid {
            border: solid;
        }

        h2,
        .h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        h1,
        .h1 {
            font-size: 36px;
            color: #333;
        }

     
        .table{
    max-height: 34vh;
    overflow-y: auto;
    display: block;
}
#asset_category {
    width: 350px;
    background-color: white;
    border-radius: 5px;
    border: solid .5px;
    height: 2rem;
    margin-right: 10px; 
    margin-left: 200px;/* Add space at the right */
}


#search {
    width: 350px;
    background-color: white;
    border-radius: 5px;
    border: solid .5px;
    height: 2rem;
    margin-right: 10px; /* Add space at the right */
}

#submit {
    width: 50px;
    background-color: white;
    border-radius: 5px;
    border: solid .5px;
    height: 2rem;
    margin-right: 10px; /* Add space at the right */
}





        /* Responsive Styles */
        @media only screen and (max-width: 768px) {
            .card {
                margin: 10px;
                padding: 1px;
            }

            .table th,
            .table td, .table-up {
                padding: 8px;
                font-size: 13px;
            }

            h2,
            .h2 {
                font-size: 18px;
            }

            h1,
            .h1 {
                font-size: 28px;
            }

            .card {
    height: auto; /* Set a specific height for the card */
    max-height: auto; /* Set a maximum height for the card */
    overflow-y: auto; /* Enable vertical scrolling if needed */
    /* Other styles... */
}
     
.table, .table-up{
    max-height: 34vh;
    overflow-y: auto;
    display: block;
}
/* style="width:50px; background-color: white; border-radius: 5px; border: solid .5px; height: 2rem;" */
#asset_category{
    margin-left: 20px;
    width: 100px;
}

#search{
    width: 100px;
}
#submit{
    width: 100px;
}



        }
    </style>

    <div class="p-5 d-flex justify-content-center flex-column">
        <h2 style="text-align: LEFT; color:#fff;">Total number of data stored in the system: <?php echo $totalCount; ?></h2>
        <div class="p-5 d-flex justify-content-center" style="border: solid; font-size: 20px;background-color: #fff;">
            <table class="table-up" >
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Total Count</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Inventories</td>
                        <td>
                            <?php
                            // Modify your SQL query to select rows where asset category is 'inventory'
                            $sqlQuery = mysqli_query($data, "SELECT COUNT(*) AS inventoryCount FROM inventory_db WHERE asset_category = 'inventory'");

                            // Check if the query was successful
                            if ($sqlQuery) {
                                // Fetch the result as an associative array
                                $result = mysqli_fetch_assoc($sqlQuery);

                                // Get the count from the result
                                $inventoryCount = $result['inventoryCount'];

                                echo $inventoryCount;

                                // Free the sqlQuery set
                                mysqli_free_result($sqlQuery);
                            } else {
                                // Handle the case when the query fails
                                echo "Query failed: " . mysqli_error($data);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Semi-expendables</td>
                        <td>
                            <?php
                            // Modify your SQL query to select rows where asset category is 'semi-expendable'
                            $sqlQuery = mysqli_query($data, "SELECT COUNT(*) AS semiExpendableCount FROM inventory_db WHERE asset_category = 'semi-expendable'");

                            // Check if the query was successful
                            if ($sqlQuery) {
                                // Fetch the result as an associative array
                                $result = mysqli_fetch_assoc($sqlQuery);

                                // Get the count from the result
                                $semiExpendableCount = $result['semiExpendableCount'];

                                echo $semiExpendableCount;

                                // Free the sqlQuery set
                                mysqli_free_result($sqlQuery);
                            } else {
                                // Handle the case when the query fails
                                echo "Query failed: " . mysqli_error($data);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Property, Plant and Equipment</td>
                        <td>
                            <?php
                            // Modify your SQL query to select rows where asset category is 'Property, Plant and Equipment'
                            $sqlQuery = mysqli_query($data, "SELECT COUNT(*) AS equipmentCount FROM inventory_db WHERE asset_category = 'Property, Plant and Equipment'");

                            // Check if the query was successful
                            if ($sqlQuery) {
                                // Fetch the result as an associative array
                                $result = mysqli_fetch_assoc($sqlQuery);

                                // Get the count from the result
                                $equipmentCount = $result['equipmentCount'];

                                echo $equipmentCount;

                                // Free the sqlQuery set
                                mysqli_free_result($sqlQuery);
                            } else {
                                // Handle the case when the query fails
                                echo "Query failed: " . mysqli_error($data);
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="width: 60%; margin: auto;">
                <canvas id="assetCategoryChart"></canvas>
            </div>
        </div>

        <table class="table" >
        <div style="position: sticky; top: 0; z-index: 10;">

<!-- Top Bar -->
<nav class="navbar navbar-expand-lg w-100" style="background-image: url('./img/abstract-yellow-color-landing-page-design-web-page-background-free-vector.png'); background-size: cover; height: .63in; border-bottom: var(--bs-border-width) solid var(--bs-content-border-color); width: 100%;">
    <div class="d-flex" style="display: flex;">

        <a class="navbar-brand" href="#"></a>
        <div class="d-flex justify-content-between">
            <form method="get" action="" style="display: flex; align-items: center; margin-right: 30px;">
                <select name="asset_category" id="asset_category" >
                    <option value="">Select Asset Category</option>
                    <?php
                    $categories = $data->query("SELECT DISTINCT Asset_Category FROM inventory_db");
                    while ($category = $categories->fetch_assoc()) {
                        $selected = isset($_GET['asset_category']) && $_GET['asset_category'] == $category['Asset_Category'] ? 'selected' : '';
                        echo "<option value='{$category['Asset_Category']}' $selected>{$category['Asset_Category']}</option>";
                    }
                    ?>
                </select>
                
                <input type="text" id="search" name="search"  placeholder="Enter description or name to be searched">

                <button type="submit" id="submit" onmouseenter="changeColor(this, '#ffa800')" onmouseleave="changeColor(this, 'white')" onclick="changeColor(this, 'maroon')">Search</button>
            
        
            
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
        // Modify the query to include a search condition for Issued_To and Description columns
        $inventory .= " WHERE Issued_To LIKE '%$searchTerm%' OR property_description LIKE '%$searchTerm%'";
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


    


 <thead>
    
     
     <label style="color: white; font-size: 18px; width:100%;">
 <?php
     $totalResults = $result->num_rows;
     echo "Total Results: $totalResults";
 ?>
</label>
                <tr>
                    <th>Name</th>
                    <th>Item description</th>
                    <th>Category</th>

                </tr>

                <tbody>

                
                        <?php
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                               
                                    <td><?php echo ($row['Issued_To']) ?></td>
                                    <td><?php echo ($row['Property_Description']) ?></td>
                                    <td><?php echo ($row['Asset_Category']) ?></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<p style='color: white; font-size: 18px;'>There is no data in the system that has this detail</p>";
                        }
                        ?>
                    </tbody>
            </thead>
       
        </table>
       
    </div>
</div>
<script>
    // Get the data for the chart from PHP variables
    var categories = ['Inventories', 'Semi-expendables', 'PPE'];
    var counts = [
        <?php echo $inventoryCount; ?>,
        <?php echo $semiExpendableCount; ?>,
        <?php echo $equipmentCount; ?>
    ];

    // Create a horizontal bar chart
    var ctx = document.getElementById('assetCategoryChart').getContext('2d');
    var assetCategoryChart = new Chart(ctx, {
        type: 'bar', // Change the chart type to 'horizontalBar'
        data: {
            labels: categories,
            datasets: [{
                label: 'show count',
                data: counts,
                backgroundColor: [
                    'rgba(255, 102, 128, 0.8)',
                    'rgba(102, 178, 255, 0.8)',
                    'rgba(255, 230, 102, 0.8)'
                ],
                borderColor: [
                    'rgba(255, 102, 128, 1)',
                    'rgba(102, 178, 255, 1)',
                    'rgba(255, 230, 102, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


<?php
include('./partials/footer.php')
?>     