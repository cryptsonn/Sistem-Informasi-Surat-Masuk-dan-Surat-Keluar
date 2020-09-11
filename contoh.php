<?php 
include("../koneksi/config.php"); 
session_start(); 
$id_user=$_SESSION['id_user'];
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['hak_akses']==""){
    header("location:index.php?pesan=gagal");
    exit;
  }
?>
<html lang="en"><head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
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
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Admin - Majapahit</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/bg-img/logo3.png">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<?php
$diagram = mysqli_query($db, "SELECT DISTINCT(paket.nama_paket), COUNT(paket.id_paket) as total FROM paket right JOIN pesan 
ON paket.id_paket = pesan.id_paket GROUP by pesan.id_paket")
or die('Ada Kesalahan pada query tampil data testimoni: '.mysqli_error($db));
              $datadiagram = mysqli_fetch_assoc($diagram);


$dataadmin=mysqli_query($db, "SELECT * FROM user where id_user ='$id_user'");
$dtadmin=mysqli_fetch_assoc($dataadmin);


?>
<div class="pace-activity"></div></div>
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="halaman_admin.php"><?php echo $_SESSION['hak_akses']; ?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        
        
        <!-- User Menu-->
        <li class="dropdown">
          <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
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
      <div class="app-sidebar__user">
        <img width="48px" height="48px" class="app-sidebar__user-avatar" src="user/gambar/<?php echo $dtadmin['foto_user']?>" alt="User Image" >
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['username']; ?></p>
          <p class="app-sidebar__user-designation">Majapahit Tour</p>
        </div>
      </div>
     <ul class="app-menu">
        <li><a class="app-menu_item active" href="halaman_admin.php"><i class="app-menuicon fa fa-dashboard"></i><span class="app-menu_label">Beranda</span></a></li>
        <li class="treeview"><a class="app-menu_item " href="#" data-toggle="treeview"><i class="app-menuicon fa fa-exchange"></i><span class="app-menu_label">Transaksi</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="pesan/pesan.php"><i class="icon fa fa-circle-o"></i> Pemesanan</a></li>
            <li><a class="treeview-item" href="bayar/bayar.php"><i class="icon fa fa-circle-o"></i> Pembayaran</a></li>
            <li><a class="treeview-item" href="request/request.php"><i class="icon fa fa-circle-o"></i> Permintaan</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu_item " href="#" data-toggle="treeview"><i class="app-menuicon fa fa-cog"></i><span class="app-menu_label"> Website</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="paket/paket.php"><i class="icon fa fa-circle-o"></i> Paket</a></li>
            <li><a class="treeview-item" href="katalog/detail_paket.php"><i class="icon fa fa-circle-o"></i> Foto Paket</a>
            <li><a class="treeview-item" href="testimoni/testimoni.php"><i class="icon fa fa-circle-o"></i> Testimoni</a></li>
            <li><a class="treeview-item " href="armada/armada.php"><i class="icon fa fa-circle-o"></i> Armada</a></li>
          </ul>
        </li>
         
         <li><a class="app-menu_item" href="user/user.php"><i class="app-menuicon fa fa-user-o"></i><span class="app-menu_label">User</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1></i> Beranda</h1>
          <p>Selamat datang <?php echo $_SESSION['username'];; ?></p>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-dashboard"></i></li>
          <li class="breadcrumb-item"><a href="#">Beranda</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <?php

              $query = mysqli_query($db, "SELECT COUNT(id_testi) as jumlah FROM testi") 
              or die('Ada Kesalahan pada query tampil data testimoni: '.mysqli_error($db));
              $data = mysqli_fetch_assoc($query);

              ?>
              <h4>Testimoni</h4>
              <p><b><?php echo $data['jumlah']; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa fa-book fa-3x"></i>
            <div class="info">
              <?php

              $query = mysqli_query($db, "SELECT COUNT(id_pemesanan) as jumlah FROM pesan") 
              or die('Ada Kesalahan pada query tampil data testimoni: '.mysqli_error($db));
              $data = mysqli_fetch_assoc($query);

              ?>
              <h4>Pemesanan</h4>
              <p><b><?php echo $data['jumlah']; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-money fa-3x"></i>
            <div class="info">
              <?php

              $query = mysqli_query($db, "SELECT COUNT(id_bayar) as jumlah FROM bayar") 
              or die('Ada Kesalahan pada query tampil data testimoni: '.mysqli_error($db));
              $data = mysqli_fetch_assoc($query);

              ?>
              <h4>Pembayaran</h4>
              <p><b><?php echo $data['jumlah']; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <?php

              $query = mysqli_query($db, "SELECT COUNT(id_paket) as jumlah FROM paket") 
              or die('Ada Kesalahan pada query tampil data testimoni: '.mysqli_error($db));
              $data = mysqli_fetch_assoc($query);

              ?>
              <h4>Wisata</h4>
              <p><b><?php echo $data['jumlah']; ?></b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Line Chart</h3>
            <div id="piechart"></div>
          </div>

     
      
    </main>
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
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
        <?php 
do{
          ?>
          ['<?php echo $datadiagram['nama_paket']?>',     <?php echo $datadiagram['total']?>],
        
         <?php 
}while($datadiagram=mysqli_fetch_assoc($diagram));
         ?>
        ]);
         
       

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>    
   
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>

  </body>
  </html>