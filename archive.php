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



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <script>
                            $(document).ready(function() {
                                $('.archive-btn').on('click', async function(event) {
                                    event.preventDefault(); // Prevent the default link behavior

                                    var itemId = $(this).data('id'); // Get the item ID from data attribute

                                    // $.ajax({
                                    //     url: 'archive.php', // URL to the server-side PHP file
                                    //     type: 'POST',
                                    //     data: {id: itemId}, // Send the item ID as data
                                    //     success: function(response) {
                                    //         // Handle success response if required
                                    //         console.log(response.json());
                                    //     },
                                    //     error: function(xhr) {
                                    //         // Handle error response if required
                                    //         console.log('Error archiving item. Please try again.');
                                    //     }
                                    // });
                                    // const result = await fetch('/archive_capstone/archive.php', {
                                    //     method: 'POST',
                                    //     body: JSON.stringify({
                                    //         id: itemId
                                    //     }),
                                    //     headers: {
                                    //         'Content-Type': 'application/json'
                                    //     }
                                    // })
                                    // if(result.ok){
                                    //     const json = await result.json()
                                    //     console.log(json)
                                    // }


                                });
                            });
                        </script>

                    </tbody>
                </table>
            </div>
        </div>


        <?php
        include('./partials/right-sidebar-archives.php')
        ?>
    </div>
</div>









<?php
include('./partials/footer.php')
?>