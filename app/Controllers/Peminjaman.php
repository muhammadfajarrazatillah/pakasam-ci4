<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\KecamatanModel;
use App\Models\DesaModel;
use App\Models\RakModel;
use App\Models\WarkahModel;
use App\Models\PeminjamanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Peminjaman extends ResourceController
{
		protected $helpers = ['custom'];
	
		function __construct()
		{
			$this->kecamatan = new KecamatanModel();
			$this->desa = new DesaModel();
			$this->rak = new RakModel();
			$this->warkah = new WarkahModel();
			$this->peminjaman = new PeminjamanModel();
		}
	
		public function index()
		{
			$data['peminjaman'] = $this->peminjaman->getAll();
			$data['filter_peminjaman'] = $this->filter_peminjaman();
			return view('peminjaman/index', $data);
		}

		public function filter_peminjaman() 
		{
		$data = $this->peminjaman->tampil_bulan_peminjaman();
        $list_filter[''] = 'Semua Data';
        foreach ($data as $filter) {
            if ($filter->bulan < 10) {
                $filter->bulan = '0' . $filter->bulan;
            }
            $list_filter[$filter->bulan . $filter->tahun] = $filter->nama_bulan . ' - ' . $filter->tahun;
        }
        return $list_filter;
		}
	
		public function new()
		{
			$data['kecamatan'] = $this->kecamatan->findAll();
			$data['desa'] = $this->desa->findAll();
			$data['rak'] = $this->rak->findAll();
			$data['warkah'] = $this->warkah->getAll();
			return view('peminjaman/new', $data);
		}
	
		public function create()
		{
			$data = $this->request->getPost();
			$data['status']='Dipinjam';
			$data['tanggal_kembali']='';
			$save = $this->peminjaman->insert($data);
			if(!$save) {
				return redirect()->back()->withInput()->with('errors', $this->peminjaman->errors());
			} else {
				return redirect()->to(site_url('peminjaman'))->with('succes', 'Data berhasil disimpan!');
			}
		}

		public function edit($id = null)
		{
			$peminjaman = $this->model->where('id_peminjaman', $id)->first();
			$data['peminjaman'] = $peminjaman;
		}

		public function update($id = null)
		{
			$data['status']='Dikembalikan';
			$data['tanggal_kembali']=date("Y-m-d H:i:s");
			$this->peminjaman->update($id, $data);
			return redirect()->to(site_url('peminjaman'));
		}	

		public function delete($id = null)
		{
			$this->peminjaman->delete($id);
			return redirect()->to(site_url('peminjaman'))->with('danger', 'Data berhasil dihapus!');
		}

		public function export()
		{
			$data = [
				"filters"			=> $this->filter_peminjaman(),
			];

			return view("peminjaman/export", $data);
		}
		public function doExport()
		{
			$filter = $this->request->getPost('filter');
			$peminjaman = $this->peminjaman->tampil_peminjaman_filter($filter);
			
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet = $spreadsheet->getActiveSheet()->mergeCells('A1:H1');
			$sheet = $spreadsheet->getActiveSheet()->mergeCells('A2:H2');
			$sheet = $spreadsheet->getActiveSheet()->mergeCells('A3:H3');
			$sheet->setCellValue('A1', 'Laporan Peminjaman Arsip');
			$sheet->setCellValue('A2', 'Kantor Pertanahan Kabupaten Hulu Sungai Tengah');
			$sheet->setCellValue('A3', '');
			$sheet->setCellValue('A4', 'No');
			$sheet->setCellValue('B4', 'No Hak/Surat Ukur/Surat Perintah Membayar');
			$sheet->setCellValue('C4', 'Jenis Arsip');
			$sheet->setCellValue('D4', 'Jenis Hak');
			$sheet->setCellValue('E4', 'Kecamatan');
			$sheet->setCellValue('F4', 'Desa');
			$sheet->setCellValue('G4', 'Tanggal Dipinjam');
			$sheet->setCellValue('H4', 'Tanggal Dikembalikan');

			$column = 5;
			foreach ($peminjaman as $key => $value) {
				$sheet->setCellValue('A'.$column, ($column-4));
				$sheet->setCellValue('B'.$column, $value->no_hak);
				$sheet->setCellValue('C'.$column, $value->jenis_arsip);
				$sheet->setCellValue('D'.$column, $value->jenis_hak);
				$sheet->setCellValue('E'.$column, $value->kecamatan);
				$sheet->setCellValue('F'.$column, $value->desa);
				$sheet->setCellValue('G'.$column, $value->tanggal);
				$sheet->setCellValue('H'.$column, $value->tanggal_kembali);
				$column++;
			}

			$sheet->getStyle('A1:H4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('A1:H1048576')->getFont()->setName('Calibri');
			$sheet->getStyle('A1:H1048576')->getFont()->setSize(11);
			$sheet->getStyle('A1:H1')->getFont()->setBold(true);
			$sheet->getStyle('A2:H2')->getFont()->setBold(true);
			$sheet->getStyle('A4:H4')->getFont()->setBold(true);
			$styleArray = [
				'borders' => [
					'allBorders' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						'color' => ['argb' => '00000000'],
					],
				],
			];
			$sheet->getStyle('A4:H'. ($column-1))->applyFromArray($styleArray);

			$sheet->getColumnDimension('A')->setAutoSize(true);
			$sheet->getColumnDimension('B')->setAutoSize(true);
			$sheet->getColumnDimension('C')->setAutoSize(true);
			$sheet->getColumnDimension('D')->setAutoSize(true);
			$sheet->getColumnDimension('E')->setAutoSize(true);
			$sheet->getColumnDimension('F')->setAutoSize(true);
			$sheet->getColumnDimension('G')->setAutoSize(true);
			$sheet->getColumnDimension('H')->setAutoSize(true);

			$writer = new Xlsx($spreadsheet);
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename=Laporan Peminjaman Arsip.xlsx');
			header('Cache-Control: max-age=0');
			$writer->save('php://output');
			exit();
		}
}
