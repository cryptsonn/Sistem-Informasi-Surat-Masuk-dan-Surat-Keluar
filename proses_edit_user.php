<?php

include("koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id_user = $_POST['id_user'];
    $nama_lengkap    = $_POST['nama_lengkap'];
    $jabatan   = $_POST['jabatan'];
    $divisi = $_POST['divisi'];
    $lokasi_kantor = $_POST['lokasi_kantor'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];
    // buat query update
    $sql = "UPDATE user SET nama_lengkap='$nama_lengkap', jabatan='$jabatan',divisi='$divisi', 
    lokasi_kantor='$lokasi_kantor',username='$username',password='$password', hak_akses='$hak_akses' WHERE id_user=$id_user";

    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        echo '<script>alert("Edit data user berhasil"); document.location.href="kelola_user.php"</script>';
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>
