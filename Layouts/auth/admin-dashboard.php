<?php 
use Core\Flash\Flash;
?>

	
                <?php echo '<h2>' . $title ?? 'Connexion</h2>';
                    echo '<h3>' . $message ?? ' Connexion </h3>';
					echo '<p>' .  $sous_titre ?? '' . '</p>';
                    echo'<div class="bg-red-500 text-gray-100 text-center ">'; 
                    dump($user);
                    
					echo'<div class="bg-green-500 text-gray-100 text-center ">'. Flash::getMessage('success') . '</div>';
					echo'<div class="bg-red-500 text-gray-100 text-center ">'. Flash::getMessage('error') . '</div>';	

                    
                    ?>  




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
				<table id="table_id" class="display">
				<thead>
					<tr>
						<th>Column 1</th>
						<th>Column 2</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Row 1 Data 1</td>
						<td>Row 1 Data 2</td>
					</tr>
					<tr>
						<td>Row 2 Data 1</td>
						<td>Row 2 Data 2</td>
					</tr>
				</tbody>
			</table>
				
			</div>
			<script>
				$(document).ready(function() {
					$('#table_id').DataTable();
				} );
			</script>
				<div class="row">
				<div class="col-xs-12">
					<footer>© 2012 Old School Lorem ipsum dolor sit amet.</footer>
				</div>
			</div>
		</div>
	</div>
</section>













