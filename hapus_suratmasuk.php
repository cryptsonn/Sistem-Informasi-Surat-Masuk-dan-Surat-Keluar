<?php

include("koneksi.php");

if( isset($_GET['id_suratm']) ){

    // ambil id dari query string
    $id_suratm = $_GET['id_suratm'];

    // buat query hapus
    $sql = "DELETE FROM surat_masuk WHERE id_suratm=$id_suratm";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        echo '<script>alert("Data Surat Masuk berhasil hapus"); document.location.href="kelola_suratmasukpk.php"</script>';
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>