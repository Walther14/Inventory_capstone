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





            </div>
        </nav>
    </div>


    <!-- End of Topbar -->












    <div class="d-flex p-10" style="position: relative; top: 100;">

        <div style="position: relative; width: 100rem;">

            <div class="card text-center p-10">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">

                    <div class="container mt-1">

                        <ul class="list-group list-group-flush">
                            <?php
                            $transfer = "SELECT * FROM transfer_db
                            JOIN users ON transfer_db.user_id = users.user_id
                            JOIN inventory_db ON transfer_db.item_id = inventory_db.id";
                            $transfer_query = mysqli_query($data, $transfer);
                            if ($transfer_query->num_rows > 0) {
                                // output data of each row
                                while ($row = $transfer_query->fetch_assoc()) {
                            ?>
                                    <li class="list-group-item">
                                        <div class="media d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span><i class="fa-solid fa-user"></i></span>
                                                <div class="d-flex flex-column align-items-start" style="margin-left: 2rem; padding: 1rem">
                                                    <h6 class="mt-0"><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></h6>

                                                    <?php
                                                    echo $row['message']
                                                    ?>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                            Approve the following transfer?
                                                                 </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>

                                                                <?php
                                                                echo $row['first_name'] . ' ' . $row['last_name'] . 'requested to tranfer'
                                                                ?>
                                                            </div>
                                                            <div>
                                                                <?php 
                                                                echo $row['Property_Description'];
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-around">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Reject</button>
                                                            <button type="button" class="btn btn-primary">Approve</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn  btn-circle ml-auto" style="height: 50%; border-radius: 50px; border: solid" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <span><i class="fas fa-ellipsis-h"></i></span>
                                            </button>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>

                        </ul>
                        <div class="card-footer text-muted text-center">
                            <a href="#" class="text-primary">See All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>









<?php
include('./partials/footer.php')
?>