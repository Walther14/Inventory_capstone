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
                <i class="fa-solid  fa-cubes" style="font-size: 30px;" title="click to view dashboard, inventory"></i>
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

        <div class="col-6" <?php echo $_SERVER['REQUEST_URI'] == '/inventory_capstone/index_staff.php' || $_SERVER['REQUEST_URI'] == '/inventory_capstone/inventory_index-staff.php' ? 'style="margin-top: 10rem;"' : 'style="margin-top: 10rem; display: none;"'; ?> id="sidenav1">

          <ul style="width: 150%; position: relative; overflow:hidden; display: flex; align-items:center; justify-content:center">
            <ul class="sidebar-nav">

              <li class="nav-item">
                <a class="nav-link" href="./index_staff.php" aria-current="page">Dashboard</a>
              </li>

              <li>
                <hr class="sidebar-divider">
              </li>


              <li class="nav-item">
                <a class="nav-link" href="./inventory_index-staff.php" aria-current="page">Inventory</a>
              </li>

    

            


              <li>
                <hr class="sidebar-divider">
              </li>
            </ul>
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