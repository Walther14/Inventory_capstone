<?php
session_start();

// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

include './Controller/db.php';
// include 'partials/header.php';
// include 'partials/sidebar.php';
// include 'partials/topbar.php';
// header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // takes raw data from the request 
    $json = file_get_contents('php://input');
    // Converts it into a PHP object 
    $data_client = json_decode($json, true);
    // echo json_encode($data);
    $client_id = htmlspecialchars($data_client['id']);


    try {
        $data->begin_transaction();
        $selectStmt = $data->prepare("SELECT * FROM inventory_db WHERE id = ?");
        $selectStmt->bind_param("i", $client_id);
        $selectStmt->execute();

        $result = $selectStmt->get_result();

        if ($result->num_rows > 0) {
            // echo json_encode(["empty"=>[...$result->fetch_assoc()]]);
            // var_dump($result->fetch_assoc()['id']);
            // $row = $result->fetch_assoc();
            while ($row = $result->fetch_assoc()) {
                $insertStmt = $data->prepare("INSERT INTO archive_db (Property_Description, Locator, Current_Property_Number, Old_Property_Number, Unit_Measure, Unit_Value, Quantity, Year_Acquired, Date_Acquired, Asset_Category, Asset_Number, Asset_Title, Issued_To, Issued_From, ARE_PAR_ICS_Number, Cancelled_Number, PRS_Number, Estimated_Useful_Life, Fund_Cluster, Fund_Admin_Code, Fund_Admin_Title, Purchase_Order_Contract_Number, Supplier, Acquired_Through, Monthly_Dep, Residual_Value, Year_Lapsed, Remarks, photo)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $insertStmt->bind_param("sssssssssssssssssssssssssssss", $row['Property_Description'], $row['Locator'], $row['Current_Property_Number'], $row['Old_Property_Number'], $row['Unit_Measure'], $row['Unit_Value'], $row['Quantity'], $row['Year_Acquired'], $row['Date_Acquired'], $row['Asset_Category'], $row['Asset_Number'], $row['Asset_Title'], $row['Issued_To'], $row['Issued_From'], $row['ARE_PAR_ICS_Number'], $row['Cancelled_Number'], $row['PRS_Number'], $row['Estimated_Useful_Life'], $row['Fund_Cluster'], $row['Fund_Admin_Code'], $row['Fund_Admin_Title'], $row['Purchase_Order_Contract_Number'], $row['Supplier'], $row['Acquired_Through'], $row['Monthly_Dep'], $row['Residual_Value'], $row['Year_Lapsed'], $row['Remarks'], $row['photo']);
                $inserted = $insertStmt->execute();
                // var_dump($row['Locator']);
            }
            echo json_encode(["success"=>  true]);
            // var_dump($row[0]['locator']);
        } else {
            // var_dump("Empty");
            echo json_encode(["empty" => "true"]);
        }
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
        // var_dump("Error");
    }
    // echo json_encode($_POST);
    // if (isset($_POST['id'])) {
    //     $itemId = mysqli_real_escape_string($conn, $_POST['id']);


    // Move the item from inventory_db to archive_db based on the item ID
    //         try {
    //             $conn->begin_transaction();

    //             $selectStmt = $conn->prepare("SELECT * FROM inventory_db WHERE id = ?");
    //             $selectStmt->bind_param("i", $itemId);
    //             $selectStmt->execute();
    //             $result = $selectStmt->get_result();

    //             if ($result->num_rows > 0) {
    //                 $row = $result->fetch_assoc();

    //                 // Insert into archive_db
    //                 $insertStmt = $conn->prepare("INSERT INTO archive_db (Property_Description, Locator, Current_Property_Number, Old_Property_Number, Unit_Measure, Unit_Value, Quantity, Year_Acquired, Date_Acquired, Asset_Category, Asset_Number, Asset_Title, Issued_To, Issued_From, ARE_PAR_ICS_Number, Cancelled_Number, PRS_Number, Estimated_Useful_Life, Fund_Cluster, Fund_Admin_Code, Fund_Admin_Title, Purchase_Order_Contract_Number, Supplier, Acquired_through, Remarks, photo)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    //                 $insertStmt->bind_param("ssssssssssssssssssssssssss", $row['Property_Description'], $row['Locator'], $row['Current_Property_Number'], $row['Old_Property_Number'], $row['Unit_Measure'], $row['Unit_Value'], $row['Quantity'], $row['Year_Acquired'], $row['Date_Acquired'], $row['Asset_Category'], $row['Asset_Number'], $row['Asset_Title'], $row['Issued_To'], $row['Issued_From'], $row['ARE_PAR_ICS_Number'], $row['Cancelled_Number'], $row['PRS_Number'], $row['Estimated_Useful_Life'], $row['Fund_Cluster'], $row['Fund_Admin_Code'], $row['Fund_Admin_Title'], $row['Purchase_Order_Contract_Number'], $row['Supplier'], $row['Acquired_through'], $row['Remarks'], $row['photo']);

    //                 if ($insertStmt->execute()) {
    //                     // Delete the item from inventory_db after moving it to archive_db
    //                     $deleteStmt = $conn->prepare("DELETE FROM inventory_db WHERE id = ?");
    //                     $deleteStmt->bind_param("i", $itemId);

    //                     if ($deleteStmt->execute()) {
    //                         $conn->commit();
    //                         echo json_encode(["message"=>"successful"])
    // ;                    } else {
    //                         // Log the error to a server log
    //                         error_log("Error deleting item: " . $deleteStmt->error);
    //                         echo json_encode(["message"=>"successfula"]);
    //                     }

    //                     $deleteStmt->close();
    //                 } else {
    //                     // Log the error to a server log
    //                     error_log("Error archiving item: " . $insertStmt->error);
    //                     echo json_encode(["message"=>"successfuaa"]);
    //                 }

    //                 $insertStmt->close();
    //             } else {
    //                 echo json_encode(["message"=>"successfuasl"]);
    //             }

    //             $selectStmt->close();
    //         } catch (Exception $e) {
    //             // Handle exceptions, log the error, and rollback the transaction
    //             $conn->rollback();
    //             error_log("Transaction error: " . $e->getMessage());
    //             echo json_encode(["message"=>"successfulads"]);
    //             echo $e->getMessage();
    //         }

    //         $conn->close();
    //     try {
    //         echo json_encode(['message' => 'hello']);
    //     } catch (Exception $e) {
    //         echo json_encode(['message'=>'error occured-in server']);
    //     }

    // } else {
    //     echo json_encode(["message" => "post request"]);
    // }
} else {
    echo json_encode(["message" => "GET REQUEST"]);
}
