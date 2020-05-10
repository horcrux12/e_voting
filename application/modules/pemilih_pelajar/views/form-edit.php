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
<div class="row">
    <div class="col-12">
        <div class="card-box">

            <div class="row">
                <div class="col-lg-12">
                    <h4 class="header-title">Form <?php echo $title; ?></h4>
                    <!-- <p class="sub-header">
                        Parsley is a javascript form validation library. It helps you provide your users with feedback
                        on their form submission before sending it to your server.
                    </p> -->

                    <div class="p-4">
                        <form id="wizard-validation-form" action="<?php echo base_url()?>pemilih_pelajar/update" method="POST">
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="no_identitas">Nomor Identitas <span
                                        class="text-danger">*</span><br>
                                        <small>Nomor Induk Siswa (NIS)/ Nomor Induk Mahasiswa (NIM)</small>
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" id="id_identitas" name="id_identitas" value="<?php echo $data['pemilih'][0]['no_identitas']?>" hidden>
                                    <input class="form-control" id="no_identitas" required="" name="no_identitas" value="<?php echo $data['pemilih'][0]['no_identitas']?>"
                                        type="text" data-parsley-trigger="focusout" data-parsley-minlength="10"
                                        data-parsley-minlength-message="Minimal 10 Karakter.."
                                        data-parsley-check_indentitas
                                        data-parsley-check_indentitas-message="Nomor Telah Digunakan"
                                        data-parsley-type="number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="nama">Nama <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="nama" required="" name="nama" type="text" value="<?php echo $data['pemilih'][0]['nama']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="gender">Jenis Kelamin<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select name="gender" id="gender" class="form-control" required="">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <?php if ($data['pemilih'][0]['gender'] == "L") :?>
                                            <option value="L" selected>Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        <?php else :?>
                                            <option value="P" selected>Perempuan</option>
                                            <option value="L">Laki - Laki</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="tempat_lahir">Tempat Lahir <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-5">
                                    <input class="form-control" id="tempat_lahir" required="" name="tempat_lahir" value="<?php echo $data['pemilih'][0]['tempat_lahir']?>"
                                        type="text" placeholder="Masukkan Tempat Lahir">
                                </div>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <input type="text" required="" class="form-control" placeholder="mm/dd/yyyy" value="<?php echo date('m/d/Y',strtotime($data['pemilih'][0]['tanggal_lahir']))?>"
                                            id="datepicker-autoclose-start" name="tanggal_lahir">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-primary text-white b-0"><i
                                                    class="mdi mdi-calendar"></i></span>
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
                                        data-parsley-minlength-message="Minimal 20 Karakter.." placeholder="Masukkan Asal Sekolah/Universitas" value="<?php echo $data['pemilih'][0]['asal_sekolah']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="kelas_fakultas">Kelas/Fakultas <span
                                        class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="kelas_fakultas" required="" data-parsley-trigger="focusout" name="kelas_fakultas" type="text" value="<?php echo $data['pemilih'][0]['kelas_fakultas']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="jurusan">Jurusan <span
                                        class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="jurusan" required="" data-parsley-trigger="focusout" name="jurusan" type="text" value="<?php echo $data['pemilih'][0]['jurusan']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="semester">Semester
                                </label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="semester"  name="semester" type="text" data-parsley-type="number" value="<?php echo $data['pemilih'][0]['semester']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="kegiatan">Nama Kegiatan <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select name="kegiatan" id="kegiatan" class="form-control" required="">
                                        <?php foreach ($data['kegiatan'] as $key) {?>
                                        <?php if ($data['pemilih'][0]['id_kegiatan'] == $key['id_kegiatan']) :?>
                                            <option value="<?php echo $key['id_kegiatan']?>" selected><?php echo $key['nama_kegiatan']?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $key['id_kegiatan']?>"><?php echo $key['nama_kegiatan']?></option>
                                        <?php endif; } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="tps">Nama TPS<span
                                        class="text-danger">*</span><i id="loader" class="fas fa-spinner fa-spin ml-2"
                                        style="display: none;"></i></label>
                                <div class="col-lg-10">
                                    <select name="tps" id="tps" class="form-control" required="">
                                        <?php foreach ($data['tps'] as $keys) {?>
                                        <?php if ($data['pemilih'][0]['id_tps'] == $keys['id_tps']) :?>
                                            <option value="<?php echo $keys['id_tps']?>" selected><?php echo $keys['nama']?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $keys['id_tps']?>"><?php echo $keys['nama']?></option>
                                        <?php endif; } ?>
                                    </select>
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
            <!-- end row -->
        </div>
        <!-- end card-box -->
    </div>
    <!-- end col-->

</div>