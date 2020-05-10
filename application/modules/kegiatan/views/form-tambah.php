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
            <form id="wizard-validation-form" action="<?php echo base_url()?>kegiatan/store" method="POST" onsubmit="return confirm('Anda yakin ingin menambahkan?');">
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="nama_kegiatan">Nama Kegiatan <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="nama_kegiatan" required="" name="nama_kegiatan" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="jenis_kegiatan">Jenis Kegiatan <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select name="jenis_kegiatan" id="jenis_kegiatan" required="" class="form-control">
                            <option value="">Pilih Jenis Kegiatan</option>
                            <?php foreach ($data as $key) {?>
                            <option value="<?php echo $key['id_jenis']?>"><?php echo $key['nama']?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="alamat_kegiatan">Alamat Kegiatan <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <textarea name="alamat_kegiatan" id="alamat_kegiatan" class="required form-control" rows="5" required data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-minlength-message="Minimal 20 Karakter.."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="tgl_mulai">Tanggal Mulai <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" required="" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose-start" name="tanggal_mulai">
                            <div class="input-group-append">
                                <span class="input-group-text bg-primary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <input id="timepicker-start" type="text" required="" class=" form-control" name="waktu_mulai">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="tgl_akhir">Tanggal Berakhir <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" required="" class=" form-control" placeholder="mm/dd/yyyy"
                                id="datepicker-autoclose-end" name="tanggal_akhir">
                            <div class="input-group-append">
                                <span class="input-group-text bg-primary text-white b-0"><i
                                        class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <input id="timepicker-end" type="text" required="" class="form-control" name="waktu_akhir">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                            </div>
                        </div>
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