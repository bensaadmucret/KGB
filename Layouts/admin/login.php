<section class="section section-last priority-11 color-scheme-1 switcher-item-8">
    <div class="container">
        <h2 class="wow zoomIn"><?php echo $title ?? 'Login' ?></h2>
        <h5 class="wow zoomIn">
            <?php echo $message ?? 'Please login to access the admin area' ?>
        </h5>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <?php if ($error): ?>
                    <div alert-error class="alert alert-danger" ng-show="error">
                        <h5 class="wow zoomIn"><strong style="color: #AA625E;">Error!</strong> <?php echo $error ?></h5>
                    </div>
                <?php endif ?>
                <?php echo $form; ?>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12">
                <footer>© KGB </footer>
            </div>
        </div>
    </div>
</section>