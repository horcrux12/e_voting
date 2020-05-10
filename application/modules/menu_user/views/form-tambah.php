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
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="col-lg-12 mt-4">
                <h4 class="header-title mb-2">Form <?php echo $title?></h4>

                <form class="form-horizontal" action="<?php echo base_url()?>menu-user/simpan" method="POST">
                    <div class="form-group row">
                        <label for="inputNama" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" id="inputNama" placeholder="Masukkan Nama" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputUsername" class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Masukkan Username" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="password" id="inputPassword" name="password" class="form-control" required>
                                <span class="input-group-prepend">
                                    <button type="button" id="shown" class="btn waves-effect waves-light btn-outline-secondary"><i class="ion ion-ios-eye"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label">Level User</label>
                        <div class="col-sm-9">
                            <select name="level" class="form-control" required>
                                <option value="">Pilih Level User</option>
                                <?php foreach ($data as $key) {?>
                                    <option value="<?php echo $key['id_level']?>"><?php echo $key['nama_level']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info waves-effect waves-light float-right">Simpan</button>
                    <br><br>

                </form>
            </div>
        </div>
    </div>
</div>