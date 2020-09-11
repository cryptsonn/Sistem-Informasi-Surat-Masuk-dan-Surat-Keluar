<?php

include("koneksi.php");

if( isset($_GET['id_tracking']) ){

    // ambil id dari query string
    $id_tracking = $_GET['id_tracking'];

    // buat query hapus
    $sql = "DELETE FROM tracking_suratm WHERE id_tracking=$id_tracking";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        echo '<script>alert("Data Tracking berhasil hapus"); document.location.href="ktracking_suratmasuk.php"</script>';
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>