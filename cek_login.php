<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan nip dan password yang sesuai
$login = mysqli_query($db,"select * from user where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah nip dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['hak_akses']=="sekretariat"){

		// buat session login dan username
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['nama_lengkap'] = $data['nama_lengkap'];
		$_SESSION['jabatan'] = $data['jabatan'];
		$_SESSION['divisi'] = $data['divisi'];
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "sekretariat";
		$_SESSION['lokasi_kantor'] = $data['lokasi_kantor'];
		// alihkan ke halaman dashboard sekretariat
		header("location:home1.php");

	// cek jika user login sebagai alat
	}else if($data['hak_akses']=="pegawai kebun"){
		// buat session login dan nip
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['nama_lengkap'] = $data['nama_lengkap'];
		$_SESSION['jabatan'] = $data['jabatan'];
		$_SESSION['divisi'] = $data['divisi'];
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "pegawai kebun";
		$_SESSION['lokasi_kantor'] = $data['lokasi_kantor'];
		// alihkan ke halaman dashboard pegawai
		header("location:home2.php");

	}else if($data['hak_akses']=="kadiv"){
		// buat session login dan nip
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['nama_lengkap'] = $data['nama_lengkap'];
		$_SESSION['jabatan'] = $data['jabatan'];
		$_SESSION['divisi'] = $data['divisi'];
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "kadiv";
		$_SESSION['lokasi_kantor'] = $data['lokasi_kantor'];
		// alihkan ke halaman dashboard pegawai
		header("location:home3.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}

?>