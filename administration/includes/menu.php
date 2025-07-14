
                
                
                <div class="row card-group-row" >
                     
                  
                  
                  
                     <div class="col-lg-3 col-md-4 card-group-row__col">
                           <div class="card card-group-row__card card-shadow">
                              <div class="p-2 d-flex flex-row align-items-center">
                                 <div class="avatar avatar-xs mr-2">
                                    <span class="avatar-title rounded-circle text-center bg-primary">
                                    <i class="material-icons text-white icon-18pt">dashboard</i>
                                    </span> 
                                 </div>
                                 <a class="text-dark" href="/administration/" class="text-dark">
                                 <strong>Tableau de bord</strong>
                                 </a>
                              </div>
                           </div>
                        </div>
                     
                     
                     
                     
                     
                     
                     
                     <div class="col-lg-3 col-md-4 card-group-row__col">
                           <div class="card card-group-row__card card-shadow">
                              <div class="p-2 d-flex flex-row align-items-center">
                                 <div class="avatar avatar-xs mr-2">
                                    <span class="avatar-title rounded-circle text-center bg-primary">
                                    <i class="material-icons text-white icon-18pt">perm_contact_calendar</i>
                                    </span>
                                 </div>
                                 <a  class="text-dark add_reservation" href="#" data-toggle="modal">
                                 <strong>Ajouter une réservation</strong>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-4 card-group-row__col">
                           <div class="card card-group-row__card card-shadow">
                              <div class="p-2 d-flex flex-row align-items-center">
                                 <div class="avatar avatar-xs mr-2">
                                    <span class="avatar-title rounded-circle text-center bg-primary">
                                    <i class="material-icons text-white icon-18pt">person_add</i>
                                    </span> 
                                 </div>
                                 <a class="text-dark modal-nuevo-usuario" href="#" class="text-dark" data-toggle="modal" >
                                 <strong>Créer un nouveau client
                                 
                                 <?php 
                                 
                                 
                                 if(empty($_SESSION['usuario'])){
   
                                 ?>
                                 <script>
                                    window.location.href="login.php";
                                 </script>
                                 <?php } ?>                            
                                 </strong>
                                 </a>
                              </div>
                           </div>
                        </div>
   
   
   
                        <div class="col-lg-3 col-md-4 card-group-row__col">
                           <div class="card card-group-row__card card-shadow">
                              <div class="p-2 d-flex flex-row align-items-center">
                                 <div class="avatar avatar-xs mr-2">
                                    <span class="avatar-title rounded-circle text-center bg-primary">
                                    <i class="material-icons text-white icon-18pt">view_list</i>
                                    </span> 
                                 </div>
                                 <a class="text-dark" href="clients.php" class="text-dark">
                                 <strong>Clients</strong>
                                 </a>
                              </div>
                           </div>
                        </div>
 

                        <div class="col-lg-3 col-md-4 card-group-row__col">
                           <div class="card card-group-row__card card-shadow">
                              <div class="p-2 d-flex flex-row align-items-center">
                                 <div class="avatar avatar-xs mr-2">
                                    <span class="avatar-title rounded-circle text-center bg-primary">
                                    <i class="material-icons text-white icon-18pt">event_busy</i>
                                    </span> 
                                 </div>
                                 <a class="text-dark holidays-modal" href="#"  data-toggle="modal" >
                                 <strong>Vacances</strong>
                                 </a>
                              </div>
                           </div>
                        </div>
   

                        <div class="col-lg-3 col-md-4 card-group-row__col">
                           <div class="card card-group-row__card card-shadow">
                              <div class="p-2 d-flex flex-row align-items-center">
                                 <div class="avatar avatar-xs mr-2">
                                    <span class="avatar-title rounded-circle text-center bg-primary">
                                    <i class="material-icons text-white icon-18pt">event_available</i>
                                    </span> 
                                 </div>
                                 <a class="text-dark no-holidays-modal" href="#"  data-toggle="modal" >
                                 <strong>No Vacances</strong>
                                 </a>
                              </div>
                           </div>
                        </div>
   
   

                     
                        
   
   
   
   
   
                     </div>