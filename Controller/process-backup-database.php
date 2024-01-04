<?php
include('./db.php');

$date = $_POST['date'];

$insert = "INSERT INTO db_date (date_id) VALUES (?)";
$stmt = mysqli_prepare($data, $insert);
mysqli_stmt_bind_param($stmt, "s", $date);
$insert_query = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if ($insert_query) {
    $tables = array();
    $result = mysqli_query($data, 'SHOW TABLES');

    while ($row = mysqli_fetch_row($result)) {
        $tables[] = $row[0];
    }

    $backup_file_name = "backup.sql";

    $handle = fopen($backup_file_name, 'w');

    fwrite($handle, "DROP DATABASE IF EXISTS prime;\nCREATE DATABASE prime ;\nUSE prime;\n\n");

    foreach ($tables as $table) {
        $result = mysqli_query($data, 'SELECT * FROM ' . $table);
        $num_fields = mysqli_num_fields($result);

        $row2 = mysqli_fetch_row(mysqli_query($data, 'SHOW CREATE TABLE ' . $table));
        fwrite($handle, "DROP TABLE IF EXISTS " . $table . ";\n" . $row2[1] . ";\n\n");

        while ($row = mysqli_fetch_assoc($result)) {
            $values = array_map(function ($value) {
                return ($value !== null) ? "'" . addslashes($value) . "'" : 'NULL';
            }, $row);

            $sql = 'INSERT INTO ' . $table . ' (' . implode(', ', array_keys($row)) . ') VALUES (' . implode(', ', $values) . ");\n";
            fwrite($handle, $sql);
        }

        fwrite($handle, "\n\n\n");
    }

    fclose($handle);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . $backup_file_name);

    readfile($backup_file_name);

    unlink($backup_file_name);

    exit;
} else {
    echo "error";
}
?>























