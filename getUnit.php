<?php
// getUnitValue.php

// Include your database connection file
@include('Controller/db.php');

// Fetch unit value and unit measure based on the provided description
if (isset($_GET['Current_Property_Number'])) {
    $description = $_GET['Current_Property_Number'];
    $query = "SELECT Unit_value, Unit_Measure, Asset_Number, Date_Acquired, Property_Description, Quantity, Asset_Title, ARE_PAR_ICS_Number FROM inventory_db WHERE Current_Property_Number = ?";
    
    $stmt = $data->prepare($query);
    $stmt->bind_param('s', $description);
    $stmt->execute();
    $stmt->bind_result($unitValue, $unitMeasure, $assetNum, $dateAcquired, $desc, $quan, $assetTitle, $ARE);
    
    if ($stmt->fetch()) {
        echo json_encode(['unit_value' => $unitValue, 'unit_measure' => $unitMeasure, 'property_description' => $desc, 'quantity' => $quan, 'asset_number' => $assetNum, 'asset_title' => $assetTitle,'are_par_ics_number' => $ARE, 'date_acquired' => $dateAcquired]);
    } else {
        echo json_encode(['unit_value' => '', 'unit_measure' => '' , 'property_description' => '','quantity' => '', 'asset_number' => '',  'date_acquired' => '']); // Return empty strings if no matching record found
    }

    $stmt->close();
} else {
    echo json_encode(['unit_value' => '', 'unit_measure' => '', 'property_description' => '', 'quantity' => '', 'asset_number' => '',  'date_acquired' => '']); // Return empty strings if no description provided
}
?>
