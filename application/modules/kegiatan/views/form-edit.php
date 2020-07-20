<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>kegiatan">Data Kegiatan</a></li>
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
                        <form role="form" data-parsley-validate novalidate action="<?php echo base_url()?>kegiatan/update" method="POST">
                            <div class="form-group row">
                                <label for="nama_kegiatan" class="col-sm-2 form-control-label">Nama kegiatan<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="id" value="<?php echo $data['kegiatan'][0]['id_kegiatan']?>" hidden>
                                    <input type="text" required data-parsley-minlength="6" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo $data['kegiatan'][0]['nama_kegiatan']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label " for="jenis_kegiatan">Jenis Kegiatan <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="jenis_kegiatan" id="jenis_kegiatan" required class="form-control">
                                        <?php foreach ($data['jenis'] as $jenis) {?>
                                            <?php if ($data['kegiatan'][0]['id_jenis'] == $jenis['id_jenis']) :?>
                                                <option value="<?php echo $jenis['id_jenis']?>" selected><?php echo $jenis['nama'] ?></option>
                                            <?php else : ?>
                                            <option value="<?php echo $jenis['id_jenis']?>"><?php echo $jenis['nama']?></option>
                                            <?php endif; } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat_kegiatan" class="col-sm-2 form-control-label">Alamat<span class="text-danger">*<small>Min. 20 karakter</small></span></label>
                                <div class="col-sm-10">
                                    <textarea id="alamat_kegiatan" class="form-control" name="alamat_kegiatan" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-minlength-message="Masukkan Minimal 20 Karakter.." data-parsley-validation-threshold="10" required><?php  echo $data['kegiatan'][0]['alamat']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="tgl_mulai">Tanggal Kegiatan <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-daterange-timepicker" id="tanggal_kegiatan" name="tanggal_kegiatan" value="<?php echo date('m/d/Y H:i',strtotime($data['kegiatan'][0]['start_date']))." - ".date('m/d/Y H:i',strtotime($data['kegiatan'][0]['end_date']));?>" placeholder="Masukkan tanggal kegiatan" required/>
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-primary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
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