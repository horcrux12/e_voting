<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>kegiatan">Data Kegiatan</a></li>
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
            <form id="wizard-validation-form" action="<?php echo base_url()?>pemilihan/store" method="POST" onsubmit="return confirm('Anda yakin ingin menambahkan data ?');">
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="nama_pemilihan">Nama Pemilihan <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="nama_pemilihan" required="" name="nama_pemilihan" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="kegiatan">Instansi <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select name="kegiatan" id="kegiatan" required="" class="form-control">
                            <option value="">Pilih Instansi</option>
                            <?php foreach ($data['kegiatan'] as $key) {?>
                            <option value="<?php echo $key['id_kegiatan']?>"><?php echo $key['nama_kegiatan']?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-12 control-label text-danger">(*) Harus diisi</label>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mt-3">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Submit
                            </button>
                            <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-secondary waves-effect ml-1">
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