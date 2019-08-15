<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="<?php echo base_url();?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/template/images/favicon.png">
       <title>Nikitoko.com</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/template/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/template/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- You can change the theme colors from here -->
    <link href="assets/template/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" id="theme" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> -->
    
  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url();?>">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/template/images/logo-icon1.png" alt="homepage" class="dark-logo" />
                            
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                         <!-- dark Logo text -->
                         <img src="assets/template/images/logo-text1.png" alt="homepage" class="dark-logo" />
                         </span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <!-- <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search p-l-20">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a>
                            </form>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/template/images/users/1.jpg" alt="user" class="profile-pic m-r-5" />Markarn Doe</a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                         <?php 
                if ($this->session->userdata('level') == 'admin') {
                 ?>
                        <li>
                            <a href="<?php echo base_url();?>" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(barang);?>" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Barang</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url(supplier);?>" class="waves-effect"><i class="fa fa-info-circle m-r-10" aria-hidden="true"></i>Supplier</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(barang_masuk);?>" class="waves-effect"><i class="fa fa-globe m-r-10" aria-hidden="true"></i>Transaksi Barang Masuk</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(barang_keluar);?>" class="waves-effect"><i class="fa fa-columns m-r-10" aria-hidden="true"></i>Transaksi Barang Keluar</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(laporan);?>" class="waves-effect"><i class="fa fa-info-circle m-r-10" aria-hidden="true"></i>Laporan</a>
                        </li><hr/>

                        <li>
                            <a href="<?php echo base_url(jenis_barang);?>" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Jenis Barang</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(merk_barang);?>" class="waves-effect"><i class="fa fa-font m-r-10" aria-hidden="true"></i>Merk Barang</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url(users);?>" class="waves-effect"><i class="fa fa-info-circle m-r-10" aria-hidden="true"></i>Manajemen User</a>
                        </li>
                         
                    </ul>
                    <div class="text-center m-t-30">
                           <a href="<?php echo base_url()?>app/logout" class="btn btn-danger"><i class="glyphicon glyphicon-share"></i>Logout </a>
                    </div>
                   <?php 
                } elseif ($this->session->userdata('level') == 'petugas gudang'){
                 ?>
                 <li>
                            <a href="<?php echo base_url();?>" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("barang_keluar/create");?>" class="waves-effect"><i class="fa fa-columns m-r-10" aria-hidden="true"></i>Transaksi Penjualan</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(barang_keluar);?>" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Hystori</a>
                        </li>
                        <li>
                    </ul>
                    <div class="text-center m-t-30">
                           <a href="<?php echo base_url()?>app/logout" class="btn btn-danger"><i class="glyphicon glyphicon-share"></i>Logout </a>
                    </div>
                     <?php } ?>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo $judul; ?></li>
                        </ol>
                    </div>
                    <!-- <div class="col-md-6 col-4 align-self-center">
                        <a href="https://wrappixel.com/templates/monsteradmin/" class="btn pull-right hidden-sm-down btn-success"> Upgrade to Pro</a>
                    </div> -->
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                <?php include $konten.'.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © NIKITOKO.COM
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/template/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/template/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/template/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="assets/template/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/template/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/template/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/template/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/template/plugins/styleswitcher/jQuery.style.switcher.js"></script>
        <?php //include 'config/footer.php'; ?>
    <script src="assets/bootstrap-datepicker.js"></script>

    <!-- <script src="assets/jquery/dist/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="assets/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  
    
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->

<script type="text/javascript">
      $('.tgl').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                //startView: 2,
                todayBtn: true,
                todayHighlight: true,
                //clearBtn: true,
                language: 'id'
            });
  </script>

<script>
  $(function () {
    $('#example2').DataTable()

  })
</script>

</body>

</html>
