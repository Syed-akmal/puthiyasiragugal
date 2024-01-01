<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Puthiya Siragugal </title>
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() . 'assets/vendor/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?php echo base_url() . 'assets/css/sb-admin-2.min.css'; ?>" rel="stylesheet">
  <script src="<?php echo base_url() . 'assets/'; ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() . 'assets/'; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Data Table -->

  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <!-- DataTables Buttons CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">

  <!-- DataTables Buttons JS for export options -->
  <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>




  <style>
    .form-section {
      display: none;
    }

    .form-section[data-section="1"] {
      display: block;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: midnightblue;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() . 'admin'; ?>">
        <div class="sidebar-brand-text mx-3">Puthiya Siragugal</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url() . 'admin'; ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Loan Details
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() . 'Customer/addCustomerDetails'; ?>">
          <i class="fas fa-plus"></i>
          <span>Add Customer Details</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() . 'Customer/CustomerDetails'; ?>">
          <i class="fas fa-user"></i>
          <span>Customer Details</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Saving Details
      </div>

      <!-- Nav Item - Savings Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() . 'Customer/addSavingsCustomerDetails'; ?>">
          <i class="fas fa-plus"></i>
          <span>Add Customer Details</span>
        </a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() . 'Customer/SavingsDetails'; ?>">
          <i class="fas fa-user"></i>
          <span>Customer Details</span></a>
      </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama'); ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url() . '/assets/img/profile.png'; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="<?php echo base_url() . 'admin/ganti_password'; ?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">