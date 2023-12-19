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
?>

<!-- Add this portion to display the response message -->
<?php
if (isset($_SESSION['response'])) {
    $response_message = $_SESSION['response']['message'];
    $is_success = $_SESSION['response']['success'];
?>
    <div id="responseMessage" class="responseMessage">
        <?php if ($is_success) : ?>
            <p class="responseMessage responseMessage_success" style="text-align: center; background-color: darkgreen; color: white; font-size: 2.5vh;">
                <?= $response_message ?>
            </p>
        <?php else : ?>
            <p class="responseMessage responseMessage_error" style="text-align: center; background-color: darkred; color: white; font-size: 2.5vh;">
                <?= $response_message ?>
            </p>
        <?php endif; ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var responseMessage = document.getElementById('responseMessage');
            if (responseMessage) {
                setTimeout(function() {
                    responseMessage.style.opacity = '0';
                    responseMessage.style.transition = 'opacity 1.5s ease-in-out';
                }, 3000); // 1500 milliseconds = 1.5 seconds
            }
        });
    </script>
<?php
    unset($_SESSION['response']);
}
?>

<!--<style>
    body {
        background-image: url('../Inventory_capstone/img/background2.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your background image */
        background-size:inherit;
        background-repeat: no-repeat;
    }
</style>
<!-- Vertical alignment -->
<br>


<!-- Modal toggle -->
<div style="position: relative; height: 100%; overflow: hidden">

    <form method="post" action="new_user.php">
        <div class="d-flex justify-content-end" style="margin-right: 5em;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#example-modal-7" style="background-color: maroon; color: white;" onmouseover="this.style.backgroundColor='#ffa800'; this.style.color='maroon'" onmouseout="this.style.backgroundColor='maroon'; this.style.color='white'">Add User</button>
        </div>



        <!-- Modal with form -->
        <div class="modal fade" id="example-modal-7" tabindex="-1" aria-labelledby="modal-title-7" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">


                    <div class="modal-header" style="background-color: #ffa800;">
                        <h1 class="modal-title fs-5" id="modal-title-7">
                            Add New User
                            <br />
                            <small class="text-body-secondary fw-normal"></small>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>




                    <div class="modal-body">

                        <form>
                            <div class="mb-3">
                                <label for="firt_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?= isset($_SESSION['entered_values']['first_name']) ? htmlspecialchars($_SESSION['entered_values']['first_name']) : '' ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="Last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?= isset($_SESSION['entered_values']['last_name']) ? htmlspecialchars($_SESSION['entered_values']['last_name']) : '' ?>" required>
                            </div>


                            <div class="mb-3">
                                <label for="Role" class="form-label">Role</label>
                                <select name="role" class="form-control" id="role" required>
                                    <option value="">--Please Select--</option>
                                    <option value="0" <?= (isset($_SESSION['entered_values']['role']) && $_SESSION['entered_values']['role'] === 'Admin') ? 'selected' : '' ?>>Admin</option>
                                    <option value="1" <?= (isset($_SESSION['entered_values']['role']) && $_SESSION['entered_values']['role'] === 'Supply Office Staff') ? 'selected' : '' ?>>Supply Office Staff</option>
                                    <option value="3" <?= (isset($_SESSION['entered_values']['role']) && $_SESSION['entered_values']['role'] === 'Custodian') ? 'selected' : '' ?>>Property Custodian</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= isset($_SESSION['entered_values']['username']) ? htmlspecialchars($_SESSION['entered_values']['username']) : '' ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" name="password" placeholder="Password" type="password" required />

                            </div>
                            <div class="mb-3">
                                <label for="confirm_password">Confirm Password</label>
                                <input id="confirm_password" class="form-control" name="confirm_password" placeholder="Confirm Password" type="password" required />
                            </div>



                            <div class="mb-3 pb-3 border-bottom">
                                <button type="submit" class="btn btn-primary w-100" style="background-color: maroon; color: white;" onmouseover="this.style.backgroundColor= '#ffa800' ; this.style.color='maroon'" onmouseout="this.style.backgroundColor='maroon'; this.style.color='white'">Save</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <script>
            function validateForm() {
                var responseMessage = document.getElementById('responseMessage');
                if (responseMessage && responseMessage.innerText.trim() !== '') {
                    // If there is an error message, prevent form submission
                    return false;
                }
                return true;
            }
        </script>

    </form>






    <!-- TABLE -->

    <div class="m-5">
        <div class="card table-responsive mw-100 mx-auto rounded-0">

            <?php
            $inventory = "SELECT * FROM users";
            $result = $data->query($inventory);
            $totalUsers = $result->num_rows; // Get the total number of users
            ?>

            <div style="background-color: maroon; color: white; font-weight: bold; font-size: 2vh; text-align: right; padding: 5px 10px; margin-bottom: 10px;" role="alert">
                Total Registered Users: <?php echo $totalUsers; ?>
            </div>
            <div style="background-color: maroon; color: white; font-weight: bold; font-size: 2vh; text-align: right; padding: 5px 10px; margin-bottom: 10px;" role="alert">
                Role: 0-Admin | 1-Supply Staff | 3-Property Custodian
            </div>
            <table class="table table-bordered align-middle">

                <thead style="background-color: #ffa800;">
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>USERNAME</th>
                    <th>ROLE</th>
                    <th>CREATED AT</th>
                    <th>UPDATED AT</th>
                </thead>

                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <?php
                                if ($row['role' == 1]) {
                                ?>
                                    <td>Staff</td>

                                <?php
                                }
                                ?>
                                  <?php
                                if ($row['role' == 3]) {
                                ?>
                                    <td>Custodian</td>

                                <?php
                                }
                                ?>
                                    <?php
                                if ($row['role' == 0]) {
                                ?>
                                    <td>Custodian</td>

                                <?php
                                }
                                ?>
                                <td><?php echo $row['created_at']; ?></td>
                                <td><?php echo $row['updated_at']; ?></td>
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
    include('partials/footer.php')
    ?>

    <!-- JavaScript for hiding the response message after 1.5 seconds -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            hideResponseMessage();

            function hideResponseMessage() {
                var responseMessage = document.getElementById('responseMessage');
                if (responseMessage) {
                    setTimeout(function() {
                        responseMessage.style.display = 'none';
                    }, 3000);
                }
            }
        });
    </script>