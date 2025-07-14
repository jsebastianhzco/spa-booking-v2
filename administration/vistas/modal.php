<!-- AGREGAR RESERVA -->

<div id="modal-add-reservation" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-body">

                    <div class="px-3">

                        <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">

                            

                                 <span>Créer une réservation</span>

                          

                        </div>

                        <form action="#">

                                <div class="form-group">

                                    <div class="row">





                                        <div class="col-md-12">

                                            <label for="searchSample03">Client</label>

                                            <input type="hidden" class="email_reservation">

                                            <div class="search-form search-form--light">



                                            <input autocomplete="off" type="text" id="txtbusca" class="form-control busqueda-ajax"/>

                                            <input autocomplete="off" type="hidden" id="id_cliente" class="form-control busqueda-ajax"/>

                                                                                               

                                            </div>

                                        </div>



                                    </div>

                                </div>



                           





                                <div class="form-group">





                                <div class="row">

                                <div class="col-md-12">





                                <ul class="list-group salida">

  

  

                                </ul>



  



                                    </div>

                                </div>

                                </div>



                                



                                <div class="form-group">

                                    <div class="row">





                                        <div class="col-md-12">

                                            <label for="searchSample03">Choix du Service</label>

                                            <div class="search-form search-form--light">

                                                <select id="id_servicio" class="form-control" readonly>



                                                <option disabled selected>Choisissez-en un </option>

                                                



                                                <?php

                                                    $vista = $conect->prepare("SELECT * FROM servicios");

                                                    $vista->execute();

                                                    $vista->setFetchMode(PDO::FETCH_ASSOC);

                                                    while ($data=$vista->fetch(PDO::FETCH_ORI_NEXT)) { ?>    

                                                   

                                                   

                                                 <option value="<?php echo $data['id_servicio']; ?>"><?php echo $data['nombre_servicio']; ?> </option>

                                               





                                                    <?php 

                                                    

                                                    }

                                                    

                                                    

                                                    ?>





</select>



<input type="hidden" name="color-bg" class="bg-color">

                                            </div>

                                        </div>



                                    </div>

                                </div>







                            <!--

                                <div class="form-group">

                                    <div class="row">





                                        <div class="col-md-12">

                                            <label for="searchSample03">Personnel</label>

                                            <div class="search-form search-form--light">

                                                <select id="id_staff" class="form-control" readonly>

                                                <?php

                                                    $vista = $conect->prepare("SELECT * FROM user");

                                                    $vista->execute();

                                                    $vista->setFetchMode(PDO::FETCH_ASSOC);

                                                    while ($data=$vista->fetch(PDO::FETCH_ORI_NEXT)) { ?>    

                                                   

                                                   

                                                 <option value="<?php echo $data['id_usuario']; ?>"><?php echo $data['username']; ?></option>

                                               





                                                    <?php 

                                                    

                                                    }

                                                    

                                                    

                                                    ?>

                                                </select>

                                                

                                            </div>

                                        </div>



                                    </div>

                                </div>

                            -->    







                                



                        <div class="form-group">

                            <div class="row">

                                <div class="col-md-12">

                                   <label>Date</label> <input autocomplete="off" type="text" id="fecha_reserva" class="form-control required fecha_reserva" placeholder="date de préférence">

                                </div>

                            </div>







                        </div>



                        







                        <div class="form-group">

										<div class="styled-select clearfix">

											<input class="form-control wide time required hora_reserva" name="hora_reserva" placeholder="Heure préférée" readonly>																			

									<table class="horarios" style="margin-top:15px;">

									<tbody>



										<tr>

											<td class="pd-5" ><button type="button" table-data="09:00" class="tabla btn btn-success">09:00</button></td>

                                            <td class="pd-5" ><button type="button" table-data="09:15" class="tabla btn btn-success">09:15</button></td>

											<td class="pd-5" ><button type="button" table-data="09:30" class="tabla btn btn-success">09:30</button></td>

                                            <td class="pd-5" ><button type="button" table-data="09:45" class="tabla btn btn-success">09:45</button></td>

                                        </tr>

                                        <tr>            

											<td class="pd-5" ><button type="button" table-data="10:00" class="tabla btn btn-success">10:00</button></td>

                                            <td class="pd-5" ><button type="button" table-data="10:15" class="tabla btn btn-success">10:15</button></td>



											<td class="pd-5" ><button type="button" table-data="10:30" class="tabla btn btn-success">10:30</button></td>	

                                            <td class="pd-5" ><button type="button" table-data="10:45" class="tabla btn btn-success">10:45</button></td>	

										

                                        </tr>

										

                                        <tr>

											<td class="pd-5" ><button type="button" table-data="11:00" class="tabla btn btn-success">11:00</button></td>

                                            <td class="pd-5" ><button type="button" table-data="11:15" class="tabla btn btn-success">11:15</button></td>

											

                                            <td class="pd-5" ><button type="button" table-data="11:30" class="tabla btn btn-success">11:30</button></td>

                                            <td class="pd-5" ><button type="button" table-data="11:45" class="tabla btn btn-success">11:45</button></td>

                                        </tr>

										<tr>	

                                            <td class="pd-5" ><button type="button" table-data="12:00" class="tabla btn btn-success">12:00</button></td>

                                            <td class="pd-5" ><button type="button" table-data="12:15" class="tabla btn btn-success">12:15</button></td>

											

                                            <td class="pd-5" ><button type="button" table-data="12:30" class="tabla btn btn-success">12:30</button></td>

                                            <td class="pd-5" ><button type="button" table-data="12:45" class="tabla btn btn-success">12:45</button></td>





										</tr>



										<tr>

											<td class="pd-5" ><button type="button" table-data="13:00" class="tabla btn btn-success">13:00</button></td>

                                            <td class="pd-5" ><button type="button" table-data="13:15" class="tabla btn btn-success">13:15</button></td>

											

                                            <td class="pd-5" ><button type="button" table-data="13:30" class="tabla btn btn-success">13:30</button></td>

                                            <td class="pd-5" ><button type="button" table-data="13:45" class="tabla btn btn-success">13:45</button></td>

                                        </tr>	

                                        <tr>

                                            <td class="pd-5" ><button type="button" table-data="14:00" class="tabla btn btn-success">14:00</button></td>

                                            <td class="pd-5" ><button type="button" table-data="14:15" class="tabla btn btn-success">14:15</button></td>

											

                                            <td class="pd-5" ><button type="button" table-data="14:30" class="tabla btn btn-success">14:30</button></td>

                                            <td class="pd-5" ><button type="button" table-data="14:45" class="tabla btn btn-success">14:45</button></td>



										</tr>

										<tr>

											<td class="pd-5" ><button type="button" table-data="15:00" class="tabla btn btn-success">15:00</button></td> 

                                            <td class="pd-5" ><button type="button" table-data="15:15" class="tabla btn btn-success">15:15</button></td> 

											

                                            <td class="pd-5" ><button type="button" table-data="15:30" class="tabla btn btn-success">15:30</button></td> 

											<td class="pd-5" ><button type="button" table-data="15:45" class="tabla btn btn-success">15:45</button></td> 

                                        </tr>

                                        <tr>

                                            <td class="pd-5" ><button type="button" table-data="16:00" class="tabla btn btn-success">16:00</button></td>

                                            <td class="pd-5" ><button type="button" table-data="16:15" class="tabla btn btn-success">16:15</button></td>

											

                                            <td class="pd-5" ><button type="button" table-data="16:30" class="tabla btn btn-success">16:30</button></td>

                                            <td class="pd-5" ><button type="button" table-data="16:45" class="tabla btn btn-success">16:45</button></td>        

                                        </tr>

										<tr>	

											<td class="pd-5" ><button type="button" table-data="17:00" class="tabla btn btn-success">17:00</button></td>

                                            <td class="pd-5" ><button type="button" table-data="17:15" class="tabla btn btn-success">17:15</button></td>





											<td class="pd-5" ><button type="button" table-data="17:30" class="tabla btn btn-success">17:30</button></td>

                                            <td class="pd-5" ><button type="button" table-data="17:45" class="tabla btn btn-success">17:45</button></td>

                                        </tr>

                                        <tr>

											<td class="pd-5" ><button type="button" table-data="18:00" class="tabla btn btn-success">18:00</button></td>

                                            

										</tr>

									</tbody>

									</table>		

											<!--<small class="error-mensaje"></small>-->

										</div>

									</div>



                                <input type="hidden" name="hora" class="hora1">

                                <input type="hidden" name="hora2" class="hora2">

                                <input type="hidden" name="hora3" class="hora3">

                                <input type="hidden" name="hora4" class="hora4">

                                <input type="hidden" name="hora5" class="hora5">

                                <input type="hidden" name="hora6" class="hora6">



                                <div class="form-group" style="display:none;"> 

										<div class="styled-select clearfix">

											<select class="wide time required hora_reserva form-control" id="hora_reserva">

												<option value="">Heure préférée</option>

                                       

												<option value="09:00">09:00</option>

                                                <option value="09:30">09:30</option>



												<option value="10:00">10:00</option>												

                                                <option value="10:30">10:30</option>

                                                

												<option value="11:00">11:00</option>

                                                <option value="11:30">11:30</option>



												<option value="12:00">12:00</option>

                                                <option value="12:30">12:30</option>

												

                                                <option value="13:00">13:00</option>

                                                <option value="13:30">13:30</option>



												<option value="14:00">14:00</option>

                                                <option value="14:30">14:30</option>



												<option value="15:00">15:00</option>

                                                <option value="15:30">15:30</option>



												<option value="16:00">16:00</option>

                                                <option value="16:30">16:30</option>



												<option value="17:00">17:00</option>

                                                <option value="17:30">17:30</option>



												<option value="18:00">18:00</option>

                                          

                                                										



											</select>

											<small class="error-mensaje"></small>

										</div>

									</div>

                                



                                                



                                <!--

                                <div class="form-group">

                                    <div class="row">





                                        <div class="col-md-12">

                                            <label for="searchSample03">Statut</label>

                                            <div class="search-form search-form--light">

                                                <select id="estado_reserva" class="form-control" readonly>

                                                    <option value="attente de confirmation">attente de confirmation</option>

                                                    <option value="Confirmé">Confirmé</option>

                                                    <option value="Confirmé et payé">Confirmé et payé</option>

                                                    <option value="À confirmé par téléphone">À confirmé par téléphone</option>

                                                    

                                                </select>

                                                

                                            </div>

                                        </div>



                                    </div>

                                </div>

                                -->









                            <div class="form-group">

                                <div class="row">

                                    <div class="col-lg">

                                    <div class="button-list d-flex flex-wrap">



                                    <button  type="button" class="btn btn-light create_reservation">

                                    CRÉER <i class="material-icons">edit</i>

                                    </button>



                                    

                                    <button  type="button" class="btn btn-light " data-dismiss="modal">

                                        QUITTER <i class="material-icons">close</i>

                                    </button>



                            </div> 

                                    </div>

                                </div>

                            </div>

























                            </form>

                    </div>

                </div> <!-- // END .modal-body -->

            </div> <!-- // END .modal-content -->

        </div> <!-- // END .modal-dialog -->

    </div> <!-- // END .modal -->

















<!-- FIN AGREGAR RESERVA -->





<!--CREAR USUARIO MODAL-->



<div id="modal-create-user" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-body">

                    <div class="px-3">

                        <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">

                            <a href="#" class="navbar-brand" style="min-width: 0">

                                <img class="navbar-brand-icon" src="assets/images/stack-logo-blue.svg" width="25" alt="Stack">

                                <span>Create client</span>

                            </a>

                        </div>

                        <form action="#">

                                <div class="form-group">

                                    <div class="row">





                                        <div class="col-md-12">

                                            <label for="searchSample03">Prénom</label>

                                            <div class="search-form search-form--light">

                                                <input  type="text" class="form-control" autocomplete="off" id="nombre_nuevo_cliente">



                                                

                                            </div>

                                        </div>



                                    </div>

                                </div>





                                <div class="form-group">

                                    <div class="row">

                                        <div class="col-lg">

                                            <label for="searchSample03">Nom</label>

                                            <div class="search-form search-form--light">

                                                <input type="text" class="form-control" autocomplete="off" id="apellido_nuevo_cliente">

                                                

                                            </div>

                                        </div>





                                    </div>

                                </div>



                                <div class="form-group">

                                    <div class="row">





                                        <div class="col-md-12">

                                            <label for="searchSample03">Téléphone</label>

                                            <div class="search-form search-form--light">

                                                <input type="text" class="form-control" autocomplete="off" id="tel_nuevo_cliente">



                                                

                                            </div>

                                        </div>



                                    </div>

                                </div>











                                <div class="form-group">

                                    <div class="row">

                                        <div class="col-lg">

                                            <label for="searchSample03">Courriel</label>

                                            <div class="search-form search-form--light">

                                                <input type="email" class="form-control" autocomplete="off" id="email_nuevo_cliente">

                                                

                                            </div>

                                        </div>





                                    </div>

                                </div>





















                            <div class="form-group">

                                <div class="row">

                                    <div class="col-lg">

                                    <div class="button-list d-flex flex-wrap">



                                    <button  type="button" class="btn btn-light create_user">

                                    CRÉER <i class="material-icons">edit</i>

                                    </button>



                                    

                                    <button  type="button" class="btn btn-light " data-dismiss="modal">

                                        QUITTER <i class="material-icons">close</i>

                                    </button>



                            </div> 

                                    </div>

                                </div>

                            </div>

























                            </form>

                    </div>

                </div> <!-- // END .modal-body -->

            </div> <!-- // END .modal-content -->

        </div> <!-- // END .modal-dialog -->

    </div> <!-- // END .modal -->









<!--FIN MODAL CREAR USUARIO---->





<!-- MODAL AGREGAR FESTIVOS -->



<div id="holidays-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-body">

                    <div class="px-3">

                        <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">

                            <a href="#" class="navbar-brand" style="min-width: 0">

                                <img class="navbar-brand-icon" src="assets/images/stack-logo-blue.svg" width="25" alt="Stack">

                                <span>Vacances</span>

                            </a>

                        </div>

                        <form action="#">

                                <div class="form-group">

                                    <div class="row">





                                        <div class="col-md-12">

                                            <label for="holiday">Date</label>

                                            <div class="search-form search-form--light">

                                                <input  type="text" class="form-control holiday_input" autocomplete="off" id="holiday">



                                                

                                            </div>

                                        </div>



                                    </div>

                                </div>









 







                                <div class="form-group">

                                    <div class="row">

                                        

                                         <!-- <ul class="list-group">-->

                                              

                                          <?php

                                                        $vista = $conect->prepare("SELECT fecha FROM parametros");

                                                        $vista->execute();

                                                        $vista->setFetchMode(PDO::FETCH_ASSOC);

                                                        while ($data=$vista->fetch(PDO::FETCH_ORI_NEXT)) { ?> 



                                                                <div class="col-xs-4" style="padding:5px;border:0.5px solid rgba(15,15,15,0.2);">

                                                                <span><?php echo $data['fecha'];  ?></span>

                                                                </div>

                                                            <!--<li class="list-group-item"> <?php echo $data['fecha'];  ?>  </li>-->

                                                        <?php } ?>

                                          

                                          <!--</ul>-->

                                        </div>

                                    </div>

                                </div>



















                            <div class="form-group">

                                <div class="row">

                                    <div class="col-lg">

                                    <div class="button-list d-flex flex-wrap">



                                    <button  type="button" class="btn btn-light create_holiday">

                                    CRÉER <i class="material-icons">edit</i>

                                    </button>



                                    

                                    <button  type="button" class="btn btn-light " data-dismiss="modal">

                                        QUITTER <i class="material-icons">close</i>

                                    </button>



                            </div> 

                                    </div>

                                </div>

                            </div>

























                            </form>

                    </div>

                </div> <!-- // END .modal-body -->

            </div> <!-- // END .modal-content -->

        </div> <!-- // END .modal-dialog -->

    </div> <!-- // END .modal -->





















<!-- FIN MODAL AGREGAR FESTIVOS -->















<!-- MODAL QUITAR FESTIVOS -->



<div id="no-holidays-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-body">

                    <div class="px-3">

                        <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">

                            <a href="#" class="navbar-brand" style="min-width: 0">

                                <img class="navbar-brand-icon" src="assets/images/stack-logo-blue.svg" width="25" alt="Stack">

                                <span>NO Vacances</span>

                            </a>

                        </div>

                        <form action="#">

                                <div class="form-group">

                                    <div class="row">





                                        <div class="col-md-12">

                                            <label for="holiday">Date</label>

                                            <div class="search-form search-form--light">

                                                <input  type="text" class="form-control no_holiday_input" autocomplete="off" id="no-holiday">



                                                

                                            </div>

                                        </div>



                                    </div>

                                </div>









 







                                <div class="form-group">

                                    <div class="row">

                                        

                                         <!-- <ul class="list-group">-->

                                              

                                          <?php

                                                        $vista = $conect->prepare("SELECT fecha FROM excepciones");

                                                        $vista->execute();

                                                        $vista->setFetchMode(PDO::FETCH_ASSOC);

                                                        while ($data=$vista->fetch(PDO::FETCH_ORI_NEXT)) { ?> 



                                                                <div class="col-xs-4" style="padding:5px;border:0.5px solid rgba(15,15,15,0.2);">

                                                                <span><?php echo $data['fecha'];  ?></span>

                                                                </div>

                                                            <!--<li class="list-group-item"> <?php echo $data['fecha'];  ?>  </li>-->

                                                        <?php } ?>

                                          

                                          <!--</ul>-->

                                        </div>

                                    </div>

                                </div>



















                            <div class="form-group">

                                <div class="row">

                                    <div class="col-lg">

                                    <div class="button-list d-flex flex-wrap">



                                    <button  type="button" class="btn btn-light create_no_holiday">

                                    CRÉER <i class="material-icons">edit</i>

                                    </button>



                                    

                                    <button  type="button" class="btn btn-light " data-dismiss="modal">

                                        QUITTER <i class="material-icons">close</i>

                                    </button>



                            </div> 

                                    </div>

                                </div>

                            </div>

























                            </form>

                    </div>

                </div> <!-- // END .modal-body -->

            </div> <!-- // END .modal-content -->

        </div> <!-- // END .modal-dialog -->

    </div> <!-- // END .modal -->





















<!-- FIN MODAL QUITAR FESTIVOS -->













































































































<!-- update Modal -->

<div id="modal-update" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-body">

                    <div class="px-3">

                        <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">

                            <a href="#" class="navbar-brand" style="min-width: 0">

                                <img class="navbar-brand-icon" src="assets/images/stack-logo-blue.svg" width="25" alt="Stack">

                                <span>Update</span>

                            </a>

                        </div>

                        <form action="#">

                                <div class="form-group">

                                    <div class="row">

 

                                        <input type="text" class="form-control" id="">





                                        <div class="col-md-12">

                                            <label for="searchSample03">Entreprise</label>

                                            <div class="search-form search-form--light">

                                                <input type="text" class="form-control" placeholder="" id="empresa">

                                                

                                            </div>

                                        </div>



                                    </div>

                                </div>







                                <div class="form-group">

                                    <div class="row">

                                        <div class="col-lg">

                                            <label for="searchSample03">Adresse</label>

                                            <div class="search-form search-form--light">

                                                <input type="text" class="form-control" placeholder="" id="direccion">

                                                

                                            </div>

                                        </div>



                                        <div class="col-lg">

                                            <label for="searchSample03">Courriel</label>

                                            <div class="search-form search-form--light">

                                                <input type="text" class="form-control" placeholder="" id="correo">

                                                

                                            </div>

                                        </div>



                                    </div>

                                </div>







                                <div class="form-group">

                                    <div class="row">

                                        <div class="col-lg">

                                            <label for="searchSample03">Propietaire</label>

                                            <div class="search-form search-form--light">

                                                <input type="text" class="form-control" placeholder="" id="propietario">

                                                

                                            </div>

                                        </div>



                                        <div class="col-lg">

                                            <label for="searchSample03">Website</label>

                                            <div class="search-form search-form--light">

                                                <input type="text" class="form-control" placeholder="" id="website">

                                                

                                            </div>

                                        </div>



                                    </div>

                                </div>







                                <div class="form-group">

                                    <div class="row">

                                        <div class="col-lg">

                                            <label for="searchSample03">Bank</label>

                                            <div class="search-form search-form--light">

                                                <input type="text" class="form-control" placeholder="" id="banco">

                                                

                                            </div>

                                        </div>



                                        <div class="col-lg">

                                            <label for="searchSample03">Date Signature</label>

                                            <div class="search-form search-form--light">

                                            <input id="firma" type="text" class="form-control" >



                                                

                                            </div>

                                        </div>



                                    </div>

                                </div>









                                <div class="form-group">

                                    <div class="row">

                                        <div class="col-lg">

                                            <label for="searchSample03">Start Date</label>

                                            <div class="search-form search-form--light">

                                            <input id="inicio" type="text" class="form-control"  >

                                                

                                            </div>

                                        </div>



                                        <div class="col-lg">

                                            <label for="searchSample03">Finish Date</label>

                                            <div class="search-form search-form--light">

                                            <input id="fin" type="text" class="form-control"  >



                                                

                                            </div>

                                        </div>



                                    </div>

                                </div>                                









                                <div class="form-group">

                                    <div class="row">

                                        <div class="col-lg">

                                            <label for="searchSample03">Pack</label>

                                            <div class="search-form search-form--light">

                                                <input type="text" class="form-control" placeholder="" id="pack">

                                                

                                            </div>

                                        </div>



                                        <div class="col-lg">

                                            <label for="searchSample03">Pass</label>

                                            <div class="search-form search-form--light">

                                                <input type="text" class="form-control" placeholder="" id="pass">

                                                

                                            </div>

                                        </div>



                                    </div>

                                </div>











                                <div class="form-group">

                                    <div class="row">

                                        <div class="col-lg">

                                        <div class="button-list d-flex flex-wrap">

    

                                        <button  type="button" class="btn btn-light actualizar">

                                        UPDATE <i class="material-icons">edit</i>

                                        </button>

    

                                        

                                        <button  type="button" class="btn btn-light " data-dismiss="modal">

                                        CLOSE <i class="material-icons">close</i>

                                        </button>

    

                                </div> 

                                        </div>

                                    </div>

                                </div>





















                            </form>

                    </div>

                </div> <!-- // END .modal-body -->

            </div> <!-- // END .modal-content -->

        </div> <!-- // END .modal-dialog -->

    </div> <!-- // END .modal -->







<!-- edit reserva Modal -->

<div id="modal-edit-reservation" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-body">

                    <div class="px-3">

                        <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">

                            <a  class="navbar-brand" style="min-width: 0">

                                <img class="navbar-brand-icon" src="assets/images/stack-logo-blue.svg" width="25" alt="Stack">

                                <span>ÉDITER</span>

                            </a>

                        </div>

                        <form action="#">



<div class="form-group">

<div class="row">

<input type="hidden" class="id_update">

</div>



</div>



                                <div class="form-group">

                                    <div class="row">

                                        <div class="col-lg">

                                            <label for="nom">Nom</label>

                                            <div class="search-form search-form--light">

                                                <input autocomplete="off" type="text" id="txtbusca2" class="form-control busqueda-ajax nombre-apellido"/>

                                                

                                                

                                                

                                                 <input autocomplete="off" type="hidden" id="nombre-reserva-update" class="form-control busqueda-ajax"/>

                                            </div>

                                        </div>



                                    </div>







                                    <ul class="list-group salida2">

  









<div class="form-group">

<div class="row">



<div class="col-lg">

                                            <label for="date">Date</label>

                                            <div class="search-form search-form--light">

                                                <!--<input autocomplete="off" type="text" id="date-reserva-update" class="form-control required fecha_reserva_update" placeholder="date de préférence">-->

                                                <input autocomplete="off" type="date" id="date-reserva-update" class="form-control required fecha_reserva_update" placeholder="date de préférence">

                                                

                                            </div>

                                        </div>

</div>

</div>



                                    <div class="row">

                                        <div class="col-lg">

                                            <label for="heure">Heure</label>

                                            <div class="search-form search-form--light">

                                                <select class="wide time required hora_reserva form-control" id="hora-reserva-update">

                                                    <option value="">Heure préférée</option>

                                           

                                                    <option value="09:00">09:00</option>

                                                    <option value="09:15">09:15</option>

                                                    <option value="09:30">09:30</option>

                                                    <option value="09:45">09:45</option>

    

                                                    <option value="10:00">10:00</option>

                                                    <option value="10:15">10:15</option>												

                                                    <option value="10:30">10:30</option>

                                                    <option value="10:45">10:45</option>



                                                    <option value="11:00">11:00</option>

                                                    <option value="11:15">11:15</option>

                                                    <option value="11:30">11:30</option>

                                                    <option value="11:45">11:45</option>

    

                                                    <option value="12:00">12:00</option>

                                                    <option value="12:15">12:15</option>

                                                    <option value="12:30">12:30</option>

                                                    <option value="12:45">12:45</option>

                                                    

                                                    <option value="13:00">13:00</option>

                                                    <option value="13:15">13:15</option>

                                                    <option value="13:30">13:30</option>

                                                    <option value="13:45">13:45</option>

    

                                                    <option value="14:00">14:00</option>

                                                    <option value="14:15">14:15</option>

                                                    <option value="14:30">14:30</option>

                                                    <option value="14:45">14:45</option>



    

                                                    <option value="15:00">15:00</option>

                                                    <option value="15:15">15:15</option>

                                                    <option value="15:30">15:30</option>

                                                    <option value="15:45">15:45</option>

    

                                                    <option value="16:00">16:00</option>

                                                    <option value="16:15">16:15</option>

                                                    <option value="16:30">16:30</option>

                                                    <option value="16:45">16:45</option>

    

                                                    <option value="17:00">17:00</option>

                                                    <option value="17:15">17:15</option>

                                                    <option value="17:30">17:30</option>

                                                    <option value="17:45">17:45</option>



                                                    <option value="18:00">18:00</option>

                                              

                                                                                            

    

                                                </select>

                                                

                                            </div>

                                        </div>



                                        <div class="col-lg">

                                            <label for="service">Service</label>

                                            <div class="search-form search-form--light">

                                                <select id="service-reserva-update" class="form-control" readonly>



                                                    <option disabled selected>Choisissez-en un </option>

                                                    

    

                                                    <?php

                                                        $vista = $conect->prepare("SELECT * FROM servicios");

                                                        $vista->execute();

                                                        $vista->setFetchMode(PDO::FETCH_ASSOC);

                                                        while ($data=$vista->fetch(PDO::FETCH_ORI_NEXT)) { ?>    

                                                       

                                                       

                                                     <option value="<?php echo $data['id_servicio']; ?>"><?php echo $data['nombre_servicio']; ?> </option>

                                                   

    

    

                                                        <?php 

                                                        

                                                        }

                                                        

                                                        

                                                        ?>

    

    

    

                                                </select>                                                

                                            </div>

                                        </div>



                                    </div>

                                </div>







                            <div class="form-group">

                                <div class="row">

                                    <div class="col-lg">

                                    <div class="button-list d-flex flex-wrap">



                                    <button  type="button" class="btn btn-light edit_reserva_btn">

                                    CREATE <i class="material-icons">edit</i>

                                    </button>



                                    

                                    <button  type="button" class="btn btn-light " data-dismiss="modal">

                                    CLOSE <i class="material-icons">close</i>

                                    </button>



                            </div> 

                                    </div>

                                </div>

                            </div>

























                            </form>

                    </div>

                </div> <!-- // END .modal-body -->

            </div> <!-- // END .modal-content -->

        </div> <!-- // END .modal-dialog -->

    </div> <!-- // END .modal -->







<!-- Modal Cambios-->    





<div id="modal-changes" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-body">

                    <div class="px-3">

                        <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">

                            <a href="#" class="navbar-brand" style="min-width: 0">

                                <img class="navbar-brand-icon" src="assets/images/stack-logo-blue.svg" width="25" alt="Stack">

                                <span>History Changes</span>

                            </a>

                        </div>

                        <form action="#">

                                <div class="form-group">

                                <div class="row">

                                    <div class="col-md-6">

                                    <label for="">Fecha cambio</label>

                                    <input type="text" class="form-control" data-toggle="flatpickr" id="fecha_cambio" ></textarea>

                                        </div>



                                        <div class="col-md-6">

                                            <label for="">Cliente</label>

                                            <select  class="form-control" id="id_cliente_cambio" >





                                                <?php

                                                $vista = $conect->prepare("SELECT * FROM clientes");

                                                $vista->execute();

                                                $vista->setFetchMode(PDO::FETCH_ASSOC);

                                                while ($data=$vista->fetch(PDO::FETCH_ORI_NEXT)) { ?>





                                                <option value="<?php echo $data['id_cliente']; ?>"><?php echo $data['empresa']; ?></option>





                                            <?php } ?>



                                            </select>

                                                    </div>

                                </div> <div class="row">

                                <div class="col-lg">

                                <label for="">Description</label>

                                <textarea class="form-control"  id="descripcion_cambio" ></textarea>

                                </div></div>



                                </div>



                                <div class="form-group">

                                    <div class="row">

                                        <div class="col-lg">

                                        <div class="button-list d-flex flex-wrap">

            

                                        <button  type="button" class="btn btn-light add_change">

                                        ADD CHANGE <i class="material-icons">edit</i>

                                        </button>

            

                                        

                                        <button  type="button" class="btn btn-light " data-dismiss="modal">

                                        CLOSE <i class="material-icons">close</i>

                                        </button>







                                        <button  type="button" class="btn btn-light  refresh_changes" data-dismiss="modal">

                                        REFRESH <i class="material-icons">close</i>

                                        </button>

            

                                </div> 

                                        </div>

                                    </div>

                                </div>



                            </form>



                   <ul>



                  





<div class="col-lg">







<div id="test-cambios" > 

    <h1>CAMBIOS</h1> 



    <div id="cambios">

    <ul class="lista_cambios">

    

    </ul>

    

    </div>

    

</div>



<!--

    <div class="z-0">

        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">



            <?php



/*





            $id_cliente = $_GET['id_cliente'];

                                                    

            $vista = $conect->prepare("SELECT * FROM cambios WHERE id_cliente=:id_cliente ");

            $vista->bindParam(':id_cliente',$id_cliente);

            $vista->execute();

            $vista->setFetchMode(PDO::FETCH_ASSOC);

            while ($data=$vista->fetch(PDO::FETCH_ORI_NEXT)) {  */ ?>



            <li class="nav-item">

                <a href="<?php //echo['id_cambio']; ?>" class="nav-link" data-toggle="tab" role="tab" aria-controls="tab-<?php //echo['id_cambio']; ?>" aria-selected="true">

                    <span class="nav-link__count"><?php //echo $data['fecha_cambio']; ?></span>

                    <?php //echo $data['id_cliente']; ?>

                </a>

            </li>



            <?php /*}*/ ?>

        </ul>





        <?php



         /*                                           

        $vista = $conect->prepare("SELECT * FROM cambios WHERE id_cliente=:id_cliente");

        $vista->bindParam(':id_cliente',$id_cliente);

        $vista->execute();

        $vista->setFetchMode(PDO::FETCH_ASSOC);

        while ($data=$vista->fetch(PDO::FETCH_ORI_NEXT)) { */?>

                                                

        <div id="lista-cambios" class="card">

            <div class="card-body tab-content">

                <div class="tab-pane active show fade" id="tab-<?php //echo['id_cambio']; ?>">

                   <?php //echo $data['descripcion_cambio']; ?>

                </div>

            </div>

        </div>





        <?php /*} */ ?>

    </div>

-->

                    </div>





                                                





                    </div>

                </div> <!-- // END .modal-body -->

            </div> <!-- // END .modal-content -->

        </div> <!-- // END .modal-dialog -->

    </div> <!-- // END .modal -->

    

















































