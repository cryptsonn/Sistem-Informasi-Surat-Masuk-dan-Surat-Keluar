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
        <h1><i class="fa fa-paper-plane"></i> Data Surat Keluar</h1>

      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Kelola Surat Keluar</li>

      </ul>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Surat Keluar</th>
                  <th>Tanggal Surat Keluar</th>
                  <th>File Surat Keluar</th>
                  <th>Tujuan Surat Keluar</th>
                  <th>Perihal</th>
                  <th>No Surat Masuk</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'koneksi.php';
                    $no = 1;
                    $query = mysqli_query($db, "SELECT surat_masuk.disposisi_tujuan,surat_keluar.id_suratk, surat_keluar.no_suratk, surat_masuk.id_suratm, surat_keluar.tgl_suratkeluar, surat_keluar.file_suratk, surat_keluar.tujuan_surat, surat_keluar.perihal, surat_masuk.no_suratm, surat_keluar.status FROM `surat_keluar`
                    JOIN surat_masuk USING (id_suratm) WHERE surat_masuk.disposisi_tujuan = '".$_SESSION['divisi']."'");
                    

                    while($suratkeluar = mysqli_fetch_array($query)){ ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $suratkeluar['no_suratk']; ?></td>
                  <td><?php echo $suratkeluar['tgl_suratkeluar']; ?></td>
                  <td><?php echo $suratkeluar['file_suratk']; ?></td>
                  <td><?php echo $suratkeluar['tujuan_surat']; ?></td>
                  <td><?php echo $suratkeluar['perihal']; ?></td>
                  <td><?php echo $suratkeluar['no_suratm']; ?></td>
                  <td><?php echo $suratkeluar['status']; ?></td>
                  <td><?php if ($suratkeluar['status'] == 'Menunggu')
                                         {echo "<a class='btn btn-default btn-primary' target='_blank' href='cetak_suratkeluar.php?file_suratk=".$suratkeluar['file_suratk']."'><i class='fa fa-print'></i> Cetak</a>";
                                         echo" ";
                                         echo "<a class='btn btn-info' href='edit_suratkeluarkd.php?id_suratk=".$suratkeluar['id_suratk']."'><i class='fa fa-lg fa-edit'> Edit</i></a>";
                                        } else if ($suratkeluar['status'] == 'Diterima') 
                                         {echo "<a class='btn btn-default btn-primary' target='_blank' href='cetak_suratkeluar.php?file_suratk=".$suratkeluar['file_suratk']."'><i class='fa fa-print'></i> Cetak</a>";
                                        }else if($suratkeluar['status'] == 'Selesai') 
                                        {echo "<a class='btn btn-default btn-primary' target='_blank' href='cetak_suratkeluar.php?file_suratk=".$suratkeluar['file_suratk']."'><i class='fa fa-print'></i> Cetak</a>";
                                        }
                                         else{}
                                        ?>


                </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
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