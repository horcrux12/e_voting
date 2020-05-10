<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
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
                <div>
                    <h3>Data Kegiatan</h3>
                    <section>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label" for="nama_kegiatan">Nama Kegiatan <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="required form-control" id="nama_kegiatan" name="nama_kegiatan[]" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label " for="jenis_kegiatan">Jenis Kegiatan <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <select name="jenis_kegiatan" id="jenis_kegiatan" class="required form-control">
                                    <option value="">Pilih Jenis Kegiatan</option>
                                    <?php foreach ($data as $key) {?>
                                        <option value="<?php echo $key['id_jenis']?>"><?php echo $key['nama']?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label " for="alamat_kegiatan">Alamat Kegiatan <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <textarea name="alamat_kegiatan" id="alamat_kegiatan" class="required form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label " for="tgl_mulai">Tanggal Mulai <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="required form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose-start" name="tanggal_mulai">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <input id="timepicker-start" type="text" class="required form-control" name="waktu_mulai">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label " for="tgl_akhir">Tanggal Berakhir <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="required form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose-end" name="tanggal_akhir">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <input id="timepicker-end" type="text" class="required form-control" name="waktu_akhir">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label " for="tps"> Jumlah TPS <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input id="tps" name="jumlah _tps" type="number" class="required form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-12 control-label text-danger">(*) Harus diisi</label>
                        </div>                        
                    </section>
                    <h3>Data Tempat Pemungutan Suara (TPS)</h3>
                    <section>
                        <div id="isi_tps"></div>

                        <div class="form-group row">
                            <label class="col-lg-12 control-label ">(*) Harus diisi</label>
                        </div>

                    </section>
                    <h3>Data Bilik</h3>
                    <section>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label style="font-size: 20px;">Akun Bilik</label>
                                <hr>
                            </div>

                            <div class="col-lg-12">
                                <ul class="list-unstyled w-list">
                                    <li><b>Username Bilik :</b>usrname bilik terdiri dari = [username_tps]_[bilik]_[nomor_bilik, 1 s/d jumlah bilik yang telah dipilih] </li>
                                    <li>*Contoh : TPS_Bogor_bilik_1</li>
                                    <li><b>Password :</b> (sama dengan password TPS) </li>
                                    <li>Untuk mengganti username dan password dapat dilakukan di menu akun bilik</li>
                                </ul>
                            </div>
                        </div><br><br>
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End row -->