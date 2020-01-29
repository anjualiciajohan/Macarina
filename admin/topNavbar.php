<?php
require "config/config.php";
ob_start();
$result1 = mysqli_query($koneksi, "SELECT * FROM admin WHERE user='".$_SESSION['username']."'");
$row = mysqli_fetch_array($result1);
?>
<body id="page-top">
  
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
 
 <!-- Main Content -->
 <div id="content">
 
   <!-- Topbar -->
   <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
 
     <!-- Sidebar Toggle (Topbar) -->
     <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
       <i class="fa fa-bars"></i>
     </button>
 
     
 
     <!-- Topbar Navbar -->
     <ul class="navbar-nav ml-auto">
 

 
       <div class="topbar-divider d-none d-sm-block"></div>
 
 <!-- Nav Item - Alerts -->


       <!-- Nav Item - User Information -->
       <li class="nav-item dropdown no-arrow">
         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php
                if ($row!=""){
                  echo '<div class="mr-2 d-none d-lg-inline text-gray-600">'.$row['user'].'</div>';
                }
            ?>
         </a>
         <!-- Dropdown - User Information -->
         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
           <a class="dropdown-item" href="#">
             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
             Profile
           </a>
           <a class="dropdown-item" href="#">
             <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
             Settings
           </a>
           <a class="dropdown-item" href="#">
             <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
             Activity Log
           </a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
             Logout
           </a>
         </div>
       </li>
 
     </ul>
 
   </nav>


