<!-- start page title -->
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
<!-- end page title -->

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-light">
                <h4 class="header-title mb-3"><b>Tabel <?php echo $title?></b>
                    
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Dokumen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Berita Acara</td>
                                <td>
                                    <a href="<?php echo base_url()?>berita-acara/acara" target="_blank" class="btn btn-primary"><i class="far fa-eye"></i>&nbsp; Lihat </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Rekapitulasi Suara</td>
                                <td>
                                    <a href="<?php echo base_url()?>berita-acara/hasil" target="_blank" class="btn btn-primary"><i class="far fa-eye"></i>&nbsp; Lihat </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>