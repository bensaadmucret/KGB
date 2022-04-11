<div class="col-12">
    <form action="contact-update/<?php echo $contact['id']; ?>" method="POST">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajouter un contact</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $contact['nom']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $contact['prenom']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_naissance">Date de naissance</label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo $contact['date_naissance']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code_identification">Code d'identification</label>
                            <input type="text" class="form-control" id="code_identification" name="code_identification" value="<?php echo $contact['code_identification']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nationalite">Nationalité</label>
                            <input type="text" class="form-control" id="nationalite" name="nationalite" value="<?php echo $contact['nationalite']; ?>"   required>
                        </div>
                    </div>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="token" name="token" value="<?php echo $token; ?>">
                        </div> 
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $contact['id'];?>">
                        </div> 
                    </div>        
                
                 </div>               
               

                <input class="btn btn-primary" type="submit" value="Mise à jour">
    </form>
</div>

