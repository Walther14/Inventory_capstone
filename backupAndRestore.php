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


$sql = "SELECT * FROM inventory_db";
$sqlQuery = mysqli_query($data, $sql);
$sqlQuery2 = mysqli_query($data, $sql);



// $date_query= "SELECT backup_date FROM backup_tbl ORDER BY backup_date DESC LIMIT 1";
// $stmt = mysqli_prepare($conn, $date_query);
// mysqli_stmt_execute($stmt);
// $query_result = mysqli_stmt_get_result($stmt);

// // Set the time zone to Philippines
// date_default_timezone_set('Asia/Manila');

// if(mysqli_num_rows($query_result) > 0) {
//     $row = mysqli_fetch_assoc($query_result);
//     $lastBackupDate = $row['backup_date'];
//     // echo "Last backup date: " . date("F j, Y g:i a", strtotime($lastBackupDate));
// } else {
//     echo "No backup date found";
// }

// mysqli_close($conn); 

?>



<section class="home">

    <div class="row p-4 g-4 justify-content-center align-items-center vh-100">

        <div class="col-md-5">
            <form action="./Controller/process-backup-database.php" method="POST">
                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center">Backup database</h4>
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="img/database-backup.svg" class="br-icon" alt="Backup icon">
                            </div>

                            <div class="col-lg-9">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="backupDate" class="col-form-label">Last backup date:</label>
                                    </div>
                                    <div class="row">
                                        <?php
                                        $query = "SELECT * FROM db_date ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($data, $query);
                                        if ($result) {
                                            // Fetch the data
                                            $row = mysqli_fetch_assoc($result);


                                            mysqli_free_result($result);


                                        ?>
                                            <input type="text" id="last-backup-date" class="form-control" value="<?php echo isset($row['date_id']) ? ($row['date_id']) : ''; ?>" aria-labelledby="last-backup-date" name="date" readonly>

                                        <?php
                                        } else {
                                            // Handle the query error
                                            echo "no data";
                                        }

                                        // Close the database connection
                                        mysqli_close($data);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-grid">
                            <button type="submit" name="backup" id="backup-db" onclick="saveDate()" class="btn btn-primary btn-block mt-4"><i class="fas fa-download"></i> Backup
                                database</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <div class="col-md-5">
            <form enctype="multipart/form-data" id="frm-restore">
                <div class="card br-card">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center">Restore database</h4>
                        <div class="row">
                            <div class="col-md-3 justify-content-center">
                                <img src="img/database-restore.svg" class="br-icon" alt="Restore icon">
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="restore-file">Select file to restore:</label>
                                    </div>
                                    <div class="row">
                                        <input type="file" name="backup_file" class="form-control-file" id="restore-file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-grid">
                            <button type="button" name="restore" value="Restore" class="btn btn-primary btn-block mt-4" id="btn-restore" disabled><i class="fas fa-upload"></i> Restore database</button>
                        </div>
                    </div>

                </div>
            </form>


        </div>
    </div>

</section>

<div id="error"></div>



<!-- For disabling restore button if no file selected -->
<script>
    const fileInput = document.getElementById("restore-file");
    const uploadBtn = document.getElementById("btn-restore")

    fileInput.addEventListener("change", function() {
        console.log('hello')
        if (fileInput.files.length > 0) {
            uploadBtn.disabled = false;




            // <!-- ====== RESTORE DATABASE ====== -->
            $(document).ready(function() {

                $(uploadBtn).click(function() {
                    var form_data = new FormData($('#frm-restore')[0]);
                    $.ajax({
                        type: 'POST',
                        url: './Controller/process-restore-database.php',
                        data: form_data,
                        dataType: 'html',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $('#error').html(response)
                            $('body').append(response);
                            alert(response)
                        }
                    });
                });
            });


        } else {
            uploadBtn.disabled = true;
        }
    });
</script>

<!-- ====== BACKUP DATE ====== -->
<script>
    const backupButton = document.getElementById("backup-db");
    const lastBackupDate = document.getElementById("last-backup-date");
    const options = {
        year: 'numeric',
        month: 'numeric',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
        hour12: true,
        timeZone: 'Asia/Manila'
    };
    let formattedDate; // declare formattedDate variable here

    backupButton.addEventListener("click", function() {
        const currentDate = new Date();
        formattedDate = currentDate.toLocaleString('en-US', options); // assign value to formattedDate here
        console.log(formattedDate);



        lastBackupDate.value = currentDate.toLocaleString();
        const backupDate = currentDate.toISOString(); // format date for insertion into database

        // send AJAX request to save backup date to database
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'process/process-save-backup-date.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            console.log(this.responseText);
        };
        xhr.send('backup_date=' + backupDate);
    });
</script>

</body>

</html>


<?php
include('./partials/footer.php')
?>