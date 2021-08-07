
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
         
            
            <?php var_dump($_POST); ?>
           <?php foreach ($data as $news_item): ?>

                <div class="well">
                    <h2><?php echo $news_item; ?></h2>
                                        
                </div>
              <?php endforeach; ?>  
                   
           <?php  echo $form->create(); ?>
            <br>
            <hr>
            <form class="row g-3" action="action.php" method="post" >
                <div class="col-auto">
                    <label for="staticEmail2" class="visually-hidden">Email</label>
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
                </div>
                <div class="col-auto">
                    <label for="inputPassword2" class="visually-hidden">Password</label>
                    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
                </div>
                </form>
                            
            </div>
        </div>
    </div>
</section>

