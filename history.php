<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Top Navigation</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
        <?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:home3.php?pesan=belum_login");
	}
	?>
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="home3.php">Home <span class="sr-only">(current)</span></a></li>
                            <li><a href="keranjang.php">Keranjang</a></li>
                            <li class="active"><a href="history.php">Pesanan</a></li>
                            <li><a href="penyewaan.php">Penyewaan</a></li>
                        </ul>

                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?php echo $_SESSION['nik']['nik']; ?></span>
                                </a>
                                <ul class="dropdown-menu">

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">

                                        </div>
                                        <div class="pull-right">
                                            <a href="logoutUser.php" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-custom-menu -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">

                <!-- Main content -->
                <section class="content">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar Pesanan</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No Pesanan</th>
                                        <th>Pemesan</th>
                                        <th>Tgl Pesan</th>
                                        <th>Tgl Mulai</th>
                                        <th>Tgl Selesai</th>
                                        <th>Property</th>
                                        <th>Gambar</th>
                                        <th>Jumlah Pesan</th>
                                        <th>Harga total perhari</th>
                                        <th>Jumlah Hari</th>                                      
                                        <th>Total Biaya</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Fitur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    include 'koneksi.php';
                    $query = mysqli_query($db, "SELECT id_pesanan, keterangan, status, tgl_pesan,  
                    tgl_mulai, tgl_selesai, jml_pesan, konsumen.*, property.id_property, property.harga, 
                    property.gambar as gambar, status, ((property.harga * jml_pesan)*(datediff(tgl_selesai, tgl_mulai)+1)) as total, 
                    datediff(tgl_selesai, tgl_mulai)+1 as jml_hari, property.nama as nama_prop  FROM `pesanan` 
                    JOIN konsumen USING (nik)
                    JOIN property USING (id_property) WHERE pesanan.nik = '".$_SESSION['nik']['nik']."'");

                    while($pesanan = mysqli_fetch_array($query)){ 
                        ?>
                                    <tr>
                                        <td><?php echo $pesanan['id_pesanan'];?></td>
                                        <td><?php echo $pesanan['nama'];?></td>
                                        <td><?php echo $pesanan['tgl_pesan'];?></td>
                                        <td><?php echo $pesanan['tgl_mulai'];?></td>
                                        <td><?php echo $pesanan['tgl_selesai'];?></td>
                                        <td><?php echo $pesanan['nama_prop'];?></td>
                                        <td><img src='upload/<?php echo $pesanan['gambar']; ?>' width="100"
                                                height="100"></td>
                                        <td><?php echo $pesanan['jml_pesan'];?></td>
                                        <td><?php echo $pesanan['harga'];?></td>
                                        <td><?php echo $pesanan['jml_hari'];?></td>                                        
                                        <td><?php echo $pesanan['total'];?></td>
                                        <td><?php echo $pesanan['status'];?></td>
                                        <td><?php echo $pesanan['keterangan'];?></td>
                                        <td><?php if ($pesanan['keterangan'] == 'Pesanan Diproses'){
                                         echo "";
                                         } else if ($pesanan['keterangan'] == 'Belum Diproses') {echo "<a class='btn btn-danger' href='hapus_pesanan.php?id_pesanan=".$pesanan['id_pesanan']."'>Cancel Pesanan</a>";
                                            
                                        }else{
                                            echo "";
                                        }
                                        ?>
                                        
                                     </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </section>
                <!-- /.content -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="AdminLTE/dist/js/demo.js"></script>
</body>

</html>