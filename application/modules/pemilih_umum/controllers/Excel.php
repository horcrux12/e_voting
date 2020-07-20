<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\IOFactory;

    class Excel extends MY_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('pemilih_umum/m_pemilih_umum');
        }

        public function source(){
            $spreadsheet = new Spreadsheet();
            $spreadsheet->getProperties()->setCreator('E-Voting')
            ->setLastModifiedBy('E-Voting')
            ->setTitle('Format Import by Excel Pemilih Pelajar')
            ->setSubject('Format')
            ->setDescription('isi kolom kosong dibawah')
            ->setKeywords('phpspreadsheet')
            ->setCategory('Test result file');

            $spreadsheet->getActiveSheet()
            ->setCellValue('A1','No. Identitas')
            ->setCellValue('B1','No. KK')
            ->setCellValue('C1','Nama')
            ->setCellValue('D1','Gender')
            ->setCellValue('E1','Tempat Lahir')
            ->setCellValue('F1','Tanggal Lahir')
            ->setCellValue('G1','Alamat')
            ->setCellValue('H1','Provinsi')
            ->setCellValue('I1','Kabupaten/Kota')
            ->setCellValue('J1','Kecamatan')
            ->setCellValue('K1','Desa/Kelurahan')
            ->setCellValue('L1','Pekerjaan');
            
            $styleArray = [
                'font' => [
                    'bold' => true,
                ]
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:L1')->applyFromArray($styleArray);
            //set column dimension
            foreach(range('A','L') as $col){
                $spreadsheet->getSheet(0)
                ->getColumnDimension($col)
                ->setAutoSize(true);
            }

            //rename worksheet
            $spreadsheet->getSheet(0)->setTitle('FORMAT INSERT');

            
            //<---- Contoh Pengisian SHEET START ---->

            //set header table
            $spreadsheet->createSheet(1)
            ->setCellValue('A1', 'Kolom')
            ->setCellValue('B1', 'Pengisian');
            
            $styleArray = [
                'font' => [
                    'bold' => true,
                ]
            ];
            $spreadsheet->getSheet(1)->getStyle('A1:B1')->applyFromArray($styleArray);

            //set column dimension
            $spreadsheet->getSheet(1)
            ->getColumnDimension('A')
            ->setAutoSize(true);
            $spreadsheet->getSheet(1)
            ->getColumnDimension('B')
            ->setAutoSize(true);

            // No Identitas
            $spreadsheet->getSheet(1)
            ->setCellValue('A1', 'No. Identitas')
            ->setCellValue('B2', 'Pada kolom ini Anda dapat mengisikan dengan Nomor Induk Kependudukan (NIK) sesuai dengan yang tertera di KTP');

            // Gender
            $spreadsheet->getSheet(1)
            ->setCellValue('A2', 'No. KK')
            ->setCellValue('B2', 'Isi kolom ini dengan Nomor Kartu Keluarga (KK) sesuai dengan yang tertera di KK');

            // Tempat Lahir
            $spreadsheet->getSheet(1)
            ->setCellValue('A3', 'Nama')
            ->setCellValue('B3', 'Isi kolom ini dengan nama lengkap sesuai dengan yang tertera dalam kartu identitas');

            // Gender
            $spreadsheet->getSheet(1)
            ->setCellValue('A4', 'Gender')
            ->setCellValue('B4', 'Isi kolom ini dengan "L" untuk Laki-laki atau "P" untuk Perempuan sesuai dengan yang tertera dalam kartu identitas');
            
            // Tempat Lahir
            $spreadsheet->getSheet(1)
            ->setCellValue('A5', 'Tempat Lahir')
            ->setCellValue('B5', 'Isi kolom ini dengan tempat lahir sesuai dengan yang tertera dalam kartu identitas');

            // Tanggal Lahir
            $spreadsheet->getSheet(1)
            ->setCellValue('A6', 'Tanggal Lahir')
            ->setCellValue('B6', 'Isi kolom ini dengan tangal lahir sesuai dengan yang tertera dalam kartu identitas dengan format pengisian Tahun-Bulan-Tanggal contoh : 1998-06-13');

            // Alamat
            $spreadsheet->getSheet(1)
            ->setCellValue('A7', 'Alamat')
            ->setCellValue('B7', 'Isi kolom ini dengan alamat sesuai dengan yang tertera dalam kartu identitas');

            // Provinsi
            $spreadsheet->getSheet(1)
            ->setCellValue('A8', 'Provinsi')
            ->setCellValue('B8', 'Isi kolom ini dengan provinsi sesuai dengan yang tertera dalam kartu identitas');

            // Kabupaten/Kota
            $spreadsheet->getSheet(1)
            ->setCellValue('A9', 'Kabupaten/Kota')
            ->setCellValue('B9', 'Isi kolom ini dengan Kabupaten/Kota sesuai dengan yang tertera dalam kartu identitas');

            // Kecamatan
            $spreadsheet->getSheet(1)
            ->setCellValue('A10', 'Kecamatan')
            ->setCellValue('B10', 'Isi kolom ini dengan Kecamatan sesuai dengan yang tertera dalam kartu identitas');

            // Desa/Kelurahan
            $spreadsheet->getSheet(1)
            ->setCellValue('A11', 'Desa/Kelurahan')
            ->setCellValue('B11', 'Isi kolom ini dengan Desa/Kelurahan sesuai dengan yang tertera dalam kartu identitas');

            // Pekerjaan
            $spreadsheet->getSheet(1)
            ->setCellValue('A12', 'Pekerjaan')
            ->setCellValue('B12', 'Isi kolom ini dengan Pekerjaan sesuai dengan yang tertera dalam kartu identitas');

            //rename worksheet
            $spreadsheet->getSheet(1)->setTitle('Aturan Pengisian');

            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $spreadsheet->setActiveSheetIndex(0);



            //set header
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //make it attachment
            header('Content-Disposition: attachment;filename="format-import-data-pemilih-umum.xlsx"');

            //create IOFactory object
            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            //save into php output
            $writer->save('php://output');
        }

        public function read() {
            if (!empty($_FILES['excel']['name'])) {
                $reader = IOFactory::createReader('Xlsx');
                $reader->setReadDataOnly(TRUE);
                $spreadsheet = $reader->load($_FILES['excel']['tmp_name']);
                $data = $spreadsheet->getSheet(0)
                ->toArray(null,true,true,true);
                
                $input      = $this->input->post();
                $i          = 1;
                $last_row   = $this->m_pemilih_umum->last_no_uruts($input['kegiatan'], $input['tps']);
                $now_row    = $last_row + 1;
                $data_pemilih_umum   = array();
            
                foreach ($data as $key) {
                    if ($i == 1) {
                        if ($key['A'] == 'No. Identitas' && $key['B'] == 'No. KK' && $key['C'] == 'Nama' && $key['D'] == 'Gender'  && $key['E'] == 'Tempat Lahir' && $key['F'] == 'Tanggal Lahir'  && $key['G'] == 'Alamat'  && $key['H'] == 'Provinsi'  && $key['I'] == 'Kabupaten/Kota'  && $key['J'] == 'Kecamatan'  && $key['K'] == 'Desa/Kelurahan'  && $key['L'] == 'Pekerjaan') {
                            // Nothing to do
                        }else{
                            $this->session->set_flashdata('error', 'Format Tidak Sesuai');
                            redirect('pemilih_umum');
                        }
                    }else{
                        if (!empty($key['A']) && !empty($key['B']) && !empty($key['C']) && !empty($key['D']) && !empty($key['E']) && !empty($key['F']) && !empty($key['G']) && !empty($key['H']) && !empty($key['I']) && !empty($key['J']) && !empty($key['K']) && !empty($key['L'])){
                            $value = $spreadsheet->getSheet(0)->getCell('F'.$i)->getValue();
                            if (validateDate($value,'Y-m-d') == false) {
                                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)->format('Y-m-d');
                            }else{
                                $date = date('Y-m-d',strtotime($value));
                            }
                            $data_pemilih_umum[] = array(
                                'no_identitas'		=> $key['A'],
                                'no_kk'				=> $key['B'],
                                'nama'	            => $key['C'],
                                'gender'			=> $key['D'],
                                'tempat_lahir'      => $key['E'],
                                'tanggal_lahir'     => $date,
                                'alamat'		    => $key['G'],
                                'provinsi'		    => $key['H'],
                                'kab_kot'		    => $key['I'],
                                'kecamatan'			=> $key['J'],
                                'desa_kelurahan'    => $key['K'],
                                'no_urut'		    => $now_row++,
                                'status'			=> 1,
                                'pekerjaan'			=> $key['L'],
                                'id_kegiatan'       => $input['kegiatan'],
                                'id_tps'			=> $input['tps'],
                            );
                        }
                    }
                    $i++;
                }
                    
                // echo "<pre>";
                // print_r($data_pemilih_umum);
                // echo "</pre>";

                if (!empty($data_pemilih_umum)) {
                    $save_data = $this->m_dinamic->store_batch('data_pemilih_umum',$data_pemilih_umum);
                    if ($save_data) {
                        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                        redirect('pemilih_umum');
                    }else{
                        $this->session->set_flashdata('error', 'Gagal menambahkan data');
                        redirect('pemilih_umum');
                    }
                }
            }else{
                $this->session->set_flashdata('error', 'File Tidak Ada !!!');
                redirect('pemilih_umum');
            }
        }
    }
?>