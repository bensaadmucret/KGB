<!--create form with bootstrap input: titre, description, nom de code, pays, agents, contacts, cibles, type de mission*-->


<div class="col-12">
   
   
    <style>
     .page {
        margin-top: 2rem;
        display: block;
    }


    .page-number-active {
        margin-top: 2rem;
        display: block;
        border: 1px solid #ccc;
        border-radius: 50%;
        height: 50px;
        width: 50px;
        text-align: center;
        line-height: 50px;
        font-size: 20px;
        color: #ccc;
        cursor: pointer;
        background-color: green;
    }

    .page-number {
       display: none;        
    }
    </style>
    <header class="header-form">
        
    </header>

    <form action="mission-add" method="post" id="missionAdd">
        <div class="page" id="page1">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre de la mission">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="nom_code">Nom de code</label>
                <input type="text" class="form-control" id="nom_code" name="nom_code" placeholder="Nom de code">
            </div>
            <div class="form-group">
                <label for="cibles">Cibles</label>
                <select class="form-control" id="cibles" name="cibles[]" multiple>
                    <?php foreach($cible as $cible): ?>
                        <option value="<?php echo $cible['id'] ?>"><?php echo $cible['nom'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <bouton type="button" id="suivant" class="btn btn-primary button-page">Suivant</bouton>
            </div>
        </div>
        <div class="page" id="page2">
            <div class="form-group">
                <label for="pays">Pays</label>
                <input type="text" class="form-control" id="pays" name="pays" placeholder="Pays">
            </div>
            <div class="form-group">
                <label for="agents">Agents</label>               
                  
                    <select class="form-control" multiple="multiple" id="agents" name="agents[]">
                    <?php foreach(listeAgent() as $agent): ?>
                        <option value="<?php echo $agent['id']; ?>"><?php echo $agent['nom']; ?></option>
                        <?php endforeach; ?>
                    </select>
                   
                
            </div>
                
            
            <div class="form-group">
                <label for="contacts">Contacts</label>
                <select class="form-control" id="contacts" name="contacts[]" multiple>
                    <?php foreach($contact as $contact): ?>
                        <option value="<?php echo $contact['id']; ?>"><?= $contact['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <bouton type="button" class="btn btn-primary button-page">Suivant</bouton>
            </div>
            <div class="form-group">
                <bouton type="button" class="btn btn-primary button-page-precedent">Precedent</bouton>
            </div>

        </div>
        <div class="page" id="page3">
            <div class="form-group">
                <label for="type_mission">Type de mission</label>
                <select class="form-control" id="type_mission" name="type_mission">
                    <option value="1">Mission de recherche</option>
                    <option value="2">Mission de mission</option>
                    <option value="3">Mission de mission</option>
                </select>
            </div>
  
            <div class="form-group">
                <label for="date_debut">Date de début</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut" placeholder="Date de début">
            </div>
            <div class="form-group">
                <label for="date_fin">Date de fin</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin" placeholder="Date de fin">
            </div>            
            <div class="form-group">
                <bouton type="submit" class="btn btn-primary">Enregistrer</bouton>
            </div>
            <div class="form-group">
                <bouton type="button" class="btn btn-primary button-page-precedent">Precedent</bouton>
            </div>
        </div>

    </form>

   



</div>