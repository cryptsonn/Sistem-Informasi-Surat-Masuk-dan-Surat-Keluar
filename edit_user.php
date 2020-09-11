<?php

include("koneksi.php"); 
session_start();
if ($_SESSION['id_user']=="") {
    header("Location:login.php");
    exit();
    
}
  
// kalau tidak ada id di query string
if( !isset($_GET['id_user']) ){
    header('Location: kelola_user.php');
}

//ambil id dari query string
$id_user = $_GET['id_user'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM user WHERE id_user=$id_user";
$query = mysqli_query($db, $sql);
$karyawan = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
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
        <li><a class="app-menu__item" href="home1.php"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Home</span></a></li>
        <li><a class="app-menu__item" href="kelola_user.php"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">kelola user</span></a></li>
        
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Form Edit user</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Kelola user</li>
          <li class="breadcrumb-item">Edit user</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">

                <form action="proses_edit_user.php" method="POST">

                <div class="form-group">
                    <label for="id_user">Id User</label>
                    <input class="form-control"  type="hidden" name="id_user" value="<?php echo $karyawan['id_user']?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                    <small class="form-text text-muted"></small>
                  </div>

                 <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input class="form-control"  type="text" name="nama_lengkap" value="<?php echo $karyawan['nama_lengkap']?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                    <small class="form-text text-muted">Nama Lengkap sesuai dengan ktp</small>
                  </div>


                  <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <?php $jabatan = $karyawan['jabatan'];?>
                    <select name="jabatan" class="form-control">
                      <option <?php echo ($jabatan == 'Kepala Divisi') ? "selected": "" ?>>Kepala Divisi</option>
                      <option <?php echo ($jabatan == 'Kepala Sub Divisi') ? "selected": "" ?>>Kepala Sub Divisi</option>
                      <option <?php echo ($jabatan == 'Staff') ? "selected": "" ?>>Staff</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="divisi">Divisi</label>
                    <?php $jabatan = $karyawan['divisi'];?>
                    <select name="divisi" class="form-control">
                      <option <?php echo ($jabatan == 'Audit Internal') ? "selected": "" ?>>Audit Internal</option>
                      <option <?php echo ($jabatan == 'Sekretaris Perusahaan') ? "selected": "" ?>>Sekretaris Perusahaan</option>
                      <option <?php echo ($jabatan == 'Perencanaan & Pengembangan Bisnis') ? "selected": "" ?>>Perencanaan & Pengembangan Bisnis</option>
                      <option <?php echo ($jabatan == 'Teknologi Informasi') ? "selected": "" ?>>Teknologi Informasi</option>
                      <option <?php echo ($jabatan == 'Tanaman') ? "selected": "" ?>>Tanaman</option>
                      <option <?php echo ($jabatan == 'Akutansi') ? "selected": "" ?>>Akutansi</option>
                      <option <?php echo ($jabatan == 'Keuangan') ? "selected": "" ?>>Keuangan</option>
                      <option <?php echo ($jabatan == 'Pengadaan Barang & Jasa') ? "selected": "" ?>>Pengadaan Barang & Jasa</option>
                      <option <?php echo ($jabatan == 'Modal Manusia') ? "selected": "" ?>>Modal Manusia</option>
                      <option <?php echo ($jabatan == 'Hukum & Umum') ? "selected": "" ?>>Hukum & Umum</option>
                      <option <?php echo ($jabatan == 'Pemasaran & QA') ? "selected": "" ?>>Pemasaran & QA</option>
                      <option <?php echo ($jabatan == 'Teknik & Pengolahan') ? "selected": "" ?>>Teknik & Pengolahan</option>
                      <option <?php echo ($jabatan == 'Kebun Teh 1') ? "selected": "" ?>>Kebun Teh 1</option>
                      <option <?php echo ($jabatan == 'Kebun Teh 2') ? "selected": "" ?>>Kebun Teh 2</option>
                      <option <?php echo ($jabatan == 'Kebun Sawit') ? "selected": "" ?>>Kebun Sawit</option>
                      <option <?php echo ($jabatan == 'Kebun Karet') ? "selected": "" ?>>Kebun Karet</option>
                      <option <?php echo ($jabatan == 'Agrowisata') ? "selected": "" ?>>Agrowisata</option>
                      <option <?php echo ($jabatan == 'Industri Hilir Teh') ? "selected": "" ?>>Industri Hilir Teh</option>
                      <option <?php echo ($jabatan == 'PKS') ? "selected": "" ?>>PKS</option>
                    </select>
                  </div>
                
                 <div class="form-group">
                    <label for="lokasi_kantor">Lokasi Kantor</label>
                    <input class="form-control"  type="text" name="lokasi_kantor" value="<?php echo $karyawan['lokasi_kantor'] ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                    <small class="form-text text-muted">Lokasi Kantor Sekarang</small>
                  </div>

                  <div class="form-group">
                    <label for="username">Username</label>
                        <input class="form-control"  type="text" name="username" value="<?php echo $karyawan['username']?>"required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                        <small class="form-text text-muted">Username</small>
                  </div>
                
                 <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control"  type="text" name="password" value="<?php echo $karyawan['password'] ?>"required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                    <small class="form-text text-muted">Password</small>
                  </div>

                    <div class="form-group">
                    <label for="hak_akses">Hak Akses</label>
                    <?php $hak_akses = $karyawan['hak_akses'];?>
                    <select name="hak_akses" class="form-control">
                      <option <?php echo ($hak_akses == 'sekretariat') ? "selected": "" ?>>sekretariat</option>
                      <option <?php echo ($hak_akses == 'pegawai kebun') ? "selected": "" ?>>pegawai kebun</option>
                       <option <?php echo ($hak_akses == 'kadiv') ? "selected": "" ?>>kadiv</option>
                    </select>
                  </div>
                  <div class="tile-footer">
                    <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                  </div>
                  
                 
                </form>
              </div>
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
    <!-- Google analytics script-->
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