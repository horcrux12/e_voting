<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>bilik">Data Bilik</a></li>
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
            <form id="wizard-validation-form" action="<?php echo base_url()?>bilik/store" method="POST">
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="kegiatan">Kegiatan <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select name="kegiatan" id="kegiatan" class="form-control" required="">
                            <option value="">Pilih Kegiatan</option>
                            <?php foreach ($data as $key) {?>
                            <option value="<?php echo $key['id_kegiatan']?>"><?php echo $key['nama_kegiatan']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="tps">Nama TPS<span class="text-danger">*</span><i
                            id="loader" class="fas fa-spinner fa-spin ml-2" style="display: none;"></i></label>
                    <div class="col-lg-10">
                        <select name="tps" id="tps" class="form-control" disabled required="">
                            <option value="">Pilih TPS</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="nama_bilik">Nama Bilik <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="nama_bilik" required="" name="nama_bilik" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="username">Username <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="username" required="" name="username" type="text"
                            data-parsley-trigger="focusout" data-parsley-maxlength="20"
                            data-parsley-maxlength-message="Maksimal 20 Karakter.." data-parsley-checkusername
                            data-parsley-checkusername-message="Username Telah Digunakan">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="password">Password <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="password" required="" name="password" type="password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox2" type="checkbox">
                            <label for="checkbox2">
                                Show Password
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="no_bilik">No Bilik <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="no_bilik" required="" name="no_bilik" type="text" data-parsley-type="number"
                            data-parsley-trigger="focusout" data-parsley-maxlength="12"
                            data-parsley-maxlength-message="Maksimal 12 Karakter.." data-parsley-checknobilik
                            data-parsley-checknobilik-message="Nomor Telah Digunakan" readonly>
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