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
                        <a href="<?php echo base_url()?>detail-kegiatan"><i class="mdi mdi-window-shutter font-30 widget-icon rounded-circle avatar-title text-primary"></i></a>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Detail Kegiatan">Detail Kegiatan</p>
                        <h2><i class="mdi mdi-arrow-right text-success font-24"></i></h2>
                        <hr class="mt-4 mb-0">
                        <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 30.4k</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
        
        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-danger bg-soft-danger">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <a href="#0"><i class="mdi mdi-av-timer font-30 widget-icon rounded-circle avatar-title text-danger"></i></a>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Tambah Waktu Pemilihan">Tambah Waktu Pemilihan</p>
                        <h2> <i class="mdi mdi-arrow-right text-success font-24"></i></h2>
                        <hr class="mt-4 mb-0">
                        <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 956</p>
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
                        <a href="<?php echo base_url($link);?>"><i class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-success"></i></a>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Data Pemilih">Data Pemilih</p>
                        <h2><span data-plugin="counterup">895</span></h2>
                        <hr class="mt-4 mb-0">
                        <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 1250</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-warning bg-soft-warning">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <a href="#0"><i class="mdi mdi-layers font-30 widget-icon rounded-circle avatar-title text-warning"></i></a>
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

    <div class="row">
        <div class="col-12">
            <h4>Bilik Suara</h4>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-primary bg-soft-primary">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <i
                            class="mdi mdi-chart-areaspline font-30 widget-icon rounded-circle avatar-title text-primary"></i>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Statistics">Statistics</p>
                        <h2><span data-plugin="counterup">34578</span> <i
                                class="mdi mdi-arrow-up text-success font-24"></i></h2>
                        <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 30.4k</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-warning bg-soft-warning">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <i class="mdi mdi-layers font-30 widget-icon rounded-circle avatar-title text-warning"></i>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="User This Month">User This
                            Month</p>
                        <h2><span data-plugin="counterup">52410 </span> <i
                                class="mdi mdi-arrow-up text-success font-24"></i></h2>
                        <hr class="mt-4 mb-0">
                        <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 40.33k</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-danger bg-soft-danger">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <i class="mdi mdi-av-timer font-30 widget-icon rounded-circle avatar-title text-danger"></i>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Statistics">Statistics</p>
                        <h2><span data-plugin="counterup">6352 </span> <i
                                class="mdi mdi-arrow-up text-success font-24"></i></h2>
                        <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 956</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-success bg-soft-success">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <i
                            class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-success"></i>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="User Today">User Today</p>
                        <h2><span data-plugin="counterup">895</span> <i
                                class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                        <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 1250</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
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