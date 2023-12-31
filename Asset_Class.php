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


<form method="post" action="new_asset.php">
    <div class="d-flex justify-content-end" style="margin-right: 5em;">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#example-modal-7" style="background-color: maroon; color: white;" onmouseover="this.style.backgroundColor='#ffa800'; this.style.color='maroon'" onmouseout="this.style.backgroundColor='maroon'; this.style.color='white'">Add new asset</button>
    </div>

    <!-- Modal with form -->
    <div class="modal fade" id="example-modal-7" tabindex="-1" aria-labelledby="modal-title-7" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ffa800;">
                    <h1 class="modal-title fs-5" id="modal-title-7">
                        Add New Asset
                        <br />
                        <small class="text-body-secondary fw-normal"></small>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="Asset_Code" class="form-label">Asset Code</label>
                            <input type="text" class="form-control" id="Asset_Code" name="Asset_Code" placeholder="Asset Code" value="<?= isset($_SESSION['entered_values']['Asset_Code']) ? htmlspecialchars($_SESSION['entered_values']['Asset_Code']) : '' ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="Asset_Title" class="form-label">Asset Title</label>
                            <input type="text" class="form-control" id="Asset_Title" name="Asset_Title" placeholder="Asset Title" value="<?= isset($_SESSION['entered_values']['Asset_Title']) ? htmlspecialchars($_SESSION['entered_values']['Asset_Title']) : '' ?>" required>
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
    <!-- TABLE FOR ASSET -->
    <div class="card table-responsive mw-100 mx-auto rounded-0">

        <?php
        $inventory = "SELECT * FROM Asset_db";
        $result = $data->query($inventory);
        $totalUsers = $result->num_rows;
        $result = $data->query($inventory);
        ?>

<div style="background-color: maroon; color: white; font-weight: bold; font-size: 2vh; text-align: right; padding: 5px 10px; margin-bottom: 10px;" role="alert">
            Total Number of Asset Code: <?php echo $totalUsers; ?>
        </div>

        <table class="table table-bordered align-middle">
         <thead style="background-color: #ffa800;">
                <th>Asset Code</th>
                <th>Asset Name</th>

            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {


                ?>
                        <tr>
                            <td>
                                <?php echo ($row['Asset_Code']) ?>
                            </td>

                            <td>
                                <?php echo ($row['Asset_Title']) ?>
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


<?php
include('partials/footer.php')
?>