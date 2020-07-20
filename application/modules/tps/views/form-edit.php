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
                        <form id="wizard-validation-form" action="<?php echo base_url()?>tps/update" method="POST">
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="kegiatan">Instansi <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select name="kegiatan" id="kegiatan" class="required form-control">
                                        <?php foreach ($data['kegiatan'] as $key) {?>
                                        <?php if ($key['id_kegiatan'] === $data['tps'][0]['id_kegiatan']) :?>
                                           <option value="<?php echo $key['id_kegiatan']?>" selected>
                                           <?php echo $key['nama_kegiatan']?></option>
                                        <?php else : ?>
                                        <option value="<?php echo $key['id_kegiatan']?>">
                                            <?php echo $key['nama_kegiatan']?></option>
                                        <?php endif; } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="nama_tps">Nama TPS <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" name="id_tps" id="id_tps" value="<?php echo $data['tps'][0]['id_tps']?>" hidden>
                                    <input class="form-control" id="nama_tps" required="" name="nama_tps" type="text" value="<?php echo $data['tps'][0]['nama']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="username">Username <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="username" required="" name="username" type="text"
                                        data-parsley-trigger="focusout" data-parsley-maxlength="12"
                                        data-parsley-maxlength-message="Maksimal 12 Karakter.."
                                        data-parsley-checkusername
                                        data-parsley-checkusername-message="Username Telah Digunakan" value="<?php echo $data['tps'][0]['username']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="password">Password <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="password" required="" name="password"
                                        type="password">
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
                                        data-parsley-trigger="keyup" data-parsley-minlength="20"
                                        data-parsley-minlength-message="Minimal 20 Karakter.."><?php echo $data['tps'][0]['lokasi']?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="no_tps">No TPS <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="no_tps" required="" name="no_tps" type="text"
                                        data-parsley-trigger="focusout" data-parsley-maxlength="12"
                                        data-parsley-maxlength-message="Maksimal 12 Karakter.." data-parsley-checknotps data-parsley-type="number"
                                        data-parsley-checknotps-message="Nomor Telah Digunakan" value="<?php echo $data['tps'][0]['no_tps']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mt-3">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="return confirm('Anda yakin ingin mengubah data?');">
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