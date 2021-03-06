<?php error_reporting(0); date_default_timezone_set('Asia/Jakarta'); session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>templates/default/admin/plugins/images/admin-logo.png">
    <title>Sistem Informasi Pengelolaan Perjalanan Dinas</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>templates/default/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url();?>templates/default/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo base_url();?>templates/default/admin/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url();?>templates/default/admin/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo base_url();?>templates/default/admin/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/default/admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url();?>templates/default/admin/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>templates/default/admin/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url();?>templates/default/admin/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="#">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="<?php echo base_url();?>templates/default/admin/plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="<?php echo base_url();?>templates/default/admin/plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="<?php echo base_url();?>templates/default/admin/plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="<?php echo base_url();?>templates/default/admin/plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="#"> <img src="<?php echo base_url();?>templates/default/admin/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $user->username;?></b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="<?php echo site_url();?>home/" class="waves-effect"><i class="fa fa-home fa-fw" aria-hidden="true"></i>Beranda</a>
                    </li>

                    <?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('hak_akses') == 'STAF ADM') { ?> 
                    <li>
                        <a href="<?php echo site_url();?>home/user" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>User</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>home/penanggung_jawab" class="waves-effect"><i class="fa fa-binoculars fa-fw" aria-hidden="true"></i>Penanggung Jawab</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>home/pegawai" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i>Pegawai</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>home/sppd" class="waves-effect"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i>Pengajuan SPPD</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>home/perpanjangan" class="waves-effect"><i class="fa fa-briefcase fa-fw" aria-hidden="true"></i>Perpanjangan</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>home/kantor_pos" class="waves-effect"><i class="fa fa-building-o fa-fw" aria-hidden="true"></i>Kantor Pos</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>home/jenis_fasilitas" class="waves-effect"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>Jenis Fasilitas</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>home/alat_transportasi" class="waves-effect"><i class="fa fa-car fa-fw" aria-hidden="true"></i>Alat Transportasi</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>home/laporan" class="waves-effect"><i class="fa fa-print fa-fw" aria-hidden="true"></i>Laporan</a>
                    </li>

                    <?php } ?>
                    <?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('hak_akses') == 'MANAJER') { ?>
                    <li>
                        <a href="<?php echo site_url();?>home/laporan" class="waves-effect"><i class="fa fa-print fa-fw" aria-hidden="true"></i>Laporan</a>
                    </li>
                    <?php } ?> 
                    <?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('hak_akses') == 'VICE PRESIDENT') { ?>
                    <li>
                        <a href="<?php echo site_url();?>home/laporan" class="waves-effect"><i class="fa fa-print fa-fw" aria-hidden="true"></i>Laporan</a>
                    </li>
                    <?php } ?>
                </ul>
                <div class="center p-20">
                     <a href="<?php echo site_url();?>login/keluar" class="btn btn-danger btn-block waves-effect waves-light">Logout</a>
                 </div>
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
       <?php $this->load->view($content);?>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <link rel="stylesheet" href="https://cdn.rawgit.com/androidmaker155/tgl_indonesia/master/assets/css/bootstrap-datetimepicker.css"/>
    
    <script src="https://cdn.rawgit.com/androidmaker155/tgl_indonesia/master/assets/js/bootstrap.min.js"></script>


    <script src="https://cdn.rawgit.com/androidmaker155/tgl_indonesia/master/assets/js/moment-with-locales.js"></script>
    <script src="https://cdn.rawgit.com/androidmaker155/tgl_indonesia/master/assets/js/jquery-1.11.3.min.js"></script>

    <script src="https://cdn.rawgit.com/androidmaker155/tgl_indonesia/master/assets/js/bootstrap-datetimepicker.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>templates/default/admin/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url();?>templates/default/admin/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url();?>templates/default/admin/js/custom.min.js"></script>
    <script src="<?php echo base_url();?>templates/default/admin/js/dashboard1.js"></script>



</body>

</html>
