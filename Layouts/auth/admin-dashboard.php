<?php 
use Core\Flash\Flash;
?>

<section class="section section-last color-scheme-3">
		<div class="container">			
			<div class="row">
				<div class="col-xs-10 col-lg-12">
                <?php echo '<h2>' . $title ?? 'Connexion</h2>';
                    echo '<h3>' . $message ?? ' Connexion </h3>';
					echo '<p>' .  $sous_titre ?? '' . '</p>';
                    echo'<div class="bg-red-500 text-gray-100 text-center ">'; 
                    dump($user);
                    
					echo'<div class="bg-green-500 text-gray-100 text-center ">'. Flash::getMessage('success') . '</div>';
					echo'<div class="bg-red-500 text-gray-100 text-center ">'. Flash::getMessage('error') . '</div>';
					
            
           
            
				  

                    
                    ?>  

                   
				</div>
			</div>
		</div>
	</section>


	<section class="section section-last priority-6 color-scheme-1 switcher-item-9"><div class="contents">
		<div class="container">
			<h2 id="mission" class="wow zoomIn animated" style="visibility: visible;"><div class="headline">Ajouter un agent<div class="pattern-left"><span class="icon-polygon"></span></div><div class="pattern-right"><span class="icon-polygon"></span></div></div></h2>
			<h5 class="wow zoomIn animated" style="visibility: visible;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aecenas ac augue at erat hendrerit dictum. Praesent porta, purus eget sagittis.</h5>
			<div class="row">
				<div class="col-xs-12 col-md-6">
				
				  <?php  echo $form_agent; ?>

					<div id="form-message"></div>
				</div>
				<div class="col-xs-12 col-md-6">
					<p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt dolorem aliquid vero vel neque asperiores consectetur. Distinctio illo corporis esse dolor, dicta beatae! Eum iste facere et aspernatur, accusamus sapiente.
					</p>
				</div>
				
			</div>
			<div class="row">
				<div class="col-xs-12">
					<footer>© 2012 Old School Lorem ipsum dolor sit amet.</footer>
				</div>
			</div>
		</div>
	</div>
</section>













