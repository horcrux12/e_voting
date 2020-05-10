<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>tps">Data TPS</a></li>
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
            <form id="wizard-validation-form" action="<?php echo base_url()?>tps/store" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <label style="font-size: 20px;">Akun TPS</label>
                        <hr>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label " for="kegiatan">Nama Kegiatan <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <select name="kegiatan" id="kegiatan" class="required form-control">
                                    <option value="">Pilih Kegiatan</option>
                                    <?php foreach ($data as $key) {?>
                                        <option value="<?php echo $key['id_kegiatan']?>"><?php echo $key['nama_kegiatan']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label" for="nama_tps">Nama TPS <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="nama_tps" required="" name="nama_tps" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label" for="username">Username <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="username" required="" name="username" type="text" 
                                data-parsley-trigger="focusout" data-parsley-maxlength="12" data-parsley-maxlength-message="Maksimal 12 Karakter.."
                                data-parsley-checkusername data-parsley-checkusername-message="Username Telah Digunakan">
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
                            <label class="col-lg-2 control-label" for="lokasi">Lokasi <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <textarea class="form-control" required="" name="lokasi" id="lokasi" rows="5" 
                                data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-minlength-message="Minimal 20 Karakter.."></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label" for="no_tps">No TPS <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="no_tps" required="" name="no_tps" type="text" 
                                data-parsley-trigger="focusout"  data-parsley-maxlength="12" data-parsley-maxlength-message="Maksimal 12 Karakter.."
                                data-parsley-checknotps data-parsley-checknotps-message="Nomor Telah Digunakan">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label style="font-size: 20px;">Data Kepanitiaan</label>
                        <hr>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label" for="ketua">Nama Ketua <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="ketua" required="" name="ketua" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label" for="anggota_staff_1">Nama Anggota/Staff 1 <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="anggota_staff_1" required="" name="anggota_staff_1" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label" for="anggota_staff_2">Nama Anggota/Staff 2 <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="anggota_staff_2" required="" name="anggota_staff_2" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label" for="anggota_staff_3">Nama Anggota/Staff 3 <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="anggota_staff_3" required="" name="anggota_staff_3" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label" for="anggota_staff_4">Nama Anggota/Staff 4 <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="anggota_staff_4" required="" name="anggota_staff_4" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label" for="anggota_staff_5">Nama Anggota/Staff 5 <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="anggota_staff_5" required="" name="anggota_staff_5" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label" for="anggota_staff_6">Nama Anggota/Staff 6 <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="anggota_staff_6" required="" name="anggota_staff_6" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label" for="anggota_staff_7">Nama Anggota/Staff 7 <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="anggota_staff_7" required="" name="anggota_staff_7" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mt-3">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="return confirm('Anda yakin ingin menambahkan?');">
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