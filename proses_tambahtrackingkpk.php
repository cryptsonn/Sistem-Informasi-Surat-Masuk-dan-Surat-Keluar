<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){
    // ambil data dari formulir
    $id_suratk  = $_POST['id_suratk'];
    $keterangan_tracking1 = $_POST['keterangan_trackingsk'];
    $penerima = $_POST['penerima'];
    $keterangan_tambahan = $_POST['keterangan_tambahan'];
    $keterangan =$keterangan_tracking1.' '.$keterangan_tambahan.' '.$penerima;
    date_default_timezone_set('Asia/Jakarta');
    $tgl_tracking = date("Y-m-d H:i:s");

   // buat query
   $sql1 = "INSERT INTO `tracking_suratk` (`id_suratk`, `keterangan_trackingsk`,`tgl_tracking`,`status`) 
    VALUES ('$id_suratk','$keterangan','$tgl_tracking',' ')";

    $query1 = mysqli_query($db, $sql1);
   
   // apakah query update berhasil?
   if( $query1 ) {
       // kalau berhasil alihkan ke halaman list-siswa.php
       echo '<script>alert("Tambah Keterangan Tracking Surat Keluar berhasil"); document.location.href="ktracking_suratkeluarpk.php"</script>';
   } else {
       // kalau gagal tampilkan pesan
       die("Gagal menyimpan perubahan...");
   }


} else {
   die("Akses dilarang...");
}

?>