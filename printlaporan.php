<?php
include('koneksi.php');
require('fpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta'); // change according timezone

$currentTime = date('d-m-Y h:i:s A', time());
$pdf = new FPDF('L', 'cm', 'A4');
$pdf->SetMargins(3, 3, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 11);
$pdf->SetX(6);
$pdf->SetFont('Arial', 'B', 14);
$pdf->ln(1);
$jenis = $_POST['jenis'];
$j = $_POST['j_laporan'];
$tgl = $_POST['tgl'];
$bulan = date('m', strtotime($tgl));
$tahun = date('Y', strtotime($tgl));
$pdf->MultiCell(21, 0.5, 'TOKO CATUR PAWAN', 15, 'C');
$pdf->Line(3, 6, 25, 6);
$pdf->SetLineWidth(0.1);
$pdf->Line(3, 6.1, 25, 6.1);
$pdf->SetLineWidth(0);
$pdf->SetFont('Arial', '', 11);
// penjualan
if ($j == 'penjualan') {
if ($jenis == 'har') {
    $pdf->MultiCell(21, 1, 'Laporan Penjualan Tanggal ' . $tgl, 10, 'C');
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->ln(1);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(4, 0.8, 'Tanggal', 1, 0);
    $pdf->Cell(7, 0.8, 'Barang', 1, 0);
    $pdf->Cell(3, 0.8, 'Jumlah', 1, 0);
    $pdf->Cell(3, 0.8, 'Harga', 1, 0);
    $pdf->Cell(5, 0.8, 'subtotal', 1, 0);
    $pdf->SetFont('Arial', '', 10);
    $jual = q("SELECT tanggal, nama_produk, qty, harga, qty*harga as sub from detail_pesanan WHERE date(tanggal)='$tgl' ORDER BY sub DESC");
	$total = 0;
    while ($row = mysqli_fetch_array($jual)) {
        $pdf->ln(1);
		$pdf->Cell(4, 0.8, $row['tanggal'], 1, 0);
        $pdf->Cell(7, 0.8, $row['nama_produk'], 1, 0);
        $pdf->Cell(3, 0.8, $row['qty'], 1, 0);
		$pdf->Cell(3, 0.8, 'Rp '.$row['harga'], 1, 0);
		$pdf->Cell(5, 0.8, 'Rp '. $row['sub'], 1, 0);
		$total = $total + $row['sub'];
    }
	$pdf->ln(1);
    $pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(17, 0.8, 'Total', 1, 0);
    $pdf->Cell(5, 0.8, "Rp " . number_format($total, 0,	 ',', '.'), 1, 1);
	
    $pdf->Output('Laporan_Penjualan_tgl_' . $tgl . '.pdf', "I");
} else if ($jenis == 'bul') {
    $pdf->MultiCell(21, 1, 'Laporan Penjualan Bulan ' . $bulan . '/' . $tahun, 10, 'C');
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->ln(1);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(4, 0.8, 'Tanggal', 1, 0);
    $pdf->Cell(7, 0.8, 'Barang', 1, 0);
    $pdf->Cell(3, 0.8, 'Jumlah', 1, 0);
    $pdf->Cell(3, 0.8, 'Harga', 1, 0);
    $pdf->Cell(5, 0.8, 'subtotal', 1, 0);
    $pdf->SetFont('Arial', '', 10);
    $jual = q("SELECT tanggal, nama_produk, qty, harga, qty*harga as sub from detail_pesanan WHERE month(tanggal)=$bulan and year(tanggal)=$tahun ORDER BY sub DESC");
	$total = 0;
    while ($row = mysqli_fetch_array($jual)) {
		$pdf->ln(1);
        $pdf->Cell(4, 0.8, $row['tanggal'], 1, 0);
        $pdf->Cell(7, 0.8, $row['nama_produk'], 1, 0);
        $pdf->Cell(3, 0.8, $row['qty'], 1, 0);
		$pdf->Cell(3, 0.8, 'Rp '.$row['harga'], 1, 0);
		$pdf->Cell(5, 0.8, 'Rp '.$row['sub'], 1, 0);
		$total = $total + $row['sub'];
    }
	$pdf->ln(1);
    $pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(17, 0.8, 'Total', 1, 0);
    $pdf->Cell(5, 0.8, "Rp " . number_format($total, 0,	 ',', '.'), 1, 1);
    
    $pdf->Output('Laporan_Penjualan_bulan_' . $bulan . '_tahun_' . $tahun . '.pdf', "I");
} else {
    $pdf->MultiCell(21, 1, 'Laporan Penjualan Tahun ' . $tahun, 10, 'C');
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->ln(1);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(4, 0.8, 'Tanggal', 1, 0);
    $pdf->Cell(7, 0.8, 'Barang', 1, 0);
    $pdf->Cell(3, 0.8, 'Jumlah', 1, 0);
    $pdf->Cell(3, 0.8, 'Harga', 1, 0);
    $pdf->Cell(5, 0.8, 'subtotal', 1, 0);
    $pdf->SetFont('Arial', '', 10);
	$jual = q("SELECT tanggal, nama_produk, qty, harga, qty*harga as sub from detail_pesanan WHERE year(tanggal)=$tahun ORDER BY sub DESC");
	$total = 0;
    while ($row = mysqli_fetch_array($jual)) {
        $pdf->ln(1);
		$pdf->Cell(4, 0.8, $row['tanggal'], 1, 0);
        $pdf->Cell(7, 0.8, $row['nama_produk'], 1, 0);
        $pdf->Cell(3, 0.8, $row['qty'], 1, 0);
        $pdf->Cell(3, 0.8, 'Rp '.$row['harga'], 1, 0);
		$pdf->Cell(5, 0.8, 'Rp '.$row['sub'], 1, 0);
		$total = $total + $row['sub'];
    }
	$pdf->ln(1);
    $pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(17, 0.8, 'Total', 1, 0);
    $pdf->Cell(5, 0.8, "Rp " . number_format($total, 0,	 ',', '.'), 1, 1);
    
    $pdf->Output('Laporan_Penjualan_tahun_' . $tgl . '.pdf', "I");
}

// selain penjualan //

} else {
        $pdf->MultiCell(21, 1, 'Laporan Persediaan ', 10, 'C');
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->ln(1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(8, 0.8, 'Nama produk', 1, 0);
        $pdf->Cell(7, 0.8, 'Pemasok', 1, 0);
        $pdf->Cell(7, 0.8, 'Stok', 1, 0);
        $pdf->SetFont('Arial', '', 10);
        $jual = q("select produk.*,pemasok.* from produk,pemasok where produk.id_pemasok=pemasok.pemasok_id order by produk.produk_id desc");
        $total = 0;
        while ($row = mysqli_fetch_array($jual)) {
            $pdf->ln(1);
            $pdf->Cell(8, 0.8, $row['nama_produk'], 1, 0);
            $pdf->Cell(7, 0.8, $row['nama_pemasok'], 1, 0);
            $pdf->Cell(7, 0.8, $row['stok_produk'], 1, 0);
        }

        $pdf->Output('Laporan_Penjualan_tgl_' . $tgl . '.pdf', "I");
}   