<div class="m-3" style="margin-right: 5rem; height: calc(100vh - 118px); background-color: #fbfcf8; width: 60rem; position: relative; overflow: auto">

<div id="addInventoryIDBLOCK" style="display: none; position: absolute;">



                <form action="./Controller/addinventory.php" method="post">
                    <div class="p-3">
                        

                        <div class="row">
                            <div>

                                <h5>Current Property Number</h5>
                                <input style="color: gray" style="width: 100%" name="Current_Property_Number"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Unit of Measure</h5>
                                <input style="color: gray" style="width: 100%" name="Unit_Measure" ></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Quantity</h5>
                                <input style="color: gray" style="width: 100%" name="Quantity"></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Date Acquired</h5>
                                <input style="color: gray" style="width: 100%" name="Date_Acquired" ></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Asset Number</h5>
                                <input style="color: gray" style="width: 100%" name="Asset_Number" ></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Issued To</h5>
                                <input style="color: gray" style="width: 100%" name="Issued_To" ></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>ARE/PAR/ICS Number</h5>
                                <input style="color: gray" style="width: 100%" name="ARE_PAR_ICS_Number" ></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>PRS Number</h5>
                                <input style="color: gray" style="width: 100%" name="PRS_Number"></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Fund Cluster</h5>
                                <input style="color: gray" style="width: 100%" name="Fund_Cluster" ></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Fund Admin Title</h5>
                                <input style="color: gray" style="width: 100%" name="Fund_Admin_Title" ></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Supplier</h5>
                                <input style="color: gray" style="width: 100%" name="Supplier" ></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Years Lapse</h5>
                                <input style="color: gray" style="width: 100%" name="" ></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Locator</h5>
                                <input style="color: gray" style="width: 100%" name="Locator" ></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Old Property Number</h5>
                                <input style="color: gray" style="width: 100%" name="Old_Property_Number" ></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Unit Value</h5>
                                <input style="color: gray" style="width: 100%" name="Unit_Value" ></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Year Acquired</h5>
                                <input style="color: gray" style="width: 100%" name="Year_Acquired" ></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Asset Category</h5>
                                <input style="color: gray" style="width: 100%" name="Asset_Category" ></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Asset Title</h5>
                                <input style="color: gray" style="width: 100%" name="Asset_Title"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Issued From</h5>
                                <input style="color: gray" style="width: 100%" name="Issued_From" ></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Cancelled ARE/PAR/ICS Number</h5>
                                <input style="color: gray" style="width: 100%" name="Cancelled_Number" ></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Estimated Useful Life</h5>
                                <input style="color: gray" style="width: 100%" name="Estimated_Useful_Life" ></input>
                            </div>

                        </div>


                        <div class="row">

                                <h5>Purchase Order/Contract Numbere</h5>
                                <input style="color: gray" style="width: 100%" name="Purchase_Order_Contract_Number" ></input>

                        </div>


                        <div class="row">

                                <h5>Acquired through</h5>
                                <input style="color: gray" style="width: 100%" name="Acquired_through" ></input>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Remarks</h5>
                                <input style="color: gray" style="width: 100%" name="Remarks" ></input>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Add Item</button>
                </form>



            </div>


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

                <div class="p-3">
                    <div class="row">
                        <div>

                            <h5>Property Description</h5>
                            <p style="color: gray" id="propertyDescription">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Current Property Number</h5>
                            <p style="color: gray" id="propertyNumber">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Unit of Measure</h5>
                            <p style="color: gray" id="unitMeasure">: 5</p>
                        </div>

                    </div>


                    <div class="row">
                        <div>

                            <h5>Quantity</h5>
                            <p style="color: gray" id="quantity">: 5</p>
                        </div>

                    </div>


                    <div class="row">
                        <div>

                            <h5>Date Acquired</h5>
                            <p style="color: gray" id="dateAcquired">: 5</p>
                        </div>

                    </div>


                    <div class="row">
                        <div>

                            <h5>Asset Number</h5>
                            <p style="color: gray" id="assetNumber">: 5</p>
                        </div>

                    </div>


                    <div class="row">
                        <div>

                            <h5>Issued To</h5>
                            <p style="color: gray" id="issuedTo">: 5</p>
                        </div>

                    </div>


                    <div class="row">
                        <div>

                            <h5>ARE/PAR/ICS Number</h5>
                            <p style="color: gray" id="apiNumber">: 5</p>
                        </div>

                    </div>


                    <div class="row">
                        <div>

                            <h5>PRS Number</h5>
                            <p style="color: gray" id="prsNumber">: 5</p>
                        </div>

                    </div>


                    <div class="row">
                        <div>

                            <h5>Fund Cluster</h5>
                            <p style="color: gray" id="fundCluster">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Fund Admin Title</h5>
                            <p style="color: gray" id="fundAdmin">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Supplier</h5>
                            <p style="color: gray" id="supplier">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Years Lapse</h5>
                            <p style="color: gray" id="yearLapse">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Locator</h5>
                            <p style="color: gray" id="locator">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Old Property Number</h5>
                            <p style="color: gray" id="oldPropertyNumber">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Unit Value</h5>
                            <p style="color: gray" id="unitValue">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Year Acquired</h5>
                            <p style="color: gray" id="yearAcquired">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Asset Category</h5>
                            <p style="color: gray" id="assetCategory">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Asset Title</h5>
                            <p style="color: gray" id="assetTitle">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Issued From</h5>
                            <p style="color: gray" id="issuedFrom">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Cancelled ARE/PAR/ICS Number</h5>
                            <p style="color: gray" id="cancelledAPI">: 5</p>
                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h5>Estimated Useful Life</h5>
                            <p style="color: gray" id="estimatedLife">: 5</p>
                        </div>

                    </div>


                    <div class="row">
                        <div>

                            <h5>Purchase Order/Contract Numbere</h5>
                            <p style="color: gray" id="purchaseOrder">: 5</p>
                        </div>

                    </div>


                    <div class="row">
                        <div>

                            <h5>Acquired through</h5>
                            <p style="color: gray" id="acquiredThrough">: 5</p>
                        </div>

                    </div>


                    <div class="row">
                        <div>

                            <h5>Remarks</h5>
                            <p style="color: gray" id="remarks">: 5</p>
                        </div>

                    </div>
                </div>



            </div>
        </div>


        <!-- EDIT right side bar -->
        <div class="tab-pane fade" id="edit-tab-pane" role="tabpanel" aria-labelledby="account-tab" tabindex="0">
            <div id="rightSidebar2" style="display: none; position: absolute;">



                <form action="./Controller/editinventory_Controller.php" method="post">
                    <div class="p-3">
                        <div class="row">
                            <div>
                                <input type="hidden" id="idInventory" name="id" style="width: 100%"></input>

                                <h5>Property Description</h5>
                                <input id="editPropertyDescription" name="Property_Description" style="width: 100%"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Current Property Number</h5>
                                <input style="color: gray" style="width: 100%" name="Current_Property_Number" id="editpropertyNumber"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Unit of Measure</h5>
                                <input style="color: gray" style="width: 100%" name="Unit_Measure" id="editunitMeasure"></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Quantity</h5>
                                <input style="color: gray" style="width: 100%" name="Quantity" id="editquantity"></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Date Acquired</h5>
                                <input style="color: gray" style="width: 100%" name="Date_Acquired" id="editdateAcquired"></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Asset Number</h5>
                                <input style="color: gray" style="width: 100%" name="Asset_Number" id="editassetNumber"></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Issued To</h5>
                                <input style="color: gray" style="width: 100%" name="Issued_To" id="editissuedTo"></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>ARE/PAR/ICS Number</h5>
                                <input style="color: gray" style="width: 100%" name="ARE_PAR_ICS_Number" id="editapiNumber"></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>PRS Number</h5>
                                <input style="color: gray" style="width: 100%" name="PRS_Number" id="editprsNumber"></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Fund Cluster</h5>
                                <input style="color: gray" style="width: 100%" name="Fund_Cluster" id="editfundCluster"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Fund Admin Title</h5>
                                <input style="color: gray" style="width: 100%" name="Fund_Admin_Title" id="editfundAdmin"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Supplier</h5>
                                <input style="color: gray" style="width: 100%" name="Supplier" id="editsupplier"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Years Lapse</h5>
                                <input style="color: gray" style="width: 100%" name="" id="edityearLapse"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Locator</h5>
                                <input style="color: gray" style="width: 100%" name="Locator" id="editlocator"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Old Property Number</h5>
                                <input style="color: gray" style="width: 100%" name="Old_Property_Number" id="editoldPropertyNumber"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Unit Value</h5>
                                <input style="color: gray" style="width: 100%" name="Unit_Value" id="editunitValue"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Year Acquired</h5>
                                <input style="color: gray" style="width: 100%" name="Year_Acquired" id="edityearAcquired"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Asset Category</h5>
                                <input style="color: gray" style="width: 100%" name="Asset_Category" id="editassetCategory"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Asset Title</h5>
                                <input style="color: gray" style="width: 100%" name="Asset_Title" id="editassetTitle"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Issued From</h5>
                                <input style="color: gray" style="width: 100%" name="Issued_From" id="editissuedFrom"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Cancelled ARE/PAR/ICS Number</h5>
                                <input style="color: gray" style="width: 100%" name="Cancelled_Number" id="editcancelledAPI"></input>
                            </div>

                        </div>

                        <div class="row">
                            <div>

                                <h5>Estimated Useful Life</h5>
                                <input style="color: gray" style="width: 100%" name="Estimated_Useful_Life" id="editestimatedLife"></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Purchase Order/Contract Numbere</h5>
                                <input style="color: gray" style="width: 100%" name="Purchase_Order_Contract_Number" id="editpurchaseOrder"></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Acquired through</h5>
                                <input style="color: gray" style="width: 100%" name="Acquired_through" id="editacquiredThrough"></input>
                            </div>

                        </div>


                        <div class="row">
                            <div>

                                <h5>Remarks</h5>
                                <input style="color: gray" style="width: 100%" name="Remarks" id="editremarks"></input>
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