<div class="container">
            <div class="row">
                
                <?php $no=1; $akhir = end($pemilihan); foreach ($pemilihan as $pm) {?>
                <div class="alas col-sm-12 mb-2 <?php echo ($no != 1 ? 'ilang':'')?>" id="alas-<?php echo $no;?>" data-id="<?php echo $pm['id_pemilihan']?>" data-urutan="<?php echo $no?>" data-index="<?php echo ($pm['id_pemilihan'] == $akhir['id_pemilihan'] ? 'end':$no)?>"> 
                    <div class="text-center">
                        <div class="home-wrapper">
                            <h2 class="text-danger"><?php echo $pm['nama_pemilihan']?></h2>
                            <p class="text-muted">
                                Selamat datang <strong><?php echo $bilik[0]['nama']?></strong> <br>
                                <strong>Sentuh gambar</strong> salah satu kandidat untuk memilih.
                            </p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <?php foreach ($kandidat as $kd) { if($kd['id_pemilihan'] == $pm['id_pemilihan']){?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="judul card-body text-center">
                                    <h3 class="card-title" style="font-size: 24px!important;"><?php echo $kd['no_urut']?></h3>
                                    <h6 class="card-subtitle text-muted"><?php echo $kd['nama_kandidat']?></h6>
                                </div>
                                <a href="javascript:void(0)" class="pilihan" data-kandidat="<?php echo $kd['id_kandidat']?>">
                                    <img class="img-fluid" src="<?php echo base_url()?>assets/images/uploads/kandidat/<?php echo $kd['foto']?>" alt="Card image cap" style="object-fit:contain; width: 100%; height:250px">
                                </a>
                                <div class="card-body">
                                    <p class="card-text"></p>
                                </div>
                            </div>                                
                        </div>
                        <?php }} ?>
                    </div>
                </div>
                <?php $no++;} ?>
            </div>

            <form id="form" action="<?php echo base_url()?>bilik-suara/store" method="post">
                <?php foreach($pemilihan as $pem){?>
                    <input type="text" id="pilihan-<?php echo $pem['id_pemilihan']?>" name="pilihan[]" hidden>
                <?php }?>
            </form>

            <!-- <div class="row mt-5 justify-content-center">
                <div class="col-md-10">
                    <div data-countdown="2020/07/25 13:00:00" class="counter-number"></div>
                </div>
            </div> -->
            <!-- end row-->
        </div>