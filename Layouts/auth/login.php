<?php use Core\Flash\Flash; ?>

<section class="section section-last color-scheme-3">
		<div class="container">			
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
				
                <?php 
				echo '<h2>' . $title ?? 'Login</h2>';
                echo '<h3>' . $message ?? ' Connexion </h3>';
					
				 get_flash_message_error();
				
                    ?> 
					
						<div class="row">
							<div class="col-xs-12 text-left mt-5">								
				                    <?php echo $form; ?>
							</div>
						</div>			


				</div>
			</div>
		</div>
	</section>


