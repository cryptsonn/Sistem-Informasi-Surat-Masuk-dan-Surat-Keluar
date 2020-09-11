<?php

include("koneksi.php");

if( isset($_GET['id_suratm']) ){

    // ambil id dari query string
    $id_suratm = $_GET['id_suratm'];
    date_default_timezone_set('Asia/Jakarta');
    $tgl_tracking = date("Y-m-d H:i:s");
    // buat query hapus
    $sql= "INSERT INTO `tracking_suratm` (`id_suratm`, `keterangan_tracking`,`status`,`tgl_tracking`) 
    VALUES ('$id_suratm','Diterima Oleh Sekretariat','Belum Diproses','$tgl_tracking')";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        echo '<script>alert("Data Tracking berhasil ditambah"); document.location.href="kelola_suratmasuksk.php"</script>';
    } else {echo $sql;
        die("gagal menambah...");
    }

} else {
    die("akses dilarang...");
}

?>