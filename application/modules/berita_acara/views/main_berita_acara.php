<p style="text-align: justify;">
  Pada hari ini tanggal <?php echo format_indo(date('Y-m-d'))?> , Panitia Penyelenggara Pemungutan dan Penghitungan Suara Elektronik (PPPse) mengadakan Rapat Pemungutan dan Penghitungan Suara Elektronik dalam <span style="text-transform: uppercase;"><?php echo $tps[0]['nama_kegiatan'];?></span> yang dihadiri oleh Saksi dan Pengawas Pemilihan, bertempat di :
</p>
<table width="100%" style="vertical-align: top;">
    <tr>
      <td width="50%">Tempat Pemungutan Suara Elektronik (TPSe)</td>
      <td width="1%">:</td>
      <td width="49%"><?php echo $tps[0]['nama']?></td>
    </tr>
    <tr>
      <td width="50%">Alamat TPSe</td>
      <td width="1%">:</td>
      <td width="49%"><?php echo $tps[0]['lokasi']?></td>
    </tr>
</table>
<p style="font-weight: bold;">A. PERSIAPAN DAN PEMUNGUTAN SUARA DI TPSe</p>
<p style="text-align: justify;">Kegiatan PPPSe dalam acara Pemungutan Suara dipimpin oleh PPPSe dimulai pada <?php echo format_indo($tps[0]['start_date'])?>, waktu setempat dan berakhir pada <?php echo (!empty($tps[0]['tambahan_waktu']) ? format_indo($tps[0]['tambahan_waktu']) : format_indo($tps[0]['end_date'])); ?> waktu setempat dengan melakukan kegiatan :</p>
<ol>
  <li>Membuka Rapat Pemungutan Suara di TPSe.</li>
  <li>Mengumumkan persyaratan untuk menggunakan hak pilih di TPSe.</li>
  <li>Menjelaskan tata cara dan mekanisme pemberian suara secara elektronik.</li>
  <li>Melakukan autentifikasi identitas pemilih yang akan menggunakan hak pilihnya.</li>
  <li>Mengatur jalannya proses pemberian suara di TPSe.</li>
</ol>
<p style="font-weight: bold;">B. PENGHITUNGAN SUARA DI TPSe</p>
<p style="text-align: justify;">Penghitungan suara dimulai pukul 18 waktu setempat dengan melakukan kegiatan :</p>
<ol>
  <li>Mencetak Berita Acara Pemungutan dan Penghitungan Suara di Tempat Pemungutan Suara Elektronik.</li>
  <li>Mengumumkan jumlah pemilih terdaftar, jumlah pemilih yang menggunakan hak pilih, dan jumlah pemilih yang tidak menggunakan hak pilih di TPSe.</li>
  <li>Mengumumkan jumlah perolehan suara sah dan persentase suara sah untuk masing-masing calon/pasangan calon peserta pemilihan.</li>
  <li>Panitia Penyelenggara Pemungutan Suara Elektronik (PPPSe), beserta saksi dan Pengawas TPSe, menandatangani Berita Acara Pemungutan dan Penghitungan Suara Elektronik di Tempat Pemungutan Suara Elektronik.</li>
  <li>Mengumumkan Sertifikat Hasil Pemungutan dan Penghitungan Suara Elektronik di Tempat Pemungutan Suara Elektronik di Papan Pengumuman.</li>
</ol>
<br>
<br>
<p style="text-align: center; font-weight: bold;">PANITIA PENYELENGGARA PEMUNGUTAN DAN PENGHITUNGAN SUARA ELEKTRONIK</p>
<table width="100%" style="text-align: center;">
  <tr>
    <td width="10%" style="font-weight: bold; padding-bottom: 15px;">No</td>
    <td width="35%" style="font-weight: bold; padding-bottom: 15px;">Nama</td>
    <td width="25%" style="font-weight: bold; padding-bottom: 15px;">Jabatan</td>
    <td width="30%" style="font-weight: bold; padding-bottom: 15px;">Tanda tangan</td>
  </tr>
  <tr>
    <td style="padding-bottom: 15px;">1</td>
    <td style="padding-bottom: 15px;"><?php echo $tps[0]['ketua']?></td>
    <td style="padding-bottom: 15px;">Ketua</td>
    <td style="padding-bottom: 15px;">(...............................)</td>
  </tr>
  <?php for ($i=1; $i <= 7; $i++) { ?>
    <tr>
      <td style="padding-bottom: 15px;"><?php echo $i+1; ?></td>
      <td style="padding-bottom: 15px;"><?php echo $tps[0]['anggota_staff_'.$i]?></td>
      <td style="padding-bottom: 15px;">Anggota/Staff <?php echo $i; ?></td>
      <td style="padding-bottom: 15px;">(...............................)</td>
    </tr>
  <?php } ?>
</table>
<br>
<p style="text-align: center; font-weight: bold;">SAKSI - SAKSI</p>
<br>
<?php $pg=1; foreach ($pemilihan as $key) {?>
    <table width="100%" style="text-align: center;">
      <tr>
        <td colspan="4" style="text-align: left; font-weight: bold;"><?php echo $pg.'. '.$key['nama_pemilihan']?></td>
      </tr>
      <tr>
        <td width="10%" style="font-weight: bold; padding-bottom: 15px;">No</td>
        <td width="35%" style="font-weight: bold; padding-bottom: 15px;">Nama Saksi</td>
        <td width="25%" style="font-weight: bold; padding-bottom: 15px;">Nama Pasangan Calon</td>
        <td width="30%" style="font-weight: bold; padding-bottom: 15px;">Tanda tangan</td>
      </tr>
    <?php $no=1; foreach ($kandidat as $kd) { if($kd['id_pemilihan'] == $key['id_pemilihan']){?>
      <tr>
        <td style="padding-bottom: 15px;"><?php echo $no;?></td>
        <td style="padding-bottom: 15px;"></td>
        <td style="padding-bottom: 15px;"><?php echo $kd['nama_kandidat']?></td>
        <td style="padding-bottom: 15px;">(...............................)</td>
      </tr>
    <?php $no++;}}?>
    </table>
<?php $pg++;} ?>