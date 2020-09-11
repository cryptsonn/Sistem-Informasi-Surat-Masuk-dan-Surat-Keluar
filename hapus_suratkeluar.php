<?php

include("koneksi.php");

if( isset($_GET['id_suratk']) ){

    // ambil id dari query string
    $id_suratk = $_GET['id_suratk'];

    // buat query hapus
    $sql = "DELETE FROM surat_keluar WHERE id_suratk=$id_suratk";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        echo '<script>alert("Data Surat keluar berhasil hapus"); document.location.href="kelola_suratkeluarsk.php"</script>';
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>