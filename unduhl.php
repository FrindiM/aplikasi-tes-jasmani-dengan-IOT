<?php
// Menghubungkan ke database
include "config.php";

// Memanggil library PhpSpreadsheet
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Membuat objek Spreadsheet
$spreadsheet = new Spreadsheet();

// Menentukan nama sheet
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Data Tabel MySQL');

// Mengambil data dari tabel MySQL
$query = "SELECT * FROM rekap_lari";
$result = mysqli_query($conn, $query);

// Menambahkan header pada file Excel
$sheet->setCellValue('A1', 'Nama');
$sheet->setCellValue('B1', 'Nomor Gelang');
$sheet->setCellValue('C1', 'Jumlah Putaran');
$sheet->setCellValue('D1', 'Jumlah Jarak');
$sheet->setCellValue('E1', 'Waktu Tes');

// Menambahkan data ke file Excel
$i = 2;
while ($row = mysqli_fetch_array($result)) {
    $sheet->setCellValue('A' . $i, $row['nama']);
    $sheet->setCellValue('B' . $i, $row['nomor']);
    $sheet->setCellValue('C' . $i, $row['putaran']);
    $sheet->setCellValue('D' . $i, $row['jarak']);
    $sheet->setCellValue('E' . $i, $row['waktu']);
    $i++;
}

// Menentukan header file Excel
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="rekap_lari.xlsx"');
header('Cache-Control: max-age=0');

// Mengunduh file Excel
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
