<?php
// Database credentials
include('./db.php');


$date = $_POST['date'];

$insert = "INSERT INTO db_date (date_id) VALUES ('$date')";
$insert_query = mysqli_query($data, $insert);

if($insert_query){


// Export database
$tables = array();
$result = mysqli_query($data, 'SHOW TABLES');
while($row = mysqli_fetch_row($result)) {
  $tables[] = $row[0];
}

$sql = "";
$sql .= 'DROP DATABASE IF EXISTS prime;';
$sql .= 'CREATE DATABASE prime ;';
$sql .= 'use prime;';
foreach($tables as $table) {
  $result = mysqli_query($data, 'SELECT * FROM '.$table);
  $num_fields = mysqli_num_fields($result);

  $sql .= 'DROP TABLE IF EXISTS '.$table.';';
  $row2 = mysqli_fetch_row(mysqli_query($data, 'SHOW CREATE TABLE '.$table));
  $sql .= "\n\n".$row2[1].";\n\n";

  for($i = 0; $i < $num_fields; $i++) {
    while($row = mysqli_fetch_row($result)) {
      $sql .= 'INSERT INTO '.$table.' VALUES(';
      for($j = 0; $j < $num_fields; $j++) {
        $row[$j] = addslashes($row[$j]);
        if(isset($row[$j])) {
          $sql .= '"'.$row[$j].'"';
        } else {
          $sql .= '""';
        }
        if($j < ($num_fields-1)) {
          $sql .= ',';
        }
      }
      $sql .= ");\n";
    }
  }
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
}else{
    echo "error";
}

?>