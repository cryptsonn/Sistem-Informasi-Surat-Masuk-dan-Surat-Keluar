<?php include("koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])) {

    // ambil data dari formulir
    $id_suratk=$_POST['id_suratk'];
    $no_suratk=$_POST['no_suratk'];
    $file_suratk=$_FILES['file_suratk']['name'];
    $perihal=$_POST['perihal'];
    $id_user=$_POST['id_user'];
    $id_suratm=$_POST['id_suratm'];
    $tujuan_surat=$_POST['tujuan_surat'];

    date_default_timezone_set('Asia/Jakarta');
    $tgl_surat=date("Y-m-d H:i:s");


    if($file_suratk ="") {
        $ekstensi_diperbolehkan=array('pdf');
        $x=explode('.', $file_suratk);
        $ekstensi=strtolower(end($x));
        $file_temp=$_FILES['file_suratk']['name'];

        if(in_array($ekstensi, $ekstensi_diperbolehkan)===true) {
            move_uploaded_file($file_temp, 'upload/');
            // buat query update
            $sql="UPDATE surat_keluar SET id_suratk = '$id_suratk', no_suratk = '$no_suratk', perihal = '$perihal',
            id_user = '$id_user', id_suratm = '$id_suratm', tujuan_surat = '$tujuan_surat', 
            file_suratk = '$file_suratk',tgl_suratkeluar='$tgl_surat'
            WHERE id_suratk=$id_suratk";

            $query=mysqli_query($db, $sql);

            // apakah query update berhasil?
        }if($query) {
                // kalau berhasil alihkan ke halaman list-siswa.php
                echo '<script>alert("Edit data Surat Masuk berhasil"); document.location.href="kelola_suratmasukpk.php"</script>';
            }
        } else{
          $sql="UPDATE surat_keluar SET id_suratk = '$id_suratk', no_suratk = '$no_suratk', perihal = '$perihal',
          id_user = '$id_user', id_suratm = '$id_suratm', tujuan_surat = '$tujuan_surat', 
          tgl_suratkeluar='$tgl_surat'
          WHERE id_suratk=$id_suratk";
         $query=mysqli_query($db, $sql);
        if(!$query){
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }
    

    else{
        echo '<script>alert("Edit data Surat Keluar berhasil"); document.location.href="kelola_suratkeluarsk.php"</script>';
            }
}
}
        
    ?>