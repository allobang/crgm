<?php
require_once '../../phpspreadsheet/vendor/autoload.php'; // Adjust the path as needed
include_once '../../database.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Add a worksheet
$sheet = $spreadsheet->getActiveSheet();

// Set headers and column widths
$headers = ["Date", "O.R No.", "Name", "A. Crop Enterprises", "Poultry", "Large Ruminants", "Aqua Culture", "ID Fee", "ID Lace", "Hard Bound", "Cottage/Dorm", "Sablay", "Cap & Gown", "Deposit", "Disallowance", "Financial Assistance", "Internet Subsc", "Total"];
$sheet->fromArray([$headers], NULL, 'A1');

$columnWidths = [15, 15, 15, 20, 15, 20, 15, 10, 10, 15, 15, 10, 10, 10, 15, 15, 15, 15]; // Adjust as needed

foreach ($columnWidths as $column => $width) {
    $sheet->getColumnDimensionByColumn($column + 1)->setWidth($width);
}

// Fetch data from the database
$sql = "SELECT * FROM cashier_data";
$query = $conn->query($sql);

// Add data to the worksheet
$rowNumber = 2;
while ($row = $query->fetch_assoc()) {
    $rowData = [
        $row['date'], $row['ornumber'], $row['fullname'], $row['rice'], $row['poultry'], $row['large_ruminants'],
        $row['aqua_culture'], $row['id_fee'], $row['id_lace'], $row['hard_bound'], $row['cottage_dorm'],
        $row['sablay'], $row['cap_gown'], $row['deposit'], $row['disallowance'], $row['fin_assistance'],
        $row['internet_subsc'], '', // Add more fields as needed
    ];

    foreach ($rowData as $column => $value) {
        $sheet->setCellValueByColumnAndRow($column + 1, $rowNumber, $value);
    }

    $rowNumber++;
}

// Save the Excel file
$writer = new Xlsx($spreadsheet);
$filename = 'cashier_data_export.xlsx';
$writer->save($filename);

// Download the Excel file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
?>
