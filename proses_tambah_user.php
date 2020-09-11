<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){
    // ambil data dari formulir
    $nama_lengkap    = $_POST['nama_lengkap'];
    $jabatan  = $_POST['jabatan'];
    $divisi = $_POST['divisi'];
    $lokasi_kantor = $_POST['lokasi_kantor'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];

    // buat query
    $sql1 = "INSERT INTO `user` (`nama_lengkap`, `jabatan`, `divisi`, `lokasi_kantor`, `username`, `password`, `hak_akses`) 
    VALUES ('$nama_lengkap','$jabatan','$divisi','$lokasi_kantor','$username', '$password', '$hak_akses')";

    $query1 = mysqli_query($db, $sql1);

    // apakah query simpan berhasil?
    if($query1) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: kelola_user.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: kelola_user.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>
<!-- INSERT INTO `pegawai` (`nip`, `nama`, `jenisKelamin`, `agama`, `noTelp`, `alamat`) VALUES ('173140714111048', 'Hendro Dwi Prasetyo', 'L', 'Islam', '081230320816', 'Mojokerto'); -->