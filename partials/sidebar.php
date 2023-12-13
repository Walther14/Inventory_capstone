<body class="ps-md-sbwidth">
  <!-- Sidebar -->
  <nav class="sidebar offcanvas-start offcanvas-md" tabindex="-1" id="sidebar-example" style="background-color: rgb(255, 255, 255); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 0 1px 0 rgba(0, 0, 0, 0.19); border-right: none  ;">
    <div class="offcanvas-header border-bottom border-secondary border-opacity-25">
      <a class="sidebar-brand" href="#">
        <img src="./img/prime.png" alt="Logo" height="24" class="d-inline-block align-text-top">
      </a>
      <button type="button" class="btn-close d-md-none" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#sidebar-example"></button>
    </div>
    <div class="">





      <div class="d-flex">

        <div class="col-4" style="height: 100vh; border-right: solid 1px; width: 75px; margin-top: 0; padding-top: 2rem; display: flex; justify-content: center;">
          <ul id="gyatt">


            <li class="icon" type="button" id="general" style="margin-top: 0rem;">
              <span>
                <i class="fa-solid  fa-cubes" style="font-size: 30px;"></i>
              </span>
            </li>



            <li class="icon" type="button" id="dropdown" style="margin-bottom: 0rem;">
              <span>
                <i class="fa-solid  fa-sitemap" style="font-size: 30px;"></i>
              </span>
            </li>



            <li class="icon" type="button" id="something" type="button" style="margin-bottom: 0rem;">
              <span>
                <i class="fa-solid  fa-file-alt" style="font-size: 30px;"></i>
              </span>
            </li>

            <li class="icon" type="button" id="d" style="margin-bottom: 0rem;">
              <span>
                <i class="fa-solid  fa-map-marker-alt" style="font-size: 30px;"></i>
              </span>
            </li>

            <li class="icon" type="button" id="backup" type="button" style="margin-bottom: 0rem;">
              <span>
                <i class="fa-solid  fa-download" style="font-size: 30px;"></i>
              </span>
            </li>

            <li class="icon" type="button" id="trans" type="button" style="margin-bottom: 0rem;">
              <span>
                <i class="fa-solid  fa-exchange-alt" style="font-size: 30px;"></i>
              </span>
            </li>


            <li class="icon" type="button" id="backup" type="button" style="margin-bottom: 0rem;">
              <a href="./logout.php" style="color: none;">
                <span>
                  <i class="fa-solid  fa-right-from-bracket" style="font-size: 30px;" data-bs-title="Logout"></i>
                </span>
              </a>
            </li>




          </ul>
        </div>

        <div class="col-6" <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/inventory_index.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/User_Management.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/index.php' ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem; display: none;"'; ?> id="sidenav1">

          <ul style="width: 150%; position: relative; overflow:hidden; display: flex; align-items:center; justify-content:center">
            <li>
              <ul class="sidebar-nav">
                <li class="d-flex">
                  <span>
                    <ion-icon name="analytics-outline"></ion-icon>
                  </span>
                  <a class="nav-link" href="./index.php" aria-current="page">Dashboard</a>
                </li>

                <li>
                  <hr class="sidebar-divider">
                </li>


                <li class="nav-item">
                  <a class="nav-link" href="./inventory_index.php" aria-current="page">Inventory</a>
                </li>

                <li>
                  <hr class="sidebar-divider">
                </li>


                <li class="nav-item">
                  <a class="nav-link " href="./User_Management.php" aria-current="page">User Management</a>
                </li>


                <li>
                  <hr class="sidebar-divider">
                </li>

            </li>
          </ul>
        </div>



        <div class="col-6" <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/Asset_Class.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/item_Category.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/fund.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/staff.php' ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem; display: none;"'; ?> id="sidenav2">
          <ul style="width: 150%; position: relative; overflow:hidden; display: flex; align-items:center; justify-content:center">
            <li>
              <ul class="sidebar-nav">
                <li class="d-flex">
                  <span>
                    <ion-icon name="analytics-outline"></ion-icon>
                  </span>
                  <a type="button" href="./Asset_Class.php" class="nav-link">Assets</a>
                </li>

                <li>
                  <hr class="sidebar-divider">
                </li>


                <li class="nav-item">
                  <a class="nav-link" href="./item_Category.php" aria-current="page">Item Category</a>
                </li>
                <li><a type="button" class="dropdown-item"></a></li>

                <li>
                  <hr class="sidebar-divider">
                </li>


                <li class="nav-item">
                  <a class="nav-link" href="./fund.php" aria-current="page">Fund Code</a>
                </li>


                <li>
                  <hr class="sidebar-divider">
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./staff.php" aria-current="page">College Personnel</a>
                </li>


                <li>
                  <hr class="sidebar-divider">
                </li>


            </li>
          </ul>
        </div>


        <div class="col-6" <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/inspection_report.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/waste_report.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/physicalcount_inventoriesReport.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/components/inspectionAndAcceptanceReport.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/formsContainer.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/physicalcount_property.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/PreAndPost_report.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/physicalcount_semiReport.php'  ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem;  display: none;"'; ?> id="sidenav3">
          <ul style="width: 150%; position: relative; overflow:hidden; display: flex; align-items:center; justify-content:center">
            <li>
              <ul class="sidebar-nav">
                <li class="d-flex">

                  <a type="button" href="./physicalcount_inventoriesReport.php" class="nav-link">Inventory Report</a>
                </li>
                <li>
                  <hr class="sidebar-divider">
                </li>
                <li class="d-flex">
                  <a type="button" href="./physicalcount_semiReport.php" class="nav-link">Semi-Expendable Property</a>
                </li>
                <li>
                  <hr class="sidebar-divider">
                </li>
                <li class="d-flex">

                  <a type="button" href="./physicalcount_property.php" class="nav-link">Property Plant Equipment</a>
                </li>

                <li>
                  <hr class="sidebar-divider">
                </li>
                <br>
                <br>
                <li>
                  <hr class="sidebar-divider">
                </li>


                <li class="nav-item">
                  <a class="nav-link" href="./formsContainer.php" aria-current="page">FORMS</a>
                </li>
                <li>
                  <hr class="sidebar-divider">
                </li>
                <li class="nav-item">



                </li>
              </ul>
        </div>

        <div class="col-6" <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/locator.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/dorm.php' ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem; display: none; position: relative"'; ?> id="sidenav4">
          <ul style="width: 150%; position: relative; overflow:hidden; display: flex; align-items:center; justify-content:center">
            <li>
              <ul class="sidebar-nav" >
                <li class="d-flex">
                  <span>
                    <ion-icon name="analytics-outline"></ion-icon>
                  </span>
                  <a type="button" href="./locator.php" class="nav-link">BSC Campus</a>
                </li>

                <li>
                  <hr class="sidebar-divider">
                </li>


                <li class="nav-item">
                  <a type="button" href="./dorm.php" class="nav-link">Dorm</a>
                </li>


                <li>
                  <hr class="sidebar-divider">
                </li>


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