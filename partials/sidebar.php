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

        <div class="col-4" style="height: 100vh; border-right: solid 1px; width: 75px; margin-top: 0; padding-top: 2rem; padding-left: -1rem; display: flex; justify-content: center">
          <ul id="gyatt">
            <li style="margin-left: -1.5rem;" type="button" id="general">

              <ion-icon name="analytics-outline" style="width: 50px; height: 50px"></ion-icon>
            </li>
            <li style="margin-left: -1.5rem;" type="button" id="dropdown">

              <ion-icon name="file-tray-full-outline" style="width: 50px; height: 50px; margin-top: 4rem;"></ion-icon>
            </li>
            <li style="margin-left: -1.5rem;" type="button" id="something" type="button">

              <ion-icon name="newspaper-outline" style="width: 50px; height: 50px; margin-top: 4rem;"></ion-icon>
            </li>
            <li style="margin-left: -1.5rem;" type="button" id="backup" type="button">

            <ion-icon name="cloud-download-outline" style="width: 50px; height: 50px; margin-top: 4rem;"></ion-icon>
          </li>




          </ul>
        </div>

        <div class="col-6" <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/inventory_index.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/User_Management.php' ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem; display: none;"'; ?> id="sidenav1">
  
          <ul>
            <li>
              <ul class="sidebar-nav">
                <li class="d-flex">
                  <span>
                    <ion-icon name="analytics-outline"></ion-icon>
                  </span>
                  <h1 class="sidebar-header">Dashboard</h1>
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



        <div class="col-6"<?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/Asset_Class.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/item_Category.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/fund.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/staff.php' ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem; display: none;"'; ?> id="sidenav2">
        <ul>
            <li>
              <ul class="sidebar-nav">
                <li class="d-flex">
                  <span>
                    <ion-icon name="analytics-outline"></ion-icon>
                  </span>
                  <a type="button" href="./Asset_Class.php" class="nav-link" >Assets</a>
                </li>

                <li>
                  <hr class="sidebar-divider">
                </li>


                <li class="nav-item">
                  <a class="nav-link" href="./item_Category.php" aria-current="page">Item Category</a>
                </li>
            <li><a type="button"  class="dropdown-item" ></a></li>

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
  

        <div class="col-6"<?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/reports.php' ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem; display: none;"'; ?> id="sidenav3">
        <ul>
            <li>
              <ul class="sidebar-nav">
                <li class="d-flex">
                  <span>
                    <ion-icon name="analytics-outline"></ion-icon>
                  </span>
                  <a type="button" href="./reports.php" class="nav-link" >Report</a>
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