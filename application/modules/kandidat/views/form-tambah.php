<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>kandidat">Data Kandidat</a></li>
                    <li class="breadcrumb-item active"><?php echo $title?></li>
                </ol>
            </div>
            <h4 class="page-title"><?php echo $title?></h4>
        </div>
    </div>
</div>
<!-- end page title -->
<!-- Wizard with Validation -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title">Form <?php echo $title ?></h4>
            <form id="wizard-validation-form" action="<?php echo base_url()?>kandidat/store" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="kegiatan">Kegiatan <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select name="kegiatan" id="kegiatan" class="required form-control" required>
                            <option value="">Pilih Kegiatan</option>
                            <?php foreach ($data['kegiatan'] as $key) {?>
                                <option value="<?php echo $key['id_kegiatan']?>"><?php echo $key['nama_kegiatan']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="pemilihan">Pemilihan <span class="text-danger">*</span><i
                            id="loader" class="fas fa-spinner fa-spin ml-2" style="display: none;"></i></label>
                    <div class="col-lg-10">
                        <select name="pemilihan" id="pemilihan" class="required form-control" required disabled>
                            <option value="">Pilih Pemilihan</option>
                            <?php foreach ($data['pemilihan'] as $key) {?>
                                <option value="<?php echo $key['id_pemilihan']?>"><?php echo $key['nama_pemilihan']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="nama_kandidat">Nama Kandidat <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="nama_kandidat" required="" name="nama_kandidat" type="text" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="no_urut">No Urut <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="no_urut" required="" name="no_urut" type="text" data-parsley-type="number"
                            data-parsley-trigger="focusout" data-parsley-checkno_kandidat
                            data-parsley-checkno_kandidat-message="Nomor Telah Digunakan" required disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="foto_kandidat">Foto Kandidat <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="foto_kandidat" required="" name="foto_kandidat" type="file" accept="image/jpeg,image/png"
                            data-parsley-filemaxmegabytes="2" data-parsley-trigger="change" data-parsley-filemimetypes="image/jpeg, image/png" >
                        <div id="view_gambar" class="mt-2">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mt-3">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary waves-effect waves-light"
                                onclick="return confirm('Anda yakin ingin menambahkan?');">
                                Submit
                            </button>
                            <button type="button" onclick="window.history.go(-1); return false;"
                                class="btn btn-secondary waves-effect ml-1">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End row -->