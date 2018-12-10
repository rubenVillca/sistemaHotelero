<div class="panel-body">
    <!-- fecha y hora de inicio -->
    <div class="clearfix">
        <!-- Fecha de inicio de la reserva -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <label for="dateIniReserve"
                   class="control-label">Fecha de inicio de la reserva</label>
            <input type="date"
                   id="dateIniReserve"
                   name="dateIniReserve"
                   value="<?= $reserve['DATE_START_CHECK']; ?>"
                   class="form-control datepicker"
                   disabled
                   placeholder="Fecha reservada"
                   required>
        </div>
        <!-- Hora de inicio de la reserva -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <label for="timeIniReserve"
                   class="control-label">Hora de inicio de la reserva</label>
            <input type="time"
                   id="timeIniReserve"
                   name="timeIniReserve"
                   value="<?= $reserve['TIME_START_CHECK']; ?>"
                   class="form-control"
                   disabled
                   placeholder="Hora reservada"
                   required>
        </div>
    </div>
    <!-- fecha y hora d finalizacion -->
    <div class="clearfix">
        <!-- Fecha final de l reserva -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <label for="dateFinReserve"
                   class="control-label">Fecha final de la reserva</label>
            <input type="date"
                   id="dateFinReserve"
                   name="dateFinReserve"
                   value="<?= $reserve['DATE_END_CHECK']; ?>"
                   class="form-control datepicker"
                   disabled
                   placeholder="Fecha de finalizaci&oacute;n de la reserva"
                   required>
        </div>
        <!-- Hora Final d la reserva -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <label for="timeFinReserve"
                   class="control-label">Hora Final d la reserva</label>
            <input type="time"
                   id="timeFinReserve"
                   name="timeFinReserve"
                   value="<?= $reserve['TIME_END_CHECK']; ?>"
                   class="form-control"
                   disabled
                   placeholder="Hora de finalizaci&oacute;n de la reserva"
                   required>
        </div>
    </div>
    <!-- estado de la reserva y observaciones -->
    <div class="clearfix">
        <!-- Observaciones -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label for="observation"
                   class="control-label">Observaciones</label>
            <textarea id="observation"
                      name="observation"
                      class="form-control"
                      placeholder="Observaciones"><?= $reserve['OBSERVATIONS_CHECK']; ?></textarea>
        </div>
    </div>
</div>
