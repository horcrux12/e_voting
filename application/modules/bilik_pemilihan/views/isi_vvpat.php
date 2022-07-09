<style>
  table.table {
    border-collapse: collapse;
  }

  table.table, table.table td, table.table th {
    border: 1px solid black;
    padding-bottom: 15px;
  }
</style>
<!-- <p style="text-align: justify;">
  Pada hari ini tanggal <?php echo format_indo(date('Y-m-d'))?> , Panitia Penyelenggara Pemungutan dan Penghitungan Suara Elektronik (PPPse) mengadakan Rapat Pemungutan dan Penghitungan Suara Elektronik dalam <span style="text-transform: uppercase;"><?php echo $tps[0]['nama_kegiatan'];?></span> yang dihadiri oleh Saksi dan Pengawas Pemilihan, bertempat di :
</p> -->
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
<table width="100%" class="table" style="text-align: center;">
    <tr>
      <td colspan="3" style="text-align: left; font-weight: bold;"><?php echo ' Nama Pemilihan : '.$pemilihan[0]['nama_pemilihan']?></td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Tanggal</td>
      <td style="font-weight: bold;">No Urut</td>
      <td style="font-weight: bold;">Nama Kandidat</td>
    </tr>
    <tr>
      <td><?php echo format_indo(date('Y-m-d H:m'))?></td>
      <td><?php echo $kandidat[0]['no_urut']?></td>
      <td><?php echo $kandidat[0]['nama_kandidat']?></td>
    </tr>
</table>