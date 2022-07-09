<style>
  table.table {
    border-collapse: collapse;
  }

  table.table, table.table td, table.table th {
    border: 1px solid black;
    padding-bottom: 15px;
  }
</style>
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
<br>
<br>
<br>
<?php $pg=1; foreach ($pemilihan as $key) {?>
<table class="table" width="100%" style="text-align: center;">
  <tr>
    <td colspan="3" style="text-align: left; font-weight: bold;"><?php echo ' Hasil Perhitungan '.$key['nama_pemilihan']?></td>
  </tr>
  <tr>
    <td style="font-weight: bold;">No. Urut</td>
    <td style="font-weight: bold;">Nama Pasangan Calon</td>
    <td style="font-weight: bold;">Jumlah Perolehan Suara</td>
  </tr>
  <?php $no=1; foreach ($kandidat as $kd) { if($kd['id_pemilihan'] == $key['id_pemilihan']){?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $kd['nama_kandidat']?></td>
    <td><?php echo $kd['hasil']?></td>
  </tr>
  <?php $no++;}}?>
</table>
<br>
<?php $pg++;} ?>
<br>
<p>Dengan rincian sebagai berikut :</p>
<ul>
  <li>Jumlah Keseluruhan Pemilih : <span style="font-weight: bold;"><?php echo $jumlah_pemilih;?></span></li>
  <li>Jumlah Pemilih Telah Memilih: <span style="font-weight: bold;"><?php echo $jumlah_belum_memilih;?></span></li>
</ul>