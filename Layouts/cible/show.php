<!--**********************************
            Content body start
        ***********************************-->

      
  
        <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Liste des cibles</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Date de naissance</th>
                                                <th>Code</th>
                                                <th>Natiolanité</th>                                                                                         
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach($cibles as $cible): ?>
                                            <tr>
                                                <td></td>
                                               
                                                <td><?php echo $cible['nom'] ?? '';?></td>
                                                <td><?php echo $cible['prenom'] ?? '';?></td>
                                                <td><?php echo dateFormate($cible['date_naissance']) ?? '';?></td>
                                                <td><?php echo $cible['code_identification'] ?? '';?></td>
                                                <td><a href="javascript:void(0);"><strong><?php echo $cible['nationalite'] ?? '';?></strong></a></td>                                                
                                                <td>
													<div class="d-flex">   
                                                    <form action="cible-edit/<?php echo $cible['id'] ?? '';?>" method="POST">
                                                        <input  name="id" type="hidden" value="<?php echo $cible['id'] ?? '';?>">
                                                        <input  name="token" type="hidden" value="<?php echo $token ?? '';?>">
                                                        <input type="submit" class="btn btn-primary shadow btn-xs sharp mr-1"  value="Edit" >                                           
                                                    
                                                    </form>
                                                    <form class="deleteForm" action="cible-delete/<?php echo $cible['id'] ?? '';?>" method="POST">
                                                      
                                                        <input  class="btn btn-danger btn-xs sharp" name="id" type="hidden" value="<?php echo $cible['id'] ?? '';?>">
                                                        <input  class="btn btn-danger btn-xs sharp" name="token" type="hidden" value="<?php echo $token ?? '';?>">
                                                        <input  class="btn btn-danger   btn-xs sharp" type="submit"   value="Sup" onclick="return confirm('Êtes-vous sûr de votre choix ?')" >
                                                    
                                                    </form>
                                                    
                                              
												
													</div>												
												</td>												
                                            </tr>
                                            <?php endforeach; ?>    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                                        
			
			
               



      
   


<!--**********************************
            Content body end
        ***********************************-->