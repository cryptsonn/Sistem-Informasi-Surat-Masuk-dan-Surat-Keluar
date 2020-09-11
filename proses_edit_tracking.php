<?php

include("koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id_tracking = $_POST['id_tracking'];
    $status = $_POST['status'];
    // buat query update
    $sql = "UPDATE tracking_suratm SET id_tracking='$id_tracking', status='$status' WHERE id_tracking=$id_tracking";

    $query = mysqli_query($db, $sql);
    
    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        echo '<script>alert("Edit data Tracking berhasil"); document.location.href="ktracking_suratmasuk.php"</script>';
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>
