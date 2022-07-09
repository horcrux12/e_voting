<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
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
                <h4 class="header-title mb-3"><b>Tabel <?php echo $title?></b></h4>
            </div>
            <div class="card-body">
                <p class="subheader mb-4">Pilih peserta yang akan melakukan pemilihan dengan cara <strong>klik tombol <span class="text-primary">biru</span> pada kolom<span class="text-primary"> action</span></strong></p>
                <form id="form_isi" action="<?php echo base_url();?>atur-bilik/isi-bilik" method="POST">
                    <input type="text" name="id_bilik" hidden value="<?php echo $data;?>">
                    <input type="text" id="identitas" name="identitas" hidden value="">
                </form>  
                <table id="user_datatable" class="table table-striped table-bordered table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No. Identitas</th>
                            <th>No. KK</th>
                            <th>Nama</th>
                            <th>L/P</th>
                            <th>T.T.L.</th>
                            <th>Alamat</th>
                            <th>No. Urut</th>
                            <th>TPS</th>
                            <th>Bilik</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-box table-responsive">
            
            
        </div>
    </div>
</div>