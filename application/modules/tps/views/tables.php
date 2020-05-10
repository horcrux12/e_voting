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
                    <a href="<?php echo base_url()?>tps/tambah-tps" class="btn btn-primary float-right">
                    <i class="fas fa-plus-circle pull-left mr-2"></i> Tambah Data</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label class="col-lg-3 control-label mt-2" for="filter_kegiatan">Jenis Kegiatan</label>
                            <div class="col-lg-9">
                                <select name="filter_kegiatan" id="filter_kegiatan" class="form-control">
                                    <option value="">Pilih Kegiatan</option>
                                    <?php foreach ($data as $key) {?>
                                        <option value="<?php echo $key['id_kegiatan']?>"><?php echo $key['nama_kegiatan']?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <table id="user_datatable" class="table table-striped table-bordered table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Nama TPS</th>
                            <th>Lokasi</th>
                            <th>Username</th>
                            <th>No TPS</th>
                            <th>Jumlah bilik</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-box table-responsive">
            
            
        </div>
    </div>
</div>