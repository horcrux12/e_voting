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
                        <form id="wizard-validation-form" action="<?php echo base_url()?>pemilih_umum/update" method="POST">
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="no_identitas">Nomor Identitas <span
                                        class="text-danger">*</span><br>
                                    <small>Nomor Induk Kependudukan (NIK)</small>
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" id="id_identitas" name="id_identitas" value="<?php echo $data['pemilih'][0]['no_identitas']?>" hidden>
                                    <input class="form-control" id="no_identitas" required="" name="no_identitas" value="<?php echo $data['pemilih'][0]['no_identitas']?>"
                                        type="text" data-parsley-trigger="focusout" data-parsley-minlength="16"
                                        data-parsley-minlength-message="Minimal 16 Karakter.."
                                        data-parsley-check_indentitas
                                        data-parsley-check_indentitas-message="Nomor Telah Digunakan"
                                        data-parsley-type="number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="no_kk">Nomor KK <span
                                        class="text-danger">*</span><br>
                                    <small>No. Kartu Keluarga</small>
                                </label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="no_kk" required="" name="no_kk" type="text" value="<?php echo $data['pemilih'][0]['no_kk']?>"
                                        data-parsley-trigger="focusout" data-parsley-minlength="16"
                                        data-parsley-minlength-message="Minimal 16 Karakter.."
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
                                <label class="col-lg-2 control-label" for="pekerjaan">Pekerjaan <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="pekerjaan" required="" name="pekerjaan" type="text" value="<?php echo $data['pemilih'][0]['pekerjaan']?>"
                                        placeholder="Masukkan pekerjaan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="alamat">Alamat <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea name="alamat" id="alamat" class="required form-control" rows="4" required
                                        data-parsley-trigger="keyup" data-parsley-minlength="20"
                                        data-parsley-minlength-message="Minimal 20 Karakter.."
                                        placeholder="Masukkan Alamat"><?php echo $data['pemilih'][0]['alamat']?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="provinsi">Provinsi <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="provinsi" required="" name="provinsi" type="text" value="<?php echo $data['pemilih'][0]['provinsi']?>"
                                        placeholder="Masukkan Nama Provinsi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="kab_kot">Kabupaten/Kota <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="kab_kot" required="" name="kab_kot" type="text" value="<?php echo $data['pemilih'][0]['kab_kot']?>"
                                        placeholder="Masukkan Nama Kabupaten/Kota">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="kecamatan">Kecamatan<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="kecamatan" required="" name="kecamatan" type="text" value="<?php echo $data['pemilih'][0]['kecamatan']?>"
                                        placeholder="Masukkan Nama Kecamatan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="desa_kel">Desa/Kelurahan <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="desa_kel" required="" name="desa_kel" type="text" value="<?php echo $data['pemilih'][0]['desa_kelurahan']?>"
                                        placeholder="Masukkan Nama Desa/Kelurahan">
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