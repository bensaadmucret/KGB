<!--**********************************
            Content body start
        ***********************************-->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Liste des agents</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>type</th>
                                                <th>adresse</th>
                                                <th>pays</th>
                                                <th>Code</th>                                           
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach($planques as $planque): ?>
                                            <tr>
                                                <td></td>
                                               
                                                <td><?php echo $planque['type_de_planque'] ?? '';?></td>
                                                <td><?php echo $planque['adresse'] ?? '';?></td>
                                                <td><?php echo $planque['pays'] ?? '';?></td>
                                                <td><?php echo $planque['code'] ?? '';?></td>
                                            
                                                <td>
													<div class="d-flex">   
                                                    <form action="planque-edit/<?php echo $planque['id'] ?? '';?>" method="POST">
                                                        <input  name="id" type="hidden" value="<?php echo $planque['id'] ?? '';?>">                                                      
                                                        <input type="submit" class="btn btn-primary  btn-xs sharp mr-1"  value="Edit" >                                           
                                                    
                                                    </form>
                                                    </div>
                                                    <div class="d-flex"> 
                                                    <form action="planque-delete/<?php echo $planque['id'] ?? '';?>" method="POST">
                                                      
                                                        <input  class="btn btn-danger btn-xs sharp" name="id" type="hidden" value="<?php echo $planque['id'] ?? '';?>">                                                       
                                                        <input type="submit"  class="btn btn-danger  btn-xs sharp"   value="Sup" onclick="return confirm('Êtes-vous sûr de votre choix ?')" >
                                                    
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