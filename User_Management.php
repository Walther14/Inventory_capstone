<?php
session_start();
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
        <p class="responseMessage <?= $is_success ? 'responseMessage_success' : 'responseMessage_error' ?>" style="text-align: center;">
            <?= $response_message ?>
        </p>
    </div>
<?php
    unset($_SESSION['response']);
}
?>

<!-- Vertical alignment -->
<br>


<!-- Modal toggle -->


<form method="post" action="new_user.php">
    <div class="d-flex justify-content-end" style="margin-right: 5em;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#example-modal-7">Add User</button>
    </div>

    <!-- Modal with form -->
    <div class="modal fade" id="example-modal-7" tabindex="-1" aria-labelledby="modal-title-7" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
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
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                        </div>

                        <div class="mb-3">
                            <label for="Last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                        </div>


                        <div class="mb-3">
                            <label for="Role" class="form-label">Role</label>
                            <select name="role" class="form-control" id="role" required>
                                <option name="role" value="">--Please Select--</option>
                                <option name="role" value="Admin">Admin</option>
                                <option name="role" value="Supply Office Staff">Supply Office Staff</option>
                                <option name="role" value="Custodian">Property Custodian</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="User Name">
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
                            <button type="submit" class="btn btn-primary w-100">Save</button>
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
<br>
<div class="m-5">

    <div class="card table-responsive mw-100 mx-auto rounded-0">

        <?php
        $inventory = "SELECT * FROM users";

        $result = $data->query($inventory);
        ?>
        <table class="table table-bordered align-middle">
            <thead>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>USER NAME</th>

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
                        <tr></tr>
                        <td>
                            <?php echo ($row['first_name']) ?>
                        </td>

                        <td>
                            <?php echo ($row['last_name']) ?>
                        </td>

                        <td>
                            <?php echo ($row['username']) ?>
                        </td>


                        <td>
                            <?php echo ($row['role']) ?>
                        </td>


                        <td>
                            <?php echo ($row['created_at']) ?>
                        </td>

                        <td>
                            <?php echo ($row['updated_at']) ?>
                        </td>

                        </td>


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

<!-- JavaScript for hiding the response message after 5 seconds -->
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