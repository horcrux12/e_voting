<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>kandidat">Data Kandidat</a></li>
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
                        <form id="wizard-validation-form" action="<?php echo base_url()?>kandidat/update" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="kegiatan">Kegiatan <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select name="kegiatan" id="kegiatan" class="required form-control" required>
                                        <?php foreach ($data['kegiatan'] as $key) {?>
                                        <?php if ($key['id_kegiatan'] ==  $data['kadidat'][0]['id_kegiatan']) :?>
                                            <option value="<?php echo $key['id_kegiatan']?>" selected> <?php echo $key['nama_kegiatan']?></option>
                                        <?php else :?>
                                            <option value="<?php echo $key['id_kegiatan']?>"> <?php echo $key['nama_kegiatan']?></option>
                                        <?php endif; } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="kegiatan">Pemilihan<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select name="pemilihan" id="pemilihan" class="required form-control" required>
                                        <?php foreach ($data['pemilihan'] as $key) {?>
                                        <?php if ($key['id_pemilihan'] ==  $data['kadidat'][0]['id_pemilihan']) :?>
                                            <option value="<?php echo $key['id_pemilihan']?>" selected> <?php echo $key['nama_pemilihan']?></option>
                                        <?php else :?>
                                            <option value="<?php echo $key['id_pemilihan']?>"> <?php echo $key['nama_pemilihan']?></option>
                                        <?php endif; } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="nama_kandidat">Nama Kandidat <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" name="id_kandidat" id="id_kandidat" value="<?php echo $data['kandidat'][0]['id_kandidat'] ?>" hidden>
                                    <input class="form-control" id="nama_kandidat" required="" name="nama_kandidat"
                                        type="text" value="<?php echo $data['kandidat'][0]['nama_kandidat'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="no_urut">No Urut <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="no_urut" required="" name="no_urut" type="text"
                                        data-parsley-trigger="focusout" data-parsley-checkno_kandidat
                                        data-parsley-checkno_kandidat-message="Nomor Telah Digunakan" value="<?php echo $data['kandidat'][0]['no_urut'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="foto_kandidat">Foto Kandidat <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" name="last_foto" value="<?php echo $data['kandidat'][0]['foto'] ?>" hidden>
                                    <input class="form-control" id="foto_kandidat" name="foto_kandidat"
                                        type="file" accept="image/jpeg,image/png" data-parsley-filemaxmegabytes="2"
                                        data-parsley-trigger="change"
                                        data-parsley-filemimetypes="image/jpeg, image/png">
                                    <input type="text" name="foto_sebelum" id="foto_sebelum" value="<?php echo base_url('/assets/images/uploads/kandidat/').$data['kandidat'][0]['foto']; ?>" hidden>
                                    <div id="view_gambar" class="mt-2">
                                        <small>Foto Sebelumnya : </small>
                                        <img class="img-fluid d-block rounded" width="250" src="<?php echo base_url('/assets/images/uploads/kandidat/').$data['kandidat'][0]['foto']; ?>" title="<?php echo $data['kandidat'][0]['foto'] ?>" alt="<?php echo $data['kandidat'][0]['foto'] ?>"></img>
                                    </div>
                                </div>
                            </div>
                                            
                            <div class="form-group row">
                                <div class="col-sm-12 mt-3">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light"
                                            onclick="return confirm('Anda yakin ingin mengubah data?');">
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