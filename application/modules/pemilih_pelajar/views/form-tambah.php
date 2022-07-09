<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                    <?php if ($this->session->userdata('level_admin')  == 1) :?>
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>pemilih_pelajar">Data Pemilih Pelajar</a></li>
                    <?php else: ?>
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>pemilih_pelajar">Data Pemilih</a></li>
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
            <form id="wizard-validation-form" action="<?php echo base_url()?>pemilih_pelajar/store" method="POST">
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="no_identitas">Nomor Identitas <span
                            class="text-danger">*</span><br>
                            <small>Nomor Induk Siswa (NIS)/ Nomor Induk Mahasiswa (NIM)</small>
                    </label>
                    <div class="col-lg-10">
                        <input class="form-control" id="no_identitas" required=""  name="no_identitas" type="text"
                            data-parsley-trigger="focusout" data-parsley-minlength="10"
                            data-parsley-minlength-message="Minimal 10 Karakter.." data-parsley-check_indentitas
                            data-parsley-check_indentitas-message="Nomor Telah Digunakan">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="nama">Nama <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" id="nama" required="" data-parsley-trigger="focusout" name="nama" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="gender">Jenis Kelamin<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select name="gender" id="gender" class="form-control" required="" data-parsley-trigger="focusout">
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
                        <input class="form-control" id="tempat_lahir" required="" data-parsley-trigger="focusout" name="tempat_lahir" type="text" placeholder="Masukkan Tempat Lahir">
                    </div>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input type="text" required="" data-parsley-trigger="change focusout" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose-start" name="tanggal_lahir">
                            <div class="input-group-append">
                                <span class="input-group-text bg-primary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="asal_sekolah">Asal Sekolah/Universitas <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control"
                            required data-parsley-trigger="keyup" data-parsley-minlength="20" 
                            data-parsley-minlength-message="Minimal 20 Karakter.." placeholder="Masukkan Asal Sekolah/Universitas">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="kelas_fakultas">Kelas/Fakultas <span
                            class="text-danger">*</span>
                    </label>
                    <div class="col-lg-10">
                        <input class="form-control" id="kelas_fakultas" required="" data-parsley-trigger="focusout" name="kelas_fakultas" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="jurusan">Jurusan <span
                            class="text-danger">*</span>
                    </label>
                    <div class="col-lg-10">
                        <input class="form-control" id="jurusan" required="" data-parsley-trigger="focusout" name="jurusan" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label" for="semester">Semester
                    </label>
                    <div class="col-lg-10">
                        <input class="form-control" id="semester"  name="semester" type="text" data-parsley-type="number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 control-label " for="kegiatan">Kegiatan <span
                            class="text-danger">*</span></label>
                    <div class="col-lg-10">
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
                                    <option value="<?php echo $key['id_kegiatan'] ?>"><?php echo $key['nama_kegiatan']?></option>
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
                                onclick="return confirm('Anda yakin ingin menambahkan data?');">
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