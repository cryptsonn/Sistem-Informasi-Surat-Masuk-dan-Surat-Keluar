<?php include("koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])) {

    // ambil data dari formulir
    $id_suratm=$_POST['id_suratm'];
    $no_suratm=$_POST['no_suratm'];
    $disposisi_tujuan=$_POST['disposisi_tujuan'];
    $file_surat=$_FILES['file_surat']['name'];
    $perihal=$_POST['perihal'];
    
    date_default_timezone_set('Asia/Jakarta');
    $tgl_suratm=date("Y-m-d H:i:s");

    if($file_surat ="") {
        $ekstensi_diperbolehkan=array('pdf');
        $x=explode('.', $file_surat);
        $ekstensi=strtolower(end($x));
        $file_temp=$_FILES['file_surat']['name'];

        if(in_array($ekstensi, $ekstensi_diperbolehkan)===true) {
            move_uploaded_file($file_temp, 'upload/');
            // buat query update
            $sql="UPDATE surat_masuk SET id_suratm='$id_suratm', tgl_suratmasuk='$tgl_suratm', no_suratm='$no_suratm',disposisi_tujuan='$disposisi_tujuan',
            file_surat='$file_surat',
            perihal='$perihal'WHERE id_suratm=$id_suratm";

            $query=mysqli_query($db, $sql);

            // apakah query update berhasil?
        }if($query) {
                // kalau berhasil alihkan ke halaman list-siswa.php
                echo '<script>alert("Edit data Surat Masuk berhasil"); document.location.href="kelola_suratmasukpk.php"</script>';
            }
        } else{
            $sql="UPDATE surat_masuk SET id_suratm='$id_suratm', tgl_suratmasuk='$tgl_suratm', no_suratm='$no_suratm',disposisi_tujuan='$disposisi_tujuan',
                        perihal='$perihal'WHERE id_suratm=$id_suratm";
            
                        $query=mysqli_query($db, $sql);
        if(!$query){
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }
    

    else{
        echo '<script>alert("Edit data Surat Masuk berhasil"); document.location.href="kelola_suratmasukpk.php"</script>';
            }
}
}
        
    ?>