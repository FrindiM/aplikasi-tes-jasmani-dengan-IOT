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
$query = "SELECT * FROM shuttle";
$result = mysqli_query($conn, $query);

// Menambahkan header pada file Excel
$sheet->setCellValue('A1', 'Nama');
$sheet->setCellValue('B1', 'Jenis Kelamin');
$sheet->setCellValue('C1', 'Putaran 1');
$sheet->setCellValue('D1', 'Putaran 2');
$sheet->setCellValue('E1', 'Putaran 3');
$sheet->setCellValue('F1', 'Skor');

// Menambahkan data ke file Excel
$i = 2;
while ($row = mysqli_fetch_array($result)) {
    $sheet->setCellValue('A' . $i, $row['nama']);
    $sheet->setCellValue('B' . $i, $row['jenis_kelamin']);
    $sheet->setCellValue('C' . $i, $row['p1']);
    $sheet->setCellValue('D' . $i, $row['p2']);
    $sheet->setCellValue('E' . $i, $row['p3']);
    $sheet->setCellValue('E' . $i, $row['skor']);
    $i++;
}

// Menentukan header file Excel
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="rekap_shutlle.xlsx"');
header('Cache-Control: max-age=0');

// Mengunduh file Excel
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
