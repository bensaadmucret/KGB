<?php use Core\Flash\Flash; ?>

<section class="section section-last color-scheme-3">
		<div class="container">			
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
                <?php echo '<h2>' . $title ?? 'Login</h2>';
                    echo '<h3>' . $message ?? ' Connexion </h3>';
					
					echo'<h4 class="h6 mb-0 fw-bold text-warning-dark" style=color:#9b2f32;>'. Flash::getMessage('error') . '</h4>';
				
                    ?> 
				                    <?php echo $form; ?>
				</div>
			</div>
		</div>
	</section>


