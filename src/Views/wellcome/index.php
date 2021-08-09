
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">      
            
           
           <?php foreach ($data as $news_item): ?>
               <div class="well">
                    <h2><?php echo $news_item; ?></h2>
                                        
                </div>
              <?php endforeach; ?>  
                   
           <?php  echo $form->create(); ?>
                      
                            
            </div>
        </div>
    </div>
</section>

