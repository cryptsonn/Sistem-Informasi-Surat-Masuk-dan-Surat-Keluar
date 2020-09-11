<?php 
session_start();
include("koneksi.php"); 

if (!$_SESSION['username']) {
  header("Location:login.php");
  exit();
  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description"
    content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <!-- Twitter meta-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:site" content="@pratikborsadiya">
  <meta property="twitter:creator" content="@pratikborsadiya">
  <!-- Open Graph Meta-->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Vali Admin">
  <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
  <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
  <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
  <meta property="og:description"
    content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <title>Home Sekretariat</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <h2 class="app-header__logo"><span class="hidden-xs"><?php echo $_SESSION['jabatan']; ?></span></h2>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
          <span class="hidden-xs"><?php echo $_SESSION['divisi']; ?></span>
          <i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
        src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><span class="hidden-xs"><?php echo $_SESSION['nama_lengkap']; ?></span></p>
      </div>
    </div>
    <ul class="app-menu">

      <li><a class="app-menu__item" href="home1.php"><i class="app-menu__icon fa fa-home"></i><span
            class="app-menu__label">Home</span></a></li>

      <li><a class="app-menu__item" href="ktracking_suratmasuk.php"><i class="app-menu__icon fa fa-search"></i>
          <span class="app-menu__label">Kelola Tracking <br> Surat Masuk</span></a></li>

    </ul>
  </aside>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-search"></i> Data Tracking Surat Masuk</h1>

      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Kelola Tracking Surat Masuk</li>
        <li class="breadcrumb-item">Detail Tracking Surat Masuk</li>

      </ul>
    </div>
    <!-- <div class="col-md-6"> -->
    <!--  <div class="tile-title-w-btn"> -->


    <div class="row">
      <div class="col-md-12">
     <?php echo "<a class='btn btn-primary' href='tambah_trackingsurat.php?no_suratm=".$_GET['no_suratm']."'><i class='fa fa-plus-circle'></i>Tambah Keterangan Tracking</a>";?>
           
            <?php echo 'Nomor Surat Masuk : '.' '.$_GET['no_suratm']; ?> 
           </br>
        <div class="tile">
          <div class="tile-body">
           
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'koneksi.php';
                    $no = 1;
                    $no_suratm = $_GET['no_suratm'];
                    $query = mysqli_query($db, "SELECT  id_tracking, id_suratm, tracking_suratm.keterangan_tracking, tgl_tracking FROM `tracking_suratm`
                    JOIN surat_masuk USING (id_suratm) WHERE no_suratm='$no_suratm'");
                    while($tracking = mysqli_fetch_array($query)){ ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $tracking['tgl_tracking']; ?></td>
                  <td><?php echo $tracking['keterangan_tracking']; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </main>;
  <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
  <!-- Page specific javascripts-->
  <!-- Data table plugin-->
  <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">
    $('#sampleTable').DataTable();
  </script>
  <!-- Google analytics script-->
  <script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
      (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-72504830-1', 'auto');
      ga('send', 'pageview');
    }
  </script>
</body>

</html>