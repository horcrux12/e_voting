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
                        <form id="wizard-validation-form" action="<?php echo base_url()?>bilik/update" method="POST">
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="kegiatan">Nama Kegiatan <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select name="kegiatan" id="kegiatan" class="form-control" required="">
                                        <?php foreach ($data['kegiatan'] as $kegiatan) {?>
                                        <?php if ($kegiatan['id_kegiatan'] == $data['bilik'][0]['id_kegiatan']) :?>
                                            <option value="<?php echo $kegiatan['id_kegiatan']?>" selected><?php echo $kegiatan['nama_kegiatan']?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $kegiatan['id_kegiatan']?>"><?php echo $kegiatan['nama_kegiatan']?></option>
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
                                        <?php foreach ($data['tps'] as $tps) {?>
                                        <?php if ($tps['id_tps'] == $data['bilik'][0]['id_tps']) :?>
                                            <option value="<?php echo $tps['id_tps']?>" selected><?php echo $tps['nama']?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $tps['id_tps']?>"><?php echo $tps['nama']?></option>
                                        <?php endif; } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="nama_bilik">Nama Bilik <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" id="id_bilik" name="id_bilik" value="<?php echo $data['bilik'][0]['id_bilik']?>" hidden>
                                    <input class="form-control" id="nama_bilik" required="" name="nama_bilik"
                                        type="text" value="<?php echo $data['bilik'][0]['nama']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="username">Username <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="username" required="" name="username" type="text"
                                        data-parsley-trigger="focusout" data-parsley-maxlength="20"
                                        data-parsley-maxlength-message="Maksimal 20 Karakter.."
                                        data-parsley-checkusername
                                        data-parsley-checkusername-message="Username Telah Digunakan" value="<?php echo $data['bilik'][0]['username']?>">
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
                                <label class="col-lg-2 control-label" for="no_bilik">No Bilik <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="no_bilik" required="" name="no_bilik" type="text"
                                        data-parsley-trigger="focusout" data-parsley-maxlength="12"
                                        data-parsley-maxlength-message="Maksimal 12 Karakter.."
                                        data-parsley-checknobilik
                                        data-parsley-checknobilik-message="Nomor Telah Digunakan" value="<?php echo $data['bilik'][0]['no_bilik']?>">
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