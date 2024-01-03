<?php
// Database credentials
include('./db.php');

$date = $_POST['date'];

// Insert data using prepared statement
$insert = "INSERT INTO db_date (date_id) VALUES (?)";
$stmt = mysqli_prepare($data, $insert);
mysqli_stmt_bind_param($stmt, "s", $date);
$insert_query = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if ($insert_query) {
    // Export database
    $tables = array();
    $result = mysqli_query($data, 'SHOW TABLES');
    
    while ($row = mysqli_fetch_row($result)) {
        $tables[] = $row[0];
    }

    $sql = "";
    $sql .= 'DROP DATABASE IF EXISTS prime;';
    $sql .= 'CREATE DATABASE prime ;';
    $sql .= 'USE prime;';

    foreach ($tables as $table) {
        $result = mysqli_query($data, 'SELECT * FROM ' . $table);
        $num_fields = mysqli_num_fields($result);

        $sql .= 'DROP TABLE IF EXISTS ' . $table . ';';
        $row2 = mysqli_fetch_row(mysqli_query($data, 'SHOW CREATE TABLE ' . $table));
        $sql .= "\n\n" . $row2[1] . ";\n\n";

        $stmt = mysqli_prepare($data, 'SELECT * FROM ' . $table);
        mysqli_stmt_execute($stmt);
        $meta = mysqli_stmt_result_metadata($stmt);
        $params = array();
        while ($field = mysqli_fetch_field($meta)) {
            $params[] = &$row[$field->name];
        }
        call_user_func_array(array($stmt, 'bind_result'), $params);

        while (mysqli_stmt_fetch($stmt)) {
          $sql .= 'INSERT INTO ' . $table . ' VALUES (';
          foreach ($row as $key => $value) {
              $row[$key] = ($value !== null) ? addslashes($value) : null;
              $sql .= '"' . $row[$key] . '"';
              if ($key < ($num_fields - 1)) {
                  $sql .= ',';
              }
          }
          $sql .= ");\n";
      }

        mysqli_stmt_close($stmt);

        $sql .= "\n\n\n";
    }

    // Output file name
    $backup_file_name = "backup.sql";

    // Output headers
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . $backup_file_name);

    // Output file
    echo $sql;
    exit;
} else {
    echo "error";
}

































// // TRY THIS IF ITS limited to 100 only, delete this code
// // Database credentials
// include('./db.php');

// // Set a reasonable memory limit
// ini_set('memory_limit', '256M'); // Adjust the value as needed

// $date = $_POST['date'];

// // Insert data using prepared statement
// $insert = "INSERT INTO db_date (date_id) VALUES (?)";
// $stmt = mysqli_prepare($data, $insert);
// mysqli_stmt_bind_param($stmt, "s", $date);
// $insert_query = mysqli_stmt_execute($stmt);
// mysqli_stmt_close($stmt);

// if ($insert_query) {
//     // Export database
//     $tables = array();
//     $result = mysqli_query($data, 'SHOW TABLES');

//     while ($row = mysqli_fetch_row($result)) {
//         $tables[] = $row[0];
//     }

//     $sql = "";
//     $sql .= 'DROP DATABASE IF EXISTS prime;';
//     $sql .= 'CREATE DATABASE prime ;';
//     $sql .= 'USE prime;';

//     foreach ($tables as $table) {
//         $sql .= 'DROP TABLE IF EXISTS ' . $table . ';';
//         $row2 = mysqli_fetch_row(mysqli_query($data, 'SHOW CREATE TABLE ' . $table));
//         $sql .= "\n\n" . $row2[1] . ";\n\n";

//         $offset = 0;
//         $limit = 100; // Adjust the batch size as needed

//         do {
//             $result = mysqli_query($data, 'SELECT * FROM ' . $table . ' LIMIT ' . $offset . ',' . $limit);

//             // Process the data and generate SQL statements here...

//             $offset += $limit;
//         } while ($result && mysqli_num_rows($result) > 0);

//         $sql .= "\n\n\n";
//     }

//     // Output file name
//     $backup_file_name = "backup.sql";

//     // Output headers
//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename=' . $backup_file_name);

//     // Output file
//     echo $sql;
//     exit;
// } else {
//     echo "error";
// }

?>
