<section>
    <div class="app-color-white animated fadeIn">
        <div class="panel-body">
			<?php if(!empty($listRoom) && $listRoom[0]['ID_ROOM'] > 0){ ?>
            <div class="table-responsive">
                <br>
                <div class="form-group pull-right">
                    <input type="text" class="search form-control" placeholder="Buscar">
                </div>
                <span class="counter pull-right"></span>

                <table class="table table-striped results">
                    <thead class="bg-primary">
                    <tr>
                        <th>Nro</th>
                        <th class="hidden-md hidden-sm">Imagen</th>
                        <th>Nombre</th>
                        <th>Habitación</th>
                        <th class="">Estado</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $i = 1;
					foreach($listRoom as $room){
					?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td class="hidden-md hidden-sm">
                            <img src="<?= !empty($room['IMAGE_ROOM']) ? $room['IMAGE_ROOM'] : $room['IMAGE_ROOM_MODEL'] ?>"
                                 alt="sin imagen"
                                 class="app-img-10">
                        </td>
                        <td><?= $room['NAME_ROOM'] ?></td>
                        <td>
                            <b><?= $room['NAME_ROOM_MODEL'] ?></b><br>
                            <small>(Adultos: <?= $room['UNIT_ADULT_ROOM_MODEL'] ?>)<br></small>
                            <small>(Niños: <?= $room['UNIT_BOY_ROOM_MODEL'] ?>)<br></small>
                        </td>
                        <td class="">
                            <span class="label label-<?= $room['STATE_ROOM'] > 0 ? ($room['DATE_CHECK_OUT_ROOM'].' '.$room['TIME_CHECK_OUT_ROOM'] < date('Y-m-d H:i:s') ? 'success' : 'warning') : 'danger' ?>">
                                <?= $room['STATE_ROOM'] > 0 ? ($room['DATE_CHECK_OUT_ROOM'].' '.$room['TIME_CHECK_OUT_ROOM'] < date('Y-m-d H:i:s') ? 'Disponible' : 'Ocupado') : 'No disponible';?>
                            </span>
                        </td>
                        <td>
                            <a href="room/edit/<?= $room['ID_ROOM'] ?>"
                               class="btn btn-primary btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="room/delete_dd/<?= $room['ID_ROOM'] ?>"
                               onclick="return validLink('room/delete_dd/<?= $room['ID_ROOM'] ?>','Eliminar','Desea eliminar la habitacion <?= $room['NAME_ROOM'] ?>','error')"
                               class="btn btn-danger btn-xs">
                                <i class="fa fa-remove"></i>
                            </a>
                        </td>
                    </tr>
					<?php } ?>
                    </tbody>
                </table>
            </div>
			<?php }
			else{ ?>
            <div class="thumbnail">
                <h4 class="text-center">Habitaciones no registradas</h4>
                <img src="img/404/caja-vacia.jpg"
                     class="app-img-5 center-block"
                     alt="No existen datos disponibles">
            </div>
			<?php } ?>
            <a href="room/insert/"
               class="btn btn-primary btn-sm btn-block">
                A&ntilde;adir <span class="fa fa-plus"></span>
            </a>
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {
        $(".search").keyup(function () {
            var searchTerm = $(".search").val();
            var listItem = $('.results tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

            $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });

            $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','false');
            });

            $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','true');
            });

            var jobCount = $('.results tbody tr[visible="true"]').length;
            $('.counter').text(jobCount + ' registros');

            if(jobCount == '0') {$('.no-result').show();}
            else {$('.no-result').hide();}
        });
    });
</script>