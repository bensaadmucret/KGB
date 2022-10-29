<?php 
use Core\Token\Token;
use Core\Session\Session;
        
$session = new Session();
$token = Token::generateToken($session); 
        
        ?>
<div class="col-12">
    <form action="cible-update/<?php echo $cible['id']; ?>" method="POST">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajouter un cible</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $cible['nom']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $cible['prenom']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_naissance">Date de naissance</label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo $cible['date_naissance']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code_identification">Code d'identification</label>
                            <input type="text" class="form-control" id="code_identification" name="code_identification" value="<?php echo $cible['code_identification']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nationalite">Nationalité</label>
                            <input type="text" class="form-control" id="nationalite" name="nationalite" value="<?php echo $cible['nationalite']; ?>"   required>
                        </div>
                    </div>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="token" name="token" value="<?php echo $token; ?>">
                        </div> 
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $cible['id'];?>">
                        </div> 
                    </div>        
                
                 </div>               
               

                <input class="btn btn-primary" type="submit" value="Mise à jour">
    </form>
</div>

