<?php use Core\Flash\Flash; ?>
<section class="section section-last priority-10 color-scheme-1 switcher-item-9 ">
		<div class="container">
			<h2  class="wow zoomIn">Login</h2>
			<h5 class="wow zoomIn"> 
				<?php echo $message ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aecenas ac augue at erat hendrerit dictum.' ?> </h5>
			<div class="row">
				<div class="col-xs-12 col-md-12">
                <div id="form-message">
					<?php Flash::getMessage('error'); ?>
				</div>
	                    <?php echo $form ?>					
				</div>
				
			</div>
			<div class="row">
				<div class="col-xs-12">
					<footer>© KGB</footer>
				</div>
			</div>
		</div>
	</section>
