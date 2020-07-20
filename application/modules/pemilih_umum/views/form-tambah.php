<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                    <?php if ($this->session->userdata('level_admin')  == 1) :?>
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>pemilih_umum">Data Pemilih Umum</a></li>
                    <?php else: ?>
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>pemilih_umum">Data Pemilih</a></li>
                    <?php endif;?>
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
            <form id="wizard-validation-form" action="<?php echo base_url()?>pemilih_umum/store" method="POST">
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="no_identitas">Nomor Identitas <span
                            class="text-danger">*</span><br>
                            <small>Nomor Induk Kependudukan (NIK)</small>
                    </label>
                    <div class="col-lg-10">
                        <input class="form-control" id="no_identitas" required=""  name="no_identitas" type="text"
                            data-parsley-trigger="focusout" data-parsley-minlength="16"
                            data-parsley-minlength-message="Minimal 16 Karakter.." data-parsley-check_indentitas
                            data-parsley-check_indentitas-message="Nomor Telah Digunakan" data-parsley-type="number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="no_kk">Nomor KK <span
                            class="text-danger">*</span><br>
                            <small>No. Kartu Keluarga</small>
                    </label>
                    <div class="col-lg-10">
                        <input class="form-control" id="no_kk" required=""  name="no_kk" type="text"
                            data-parsley-trigger="focusout" data-parsley-minlength="16"
                            data-parsley-minlength-message="Minimal 16 Karakter.." data-parsley-type="number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="nama">Nama <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="nama" required="" name="nama" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="gender">Jenis Kelamin<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select name="gender" id="gender" class="form-control" required="">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="tempat_lahir">Tempat Lahir <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-5">
                        <input class="form-control" id="tempat_lahir" required="" name="tempat_lahir" type="text" placeholder="Masukkan Tempat Lahir">
                    </div>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input type="text" required="" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose-start" name="tanggal_lahir">
                            <div class="input-group-append">
                                <span class="input-group-text bg-primary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="pekerjaan">Pekerjaan <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="pekerjaan" required="" name="pekerjaan" type="text" placeholder="Masukkan pekerjaan">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="alamat">Alamat <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <textarea name="alamat" id="alamat" class="required form-control" rows="4" 
                            required data-parsley-trigger="keyup" data-parsley-minlength="20" 
                            data-parsley-minlength-message="Minimal 20 Karakter.." placeholder="Masukkan Alamat"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="provinsi">Provinsi <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="provinsi" required="" name="provinsi" type="text" placeholder="Masukkan Nama Provinsi">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="kab_kot">Kabupaten/Kota <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="kab_kot" required="" name="kab_kot" type="text" placeholder="Masukkan Nama Kabupaten/Kota">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="kecamatan">Kecamatan<span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="kecamatan" required="" name="kecamatan" type="text" placeholder="Masukkan Nama Kecamatan">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="desa_kel">Desa/Kelurahan <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="desa_kel" required="" name="desa_kel" type="text" placeholder="Masukkan Nama Desa/Kelurahan">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="kegiatan">Instansi <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                    <?php if ($this->session->userdata('level_admin') == 1) :?>
                            <select name="kegiatan" id="kegiatan" class="form-control" required="">
                                <option value="">Pilih Instansi</option>
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
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="tps">Nama TPS<span class="text-danger">*</span><i
                            id="loader" class="fas fa-spinner fa-spin ml-2" style="display: none;"></i></label>
                    <div class="col-lg-10">
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