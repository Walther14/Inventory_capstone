<body class="ps-md-sbwidth">
  <!-- Sidebar -->
  <nav class="sidebar offcanvas-start offcanvas-md" tabindex="-1" id="sidebar-example" style="background-color: rgb(255, 255, 255); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 0 1px 0 rgba(0, 0, 0, 0.19); border-right: none  ;">
    <div class="offcanvas-header border-bottom border-secondary border-opacity-25" style="padding: 4px; background-image:url('./img/red.png')">

      <li class="nav-item dropdown">
        <img src="./img/user.png" class="nav-link dropdown-toggle" title="click to access back up and restore, log out and manage account" style="margin: 0; padding: 0; margin-left: 10px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" height="50" width="50">


        <ul class="dropdown-menu dropdown-menu-end mt-md-2 rounded-top-0">

          <li><a class="dropdown-item" href="./backupAndRestore.php">
          <li>
            <hr class="dropdown-divider">
          </li>
          <span>
            <span>
              <i class="fa-solid  fa-download"></i>
            </span>
          </span>
          Backup and Restore
          </a>
      </li>
      <li><a class="dropdown-item" href="./logout.php">
      <li>
        <hr class="dropdown-divider">
      </li>
      <span>
        <span>
          <i class="fa-solid  fa-right-from-bracket" data-bs-title="Logout"></i>
        </span>
      </span>
      Logout
      </a>
      </li>
      <li><a class="dropdown-item" href="manageAccout.php">
      <li>
        <hr class="dropdown-divider">
      </li>

      <span>
        <i class="fa-solid  fa-user"></i>
      </span>
      </span>
      Manage Account
      </a>
      </li>
      <li><a class="dropdown-item" href="./manual.php">
      <li>
        <hr class="dropdown-divider">
      </li>
      <span>
        <span>
          <i class="fa-solid  fa-book"></i>
        </span>
      </span>
      Manual
      </a>
      </li>

      </ul>
      </li>
      <a class="sidebar-brand" href="#">
        <img src="./img/prime.png" alt="Logo" height="45" style="margin-right: 0;">
      </a>
      <button type="button" class="btn-close d-md-none" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#sidebar-example"></button>
    </div>

    <div class="" style="background-color:bisque">





      <div class="d-flex">

        <div class="col-4" style=" background-image:url('./img/side.png'); height: 100vh; border-right: solid 1px; width: 75px; margin-top: 0; padding-top: 2rem; display: flex; justify-content: center;">
          <ul id="gyatt">


            <li class="icon" type="button" id="general" style="margin-top: 0rem;">
              <span>
                <i class="fa-solid  fa-cubes" style="font-size: 30px;" title="click to view dashboard, inventory and user management"></i>
              </span>
            </li>



            <li class="icon" type="button" id="dropdown" style="margin-bottom: 0rem;">
              <span>
                <i class="fa-solid  fa-sitemap" style="font-size: 30px;" title="click to view assets, item category and fund code"></i>
              </span>
            </li>



            <li class="icon" type="button" id="something" type="button" style="margin-bottom: 0rem;">
              <span>
                <i class="fa-solid  fa-file-alt" style="font-size: 30px;" title="click to view reports and forms"></i>
              </span>
            </li>

            <li class="icon" type="button" id="d" style="margin-bottom: 0rem;">
              <span>
                <i class="fa-solid  fa-map-marker-alt" style="font-size: 30px;" title="click to view locator"></i>
              </span>
            </li>

            <!-- <li class="icon" type="button" id="backup" type="button" style="margin-bottom: 0rem;">
              <span>
                <i class="fa-solid  fa-download" style="font-size: 30px;"></i>
              </span>
            </li> -->



            <li class="icon position-relative" type="button" class="btn btn-primary" id="trans" style="margin-bottom: 0rem;">
              <span>
                <i class="fa-solid  fa-exchange-alt" style="font-size: 30px;" title="click to view requests of transfer"></i>
              </span>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php
                $sql = "SELECT COUNT(*) as row_count FROM transfer_db
                                                    WHERE transfer_db.archive IS NULL";
                $result = $data->query($sql);

                // Fetch the row count
                $row = $result->fetch_assoc();
                $rowCount = $row['row_count'];

                // Output the row count
                echo $rowCount;
                ?>
              </span>
            </li>


            <li class="icon" type="button" id="archives" type="button" style="margin-bottom: 0rem;">
              <span>
                <i class="fa-solid fa-box-archive" style="font-size: 30px;" title="click to view archive"></i>
              </span>
            </li>



            <!-- <li class="icon" type="button" id="backup" type="button" style="margin-bottom: 0rem;">
              <a href="./logout.php" style="color: none;">
                <span>
                  <i class="fa-solid  fa-right-from-bracket" style="font-size: 30px;" data-bs-title="Logout"></i>
                </span>
              </a>
            </li> -->




          </ul>
        </div>

        <div class="col-6" <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/inventory_index.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/User_Management.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/index.php' ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem; display: none;"'; ?> id="sidenav1">
        <style>
    .sidebar-nav .nav-item.active a {
        display: block;
        background-color: white;
        color: maroon; /* Change this to the desired text color for the active link */
        padding: 10px; /* Adjust the padding as needed */
        width: 200px;
        border-radius: 8px; /* Set a fixed width for the background color */
        /* Add any other styles for the active link here */
    }
</style>


    <ul style="width: 150%; position: relative; overflow:hidden; display: flex; align-items:center; justify-content:center">
        <ul class="sidebar-nav">

            <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/index.php' ? 'active' : ''; ?>">
                <a class="nav-link" href="./index.php" aria-current="page">Dashboard</a>
            </li>

            <li>
                <hr class="sidebar-divider">
            </li>

            <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/inventory_index.php' ? 'active' : ''; ?>">
                <a class="nav-link" href="./inventory_index.php" aria-current="page">Inventory</a>
            </li>

            <li>
                <hr class="sidebar-divider">
            </li>

            <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/User_Management.php' ? 'active' : ''; ?>">
                <a class="nav-link " href="./User_Management.php" aria-current="page">User Management</a>
            </li>

            <li>
                <hr class="sidebar-divider">
            </li>
        </ul>
    </ul>
</div>




<div class="col-6" <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/Asset_Class.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/item_Category.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/fund.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/staff.php' ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem; display: none;"'; ?> id="sidenav2">
    <style>
        .sidenav2-nav .nav-item.active a {
            display: block;
            background-color: white;
            color: maroon; /* Change this to the desired text color for the active link */
            padding: 10px; /* Adjust the padding as needed */
            width: 150px; /* Set a fixed width for the background color */
            border-radius: 8px; /* Adjust the border-radius for rounded corners */
            /* Add any other styles for the active link here */
        }
    </style>
    <ul style="width: 150%; position: relative; overflow:hidden; display: flex; align-items:center; justify-content:center">
        <li>
            <ul class="sidebar-nav sidenav2-nav">
                
                <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/Asset_Class.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="./Asset_Class.php" aria-current="page">Asset</a>
                </li>

                <li>
                    <hr class="sidebar-divider">
                </li>

                <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/item_Category.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="./item_Category.php" aria-current="page">Item Category</a>
                </li>

                <li>
                    <hr class="sidebar-divider">
                </li>

                <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/fund.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="./fund.php" aria-current="page">Fund Code</a>
                </li>

                <li>
                    <hr class="sidebar-divider">
                </li>
            </ul>
        </li>
    </ul>
</div>



<div class="col-6" <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/totalinven.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/inspection_report.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/waste_report.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/physicalcount_inventoriesReport.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/components/inspectionAndAcceptanceReport.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/formsContainer.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/physicalcount_property.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/PreAndPost_report.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/physicalcount_semiReport.php'  ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem;  display: none;"'; ?> id="sidenav3">
    <style>
        .sidenav3-nav .nav-item.active a {
            display: block;
            background-color: white;
            color: maroon; /* Change this to the desired text color for the active link */
            padding: 10px; /* Adjust the padding as needed */
            width: 220px; /* Set a fixed width for the background color */
            border-radius: 8px; /* Adjust the border-radius for rounded corners */
            /* Add any other styles for the active link here */
        }
    </style>
    <ul style="width: 150%; position: relative; overflow:hidden; display: flex; align-items:center; justify-content:center">
        <li>
            <ul class="sidebar-nav sidenav3-nav">
               
                <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/physicalcount_inventoriesReport.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="./physicalcount_inventoriesReport.php" aria-current="page">Inventory Report</a>
                </li>
                <li>
                    <hr class="sidebar-divider">
                </li>
                <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/physicalcount_semiReport.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="./physicalcount_semiReport.php" aria-current="page">Semi-Expendable Property</a>
                </li>
                <li>
                    <hr class="sidebar-divider">
                </li>
                <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/physicalcount_property.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="./physicalcount_property.php" aria-current="page">Property Plant Equipment</a>
                </li>
                <li>
                    <hr class="sidebar-divider">
                </li>
                <br>
                <li>
                    <hr class="sidebar-divider">
                </li>
                <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/formsContainer.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="./formsContainer.php" aria-current="page">FORMS</a>
                </li>
                <li>
                    <hr class="sidebar-divider">
                </li>
                <br>
                <li>
                    <hr class="sidebar-divider">
                </li>
                <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/totalinven.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="./totalinven.php" aria-current="page">Report on Count</a>
                </li>
                <li>
                    <hr class="sidebar-divider">
                </li>
                <li class="nav-item">
                </li>
            </ul>
        </li>
    </ul>
</div>



<div class="col-6" <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/locator.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/dorm.php' ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem; display: none; position: relative"'; ?> id="sidenav4">
    <style>
        .sidenav4-nav .nav-item.active a {
            display: block;
            background-color: white;
            color: maroon; /* Change this to the desired text color for the active link */
            padding: 10px; /* Adjust the padding as needed */
            width: 150px; /* Set a fixed width for the background color */
            border-radius: 8px; /* Adjust the border-radius for rounded corners */
            /* Add any other styles for the active link here */
        }
    </style>
    <ul style="width: 150%; position: relative; overflow:hidden; display: flex; align-items:center; justify-content:center">
        <li>
            <ul class="sidebar-nav sidenav4-nav">
            
                <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/locator.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="./locator.php" aria-current="page">BSC Campus</a>
                </li>
                <li>
                    <hr class="sidebar-divider">
                </li>
                <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/dorm.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="./dorm.php" aria-current="page">Dorm</a>
                </li>
                <li>
                    <hr class="sidebar-divider">
                </li>
            </ul>
        </li>
    </ul>
</div>




<div class="col-6" <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/transfer.php' ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem; display: none; position: relative"'; ?> id="sidenav5">
    <style>
        .sidenav5-nav .nav-item.active a {
            display: block;
            background-color: white;
            color: maroon; /* Change this to the desired text color for the active link */
            padding: 10px; /* Adjust the padding as needed */
            width: 200px; /* Set a fixed width for the background color */
            border-radius: 8px; /* Adjust the border-radius for rounded corners */
            /* Add any other styles for the active link here */
        }
    </style>
    <ul style="width: 150%; position: relative; overflow:hidden; display: flex; align-items:center; justify-content:center">
        <li>
            <ul class="sidebar-nav sidenav5-nav">
                <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/transfer.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="./transfer.php" aria-current="page">Transfer Requests</a>
                </li>
                <li>
                    <hr class="sidebar-divider">
                </li>
            </ul>
        </li>
    </ul>
</div>


<div class="col-6" <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/archive.php' ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem; display: none; position: relative"'; ?> id="sidenav6">
    <style>
        .sidenav6-nav .nav-item.active a {
            display: block;
            background-color: white;
            color: maroon; /* Change this to the desired text color for the active link */
            padding: 10px; /* Adjust the padding as needed */
            width: 150px; /* Set a fixed width for the background color */
            border-radius: 8px; /* Adjust the border-radius for rounded corners */
            /* Add any other styles for the active link here */
        }
    </style>
    <ul style="width: 150%; position: relative; overflow:hidden; display: flex; align-items:center; justify-content:center">
        <li>
            <ul class="sidebar-nav sidenav6-nav">
                <li class="nav-item <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/archive.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="./archive.php" aria-current="page">Archive</a>
                </li>
                <li>
                    <hr class="sidebar-divider">
                </li>
            </ul>
        </li>
    </ul>
</div>















      </div>

    </div>
  </nav>


  <!-- Sidebar toggle -->
  <button type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar-example" class="btn btn-secondary d-md-none">
    <i class="fa-light fa-sidebar me-1"></i> Sidebar
  </button>

</body>

















<!--<li>
          <hr class="sidebar-divider">
        </li> -->


<!-- dropdown -->
<!-- <div class="dropdown">
          <a href="#" class="btn btn-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tables
          </a>
          <ul class="dropdown-menu">
            <li>
              <h6 class="dropdown-header"></h6>
            </li>
            <li></li>
        
     
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><span class="dropdown-item-text">Dropdown text</span></li>
          </ul>
        </div>

        <li>
          <hr class="sidebar-divider">
        </li> -->

<!-- dropdown -->
<!-- <div class="dropdown">
          <a href="#" class="btn btn-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Reports 
          </a>
          <ul class="dropdown-menu">
            <li>
              <h6 class="dropdown-header"></h6>
            </li>

            <li><a type="button" href="" class="dropdown-item active" aria-current="true">Inventory</a></li>
            <li><a type="button" href="" class="dropdown-item">Semi-Expendable Property</a></li>
            <li><a type="button" href="" class="dropdown-item">Properety Plan Equipmemt</a></li>
    
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><span class="dropdown-item-text">Forms</span></li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li><span class="dropdown-item-text">Dropdown text</span></li>
            <li><span class="dropdown-item-text">Dropdown text</span></li>
            <li><span class="dropdown-item-text">Dropdown text</span></li>
            <li><span class="dropdown-item-text">Dropdown text</span></li>
          </ul>
        </div>


        <li>
          <hr class="sidebar-divider">
        </li> -->

<!-- dropdown -->
<!-- <div class="dropdown">
          <a href="#" class="btn btn-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Requests & Notifications
          </a>
          <ul class="dropdown-menu">
            <li>
              <h6 class="dropdown-header"></h6>
            </li>

            <li><a type="button" href="" class="dropdown-item active" aria-current="true">Request to Condem</a></li>
            <li><a type="button" href="" class="dropdown-item">Request to Transfer</a></li>
            <li><a type="button" href="" class="dropdown-item">Request to Return</a></li>
            <li><a type="button" href="" class="dropdown-item">Notifications</a></li>
    
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><span class="dropdown-item-text">Dropdown text</span></li>
          </ul>
        </div>

        <li>
          <hr class="sidebar-divider">
        </li>

   
        <li class="nav-item">
          <a class="nav-link" href="#">Backup and Restore</a>
        </li>
        
        
        <li class="nav-item">
          <form class="d-flex" method="post" action="logout.php" role="search"> -->
<!-- <input class="form-control me-2" type="search" placeholder="Search docs" aria-label="Search"> -->
<!-- <button class="btn btn-primary" type="submit">Log out</button>
          </form>
        </li>

      </ul> -->