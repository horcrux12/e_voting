<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\IOFactory;

    class Excel extends MY_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('pemilih_pelajar/m_pemilih_pelajar');
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
            ->setCellValue('B1','Nama')
            ->setCellValue('C1','Gender')
            ->setCellValue('D1','Tempat Lahir')
            ->setCellValue('E1','Tanggal Lahir')
            ->setCellValue('F1','Asal Sekolah/Universitas')
            ->setCellValue('G1','Kelas/Fakultas')
            ->setCellValue('H1','Jurusan')
            ->setCellValue('I1','Semester');
            
            $styleArray = [
                'font' => [
                    'bold' => true,
                ]
            ];
            $spreadsheet->getActiveSheet()->getStyle('A1:I1')->applyFromArray($styleArray);
            //set column dimension
            foreach(range('A','I') as $col){
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
            ->setCellValue('B2', 'Pada kolom ini Anda dapat mengisikan dengan Nomor Induk Siswa (NIS) atau Nomor Induk Mahasiswa (NIM) atau sejenisnya');

            // Gender
            $spreadsheet->getSheet(1)
            ->setCellValue('A2', 'Nama')
            ->setCellValue('B2', 'Isi kolom ini dengan nama lengkap sesuai dengan yang tertera dalam kartu identitas');

            // Tempat Lahir
            $spreadsheet->getSheet(1)
            ->setCellValue('A3', 'Gender')
            ->setCellValue('B3', 'Isi kolom ini dengan "L" untuk Laki-laki atau "P" untuk Perempuan sesuai dengan yang tertera dalam kartu identitas');

            // Tanggal Lahir
            $spreadsheet->getSheet(1)
            ->setCellValue('A4', 'Tempat Lahir')
            ->setCellValue('B4', 'Isi kolom ini dengan tempat lahir sesuai dengan yang tertera dalam kartu identitas');
            
            // Tanggal Lahir
            $spreadsheet->getSheet(1)
            ->setCellValue('A5', 'Tanggal Lahir')
            ->setCellValue('B5', 'Isi kolom ini dengan tangal lahir sesuai dengan yang tertera dalam kartu identitas dengan format pengisian Tahun-Bulan-Tanggal contoh : 1998-06-13');

            // Asal Sekolah/Universitas
            $spreadsheet->getSheet(1)
            ->setCellValue('A6', 'Asal Sekolah/Universitas')
            ->setCellValue('B6', 'Isi kolom ini dengan asal sekolah atau asal universitas sesuai dengan yang tertera dalam kartu identitas');

            // Asal Sekolah/Universitas
            $spreadsheet->getSheet(1)
            ->setCellValue('A7', 'Kelas/Fakultas')
            ->setCellValue('B7', 'Isi kolom ini dengan kelas atau fakultas sesuai dengan yang tertera dalam kartu identitas');

            // Jurusan
            $spreadsheet->getSheet(1)
            ->setCellValue('A8', 'Jurusan')
            ->setCellValue('B8', 'Isi kolom ini dengan jurusan sesuai dengan yang tertera dalam kartu identitas jika tidak ada dapat diisi dengan lambang dash "-"');

            // Semester
            $spreadsheet->getSheet(1)
            ->setCellValue('A9', 'Semester')
            ->setCellValue('B9', 'Isi kolom ini dengan angka sesuai dengan semester yang tertera dalam kartu identitas contoh : "7" atau "1"');

            //rename worksheet
            $spreadsheet->getSheet(1)->setTitle('Aturan Pengisian');

            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $spreadsheet->setActiveSheetIndex(0);



            //set header
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //make it attachment
            header('Content-Disposition: attachment;filename="format-import-data-pemilih-pelajar.xlsx"');

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
                $last_row   = $this->m_pemilih_pelajar->last_no_uruts($input['kegiatan'], $input['tps']);
                $now_row    = $last_row + 1;
                $data_pemilih_pelajar   = array();

                foreach ($data as $key) {
                    if ($i == 1) {
                        if ($key['A'] == 'No. Identitas' && $key['B'] == 'Nama' && $key['C'] == 'Gender' && $key['D'] == 'Tempat Lahir'  && $key['E'] == 'Tanggal Lahir' && $key['F'] == 'Asal Sekolah/Universitas'  && $key['G'] == 'Kelas/Fakultas' && $key['H'] == 'Jurusan' && $key['I'] == 'Semester') {
                            // Nothing to do
                        }else{
                            $this->session->set_flashdata('error', 'Format Tidak Sesuai');
                            redirect('pemilih_pelajar');
                        }
                    }else{
                        if (!empty($key['A']) && !empty($key['B']) && !empty($key['C']) && !empty($key['D']) && !empty($key['E']) && !empty($key['F']) && !empty($key['G']) && !empty($key['H']) && !empty($key['I'])){
                            $value = $spreadsheet->getSheet(0)->getCell('E'.$i)->getValue();
                            if (validateDate($value,'Y-m-d') == false) {
                                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)->format('Y-m-d');
                            }else{
                                $date = date('Y-m-d',strtotime($value));
                            }
                            
                            $data_pemilih_pelajar[] = array(
                                'no_identitas'		=> $key['A'],
                                'nama'				=> $key['B'],
                                'kelas_fakultas'	=> $key['G'],
                                'jurusan'			=> $key['H'],
                                'semester'			=> $key['I'],
                                'gender'			=> $key['C'],
                                'tempat_lahir'		=> $key['D'],
                                'tanggal_lahir'		=> $date,
                                'asal_sekolah'		=> $key['F'],
                                'no_urut'			=> $now_row++,
                                'status'			=> 1,
                                'id_kegiatan'		=> $input['kegiatan'],
                                'id_tps'			=> $input['tps']
                            );
                        }
                    }
                    $i++;
                }
                // echo "<pre>";
                // print_r($data_pemilih_pelajar);
                // echo "</pre>";
                if (!empty($data_pemilih_pelajar)) {
                    $save_data = $this->m_dinamic->store_batch('data_pemilih_pelajar',$data_pemilih_pelajar);
                    if ($save_data) {
                        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                        redirect('pemilih_pelajar');
                    }else{
                        $this->session->set_flashdata('error', 'Gagal menambahkan data');
                        redirect('pemilih_pelajar');
                    }
                }
            }else{
                $this->session->set_flashdata('error', 'File Tidak Ada !!!');
                redirect('pemilih_pelajar');
            }
        }
    }
?>