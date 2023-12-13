<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}



@include('./Controller/db.php');

@include('partials/header.php');
@include('partials/sidebar.php');
@include('partials/topbar.php');


$sql = "SELECT * FROM inventory_db";
$sqlQuery = mysqli_query($data, $sql);
$sqlQuery2 = mysqli_query($data, $sql);

?>

<div class="card">
    <div class="p-5 d-flex justify-content-center flex-column">
        <div class="p-5 d-flex justify-content-center" style="border: solid">
            <div >

                <dropdown></dropdown>
                <h2>Total No. of Inventories</h2>
                <?php

                // Check if the query was successful
                if ($sqlQuery) {
                    // Get the number of rows in the sqlQuery set
                    $rowCount = mysqli_num_rows($sqlQuery);

                    echo "<h1> " . $rowCount . "</h1>";


                    // Free the sqlQuery set
                    mysqli_free_result($sqlQuery);
                } else {
                    // Handle the case when the query fails
                    echo "Query failed: " . mysqli_error($conn);
                }

                ?>

            </div>
            <div>

                <dropdown></dropdown>
                <h2>Total No. of Semi-expendable properties</h2>
                <?php

                // Check if the query was successful
                if ($sqlQuery) {
                    // Get the number of rows in the sqlQuery set
                    $rowCount = mysqli_num_rows($sqlQuery);

                    echo "<h1> " . $rowCount . "</h1>";


                    // Free the sqlQuery set
                    mysqli_free_result($sqlQuery);
                } else {
                    // Handle the case when the query fails
                    echo "Query failed: " . mysqli_error($conn);
                }

                ?>

            </div>
            <div>

                <dropdown></dropdown>
                <h2>Total No. of Inventories</h2>
                <?php

                // Check if the query was successful
                if ($sqlQuery) {
                    // Get the number of rows in the sqlQuery set
                    $rowCount = mysqli_num_rows($sqlQuery);

                    echo "<h1> " . $rowCount . "</h1>";


                    // Free the sqlQuery set
                    mysqli_free_result($sqlQuery);
                } else {
                    // Handle the case when the query fails
                    echo "Query failed: " . mysqli_error($conn);
                }

                ?>

            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Total No. of Semi-Expendable Properties</th>
                    <th>Department</th>
                    <th>Total No. of Inventories</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $sqlQuery2->fetch_assoc()) {

                    // IF filter to check the department selected by the user
                    echo "<tr>";
                    // echo "<td>" . $row['name'] . "</td>";
                    // echo "<td>" . $row['department'] . "</td>";
                    // echo "<td>" . $row['department'] . "</td>";
                    echo "</tr>";
                }

                ?>

            </tbody>
        </table>
    </div>
</div>


<?php
include('partials/footer.php')
?>