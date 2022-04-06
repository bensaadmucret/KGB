<!--**********************************
            Content body start
        ***********************************-->

      
  
        <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Liste des missions</h4>
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
                                                <th>Spécialité</th>                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach($misions as $mision): ?>
                                            <tr>
                                                <td></td>
                                               
                                                <td><?php echo $mision['nom'] ?? '';?></td>
                                                <td><?php echo $mision['prenom'] ?? '';?></td>
                                                <td><?php echo dateFormate($mision['date_naissance']) ?? '';?></td>
                                                <td><?php echo $mision['code_identification'] ?? '';?></td>
                                                <td><a href="javascript:void(0);"><strong><?php echo $mision['nationalite'] ?? '';?></strong></a></td>
                                                <td><a href="javascript:void(0);"><strong><?php echo $mision['specialite'] ?? '';?></strong></a></td>                                               
                                                <td>
													<div class="d-flex">   
                                                    <form action="agent-edit/<?php echo $mision['id'] ?? '';?>" method="POST">
                                                        <input  name="id" type="hidden" value="<?php echo $mision['id'] ?? '';?>">
                                                        <input type="submit" class="btn btn-primary shadow btn-xs sharp mr-1"  value="Editer" > <i class="fa fa-pencil"></i>                                          
                                                    
                                                    </form>
                                                     
                                              
													<a  href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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