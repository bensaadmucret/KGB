<?php use Core\Flash\Flash;?>
<?php include 'header.html';?>

<body>

    <div id="wrapper">
        <?php include 'navbar.html'; ?>
        <section class="section section-first priority-1 color-scheme-1 transition-form switcher-item-2">
            <div class="container">
                <h2 id="home" class="big-heading">KGB</h2>
                <div class="row">
                    
                </div>
            </div>
        </section>
        <div class="transition">
            <div class="section color-scheme-6 container switcher-item-3">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="owl-carousel">
                            <div class="item">
                                <img src="images/slides/illustration-kgb.png" alt="The Last of us">
                                <span class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                                    tempus semper dignissim. Proin et quam ut neque egestas vulputate quis ut quam. Sed
                                    a quam luctus mauris commodo euismod. Donec condimentum, elit vitae eleifend
                                    adipiscing, velit ligula gravida turpis, ac ultrices odio orci sed dui.</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <section class="section priority-2 color-scheme-3 transition-to switcher-item-4">
           
        </section>
        <section class="section priority-3 color-scheme-5 switcher-item-5">
            <div class="container">
                <div class="row">
                    <?php echo $content; ?>
                </div>
            </div>
        </section>
        <section class="section priority-5 color-scheme-5 transition-form switcher-item-6">

        </section>



    </div>
    <!-- Required bases -->
    <script src="<?php echo assets('/ressources/base/global/global.min.js' );?>"></script>
    <script src="<?php echo assets('/ressources/base/bootstrap-select/dist/js/bootstrap-select.min.js' );?>"></script>
    <script src="<?php echo assets('/ressources/js/custom.min.js' );?>"></script>
    <script src="<?php echo assets('/ressources/js/formulaire.js' );?>"></script>
    <script src="<?php echo assets('/ressources/js/deznav-init.js' );?>"></script>
    <script src="<?php echo assets('/ressources/base/sweetalert2/dist/sweetalert2.min.js' );?>"></script>
    <!-- Datatable -->
    <script src="<?php echo assets('/ressources/base/datatables/js/jquery.dataTables.min.js' );?>"></script>
    <script src="<?php echo assets('/ressources/js/plugins-init/datatables.init.js');?>"></script>

	<div class="back-to-top hidden-xs hidden-sm">TOP</div>

<div class="back-to-top hidden-xs hidden-sm">TOP</div>
<script src="<?php echo assets('/js/jquery-1.11.1.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets('/js/modernizr.custom.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets('/js/retina.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets('/js/SmoothScroll.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets('/js/owl.carousel.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets('/js/jquery.shuffle.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets('/js/jquery.scrollbox.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets('/js/wow.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets('/js/jquery.scrollstop.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets('/js/jquery.swipebox.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets('/js/custom.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets('/js/switcher.js'); ?>" type="text/javascript"></script>
<script src="<?php echo assets('/js/jquery-1.11.1.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>

</html>