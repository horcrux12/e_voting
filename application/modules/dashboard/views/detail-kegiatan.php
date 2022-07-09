<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo $title?></li>
                </ol>
            </div>
            <h4 class="page-title"><?php echo $title?></h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-box">

            <div class="row">
                <div class="col-lg-12 mt-2">
                    <h4 class="header-title">Detail Kegiatan</h4>
                    <p class="sub-header">
                        <?php echo $data['tps'][0]['nama'];?>
                    </p>

                    <dl class="dl-horizontal row">
                        <dt class="col-sm-3">Nama Kegiatan <span class="float-right">:</span></dt>
                        <dd class="col-sm-9"> <?php echo $data['tps'][0]['nama_kegiatan']; ?></dd>

                        <dt class="col-sm-3">Panitia <span class="float-right">:</span></dt>
                        <dd class="col-sm-9"> 
                            <ol class="pl-3" >
                                <li><?php echo $data['tps'][0]['ketua'].' (ketua)<br>'; ?></li>
                                <li><?php echo $data['tps'][0]['anggota_staff_1'].'<br>'; ?></li>
                                <li><?php echo $data['tps'][0]['anggota_staff_2'].'<br>'; ?></li>
                                <li><?php echo $data['tps'][0]['anggota_staff_3'].'<br>'; ?></li>
                                <li><?php echo $data['tps'][0]['anggota_staff_4'].'<br>'; ?></li>
                                <li><?php echo $data['tps'][0]['anggota_staff_5'].'<br>'; ?></li>
                                <li><?php echo $data['tps'][0]['anggota_staff_6'].'<br>'; ?></li>
                                <li><?php echo $data['tps'][0]['anggota_staff_7'].'<br>'; ?></li>
                            </ol>
                        </dd>

                        <dt class="col-sm-3">Waktu Pelaksanaan <span class="float-right">:</span></dt>
                        <dd class="col-sm-9"><?php echo format_indo($data['tps'][0]['start_date']).' s/d '.format_indo($data['tps'][0]['end_date']);?></dd>

                        <dt class="col-sm-3">Daftar Pemilihan <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">
                            <ol class="pl-3" >
                                <?php foreach ($data['pemilihan'] as $key) {
                                    echo "<li> ".$key['nama_pemilihan']."</li>";
                                }?>
                            </ol>
                        </dd>

                    </dl>

                </div>

            </div>
            <!-- end row -->

        </div>
    </div>

</div>