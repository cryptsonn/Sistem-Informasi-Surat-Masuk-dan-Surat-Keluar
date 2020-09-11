<?php

include("koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id_suratk = $_POST['id_suratk'];
    $status = $_POST['status'];
    // buat query update
    $sql = "UPDATE surat_keluar SET id_suratk='$id_suratk', status='$status' WHERE id_suratk=$id_suratk";

    $query = mysqli_query($db, $sql);
    
    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        echo '<script>alert("Edit data Surat Keluar berhasil"); document.location.href="kelola_suratkeluarkd.php"</script>';
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>
