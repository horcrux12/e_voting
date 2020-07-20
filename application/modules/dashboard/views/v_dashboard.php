    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard 2</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-primary bg-soft-primary">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <a href="<?php echo base_url()?>detail-kegiatan" id="link-kegiatan"><i class="mdi mdi-window-shutter font-30 widget-icon rounded-circle avatar-title text-primary"></i></a>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Detail Kegiatan">Detail Kegiatan</p>
                        <h2><i class="mdi mdi-arrow-right text-success font-24"></i></h2>
                        <hr class="mt-4 mb-0">
                        <p class="text-muted m-0"><?php echo $this->session->userdata('nama'); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
        
        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-danger bg-soft-danger">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <a href="#0" id="link-waktu"><i class="mdi mdi-av-timer font-30 widget-icon rounded-circle avatar-title text-danger"></i></a>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Tambah Waktu Pemilihan">Tambah Waktu Pemilihan</p>
                        <h2> <i class="mdi mdi-arrow-right text-success font-24"></i></h2>
                        <hr class="mt-4 mb-0">
                        <p class="text-muted m-0" id="waktu-pemilihan" data-time="<?php echo $data['kegiatan']['end_date'];?>"><span class="font-weight-medium">Waktu Akhir:</span> <?php echo format_indo($data['kegiatan']['end_date']);?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-success bg-soft-success">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <?php if ($this->session->userdata('id_jenis') == 1) {
                            $link = "pemilih_umum";
                        }else {
                            $link = "pemilih_pelajar";
                        } ?>
                        <a href="<?php echo base_url($link);?>" id="link-data"><i class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-success"></i></a>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Data Pemilih">Data Pemilih</p>
                        <h2><span data-plugin="counterup"><?php echo $data['pemilih'] ?></span></h2>
                        <hr class="mt-4 mb-0">
                        <p class="text-muted m-0"><span class="font-weight-medium">Belum Memilih:</span> <?php echo $data['belum_memilih'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-warning bg-soft-warning">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <a href="#0" id="link-beita-acara"><i class="mdi mdi-layers font-30 widget-icon rounded-circle avatar-title text-warning"></i></a>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Berita Acara">Berita Acara</p>
                        <h2><i class="mdi mdi-arrow-right text-success font-24"></i></h2>
                        <hr class="mt-4 mb-0">
                        <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 40.33k</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

    <div class="row" id="text_bilik">
        <div class="col-12">
            <h4>Bilik Suara</h4>
        </div>
    </div>

    <div class="row" id="bilik-habis">
        <div class="col-12"><span class="font-weight-medium">Waktu telah habis !!!</span> silahkan menambah waktu pemilihan</div>
    </div>

    <div class="row" id="daftar_bilik">
        <!-- <div id="daftar_bilik"> -->
            <?php foreach ($data['bilik'] as $bilik) {?>
            <div class="col-xl-3 col-md-6">
                <div class="card widget-box-one border border-dark bg-soft-dark">
                    <div class="card-body">
                        <div class="float-right avatar-lg rounded-circle mt-3">
                            <a class="bilik_suara" id="bilik-<?php echo $bilik['id_bilik']?>" href="<?php echo base_url();?>atur-bilik/<?php echo $bilik['id_bilik'];?>"><i class="mdi mdi-layers font-30 widget-icon rounded-circle avatar-title text-dark"></i></a>
                        </div>
                        <div class="wigdet-one-content">
                            <p class="m-0 text-uppercase font-weight-bold text-muted" title="<?php echo "Bilik ".$bilik['no_bilik']; ?>"><?php echo "Bilik ".$bilik['no_bilik']; ?></p>
                            <h2><i class="mdi mdi-arrow-right text-dark font-24"></i></h2>
                            <hr class="mt-4 mb-0">
                            <p class="text-muted m-0 text-bawah"><span class="font-weight-medium">Status : </span><?php echo ($bilik['id_pemilih'] == null ? 'Aktif, Bilik Kosong':'Tidak Aktif, Bilik Terisi') ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <?php } ?>
        <!-- </div> -->
    </div>

    <div class="row">
        <div class="col-xl-12">
            <h4>Statistik Pemilihan</h4>
        </div>
        <div class="col-xl-6">
            <div class="card-box">
                <h4 class="header-title mb-4">Total Revenue</h4>

                <div id="website-stats" style="height: 320px;" class="flot-chart"></div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card-box">
                <h4 class="header-title mb-4">Sales Analytics</h4>

                <div class="float-right">
                    <div id="reportrange" class="form-control form-control-sm">
                        <i class="far fa-calendar-alt mr-1"></i>
                        <span></span>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div id="donut-chart">
                    <div id="donut-chart-container" class="flot-chart" style="height: 246px;">
                    </div>
                </div>

                <p class="text-muted mb-0 mt-3 text-truncate">Pie chart is used to see the proprotion of each data
                    groups, making Flot pie chart is pretty simple, in order to make pie chart you have to incldue
                    jquery.flot.pie.js plugin.</p>
            </div>
        </div>

    </div>
    <!-- end row -->
    <!-- end row -->