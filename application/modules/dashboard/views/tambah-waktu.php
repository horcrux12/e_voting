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
<!-- Wizard with Validation -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title">Form <?php echo $title ?></h4>
            <form id="wizard-validation-form" action="<?php echo base_url()?>tambah-waktu-kegiatan/store" method="POST" onsubmit="return confirm('Anda yakin ingin menambahkan?');">
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="tgl_mulai">Tanggal Kegiatan <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <div id="datetimepicker13"></div>
                        <input type="text" name="tambah_tanggal" id="tambah_tanggal" hidden>
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