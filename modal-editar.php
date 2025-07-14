<!-- edit reserva Modal lado cliente-->
<div id="modal-edit-reservation-cliente" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body">
            <div class="px-3">
               <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">
                  <a  class="navbar-brand" style="min-width: 0">
                  <span>ÉDITER</span>
                  </a>
               </div>
               <form action="#">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-lg">
                           <label for="date">Date</label>
                           <div class="form-group">
										<input value="" autocomplete="off" type="text" name="dates" class="form-control required fecha_reserva_cliente fecha_reserva" placeholder="date de préférence" readonly>
										<i class="icon-hotel-calendar_3"></i>
							</div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="row">
                        <div class="col-lg">
                        <label for="date">Heure</label>
                        <div class="form-group">
                            <div class="styled-select clearfix">
                                <input class="form-control wide time required hora_reserva" name="hora_reserva" placeholder="Heure préférée" readonly value="">																			
                                <table class="horarios" style="margin-top:15px;">
                                    <tbody>
                                        <div style="margin-top:30px;" class="horarios-response">
                                        </div>
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
                    </div>
                     </div> 
                     </div>  

                  <div class="row">
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
                <button  type="button" class="btn btn-light edit_reserva_btn_cliente">
                CREATE 
                </button>
                <button  type="button" class="btn btn-light " data-dismiss="modal">
                CLOSE
                </button>
                </div> 
                </div>
                </div>
                </div>
            </form>
         </div>
      </div>
      <!-- // END .modal-body -->
   </div>
   <!-- // END .modal-content -->
</div>
<!-- // END .modal-dialog -->
</div> <!-- // END .modal -->