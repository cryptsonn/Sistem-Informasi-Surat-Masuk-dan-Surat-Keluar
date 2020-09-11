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
    <title>Home Pegawai Kebun</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->

    <header class="app-header"><h2 class="app-header__logo"><span class="hidden-xs"><?php echo $_SESSION['jabatan']; ?></span></h2>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
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
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><span class="hidden-xs"><?php echo $_SESSION['nama_lengkap']; ?></span></p>
        </div>
      </div>
      <ul class="app-menu">

<li><a class="app-menu__item" href="home3.php"><i class="app-menu__icon fa fa-home"></i><span
      class="app-menu__label">Home</span></a></li>

      <li><a class="app-menu__item" href="ktracking_suratmasukkd.php"><i class="app-menu__icon fa fa-search"></i>
    <span class="app-menu__label">Kelola Tracking <br> Surat Masuk</span></a></li>

    <li><a class="app-menu__item" href="ktracking_suratkeluarkd.php"><i class="app-menu__icon fa fa-search"></i>
    <span class="app-menu__label"> Tracking Surat Keluar</span></a></li>

<li><a class="app-menu__item" href="kelola_suratkeluarkd.php"><i class="app-menu__icon fa fa-paper-plane"></i>
    <span class="app-menu__label">Kelola Surat Keluar</span></a></li>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Monitoring</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="suratmasuk.php"><i class="icon fa fa-circle-o"></i>Surat Masuk</a></li>
      <li><a class="treeview-item" href="suratkeluar.php"><i class="icon fa fa-circle-o"></i>Surat Keluar</a></li>
    </ul>
  </li>
</ul>
  </aside>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-book"></i> Grafik Surat Keluar</h1>

      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Monitoring</li>
        <li class="breadcrumb-item">Surat Keluar</li>
        <li class="breadcrumb-item">Grafik</li>


      </ul>
    </div>
   <?php
    include 'koneksi.php';
    $a= mysqli_query($db, "SELECT * from surat_keluar 
     JOIN surat_masuk USING (id_suratm) where surat_masuk.disposisi_tujuan='Audit Internal'");
    $jml1= $a->num_rows;
    $b= mysqli_query($db, "SELECT * from surat_keluar
    JOIN surat_masuk USING (id_suratm) where surat_masuk.disposisi_tujuan='Sekretaris Perusahaan'");
    $jml2= $b->num_rows;
    $c= mysqli_query($db, "SELECT * from surat_keluar
    JOIN surat_masuk USING (id_suratm) where surat_masuk.disposisi_tujuan='Perencanaan & Pengembangan Bisnis'");
    $jml3= $c->num_rows;
    $d= mysqli_query($db, "SELECT * from surat_keluar
    JOIN surat_masuk USING (id_suratm) where surat_masuk. disposisi_tujuan='Teknologi Informasi'");
    $jml4= $d->num_rows;
    $e= mysqli_query($db, "SELECT * from surat_keluar
    JOIN surat_masuk USING (id_suratm) where surat_masuk.disposisi_tujuan='Tanaman'");
    $jml5= $e->num_rows;
    $f= mysqli_query($db, "SELECT * from surat_keluar
    JOIN surat_masuk USING (id_suratm) where surat_masuk.disposisi_tujuan='Akutansi'");
    $jml6= $f->num_rows;
    $g= mysqli_query($db, "SELECT * from surat_keluar
    JOIN surat_masuk USING (id_suratm) where surat_masuk.disposisi_tujuan='Keuangan'");
    $jml7= $g->num_rows;
    $h= mysqli_query($db, "SELECT * from surat_keluar
    JOIN surat_masuk USING (id_suratm) where surat_masuk.disposisi_tujuan='Pengadaan Barang & Jasa'");
    $jml8= $h->num_rows;
    $i= mysqli_query($db, "SELECT * from surat_keluar
    JOIN surat_masuk USING (id_suratm) where surat_masuk.disposisi_tujuan='Modal Manusia'");
    $jml9= $i->num_rows;
    $j= mysqli_query($db, "SELECT * from surat_keluar 
    JOIN surat_masuk USING (id_suratm) where surat_masuk.disposisi_tujuan='Hukum & Umum'");
    $jml10= $j->num_rows;
    $k= mysqli_query($db, "SELECT * from surat_keluar
    JOIN surat_masuk USING (id_suratm) where surat_masuk.disposisi_tujuan='Pemasaran & QA'");
    $jml11= $k->num_rows;
    $l= mysqli_query($db, "SELECT * from surat_keluar
    JOIN surat_masuk USING (id_suratm) where surat_masuk.disposisi_tujuan='Teknik & Pengolahan'");
    $jml12= $l->num_rows;
   ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Audit Internal",<?php echo $jml1 ?>, "grey"],
        ["Sekretaris Perusahaan",<?php echo $jml2 ?>, "daisy"],
        ["Perencanaan & Pengembangan Bisnis", <?php echo $jml3 ?>, "blue"],
        ["Teknologi Informasi", <?php echo $jml4 ?>, "brown"],
        ["Tanaman", <?php echo $jml5 ?>, "gold"],
        ["Akutansi",<?php echo $jml6 ?>, "red"],
        ["Keuangan", <?php echo $jml7 ?>, "orange"],
        ["Pengadaan Barang & Jasa",<?php echo $jml8 ?>, "purple"],
        ["Modal Manusia", <?php echo $jml9 ?>, "navy"],
        ["Hukum & Umum",<?php echo $jml10 ?>, "green"],
        ["Pemasaran & QA",<?php echo $jml11 ?>, "silver"],
        ["Teknik & Pengolahan",<?php echo $jml12 ?>, "teal"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Grafik Data Surat Keluar",
        width: 1225,
        height: 525,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>

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