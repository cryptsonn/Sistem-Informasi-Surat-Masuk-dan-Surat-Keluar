<?php

include("koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id_suratm = $_POST['id_suratm'];
    $keterangan = $_POST['keterangan'];
    // buat query update
    $sql = "UPDATE surat_masuk SET id_suratm='$id_suratm', keterangan='$keterangan' WHERE id_suratm=$id_suratm";

    $query = mysqli_query($db, $sql);
    
    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        echo '<script>alert("Edit data Surat Masuk berhasil"); document.location.href="kelola_suratmasuksk.php"</script>';
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>
