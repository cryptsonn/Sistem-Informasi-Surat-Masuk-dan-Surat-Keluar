<?php

include("koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id_trackingsk = $_POST['id_trackingsk'];
    $status = $_POST['status'];
    // buat query update
    $sql = "UPDATE tracking_suratk SET id_trackingsk='$id_trackingsk', status='$status' WHERE id_trackingsk=$id_trackingsk";

    $query = mysqli_query($db, $sql);
    
    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        echo '<script>alert("Edit data Tracking berhasil"); document.location.href="ktracking_suratkeluar.php"</script>';
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>
