<!-- Modal Éditer Réservation (Client) -->
<div id="modal-edit-reservation-cliente" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="px-3">
          <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">
            <a class="navbar-brand" style="min-width: 0">
              <span>ÉDITER</span>
            </a>
          </div>

          <form action="#">
            <!-- Date -->
            <div class="form-group">
              <label for="date">Date</label>
              <input 
                type="text"
                name="dates"
                class="form-control required fecha_reserva_cliente fecha_reserva"
                placeholder="date de préférence"
                autocomplete="off"
                readonly
              >
              <i class="icon-hotel-calendar_3"></i>
            </div>

            <!-- Heure -->
            <div class="form-group">
              <label for="heure">Heure</label>
              <input 
                type="text"
                name="hora_reserva"
                class="form-control wide time required hora_reserva"
                placeholder="Heure préférée"
                autocomplete="off"
                readonly
              >
              <div class="horarios-response mt-3"></div>

              <?php for ($i = 1; $i <= 6; $i++): ?>
                <input type="hidden" name="hora<?= $i ?>" class="hora<?= $i ?>">
              <?php endfor; ?>
            </div>

            <!-- Service -->
            <div class="form-group">
              <label for="service">Service</label>
              <select id="service-reserva-update" class="form-control" readonly>
                <option disabled selected>Choisissez-en un</option>
                <?php
                  $vista = $conect->prepare("SELECT * FROM servicios");
                  $vista->execute();
                  $vista->setFetchMode(PDO::FETCH_ASSOC);
                  while ($data = $vista->fetch(PDO::FETCH_ORI_NEXT)) {
                    echo "<option value='{$data['id_servicio']}'>{$data['nombre_servicio']}</option>";
                  }
                ?>
              </select>
            </div>

            <!-- Botones -->
            <div class="form-group">
              <div class="button-list d-flex flex-wrap">
                <button type="button" class="btn btn-light edit_reserva_btn_cliente">MODIFIER</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">FERMER</button>
              </div>
            </div>
          </form>

        </div> <!-- px-3 -->
      </div> <!-- modal-body -->
    </div> <!-- modal-content -->
  </div> <!-- modal-dialog -->
</div> <!-- modal -->
