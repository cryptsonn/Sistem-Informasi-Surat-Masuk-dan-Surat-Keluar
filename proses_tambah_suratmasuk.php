<?php

include("koneksi.php"); 
session_start();
if ($_SESSION['id_user']=="") {
    header("Location:login.php");
    exit();
    
  }
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){
    // ambil data dari formulir
    $id_user = $_SESSION['id_user'];
    $no_suratm    = $_POST['no_suratm'];
    $disposisi_tujuan   = $_POST['disposisi_tujuan'];
    $file_surat = $_FILES['file_surat']['name'];
    $perihal = $_POST['perihal'];
    date_default_timezone_set('Asia/Jakarta');
    $tgl_suratm = date("Y-m-d H:i:s");

    // buat query
    $sql1 = "INSERT INTO `surat_masuk` (`id_user`, `no_suratm`, `disposisi_tujuan`, `file_surat`, `perihal`, `keterangan`, `tgl_suratmasuk`) 
    VALUES ('$id_user','$no_suratm','$disposisi_tujuan','$file_surat','$perihal','terkirim','$tgl_suratm')";

    $query1 = mysqli_query($db, $sql1);
    move_uploaded_file($_FILES['file_surat']['tmp_name'],'upload/'.$file_surat);
    // apakah query simpan berhasil?
    if($query1) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: kelola_suratmasukpk.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: kelola_suratmasukpk.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>
<!-- INSERT INTO `pegawai` (`nama`, `nama`, `jenisKelamin`, `agama`, `noTelp`, `alamat`) VALUES ('173140714111048', 'Hendro Dwi Prasetyo', 'L', 'Islam', '081230320816', 'Mojokerto'); -->