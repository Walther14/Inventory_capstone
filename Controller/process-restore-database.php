<?php
$backup_file = $_FILES['backup_file']['tmp_name'];

// Create connection
$conn = mysqli_connect("localhost", "root", "", "prime");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Disable foreign key checks
mysqli_query($conn, "SET foreign_key_checks = 0");

// Drop all tables
$result = mysqli_query($conn, "SHOW TABLES");
while ($row = mysqli_fetch_row($result)) {
    mysqli_query($conn, "DROP TABLE IF EXISTS " . $row[0]);
}

// Read backup file
$sql = file_get_contents($backup_file);

// Execute SQL statements
if (mysqli_multi_query($conn, $sql)) {
    $skipping = false;
    do {
        // Fetch result set
        if ($result = mysqli_store_result($conn)) {
            if (!$skipping) {
                mysqli_free_result($result);
            } else {
                $skipping = false;
            }
        } elseif (mysqli_more_results($conn)) {
            if (mysqli_errno($conn) == 1068) { // Duplicate primary key error code
                $skipping = true;
            }
        }
    } while (mysqli_next_result($conn));

    // Enable foreign key checks
    mysqli_query($conn, "SET foreign_key_checks = 1");

    // Close connection
    mysqli_close($conn);

    // Display success message using SweetAlert
?>
    <script>
        Swal.fire({
            title: 'Database restored successfully!',
            icon: 'success'
        }).then(function() {
            window.location = 'index.php';
        });
    </script>
<?php
} else {
    // Display error message using SweetAlert
?>
    <script>
        Swal.fire({
            title: 'Error restoring database!',
            text: '" . mysqli_error($conn) . "',
            icon: 'error'
        });
    </script>
<?php
}
?>