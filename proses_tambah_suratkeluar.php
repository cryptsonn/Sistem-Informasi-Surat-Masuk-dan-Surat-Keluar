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
    $no_suratk    = $_POST['no_suratk'];
    $tujuan_surat   = $_POST['tujuan_surat'];
    $file_suratk = $_FILES['file_suratk']['name'];
    $perihal = $_POST['perihal'];
    $id_user = $_POST['id_user'];
    $id_suratm    = $_POST['id_suratm'];
    date_default_timezone_set('Asia/Jakarta');
    $tgl_suratk = date("Y-m-d H:i:s");

    // buat query
    $sql1 = "INSERT INTO `surat_keluar` (`no_suratk`, `id_user`, `id_suratm`, `tujuan_surat`, `file_suratk`, `perihal`, `status`, `tgl_suratkeluar`) 
    VALUES ('$no_suratk','$id_user','$id_suratm','$tujuan_surat','$file_suratk','$perihal','Menunggu','$tgl_suratk')";

    $query1 = mysqli_query($db, $sql1);
    move_uploaded_file($_FILES['file_suratk']['tmp_name'],'upload/'.$file_suratk);
    // apakah query simpan berhasil?
    if($query1) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: kelola_suratkeluarsk.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: kelola_suratkeluarsk.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>