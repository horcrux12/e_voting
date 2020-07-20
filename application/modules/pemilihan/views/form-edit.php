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
                        <form role="form" data-parsley-validate novalidate action="<?php echo base_url()?>pemilihan/update" method="POST">
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="nama_pemilihan">Nama Pemilihan <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                <input class="form-control" id="nama_pemilihan" required="" value="<?php echo $data['pemilihan'][0]['nama_pemilihan']?>" name="nama_pemilihan" type="text">
                                    <input class="form-control" id="id_pemilihan" value="<?php echo $data['pemilihan'][0]['id_pemilihan']?>" name="id_pemilihan" type="text" hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="kegiatan">Instansi <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select name="kegiatan" id="kegiatan" required="" class="form-control">
                                        <option value="">Pilih Instansi</option>
                                        <?php foreach ($data['kegiatan'] as $key) {?>
                                        <option value="<?php echo $key['id_kegiatan']?>" <?php echo ($key['id_kegiatan'] == $data['pemilihan'][0]['id_kegiatan'] ? "selected" : "");?>><?php echo $key['nama_kegiatan']?></option>

                                        <?php } ?>
                                    </select>
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