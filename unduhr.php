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
$query = "SELECT * FROM renang";
$result = mysqli_query($conn, $query);

// Menambahkan header pada file Excel
$sheet->setCellValue('A1', 'Nomor Urut');
$sheet->setCellValue('B1', 'Waktu');
$sheet->setCellValue('C1', 'Skor');

// Menambahkan data ke file Excel
$i = 2;
while ($row = mysqli_fetch_array($result)) {
    $sheet->setCellValue('A' . $i, $row['nomor']);
    $sheet->setCellValue('B' . $i, $row['waktu']);
    $sheet->setCellValue('C' . $i, $row['skor']);
    $i++;
}

// Menentukan header file Excel
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="rekap_renang.xlsx"');
header('Cache-Control: max-age=0');

// Mengunduh file Excel
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
