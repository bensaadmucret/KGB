<div class="col-12">
    <form action="agent-update/<?php echo $agent['id']; ?>" method="POST">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Mise à un agent</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $agent['nom']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $agent['prenom']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_naissance">Date de naissance</label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo $agent['date_naissance']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code_identification">Code d'identification</label>
                            <input type="text" class="form-control" id="code_identification" name="code_identification" value="<?php echo $agent['code_identification']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nationalite">Nationalité</label>
                            <input type="text" class="form-control" id="nationalite" name="nationalite" value="<?php echo $agent['nationalite']; ?>"   required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="specialite">Spécialité</label>
                            <input type="text" class="form-control" id="specialite" name="specialite" value="<?php echo $agent['specialite']; ?>" required>
                        </div> 
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $agent['id']; ?>" required>
                        </div> 
                    </div>        
                
                 </div>               
               

                <input class="btn btn-primary" type="submit" value="Mise à jour">
    </form>
</div>
