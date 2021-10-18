<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends CI_Controller
{


	function index()
	{
		$report = $this->db->query("SELECT * FROM tb_lokasi WHERE userid = 'sigitsuryono25'")->result();
		$spreadsheet  = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->getStyle('A1:E999')
			->getAlignment()->setWrapText(true);

		$sheet->mergeCells("A1:A2");
		$sheet->mergeCells("B1:B2");
		$sheet->mergeCells("C1:D1");
		$sheet->mergeCells("E1:E2");
		$sheet->mergeCells("F1:F2");
		$sheet->mergeCells("G1:G2");
		$sheet->mergeCells("H1:H2");
		$sheet->mergeCells("I1:I2");
		$sheet->mergeCells("J1:J2");
		$sheet->mergeCells("K1:K2");
		$sheet->mergeCells("L1:M1");
		$sheet->mergeCells("N1:N2");

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Date');
		$sheet->setCellValue('C1', 'Fishing Gear');
		$sheet->setCellValue('C2', 'Fishing Gear');
		$sheet->setCellValue('D2', 'Mesh Size');
		$sheet->setCellValue('E1', 'Amount of Fishing Gear');
		$sheet->setCellValue('F1', 'Fishing Ground');
		$sheet->setCellValue('G1', 'Location');
		$sheet->setCellValue('H1', 'Operation Time (Hours)');
		$sheet->setCellValue('I1', 'Name Of Fish');
		$sheet->setCellValue('J1', 'Total Catch');
		$sheet->setCellValue('K1', 'Used For');
		$sheet->setCellValue('L1', 'Price/KG');
		$sheet->setCellValue('L2', 'Price');
		$sheet->setCellValue('M2', 'Currency');
		$sheet->setCellValue('N1', 'Grand Total Catch (Kg)');
		$no = 1;
		$x = 2;
		foreach($report as $r){
			$sheet->setCellValue("A$x", $no++);
			$sheet->setCellValue("B$x", $r->tanggal);
			$sheet->setCellValue("C$x", $r->alat_tangkap);
			// $sheet->setCellValue("D$x");
			// $sheet->setCellValue("E$x");
			// $sheet->setCellValue("F$x");
			// $sheet->setCellValue("G$x");
			// $sheet->setCellValue("H$x");
			// $sheet->setCellValue("J$x");
			// $sheet->setCellValue("K$x");
			// $sheet->setCellValue("L$x");
			// $sheet->setCellValue("M$x");
			// $sheet->setCellValue("N$x");

			$x++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-siswa';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
