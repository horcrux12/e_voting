<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>panitia">Data Panitia</a></li>
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
                        <form role="form" data-parsley-validate novalidate action="<?php echo base_url()?>panitia/update" method="POST">
                            <div class="form-group row">
                                <label for="nama_kegiatan" class="col-sm-3 form-control-label">Nama Instansi<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" required data-parsley-minlength="6" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo $data['kegiatan'][0]['nama_kegiatan']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_tps" class="col-sm-3 form-control-label">Nama TPS<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" required data-parsley-minlength="6" class="form-control" id="nama_tps" name="nama_tps" value="<?php echo $data['tps'][0]['nama']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_ketua" class="col-sm-3 form-control-label">Nama Ketua<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="id_panitia" value="<?php echo $data['panitia'][0]['id_panitia']?>" hidden>
                                    <input type="text" required class="form-control" id="nama_ketua" name="nama_ketua" value="<?php echo $data['panitia'][0]['ketua']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_anggota_staff_1" class="col-sm-3 form-control-label">Nama Anggota/Staff 1<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" required class="form-control" id="nama_anggota_staff_1" name="nama_anggota_staff_1" value="<?php echo $data['panitia'][0]['anggota_staff_1']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_anggota_staff_2" class="col-sm-3 form-control-label">Nama Anggota/Staff 2<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" required class="form-control" id="nama_anggota_staff_2" name="nama_anggota_staff_2" value="<?php echo $data['panitia'][0]['anggota_staff_1']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_anggota_staff_3" class="col-sm-3 form-control-label">Nama Anggota/Staff 3<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" required class="form-control" id="nama_anggota_staff_3" name="nama_anggota_staff_3" value="<?php echo $data['panitia'][0]['anggota_staff_1']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_anggota_staff_4" class="col-sm-3 form-control-label">Nama Anggota/Staff 4<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" required class="form-control" id="nama_anggota_staff_4" name="nama_anggota_staff_4" value="<?php echo $data['panitia'][0]['anggota_staff_1']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_anggota_staff_5" class="col-sm-3 form-control-label">Nama Anggota/Staff 5<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" required class="form-control" id="nama_anggota_staff_5" name="nama_anggota_staff_5" value="<?php echo $data['panitia'][0]['anggota_staff_1']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_anggota_staff_6" class="col-sm-3 form-control-label">Nama Anggota/Staff 6<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" required class="form-control" id="nama_anggota_staff_6" name="nama_anggota_staff_6" value="<?php echo $data['panitia'][0]['anggota_staff_1']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_anggota_staff_7" class="col-sm-3 form-control-label">Nama Anggota/Staff 7<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" required class="form-control" id="nama_anggota_staff_7" name="nama_anggota_staff_7" value="<?php echo $data['panitia'][0]['anggota_staff_1']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mt-3">
                                    <div class="float-right">
                                        <button type="submit" onclick="return confirm('Anda yakin ingin mengubah Kegiatan ini?')" class="btn btn-primary waves-effect waves-light">
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
            <!-- end row -->
        </div>
        <!-- end card-box -->
    </div>
    <!-- end col-->

</div>