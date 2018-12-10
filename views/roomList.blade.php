<section>
    <div class="app-color-white animated fadeIn">
        <div class="panel-body">
			<?php
			if(!empty($listRoom) && $listRoom[0]['ID_ROOM'] > 0){
			$i = 1;
			$type = '';
			foreach ($listRoom as $room){?>
			<?php if($room['NAME_ROOM_MODEL'] != $type){ ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <hr>
                <h3 class="text-success"><?= $type = $room['NAME_ROOM_MODEL']; ?></h3>
            </div>
			<?php } ?>
			<?php $type = $room['NAME_ROOM_MODEL']; ?>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                <div>
                    <img src="<?= !empty($room['IMAGE_ROOM']) ? $room['IMAGE_ROOM'] : $room['IMAGE_ROOM_MODEL'] ?>"
                         alt="sin imagen" class="" width="100%">
                    <h5>
                        <?php if (strtotime($room['DATE_CHECK_IN_ROOM']).' '.strtotime($room['TIME_CHECK_IN_ROOM']) <= strtotime(date('Y-m-d H:i:s')) &&
		                    strtotime($room['DATE_CHECK_OUT_ROOM']).' '.strtotime($room['TIME_CHECK_OUT_ROOM']) >= strtotime(date('Y-m-d H:i:s'))){?>
		                    <span class="label label-danger"><?= $room['NAME_ROOM']; ?> (Ocupado)</span>
                        <?php }else{?>
                            <span class="label label-primary text-success"><?= $room['NAME_ROOM']; ?> (Libre)</span>
                        <?php }?>

                    </h5>
                </div>
            </div>
			<?php }?>
			<?php }
			else{ ?>
            <div class="thumbnail">
                <h4 class="text-center">Habitaciones no registradas</h4>
                <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
            </div>
			<?php } ?>
        </div>
    </div>
</section>