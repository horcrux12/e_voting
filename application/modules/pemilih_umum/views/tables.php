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
                    <a href="<?php echo base_url()?>pemilih_umum/tambah-pemilih_umum" class="btn btn-primary float-right">
                    <i class="fas fa-plus-circle pull-left mr-2"></i> Tambah Data</a>
                    <button class="btn btn-primary waves-effect waves-light float-right mr-2" data-toggle="modal" data-target="#con-close-modal">Import Data</button>
                </h4>
            </div>
            <div class="card-body">
                <?php if (($this->session->flashdata('error')) == true) {?>
                    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>OOPS!</strong> <?php echo $this->session->flashdata('error');?>
                    </div><br>
                <?php } ?>
                <?php if (($this->session->flashdata('success')) == true) {?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Well done!</strong> <?php echo $this->session->flashdata('success');?>
                    </div><br>
                <?php } ?>

                <?php if ($this->session->userdata('level_admin') == 1) {?>
                    <div class="row mb-2">
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label class="col-lg-3 control-label mt-2" for="filter_kegiatan">Kegiatan</label>
                                <div class="col-lg-9">
                                    <select name="filter_kegiatan" id="filter_kegiatan" class="form-control">
                                        <option value="">Pilih Kegiatan</option>
                                        <?php foreach ($data['kegiatan'] as $kegiatan) {?>
                                            <option value="<?php echo $kegiatan['id_kegiatan']?>"><?php echo $kegiatan['nama_kegiatan']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label class="col-lg-3 control-label mt-2" for="filter_tps">TPS<i id="loader" class="fas fa-spinner fa-spin ml-2" style="display: none;"></i></label>
                                <div class="col-lg-9">
                                    <select name="filter_tps" id="filter_tps" class="form-control">
                                        <option value="">Pilih TPS</option>
                                        <?php foreach ($data['tps'] as $key) {?>
                                            <option value="<?php echo $key['id_tps']?>"><?php echo $key['nama']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                
                <table id="user_datatable" class="table table-striped table-bordered table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No. Identitas</th>
                            <th>No. KK</th>
                            <th>Nama</th>
                            <th>L/P</th>
                            <th>T.T.L.</th>
                            <th>Alamat</th>
                            <th>No. Urut</th>
                            <th>TPS</th>
                            <th>Bilik</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title mt-0">Import Data Pemilihan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url()?>pemilih_umum/import-excel" method="POST" id="import" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="field-3" class="control-label">Format Import Excel</label>
                                                <a href="<?php echo base_url()?>pemilih_umum/download-source" target="_blank" style="width:100%" class="btn btn-orange waves-light waves-effect width-md"><i class="ion ion-md-cloud-download"></i> Download Format</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="field-3" class="control-label">Kegiatan</label>
                                                <?php if ($this->session->userdata('level_admin') == 1) :?>
                                                    <select name="kegiatan" id="kegiatan" class="form-control" required="">
                                                        <option value="">Pilih Kegiatan</option>
                                                        <?php foreach ($data['kegiatan'] as $key) {?>
                                                            <option value="<?php echo $key['id_kegiatan']?>"><?php echo $key['nama_kegiatan']?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php else: ?>
                                                    <select name="kegiatan2" id="kegiatan2" class="form-control" required="" disabled>
                                                        <?php foreach ($data['kegiatan'] as $key) {?>
                                                            <option value="<?php echo $key['id_kegiatan']?>"><?php echo $key['nama_kegiatan']?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <input type="text" name="kegiatan" value="<?php echo $data['kegiatan'][0]['id_kegiatan']?>" hidden>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="field-3" class="control-label">TPS</label>
                                                <?php if ($this->session->userdata('level_admin') == 1) :?>
                                                    <select name="tps" id="tps" class="form-control" disabled required="">
                                                        <option value="">Pilih TPS</option>
                                                    </select>
                                                <?php else: ?>
                                                    <select name="tps2" id="tps2" class="form-control" disabled required="">
                                                        <option value="<?php echo $data['tps'][0]['id_tps'] ?>"><?php echo $data['tps'][0]['nama'] ?></option>
                                                    </select>
                                                    <input type="text" name="tps" value="<?php echo $data['tps'][0]['id_tps'] ?>" hidden>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="excel" class="control-label">File Import Excel</label>
                                                <input type="file" name="excel" class="form-control" id="excel" placeholder="Input File Excel" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" id="btn-import" class="btn btn-success waves-effect width-md waves-light float-right"><i class="ion ion-md-cloud-upload"></i> Import Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-box table-responsive">
            
            
        </div>
    </div>
</div>