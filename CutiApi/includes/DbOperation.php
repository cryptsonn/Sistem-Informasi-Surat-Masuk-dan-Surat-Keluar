<?php
 
class DbOperation
{
    //Database connection link
    private $con;
 
    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';
 
        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();
 
        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }
	
	/*
	* The create operation
	* When this method is called a new record is created in the database
	*/
	function createCuti($nip, $lamaCuti, $tglPengajuanCuti, $tglMulaiCuti, $tglAkhirCuti, $keterangan, $izin){
		$stmt = $this->con->prepare("INSERT INTO formcuti (nip, lamaCuti, tglPengajuanCuti, tglMulaiCuti, tglAkhirCuti, keterangan, izin) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss", $nip, $lamaCuti, $tglPengajuanCuti, $tglMulaiCuti, $tglAkhirCuti, $keterangan, $izin);
		if($stmt->execute())
			return true; 
		return false; 
	}

	// function userRegis ($username,$email,$password){ 
	// 	$stmt = $this->con->prepare("INSERT INTO login (username,email,password) VALUES (?, ?, ?)");
	// 	$stmt->bind_param("sss", $username, $email, $password);
	// 	if($stmt->execute())
	// 		return true; 
	// 	return false; 
	// }

	// function userLogin($username,$password){
	// 	$stmt = $this->con;
	// 	$hasil = $stmt->query("SELECT * FROM login WHERE username = '$username' AND password = '$password'  ");

	// 	if ($hasil->num_rows == 1) {
	// 		return true;

	// 	}
	// 	return false;
	// }

	/*
	* The read operation
	* When this method is called it is returning all the existing record of the database
	*/
	function getCuti(){
		$stmt = $this->con->prepare("SELECT id, nip, lamaCuti, tglPengajuanCuti, tglMulaiCuti, tglAkhirCuti, keterangan, izin FROM formcuti");
		$stmt->execute();
		$stmt->bind_result($id, $nip, $lamaCuti, $tglPengajuanCuti, $tglMulaiCuti, $tglAkhirCuti, $keterangan, $izin);
		
		$cutis = array(); 
		
		while($stmt->fetch()){
			$cuti  = array();
			$cuti['id'] = $id; 
			$cuti['nip'] = $nip; 
			$cuti['lamaCuti'] = $lamaCuti; 
			$cuti['tglPengajuanCuti'] = $tglPengajuanCuti;
			$cuti['tglMulaiCuti'] = $tglMulaiCuti; 
			$cuti['tglAkhirCuti'] = $tglAkhirCuti;
			$cuti['keterangan'] = $keterangan;
			$cuti['izin'] = $izin;
			
			array_push($cutis, $cuti); 
		}
		
		return $cutis; 
	}
	
	/*
	* The update operation
	* When this method is called the record with the given id is updated with the new given values
	*/
	// function updateBook($id, $judul, $penulis, $penerbit, $jumlah, $bahasa){
	// 	$stmt = $this->con->prepare("UPDATE books SET judul = ?, penulis = ?, penerbit = ?, jumlah = ?, bahasa = ? WHERE id = ?");
	// 	$stmt->bind_param("sssssi", $judul, $penulis, $penerbit, $jumlah, $bahasa, $id);
	// 	if($stmt->execute())
	// 		return true; 
	// 	return false; 
	// }
	
	
	/*
	* The delete operation
	* When this method is called record is deleted for the given id 
	*/
	function deleteCuti($id){
		$stmt = $this->con->prepare("DELETE FROM formcuti WHERE id = ? ");
		$stmt->bind_param("i", $id);
		if($stmt->execute())
			return true; 
		
		return false; 
	}
}