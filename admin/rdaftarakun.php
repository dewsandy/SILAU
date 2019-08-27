<?php
session_start();
require('fpdf.php');
require('config/config.php');
	class PDF extends FPDF
	{
	// Page header

		function Header()
		{
			// Logo
			$this->Image('pens.png',10,14,20);
			// Arial bold 15
			$this->SetFont('Arial','B',14);
			// Move to the right
			$this->Cell(20);
			// Title
			$this->Cell(19.5,10,'Politeknik Elektronika Negeri Surabaya',0,'L'); 
			$this->Ln(5);$this->Cell(20);
			$this->Cell(19.5,10,'Core Inc',0,'L'); 
			$this->Ln(5);$this->Cell(20);$this->SetFont('Arial','B',10);
			$this->Cell(19.5,10,'Jl.Raya ITS - Kampus PENS ,Sukolilo',0,'L');
			$this->Ln(5);$this->Cell(20);
			$this->Cell(19.5,10,'Surabaya 6011,Indonesia',0,'L'); 
			$this->Ln(5);$this->Cell(20);
			$this->Cell(19.5,10,'website : www.pens.ac.id',0,'L'); 	
			$this->Line(15,40,190,40); 
			$this->SetLineWidth(0.1); 
			$this->Line(15,41,190,41); 
			$this->SetLineWidth(7); 
			// Line break
			$this->Ln(20);
		}

		// Page footer
		function Footer()
		{
			// Position at 1.5 cm from bottom
			$this->SetY(-15);
			// Arial italic 8
			$this->SetFont('Helvetica','I',8);
			// Page number
			$this->Cell(0,10,'Copyright@CoreInc 2017',0,0,'C');
			$this->Cell(0,10,'Hal '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}
	date_default_timezone_set('Asia/Jakarta');
	$date = date('Y-m-d H:i:s');
	$d = date('d-m-Y');
	$tod = date('Y-m-d');
	$day = date("D",strtotime($date));
	$mounth = date("Y-m",strtotime($date));

	switch ($day) {
		case 'Mon':
				$dayCode = "Senin";
			break;
		case 'Tue':
				$dayCode = "Selasa";
			break;
		case 'Wed':
				$dayCode = "Rabu";
			break;
		case 'Thu':
				$dayCode = "Kamis";
			break;
		case 'Fri':
				$dayCode = "Jumat";
			break;
		case 'Sat':
				$dayCode = "Sabtu";
			break;
		case 'Sun':
				$dayCode = "Minggu";
			break;
		
		default:
				echo "Hari Tidak Valid";
			break;
	}
	// Instanciation of inherited class
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(4);
	$pdf->Cell(19.5,0,'Dilihat Pada : '.$dayCode.' , '.$d.'',0,'L'); 
	$pdf->Ln(10); 
	$pdf->Cell(4);
	$pdf->Cell(20,7,'Nomer',1,0,'C');
	$pdf->Cell(50,7,'Username',1,0,'C');
	$pdf->Cell(50,7,'Nama',1,0,'C');
	$pdf->Cell(50,7,'Telepon',1,0,'C');
	
	$pdf->Ln(); 
	
	$pdf->SetFont('Times','',12);
	$nomor=1;
	$hasil= mysqli_query($conn,"SELECT * FROM akun WHERE username!='admin' ");
	while($row=$hasil -> fetch_assoc()){ 
		$pdf->Cell(4);
		$pdf->SetFillColor(255,255,255); 
		$pdf->Cell(20,7,$nomor++,1,0,'C',true); 
		$pdf->Cell(50,7,$row['USERNAME'],1,0,'C',true); 
		$pdf->Cell(50,7,$row['NAMA'],1,0,'C',true);
		$pdf->Cell(50,7,$row['TELP'],1,0,'C',true);  
		$pdf->Ln(); 
	} 
	/*
	$sum= $conn -> query("SELECT SUM(total) AS totalitem FROM transaksi WHERE beli LIKE '".$tod."'");
	$r = $sum -> fetch_assoc();
	$s= $conn -> query("SELECT SUM(makanan) AS totalmakanan FROM transaksi WHERE beli LIKE '".$tod."'");
	$ro = $s -> fetch_assoc();
	$d= $conn -> query("SELECT SUM(minuman) AS totalminuman FROM transaksi WHERE beli LIKE '".$tod."'");
	$rd = $d -> fetch_assoc();
	if($r != 0){
		$pdf->Cell(4);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(35,7,'Total ',1,0,'L',true); 
		$pdf->Cell(35,7,'Rp										 '.number_format($ro['totalmakanan']).'',1,0,'L',true);
		$pdf->Cell(35,7,'Rp										 '.number_format($rd['totalminuman']).'',1,0,'L',true);
		$pdf->Cell(35,7,'Total Transaksi',1,0,'L'); 
		$pdf->Cell(35,7,'Rp										 '.number_format($r['totalitem']).'',1,0,'L',true);
	}else{	
		$pdf->Cell(4);
		$pdf->Cell(175,7,'Tidak ada transaksi pada hari ini',1,0,'C'); 
	}*/
	$pdf->Ln(10);
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(4);
	$pdf->Cell(35,5,'Core Inc',0,0,'L',true);
	$pdf->Ln(10);
	$pdf->Cell(4);
	$pdf->Cell(35,5,'ttd',0,0,'L',true);
	$pdf->Ln(10);
	$pdf->Cell(4);
	$pdf->Cell(35,5,''.$_SESSION['user'].'',0,0,'L',true);
	$pdf->Output();
?>