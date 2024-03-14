<?php
// ambil tada get
$tag_id = $_GET['tag_id'];
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
$query = "SELECT * FROM sensordata2 WHERE tag = '$tag_id' ORDER BY reading_time DESC";
$result = mysqli_query($conn, $query);

// Menambahkan header pada file Excel
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Sensor No');
$sheet->setCellValue('C1', 'Waktu');

// Menambahkan data ke file Excel
$i = 2;
$nomor = 1;
while ($row = mysqli_fetch_array($result)) {
    $sheet->setCellValue('A' . $i, $nomor);
    $sheet->setCellValue('B' . $i, $row['nodeID']);
    $sheet->setCellValue('C' . $i, $row['reading_time']);
    $i++;
    $nomor++;
}

// Menentukan header file Excel
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="rekap_tag.xlsx"');
header('Cache-Control: max-age=0');

// Mengunduh file Excel
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
