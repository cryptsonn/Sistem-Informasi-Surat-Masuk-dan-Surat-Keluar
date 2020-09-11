<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){
    // ambil data dari formulir
    $id_suratm  = $_POST['id_suratm'];
    $keterangan_tracking1 = $_POST['keterangan_tracking'];
    $penerima = $_POST['penerima'];
    $keterangan_tambahan = $_POST['keterangan_tambahan'];
    $keterangan =$keterangan_tracking1.' '.$keterangan_tambahan.' '.$penerima;
    date_default_timezone_set('Asia/Jakarta');
    $tgl_tracking = date("Y-m-d H:i:s");

   // buat query
   $sql1 = "INSERT INTO `tracking_suratm` (`id_suratm`, `keterangan_tracking`,`tgl_tracking`,`status`) 
    VALUES ('$id_suratm','$keterangan','$tgl_tracking',' ')";

    $query1 = mysqli_query($db, $sql1);
   
   // apakah query update berhasil?
   if( $query1 ) {
       // kalau berhasil alihkan ke halaman list-siswa.php
       echo '<script>alert("Tambah Keterangan Tracking Surat Masuk berhasil"); document.location.href="ktracking_suratmasuk.php"</script>';
   } else {
       // kalau gagal tampilkan pesan
       die("Gagal menyimpan perubahan...");
   }


} else {
   die("Akses dilarang...");
}

?>