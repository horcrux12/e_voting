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
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-light">
            <h4 class="header-title mb-3"><b>Tabel <?php echo $title?></b>
                <a href="<?php echo base_url()?>menu-user/tambah" class="btn btn-primary float-right">
                <i class="fas fa-plus-circle pull-left mr-2"></i> Tambah Data</a>
            </h4>
            </div>
            <div class="card-body">
                
                <table id="user_datatable" class="table table-striped table-bordered table-hover"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data as $key) {?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $key['nama']?></td>
                                <td><?= $key['username']?></td>
                                <td><?= $key['nama_level']?></td>
                                <td>Action</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-box table-responsive">
            
            
        </div>
    </div>
</div>