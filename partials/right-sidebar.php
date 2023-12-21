<div class="m-3" style="margin-right: 5rem; height: calc(100vh - 118px); background-color: #fbfcf8; width: 60rem; position: relative; overflow: auto">

    <div id="addInventoryIDBLOCK" style="display: none; position: absolute;">




        <form action="./Controller/addInventory_Controller.php" method="post" enctype="multipart/form-data">
            <div class="p-3">
                <div class="row">
                    <div>

                        <h5>Choose Category:</h5>
                        <select name="category" class="form-control" id="category">
                            <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                            <?php
                            $fund = "SELECT * FROM asset_db";
                            $result = $data->query($fund);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $row['Asset_Code'] ?>"><?php echo $row['Asset_Title'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Property Description</label>
                        <input class="form-control" style="color: gray; width: 100%" name="Property_Description" required></input>
                    </div>

                </div>

                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Locator</label>
                        <input class="form-control" style="color: gray; width: 100%" name="Locator" required></input>
                    </div>

                </div>

                <div class="row">
                    <div>

                    <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Account Number</label>

                        <input class="form-control" list="AssetNumbers" style="color: gray; width: 100%" id="ANum" name="Asset_Number" placeholder="Enter or select Account Number" required onchange="fetchAssetTitle(this.value)">
                        <datalist id="AssetNumbers">
                            <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                            <?php
                            $fund = "SELECT * FROM itemcategory_db";
                            $result = $data->query($fund);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $row['Account_Number'] ?>"><?php echo $row['Account_Number'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </datalist>
                    </div>

                </div>

                <div class="row">
                    <div>
                        <label style="margin-top: 10px;">Account Title</label>
                        <input class="form-control" style="color: gray; width: 100%" id="ATitle" name="Asset_Title" readonly></input>
                    </div>
                </div>

                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Estimated Useful Life</label>
                        <input class="form-control" type="text" id="Estimated_Useful_Life" style="color: gray; width: 100%" name="Estimated_Useful_Life" min="1" required></input>
                    </div>

                </div>

                        <label style="margin-top: 10px;">Current Property Number</label>
                        <input class="form-control" style="color: gray; width: 100%" value="" name="Current_Property_Number" required></input>
                    </div>

                </div>
<!-- 
                <div class="row">
                    <div>

                        <label>Old Property Number</label>
                        <input class="form-control" style="color: gray; width: 100%" name="Old_Property_Number" required></input>
                    </div>

                </div> -->

                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Unit of Measure</label>
                        <input class="form-control" style="color: gray; width: 100%" name="Unit_Measure" required></input>
                    </div>

                </div>

                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Unit Value</label>
                        <input class="form-control" type="text" style="color: gray; width: 100%" name="Unit_Value" required></input>
                    </div>

                </div>


                <div class="row">
                    <div>
                        <label style="margin-top: 10px;">Quantity</label>
                        <input class="form-control" type="number" style="color: gray; width: 100%" name="Quantity" value="1" min="1"></input>
                    </div>
                </div>


                <div class="row">
                    <div>
                        <label style="margin-top: 10px;">Year Acquired</label>
                        <input class="form-control" type="number" style="color: gray; width: 100%" name="Year_Acquired" placeholder="Enter year" max="<?php echo date('Y'); ?>" value="<?php echo isset($_GET['Year_Acquired']) ? $_GET['Year_Acquired'] : 2000; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div>
                        <label style="margin-top: 10px;">Date Acquired</label>
                        <input class="form-control" type="date" style="color: gray; width: 100%" name="Date_Acquired" required max="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>


                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Asset Category</label>

                        <input class="form-control" list="AssetCateg" style="color: gray; width: 100%" name="Asset_Category" placeholder="Enter or select Account Number" required onchange="fetchAssetTitle(this.value)">
                        <datalist id="AssetCateg">
                            <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                            <?php
                            $fund = "SELECT * FROM asset_db";
                            $result = $data->query($fund);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $row['Asset_Title'] ?>"><?php echo $row['Asset_Title'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </datalist>
                    </div>

                </div>






                

                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Issued To</label>
                        <input class="form-control" list="IssuedTo" style="color: gray; width: 100%" id="ANum" name="Issued_To" placeholder="Enter or select Account Number" required onchange="fetchAssetTitle(this.value)">
                        <datalist id="IssuedTo">
                            <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                            <?php
                            $fund = "SELECT * FROM users";
                            $result = $data->query($fund);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $row['user_id'] ?>"><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </datalist>
                    </div>

                </div>

                <!-- <div class="row">
                    <div>

                        <label>Issued From</label>
                        <input class="form-control" style="color: gray; width: 100%" name="Issued_From" required></input>
                    </div>

                </div> -->

                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">ARE/PAR/ICS Number</label>
                        <input class="form-control" style="color: gray; width: 100%" name="ARE_PAR_ICS_Number" required></input>
                    </div>

                </div>

                <!-- <div class="row">
                    <div>

                        <label>Cancelled ARE/PAR/ICS Number</label>
                        <input class="form-control" style="color: gray; width: 100%" name="Cancelled_Number" required></input>
                    </div>

                </div> -->



                <!-- <div class="row">
                    <div>

                        <label>PRS Number</label>
                        <input class="form-control" style="color: gray; width: 100%" name="PRS_Number" required></input>
                    </div>

                </div> -->

            
                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Fund Cluster</label>
                        <input class="form-control" style="color: gray; width: 100%" name="Fund_Cluster" required></input>
                    </div>


                </div>
                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Fund Admin Code</label>
                        <input class="form-control" list="AdminCode" style="color: gray; width: 100%" id="ACode" name="Fund_Admin_Code" placeholder="Enter or select Account Number" required onchange="fetchAssetTitle(this.value)">
                        <datalist id="AdminCode">
                            <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                            <?php
                            $fund = "SELECT * FROM fundcode_db";
                            $result = $data->query($fund);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $row['Fund_Admin_Code'] ?>"><?php echo $row['Fund_Admin_Code'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </datalist>
                    </div>

                </div>


                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Fund Admin Title</label>
                        <input class="form-control" style="color: gray; width: 100%" id="FTitle" name="Fund_Admin_Title" readonly></input>
                    </div>

                </div>

                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Supplier</label>
                        <input class="form-control" style="color: gray; width: 100%" name="Supplier" required></input>
                    </div>

                </div>

                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Purchase Order/Contract Number</label>
                        <input class="form-control" style="color: gray; width: 100%" name="Purchase_Order_Contract_Number" required></input>
                    </div>

                </div>

                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Acquired through</label>
                        <input class="form-control" style="color: gray; width: 100%" name="Acquired_through" required></input>
                    </div>

                </div>



                <div class="row">
                    <div>

                        <label style="margin-top: 10px;">Remarks</label>
                        <input class="form-control" style="color: gray; width: 100%" name="Remarks" required></input>
                    </div>

                </div>

                




                    <div >
                        <label style="margin-top: 10px;">Photo</label>
                        <input class="form-control" style="color: gray; width: 100%" type="file" name="image" accept="image/*" onchange="previewImage(this)">
                        <img id="photoPreview" src="#" alt="Preview" style="max-width: 100%; display: none;">
                    </div>
               
            </div>
            <button type="submit" class="btn btn-success" name="submit">Add Item</button>
        </form>



    </div>


    <!-- Add t

    <!-- JavaScript tab plugin -->
    <ul class="nav nav-tabs" id="js-tabs-1" role="tablist" style="display: none;">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="true">Details</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="edit-tab" data-bs-toggle="tab" data-bs-target="#edit-tab-pane" type="button" role="tab" aria-controls="edit-tab-pane" aria-selected="false">Edit</button>
        </li>

    </ul>
    <div class="tab-content" id="js-tabs-content-1">
        <div class="tab-pane fade show active" id="details-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div id="rightSidebar" style="display: none; position: absolute;">
                <img id="photo" alt="Image descriptions" style="height: 15rem;">

                <div class="p-3">


                    <div class="row">
                        <div>

                            <h5>Property Description</h5>
                            <p style="color: gray" id="propertyDescription"></p>
                        </div>

                    </div>
                    <div class="row">
                        <div>

                            <h5>Locator</h5>
                            <p style="color: gray" id="locator"></p>
                        </div>

                    </div>
                    <div class="row">
                        <div>

                            <h5>Current Property Number</h5>
                            <p style="color: gray" id="propertyNumber"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Old Property Number</h5>
                            <p style="color: gray" id="oldPropertyNumber"></p>
                        </div>

                    </div>
                    <div class="row">
                        <div>

                            <h5>Unit of Measure</h5>
                            <p style="color: gray" id="unitMeasure"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Unit Value</h5>
                            <p style="color: gray" name="Unit_Value" id="unitValue" data-unit="unit"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Quantity</h5>
                            <p style="color: gray" id="quantity"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Year Acquired</h5>
                            <p style="color: gray" id="yearAcquired"></p>
                        </div>

                    </div>
                    <div class="row">
                        <div>

                            <h5>Date Acquired</h5>
                            <p style="color: gray" id="dateAcquired"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Asset Category</h5>
                            <p style="color: gray" id="assetCategory"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Account Number</h5>
                            <p style="color: gray" id="assetNumber"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Account Title</h5>
                            <p style="color: gray" id="assetTitle"></p>
                        </div>

                    </div>
                    <div class="row">
                        <div>

                            <h5>Issued To</h5>
                            <p style="color: gray" id="issuedTo"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Issued From</h5>
                            <p style="color: gray" id="issuedFrom"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>ARE/PAR/ICS Number</h5>
                            <p style="color: gray" id="apiNumber"></p>
                        </div>

                    </div>
                    <div class="row">
                        <div>

                            <h5>Cancelled ARE/PAR/ICS Number</h5>
                            <p style="color: gray" id="cancelledAPI"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>PRS Number</h5>
                            <p style="color: gray" id="prsNumber"></p>
                        </div>

                    </div>


                    <div class="row">
                        <div>

                            <h5>Estimated Useful Life</h5>
                            <p style="color: gray" id="estimatedLife"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Fund Cluster</h5>
                            <p style="color: gray" id="fundCluster"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Fund Admin Code</h5>
                            <p style="color: gray" id="fundAdminCode"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Fund Admin Title</h5>
                            <p style="color: gray" id="fundAdmin"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Purchase Order/Contract Numbere</h5>
                            <p style="color: gray" id="purchaseOrder"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Supplier</h5>
                            <p style="color: gray" id="supplier"></p>
                        </div>

                    </div>
                    <div class="row">
                        <div>

                            <h5>Acquired through</h5>
                            <p style="color: gray" id="acquiredThrough"></p>
                        </div>

                    </div>



                    <div class="row">
                        <div>

                            <h5>Remarks</h5>
                            <p style="color: gray" id="remarks"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div>
                            <h5>Residual Value</h5>
                            <p style="color: gray" id="residualValue"></p>
                        </div>
                    </div>


                    <div class="row">
                        <div>
                            <h5>Depreciation</h5>
                            <p style="color: gray" id="depreciation"></p>
                        </div>
                    </div>



                    <div class="row">
                        <div>
                            <h5>Years Lapse</h5>
                            <p style="color: gray" id="yearLapse"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div>
                            <h5>Month Lapse</h5>
                            <p style="color: gray" id="monthLapse"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div>
                            <h5>Accumulated Depreciation as of today</h5>
                            <p style="color: gray" id="accu"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div>
                            <h5>Netbook value</h5>
                            <p style="color: gray" id="net"></p>
                        </div>
                    </div>






                </div>



            </div>
        </div>


        <!-- EDIT right side bar -->
        <div class="tab-pane fade" id="edit-tab-pane" role="tabpanel" aria-labelledby="account-tab" tabindex="0">
            <div id="rightSidebar2" style="display: none; position: absolute;">



                <form action="./Controller/editinventory_Controller.php" method="post" enctype="multipart/form-data">
                    <div class="p-3">
                        <div class="row">
                            <div>
                                <input type="hidden" id="idInventory" name="id" style="width: 100%"></input>

                                <h5>Property Description</h5>
                                <input style="color: gray; width: 100%" id="editPropertyDescription" name="Property_Description"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Locator</h5>
                                <input style="color: gray; width: 100%" name="Locator" id="editlocator"></input>
                            </div>

                        </div>
                        <div class="row">
                            <div>

                                <h5>Current Property Number</h5>
                                <input style="color: gray; width: 100%" name="Current_Property_Number" id="editpropertyNumber"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Old Property Number</h5>
                                <input style="color: gray; width: 100%" name="Old_Property_Number" id="editoldPropertyNumber"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Unit of Measure</h5>
                                <input style="color: gray; width: 100%" name="Unit_Measure" id="editunitMeasure"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Unit Value</h5>
                                <input style="color: gray; width: 100%" name="Unit_Value" id="editunitValue"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Quantity</h5>
                                <input style="color: gray; width: 100%" name="Quantity" id="editquantity" min="1"></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Year Acquired</h5>
                                <input style="color: gray; width: 100%" name="Year_Acquired" id="edityearAcquired"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Date Acquired</h5>
                                <input type="date" style="color: gray; width: 100%" name="Date_Acquired" id="editdateAcquired" max="<?php echo date('Y-m-d'); ?>">

                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Asset Category</h5>

                                <input list="AssetCateg" style="color: gray; width: 100%" name="Asset_Category" id="editassetCategory" placeholder="Enter or select Account Number" required onchange="fetchAssetTitle(this.value)">
                                <datalist id="AssetCateg">
                                    <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                                    <?php
                                    $fund = "SELECT * FROM asset_db";
                                    $result = $data->query($fund);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $row['Asset_Title'] ?>"><?php echo $row['Asset_Title'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </datalist>
                            </div>

                        </div>





                        <div class="row">
                            <div>

                                <h5>Account Number</h5>

                                <input list="AssetNumbers" style="color: gray; width: 100%" id="editassetNumber" name="Asset_Number" placeholder="Enter or select Account Number" required onchange="fetchAssetTitle(this.value)">
                                <datalist id="AssetNumbers">
                                    <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                                    <?php
                                    $fund = "SELECT * FROM itemcategory_db";
                                    $result = $data->query($fund);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $row['Account_Number'] ?>"><?php echo $row['Account_Number'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </datalist>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Account Title</h5>
                                <input style="color: gray; width: 100%" name="Asset_Title" id="editassetTitle"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Issued To</h5>
                                <input list="issuedToList" style="color: gray; width: 100%" name="Issued_To" id="editissuedTo"></input>
                                <datalist id="issuedToList">
                                    <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                                    <?php
                                    $fund = "SELECT * FROM users";
                                    $result = $data->query($fund);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $row['user_id'] ?>"><?php echo $row['first_name'] . $row['last_name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </datalist>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Issued From</h5>
                                <input style="color: gray; width: 100%" name="Issued_From" id="editissuedFrom"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>ARE/PAR/ICS Number</h5>
                                <input style="color: gray; width: 100%" name="ARE_PAR_ICS_Number" id="editapiNumber"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Cancelled ARE/PAR/ICS Number</h5>
                                <input style="color: gray; width: 100%" name="Cancelled_Number" id="editcancelledAPI"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>PRS Number</h5>
                                <input style="color: gray; width: 100%" name="PRS_Number" id="editprsNumber"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Estimated Useful Life</h5>
                                <input style="color: gray; width: 100%" name="Estimated_Useful_Life" id="editestimatedLife" min="1"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Fund Cluster</h5>
                                <input style="color: gray; width: 100%" name="Fund_Cluster" id="editfundCluster"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Fund Admin Code</h5>
                                <input list="AdminCode" style="color: gray; width: 100%" id="editfundAdminCode" name="Fund_Admin_Code" placeholder="Enter or select Account Number" required onchange="fetchAssetTitle(this.value)">
                                <datalist id="AdminCode">
                                    <option value="" disabled selected>Select an option</option> <!-- Empty option as a placeholder -->
                                    <?php
                                    $fund = "SELECT * FROM fundcode_db";
                                    $result = $data->query($fund);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $row['Fund_Admin_Code'] ?>"><?php echo $row['Fund_Admin_Code'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </datalist>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Fund Admin Title</h5>
                                <input style="color: gray; width: 100%" id="editfundAdmin" name="Fund_Admin_Title" readonly></input>
                            </div>

                        </div>



                        <div class="row">
                            <div>

                                <h5>Purchase Order/Contract Number</h5>
                                <input style="color: gray; width: 100%" name="Purchase_Order_Contract_Number" id="editpurchaseOrder"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Supplier</h5>
                                <input style="color: gray; width: 100%" name="Supplier" id="editsupplier"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Acquired through</h5>
                                <input style="color: gray; width: 100%" name="Acquired_through" id="editacquiredThrough"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Remarks</h5>
                                <input style="color: gray; width: 100%" name="Remarks" id="editremarks"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>
                                <h5>Photo</h5>
                                <input style="color: gray; width: 100%" type="file" name="image" accept="image/*" onchange="previewImage(this)">
                                <img id="photoPreview" src="#" alt="Preview" style="max-width: 100%; display: none;">
                            </div>
                        </div>






                    </div>
                    <button type="submit" class="btn btn-success">Update Item</button>
                </form>



            </div>
        </div>
    </div>







    <div id="empty" style="display: flex; align-items: center; justify-content: center; height: 100%; position: absolute; width: 100%">
        <img src="./img/BSC_LOGO.png" alt="wow such empty" height="300px" width="300px" style="position: relative;">
        <p style="position: absolute; bottom: 30px; text-align: center; width: 100%; margin: 0; color: #555; font-size: 18px;">Click view button to view details</p>
    </div>



</div>
<script>
    function previewImage(input) {
        var preview = document.getElementById('photoPreview');
        var file = input.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>






<script>
    // Add an event listener to the Account Number input field
    document.getElementById('ANum').addEventListener('change', function() {
        // Fetch the corresponding account title and estimated life from the database using AJAX
        var accountNumber = this.value;

        fetch('./partials/getAssetTitle.php?accountNumber=' + encodeURIComponent(accountNumber))
            .then(response => response.json())
            .then(data => {
                // Update the Account Title and Estimated Life input fields with the fetched data
                document.getElementById('ATitle').value = data.account_title;
                document.getElementById('Estimated_Useful_Life').value = data.estimated_life;
            })
            .catch(error => console.error('Error:', error));
    });
</script>


<script>
    // Add an event listener to the Account Number input field
    document.getElementById('ACode').addEventListener('change', function() {
        // Fetch the corresponding account title from the database using AJAX
        var adminCode = this.value;

        fetch('./partials/getAdminTitle.php?adminCode=' + encodeURIComponent(adminCode))
            .then(response => response.json())
            .then(data => {
                // Update the Account Title input field with the fetched data
                document.getElementById('FTitle').value = data.Fund_Admin_Title;
            })
            .catch(error => console.error('Error:', error));
    });
</script>

<script>
    // Add an event listener to the Account Number input field
    document.getElementById('editassetNumber').addEventListener('change', function() {
        // Fetch the corresponding account title from the database using AJAX
        var accountNumber = this.value;

        fetch('./partials/getAssetTitle.php?accountNumber=' + encodeURIComponent(accountNumber))
            .then(response => response.json())
            .then(data => {
                // Update the Account Title input field with the fetched data
                document.getElementById('editassetTitle').value = data.account_title;
            })
            .catch(error => console.error('Error:', error));
    });
</script>

<script>
    // Add an event listener to the Account Number input field
    document.getElementById('editfundAdminCode').addEventListener('change', function() {
        // Fetch the corresponding account title from the database using AJAX
        var adminCode = this.value;

        fetch('./partials/getAdminTitle.php?adminCode=' + encodeURIComponent(adminCode))
            .then(response => response.json())
            .then(data => {
                // Update the Account Title input field with the fetched data
                document.getElementById('editfundAdmin').value = data.Fund_Admin_Title;
            })
            .catch(error => console.error('Error:', error));
    });
</script>
<script defer>
    // console.log('unitValue', document.querySelector('#unitValue').innerHTML)
    // const unitValue = document.getElementById('unitValue').textContent;
    // const residualValue = Number.parseInt(unitValue) * 0.1;
    // document.getElementById('residualValue').textContent = residualValue;
    // window.onload = function() {
    // }
</script>
</body>

</html>