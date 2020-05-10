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
                        <?php echo $data[0]['nama'];?>
                    </p>

                    <dl class="dl-horizontal row">
                        <dt class="col-sm-3">Nama Kegiatan</dt>
                        <dd class="col-sm-9"><?php echo $data[0]['nama_kegiatan']; ?></dd>

                        <dt class="col-sm-3">Waktu Pelaksanaan</dt>
                        <dd class="col-sm-9"><?php echo format_indo($data[0]['start_date']).' s/d '.format_indo($data[0]['end_date']);?></dd>

                    </dl>

                </div>

            </div>
            <!-- end row -->

        </div>
    </div>

</div>