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
        <?php if ($is_success): ?>
            <p class="responseMessage responseMessage_success" style="text-align: center; background-color: darkgreen; color: white; font-size: 2.5vh;">
                <?= $response_message ?>
            </p>
        <?php else: ?>
            <p class="responseMessage responseMessage_error" style="text-align: center; background-color: darkred; color: white; font-size: 2.5vh;">
                <?= $response_message ?>
            </p>
        <?php endif; ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var responseMessage = document.getElementById('responseMessage');
            if (responseMessage) {
                setTimeout(function () {
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


<!-- Vertical alignment -->
<br>


<!-- Modal toggle -->


<form method="post" action="new_staff.php">
    <div class="d-flex justify-content-end" style="margin-right: 5em;">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#example-modal-7" style="background-color: maroon; color: white;" onmouseover="this.style.backgroundColor='#ffa800'; this.style.color='maroon'" onmouseout="this.style.backgroundColor='maroon'; this.style.color='white'">Add new staff</button>
    </div>

    <!-- Modal with form -->
    <div class="modal fade" id="example-modal-7" tabindex="-1" aria-labelledby="modal-title-7" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ffa800;">
                    <h1 class="modal-title fs-5" id="modal-title-7">
                        Add New Staff
                        <br />
                        <small class="text-body-secondary fw-normal"></small>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= isset($_SESSION['entered_values']['name']) ? htmlspecialchars($_SESSION['entered_values']['name']) : '' ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" id="department" name="department" placeholder="Department" value="<?= isset($_SESSION['entered_values']['department']) ? htmlspecialchars($_SESSION['entered_values']['department']) : '' ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="position_designation" class="form-label">Position</label>
                            <input type="text" class="form-control" id="position_designation" name="position_designation" placeholder="Position" value="<?= isset($_SESSION['entered_values']['position_designation']) ? htmlspecialchars($_SESSION['entered_values']['position_designation']) : '' ?>" required>
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


<div class="m-5">
    <div class="card table-responsive mw-100 mx-auto rounded-0">

        <?php
        $inventory = "SELECT * FROM staff_db";
        $result = $data->query($inventory);
        $totalUsers = $result->num_rows;
        $result = $data->query($inventory);
        ?>

<div style="background-color: maroon; color: white; font-weight: bold; font-size: 2vh; text-align: right; padding: 5px 10px; margin-bottom: 10px;" role="alert">
            Total Number of Staff: <?php echo $totalUsers; ?>
        </div>
        
        <table class="table table-bordered align-middle">
            <thead style="background-color: #ffa800;">
                <th>Name</th>
                <th>Department</th>
                <th>Position</th>
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
                                <?php echo ($row['name']) ?>
                            </td>

                            <td>
                                <?php echo ($row['department']) ?>
                            </td>

                            <td>
                                <?php echo ($row['position_designation']) ?>
                            </td>
                            <td>
                                <a type="button" class="btn btn-secondary">Update</a>
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
include('partials/footer.php')
?>