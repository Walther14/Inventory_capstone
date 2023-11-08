<body class="ps-md-sbwidth">
  <!-- Sidebar -->
  <nav class="sidebar offcanvas-start offcanvas-md" tabindex="-1" id="sidebar-example">
    <div class="offcanvas-header border-bottom border-secondary border-opacity-25">
      <a class="sidebar-brand" href="#">
        <img src="./img/prime.png" alt="Logo" height="24" class="d-inline-block align-text-top">
      </a>
      <button type="button" class="btn-close d-md-none" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#sidebar-example"></button>
    </div>
    <div class="offcanvas-body">
      <div class="mt-2 mb-3">
        <input type="text" class="form-control" placeholder="Search">
      </div>

      <ul class="sidebar-nav">
        <li>
          <h6 class="sidebar-header">Dashboard</h6>
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

        <li class="nav-item">
          <a class="nav-link" href="./inventory_index.php" aria-current="page">Inventory</a>
        </li>

        
        <li>
          <hr class="sidebar-divider">
        </li>

     
        

        <!-- <li class="nav-item">
          <a class="nav-link" href="#">CLI commands</a>
        </li> -->
        <!-- <li class="mt-3">
          <h6 class="sidebar-header">Components</h6>
        </li> -->







        <li>
          <hr class="sidebar-divider">
        </li>


        <!-- dropdown -->
        <div class="dropdown">
          <a href="#" class="btn btn-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tables
          </a>
          <ul class="dropdown-menu">
            <li>
              <h6 class="dropdown-header"></h6>
            </li>
            <li><a type="button" href="./Asset_Class.php" class="dropdown-item" >Assets</a></li>
            <li><a type="button" href="./item_Category.php" class="dropdown-item active" aria-current="true">Item Category</a></li>
            <li><a type="button" href="./fund.php" class="dropdown-item">Fund Code</a></li>
            <li><a type="button" href="./staff.php" class="dropdown-item" >College Personnel</a></li>
     
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><span class="dropdown-item-text">Dropdown text</span></li>
          </ul>
        </div>

        <li>
          <hr class="sidebar-divider">
        </li>

      <!-- dropdown -->
      <div class="dropdown">
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
        </li>

         <!-- dropdown -->
         <div class="dropdown">
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

      </ul>
    </div>
  </nav>


  <!-- Sidebar toggle -->
  <button type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar-example" class="btn btn-secondary d-md-none">
    <i class="fa-light fa-sidebar me-1"></i> Sidebar
  </button>

</body>