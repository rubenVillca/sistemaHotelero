<!-- Section Datos del titulo-->
<section>
    <form action="reserve/updateReserveCheckIn/<?= $reserve['ID_CHECK']; ?>"
          method="post"
          id="form-reserve-edit-check-in"
          class="form-horizontal"
          enctype="multipart/form-data">
        <div class="app-color-white">
            <!-- datos de reserva -->
            <div class="">
                <div class="container-fluid">
                    <h3 class="text-primary">
                        <span class="fa fa-edit"></span> Editar reserva: <?= !empty($reserve['ID_CHECK']) ? $reserve['ID_CHECK'] : $reserve = array(); ?>
                    </h3>
                </div>
                <hr>
                <?php require_once "views/fragment/reserve/reserveDataEdit.blade.php";?>
                <?php require_once "views/fragment/reserve/reserveDataEditCard.blade.php";?>
            </div>
            <!-- datos del titular -->
            <div class="container-fluid">
                <div class="text-primary">
                    <h4 class=""><span class="fa fa-user"></span> Datos del titular:</h4>
                </div>
                <hr>
                <?php require_once "views/fragment/reserve/reserveIncumbentEdit.blade.php";?>
            </div><!-- formulario para pagar -->
            <br>
            <div class="panel panel-primary">
            <?php require_once "views/fragment/reserve/reservePay.blade.php";?>
            <!-- opciones, botones -->
            <div class="pull-right">
                <button type="submit"
                        id="edit"
                        name="edit"
                        onclick="return validForm('form-reserve-edit-check-in','Actualizar','Desea guardar los cambios efectuados','success')"
                        class="btn btn-primary">
                    <span class="fa fa-save"></span> Guardar cambios
                </button>
            </div>
            <br><br>
        </div>
        </div>
    </form>
</section>
