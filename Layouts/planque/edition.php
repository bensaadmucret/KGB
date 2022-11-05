<?php 
use Core\Token\Token;
use Core\Session\Session;
        
$session = new Session();
$token = Token::generateToken($session); 
        
?>

<div class="col-12">
    <form action="planque-update/<?php echo $planque['id']; ?>" method="POST">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Mise a jour</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type_de_planque">Type de planque</label>
                            <select name="type_de_planque">
                                <?php foreach(TypeMission() as  $value): ?>
                                   <?php // si la valaur et egale a la valeur de la base de donnee alors selected ?>
                                    <option value="<?php echo $value; ?>" <?php if($value == $planque['type_de_planque']){ echo 'selected'; } ?> ><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="adresse">adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $planque['adresse']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pays">Pays</label>
                            <input type="pays" class="form-control" id="pays" name="pays" value="<?php echo $planque['pays']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code">Code d'identification</label>
                            <input type="text" class="form-control" id="code" name="code" value="<?php echo $planque['code']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="token" name="token" value="<?php echo $token; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $planque['id'];?>">
                        </div> 
                    </div>        
                
                 </div>               
               

                <input class="btn btn-primary" type="submit" value="Mise à jour">
    </form>
</div>
