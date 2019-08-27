<?php  
include("../loginserver.php");
include 'Flash.php';
date_default_timezone_set('Asia/Jakarta');
//------------- Tambah-----------------//
/*if (isset($_POST['tambah_akun'])) {
	extract($_POST);
	$ver = $_POST['veri'];
	$v = $_POST['ver'];
	if($ver != $v) {
		flash( 'gagal', 'Kode verifikasi anda salah' );
		echo '<script>history.back();</script>';
	}
	else{
		$c = $conn->query("UPDATE akun SET EMAIL = '".$_POST['email']."', PASSWORD='".sha1($_POST['password'])."'
			,NAMA = '".$_POST['nama']."',TELP='".$_POST['telp']."'
			WHERE ID_AKUN=".$_POST['idakun']."
		");
		if($c)	flash( 'sukses', 'Akun bernama '.$nama.' berhasil diubah' );
		else flash( 'gagal','Gagal mengubah akun');
		header('Location: ../?page=daftar_akun');
	}
}*/

if (isset($_POST['tambah_akun'])) {
	extract($_POST);
	$ver = $_POST['veri'];
	$v = $_POST['ver'];
	if($ver != $v) {
		flash( 'gagal', 'Kode verifikasi anda salah' );
		echo '<script>history.back();</script>';
	}
	else{
		$select = $conn->query("SELECT * FROM akun WHERE ID_AKUN=".$_POST['idakun']);
		if($select -> num_rows == 0){
			$inuser = $conn -> query("INSERT INTO `akun`(`ID_AKUN`, `USERNAME`, `PASSWORD`,
				`NAMA`, `TELP`, `HAKAKSES`) 
				VALUES (".$_POST['idakun'].",'".$_POST['username']."','".sha1($_POST['password'])."',
					'".$_POST['nama']."','".$_POST['telp']."','0')");
				if($inuser)	flash( 'sukses', 'Akun bernama '.$_POST['nama'].' berhasil ditambah' );
				else flash( 'gagal','Gagal menginputkan akun');
				header('Location: ../?page=daftar_akun');
		}else{
			flash( 'gagal','Gagal');
			header('Location: ../?page=daftar_akun');
		}		
		//$c = $conn->query("");
		/*if($c)	flash( 'sukses', 'Akun bernama '.$nama.' berhasil diubah' );
		else flash( 'gagal','Gagal mengubah akun');
		header('Location: ../?page=daftar_akun');*/
	}
}

if (isset($_POST['tambah_harga'])) {
	//var_dump($_POST);
	extract($_POST);
	$jenis = $_POST['jenis_laundry'];
	$res = $conn -> query("SELECT * FROM harga WHERE JENIS_LAUNDRY=$jenis");
	$row = $res -> num_rows;
	if($row == 0){
		$c = mysqli_query($conn,"INSERT INTO harga (HARGA , JENIS_LAUNDRY) VALUES ('$harga', '$jenis_laundry')");
		if($c) {		flash( 'sukses', 'Sukses menambah daftar harga ' );}
		else{		flash( 'gagal','Gagal menambah harga'); echo "GAGAL";}
		header('Location: ../?page=daftar_harga');
	}
	else {
		flash( 'gagal','Tidak dapat menambah harga dengan Jenis yang sama'); 
		header('Location: ../?page=daftar_harga');
	}
}

if (isset($_POST['tambah_jenis'])) {
	extract($_POST);
	$c = mysqli_query($conn,"INSERT INTO jenis_laundry (NAMA_LAUNDRY) VALUES ('$nama_laundry')");
	if($c) flash( 'sukses', 'Sukses menambah daftar jenis' );
	else flash( 'gagal','Gagal menambah harga');
	echo mysqli_errno($c);
	header('Location: ../?page=daftar_jenis');
}

if (isset($_POST['tambah_cucian'])) {
	var_dump($_POST);
	extract($_POST);
	$tgl = date('Y-m-d');
	echo "$tgl";
	$c = mysqli_query($conn,"INSERT INTO cucian (ID_AKUN, ID_HARGA, TANGGAL, BERAT, STATUS_BAYAR) VALUES ('$username','$harga', '$tgl', $berat, '0')");
	if($c) flash( 'sukses', 'Sukses menambah cucian' );
	else flash( 'gagal','Gagal menambah cucian');
	// header('Location: index.php?page=daftar_cucian');
}


//------------- Edit-----------------//
if (isset($_GET['edit_akun'])) {
	$euser = $conn->query("UPDATE akun SET HAKAKSES='0'
			WHERE ID_AKUN=".$_GET['edit_akun']."
		");
	if($euser)flash( 'sukses', 'Akun berhasil diverifikasi' );
	else flash( 'gagal','Gagal mengubah akun');
	header('Location: ../?page=daftar_akun');

}
if (isset($_GET['edit_laundry'])) {
	extract($_GET);
	
	$c = mysqli_query($conn,"UPDATE `jenis_laundry` SET `NAMA_LAUNDRY`=".$nama_laundry." WHERE ID_LAUNDRY=".$id_laundry."");
	var_dump($c);
	if($c)
		flash( 'sukses', 'Sukses update jenis laundry ' );
	else
		flash( 'gagal','Gagal menambah mengedit');
}
if (isset($_POST['edit_harga'])) {
	var_dump($_POST);
	extract($_POST);
	$c = mysqli_query($conn,"UPDATE harga SET JENIS_LAUNDRY=$jenis_laundry, HARGA=$harga WHERE id_harga=$id_harga");
	if($c)
		flash( 'suksesharga', 'Sukses update daftar harga ' );
	else
		flash( 'gagalharga','Gagal mengedit harga');
	//header('Location: ../?page=edit_harga&id_harga='.$id_harga);
	header('Location: ../?page=daftar_jenis');
}
//------------- Delete-----------------//
if (isset($_GET['delete_harga'])) {
	$j = $_GET['delete_harga'];
    $s = $conn -> query("SELECT * FROM harga h JOIN jenis_laundry j ON j.ID_LAUNDRY=h.JENIS_LAUNDRY WHERE ID_HARGA=$j");
    $sel = $s -> fetch_assoc();
    $h = $conn -> query("DELETE FROM harga WHERE ID_HARGA=$j");
    if($h)	flash( 'sukseshapus', 'harga '.$sel['HARGA'].' dari '.$sel['NAMA_LAUNDRY'].'  berhasil dihapus' );
	else flash( 'gagalhapus','Gagal menghapus data');
    header('Location: ../?page=daftar_harga');
}

if (isset($_GET['hapusbayar'])) {
	$j = $_GET['hapusbayar'];
    $s = $conn -> query("SELECT * FROM cucian AS c JOIN akun a ON a.ID_AKUN = c.ID_AKUN JOIN harga h 
    ON c.ID_HARGA=h.ID_HARGA JOIN jenis_laundry l ON l.ID_LAUNDRY=h.JENIS_LAUNDRY
    WHERE ID_CUCIAN=$j");
    $sel = $s -> fetch_assoc();
    $h = $conn -> query("DELETE FROM cucian WHERE ID_CUCIAN=$j");
    if($h)	flash( 'sukseshapus', 'Cucian dari '.$sel['NAMA'].' ('.$sel['NAMA_LAUNDRY'].') tanggal '.$sel['TANGGAL'].' berhasil dihapus' );
	else flash( 'gagalhapus','Gagal menghapus data');
    header('Location: ../?page=daftar_cucian');
}

if (isset($_GET['delete_akun'])){
    $akun = $_GET['delete_akun'];
    $s = $conn -> query("SELECT * FROM akun WHERE ID_AKUN=$akun");
    $sel = $s -> fetch_assoc();
    $h = $conn -> query("DELETE FROM akun WHERE ID_AKUN=$akun");
    if($h)	flash( 'sukseshapus', 'Akun bernama '.$sel['NAMA'].' berhasil dihapus' );
	else flash( 'gagalhapus','Gagal menghapus akun');
    header('Location: ../?page=daftar_akun');
}

if (isset($_GET['delete_jenis'])){
    $j = $_GET['delete_jenis'];
    $s = $conn -> query("SELECT * FROM jenis_laundry WHERE ID_LAUNDRY=$j");
    $sel = $s -> fetch_assoc();
    $h = $conn -> query("DELETE FROM jenis_laundry WHERE ID_LAUNDRY=$j");
    if($h)	flash( 'sukseshapus', 'Jenis Laundry bernama '.$sel['NAMA_LAUNDRY'].' berhasil dihapus' );
	else flash( 'gagalhapus','Gagal menghapus akun');
    header('Location: ../?page=daftar_jenis');
}
//-------------//
if (isset($_GET['cucianload'])) {
	$g = $conn -> query("SELECT * FROM cucian AS c JOIN akun a ON a.ID_AKUN = c.ID_AKUN JOIN harga h
			 ON c.ID_HARGA=h.ID_HARGA JOIN jenis_laundry l ON 
			 l.ID_LAUNDRY=h.JENIS_LAUNDRY WHERE STATUS_BAYAR = 0");
	$r = $g -> num_rows;
	if($r != 0)
	{
		while($row = $g -> fetch_assoc())
		{	
			if($row['ID_AKUN']==$_GET['cucianload']){
				echo "<label>Harga</label>";
				echo "<input type='text' name='#' value='Rp. ".number_format($row['HARGA']*$row['BERAT'])."'' class='form-control'>";
				echo "<label>Jenis Laundry</label>";
				echo "<input type='text' name='#' value='".$row['NAMA_LAUNDRY']."'' class='form-control'>";
				echo "<label>Status Bayar</label>";
				if($row['STATUS_BAYAR']==0){
						$s="Belum Bayar";
				}else{
						$s="Sudah Bayar";	
				}
				echo "<input type='text' name='#' value='".$s."'' class='form-control'>";
				echo "<label>Status Ambil</label>";
				if($row['STATUS_AMBIL']==0){
						$a="Belum Ambil";
				}else{
						$a="Sudah Ambil";	
				}
				echo "<input type='text' name='#' value='".$a."'' class='form-control'>";
				echo "<input type='text' name='#' value='".$row['TANGGAL']."'' class='form-control'>";
				//echo "<label>Opsi</label>";
			}
		}
	}
	else
	{
		echo "hello";
	}
}
if(isset($_GET['cucianid'])){
	date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d');
		//echo $date;
		$date2 = date('dmY');
		//echo $date;
		$r = $_GET['cucianid'];
		$pa = explode("@",$r);
		$IdPelanggan = $pa[0];
		$BeratCucian = $pa[1];
		$ModeCucian = $pa[2];
		print_r($pa);
		$sql = $conn -> query("SELECT * FROM jenis_laundry WHERE ID_LAUNDRY =".$ModeCucian);
		if($sql->num_rows != 0){
			$res = $sql -> fetch_assoc();
			$jenis_laundry = $res['ID_LAUNDRY'];
			$harga = $conn -> query("SELECT * FROM harga WHERE JENIS_LAUNDRY=".$jenis_laundry);
			if($harga -> num_rows != 0){
				$rs = $harga  -> fetch_assoc();
				$idharga = $rs['ID_HARGA'];
				$cekrowuser = $conn -> query("SELECT * FROM akun WHERE ID_AKUN='".$IdPelanggan."'");
				if($cekrowuser -> num_rows != 0){
					/*$c = $conn->query("INSERT INTO akun (ID_AKUN,USERNAME,NAMA,TELP,PASSWORD,HAKAKSES) VALUES
					('".$IdPelanggan."','".$IdPelanggan."','".rand()."', '0', '".sha1($IdPelanggan)."','0')");*/
					$cucian = $conn -> query ("SELECT * FROM cucian WHERE ID_AKUN=".$IdPelanggan." 
					AND ID_HARGA=".$idharga." AND TANGGAL='".$date."' AND BERAT=".$BeratCucian."");
					if($cucian -> num_rows == 0){
						$result = $conn -> query ("INSERT INTO `cucian`(`ID_AKUN`, `ID_HARGA`, 
						`TANGGAL`, `BERAT`) 
						VALUES (".$IdPelanggan.",".$idharga.",".$date2.",".$BeratCucian.")");
					}
				}
			}			
		}
}
if (isset($_POST['kirimbayar'])) {
	$date = date('Y-m-d');
	$update = $conn -> query("UPDATE cucian SET STATUS_AMBIL='1',STATUS_BAYAR='1',AMBIL='".$date."' WHERE
	ID_CUCIAN=".$_POST['idcucian']."");

	if($update)	flash( 'suksesbayar', 'Transaksi Berhasil' );
	else flash( 'gagalbayar','Gagal menghapus bayar');
    header('Location: ../?page=daftar_cucian&detailcucian='.$_POST['idcucian']);
}
if (isset($_GET['kirimsms'])) {
	$iduser= $_GET['kirimsms'];
	$s = mysqli_query($conn,"SELECT * FROM akun WHERE ID_AKUN='".$iduser."'");
	$res = $s -> fetch_assoc();
	$userkey="64fx93"; 
	$passkey="core91"; 
	$nama =$res['NAMA'];
	$password = "core";
	$nohp=$res['TELP'];
	$message="SILAU MESSAGE CENTER. Terimakasih Sudah Memilih Layanan Kami.
	Cucian dengan nama ".$nama." Sudah dapat diambil.
	Terimakasih";

	$data = array(
    	'userkey' => $userkey,
    	'passkey' => $passkey,
    	'nohp' => $nohp,
    	'pesan' => $message
	);
	$postString = http_build_query($data, '', '&');
	$ch = curl_init();
	$url = 'https://reguler.zenziva.net/apps/smsapi.php';
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_HEADER, false); 
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Content-Type: application/x-www-form-urlencoded'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);     

	$result = curl_exec($ch);
	if ($result) {
		 flash( 'sukseskirimsms','Sukses Kirim SMS');
		  header('Location: ../?page=daftar_cucian');
	}
}
?>