<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">

            <div class="home-wrapper">
                <img src="<?php echo base_url()?>assets/images/animat-diamond-color.gif" alt="" height="180">
                <h2 class="text-danger">Stay tunned, we're launching very soon</h2>
                <p class="text-muted">We're making the system more awesome.we'll be back shortly.</p>
            </div>

        </div>

    </div>

    <div class="row mt-5 justify-content-center">
        <div class="col-md-10">
            <div data-countdown="<?php echo date('Y/m/d H:i',strtotime($start_date))?>" class="counter-number"></div>
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->
</div>