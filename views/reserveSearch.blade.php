<?php require_once "views/fragment/search/searchServiceReserve.blade.php"; ?>
<!-- lista de habitaciones disponibles -->
<section>
    <div class="animate bounceInUp app-color-white">
		<?php if (!empty($listReservable)) { ?>
        <form action='reserve/insert/<?= !empty($idCheck) ? $idCheck : 0 ?>/' method='post'>
            <div class="hidden">
                <input type="date"
                       name="dateIn"
                       value="<?= $dateIn ?>"
                       title="fecha inicio">
                <input type="time"
                       name="timeIn"
                       value="<?= $timeIn ?>"
                       title="hora inicio">
                <input type="date"
                       name="dateOut"
                       value="<?= $dateOut ?>"
                       title="fecha fin">
                <input type="time"
                       name="timeOut"
                       value="<?= $timeOut ?>"
                       title="hora Fin">
            </div>
            <ul class="list-group app-color-font">
                <li class="list-group-item app-color-blue">
                    <h3 class="panel-title">Ambientes disponibles</h3>
                </li>
				<?php $i = 0; ?>
				<?php foreach (is_array($listReservable) ? $listReservable : array() as $service): ?>
				<?php if (count($service['list_room']) - $service['n_reserved'] > 0){?>
                <li class="list-group-item">
                    <div class="row">
                        <div class="hidden">
                            <!-- id tipo de habitacion -->
                            <input type="text"
                                   name="listRoom[<?= $i ?>][idTypeRoom]"
                                   title="id del tipo de habitacion "
                                   value="<?= $service['ID_ROOM_MODEL'] ?>">
                            <!-- cantidad maxima de persona para cada habitacion -->
                            <input type="text"
                                   name="listRoom[<?= $i ?>][unitPerson]"
                                   value="<?= $service['UNIT_ADULT_ROOM_MODEL'] ?>"
                                   title="cantidad de personas">
                            <input type="text"
                                   name="listRoom[<?= $i ?>][unitBoy]"
                                   value="<?= $service['UNIT_BOY_ROOM_MODEL'] ?>"
                                   title="cantidad de personas">
                        </div>
                        <!-- Descripcion servicio y el tipo de habitacion -->
                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                            <!-- titulo nombre del servicio -->
                            <b class="text-success"><?= $service['NAME_SERVICE'] ?></b>
                            <hr>
                            <!-- descripcion habitacion -->
                            <div class="row">
                                <!-- imagen del tipo de habitacion -->
                                <div class='hidden-xs hidden-sm col-md-4 col-lg-4'>
                                    <img src='<?= $service['IMAGE_ROOM_MODEL'] ?>'
                                         alt='No se cargo la imagen correctamente'
                                         class='thumbnail app-img-4'>
                                </div>
                                <!-- datos del tipo de habitacion -->
                                <div class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
                                    <h5><b>Tipo de habitacion:</b> <?= $service['NAME_ROOM_MODEL']; ?></h5>
                                    <h5>
                                        <b>Permitir reservas:</b> <?= $service['RESERVED_SERVICE'] ? 'Si' : 'No' ?>
                                    </h5>
                                    <h5><b>Adultos:</b> <?= $service['UNIT_ADULT_ROOM_MODEL'] ?></h5>
                                    <h5><b>Ni&ntilde;os: </b> <?= $service['UNIT_BOY_ROOM_MODEL'] ?></h5>
                                </div>
                            </div>
                        </div>
                        <!-- lista de habitacion disponible -->
                        <div class='col-xm-12 col-sm-6 col-md-4 col-lg-4'>
                            <!-- nro de habitaciones -->
                            <div class="form-group">
                                <label for="nRoom_<?= $i ?>">Habitaciones:</label>
                                <select id="nRoom_<?= $i ?>"
                                        name="listRoom[<?= $i ?>][nRoom]"
                                        class="form-control"
                                        title="Numero de habitaciones"
                                        onchange="updateCost(<?= $i ?>)">
                                    <option value="">0</option>
									<?php for ($k = 1;$k <= count($service['list_room']) - $service['n_reserved'];$k++) { ?>
                                    <option value="<?= $k ?>"><?= $k ?></option>
									<?php } ?>
                                </select>
                            </div>
                            <!-- lista de costos -->
                            <div class="form-group">
                                <?php if (count($service['list_cost'])<=1){?>
                                    <p title="Costo" class="text-primary">
		                                <?php foreach ($service['list_cost'] as $cost) { ?>
			                                <?= $cost['PRICE_COST_SERVICE'] . ' ' . $cost['NAME_TYPE_MONEY'] . ' - ' . $cost['UNIT_DAY_COST_SERVICE'] . ' Dias, ' . $cost['UNIT_HOUR_COST_SERVICE'] . ' Horas' ?>
		                                <?php } ?>
                                    </p>
                                    <select id="idCost_<?= $i ?>"
                                            name=listRoom[<?= $i ?>][idCost]"
                                            title="Costo"
                                            hidden
                                            onchange="updateCost('<?= $i ?>')">
		                                <?php foreach ($service['list_cost'] as $cost) { ?>
                                        <option value="<?= $cost['ID_COST_SERVICE'] ?>">
			                                <?= $cost['PRICE_COST_SERVICE'] . ' ' . $cost['NAME_TYPE_MONEY'] . ' - ' . $cost['UNIT_DAY_COST_SERVICE'] . ' Dias, ' . $cost['UNIT_HOUR_COST_SERVICE'] . ' Horas' ?>
                                        </option>
		                                <?php } ?>
                                    </select>
                                <?php }else{?>
                                    <select id="idCost_<?= $i ?>"
                                            name=listRoom[<?= $i ?>][idCost]"
                                            title="Costo"
                                            class="form-control"
                                            onchange="updateCost('<?= $i ?>')">
		                                <?php foreach ($service['list_cost'] as $cost) { ?>
                                        <option value="<?= $cost['ID_COST_SERVICE'] ?>">
			                                <?= $cost['PRICE_COST_SERVICE'] . ' ' . $cost['NAME_TYPE_MONEY'] . ' - ' . $cost['UNIT_DAY_COST_SERVICE'] . ' Dias, ' . $cost['UNIT_HOUR_COST_SERVICE'] . ' Horas' ?>
                                        </option>
		                                <?php } ?>
                                    </select>
                                <?php }?>
                            </div>
                            <!-- costo total de la habitacion -->
                            <div class="form-group">
                                <b>Costo de Habitación: </b>
                                <span id="cost_name_type_money_<?= $i ?>"></span>
                                <span id="cost-<?= $i ?>">0</span>
                            </div>
                        </div>
                    </div>
                </li>
			<?php $i++; ?>
			<?php } ?>
			<?php endforeach; ?>
            <!-- Botones -->
                <li class="list-group-item">
                    <div class="row">
	                    <?php if ($_SESSION['TYPE_USER']==Constants::$TYPE_USER_FREE){?>
                        <button id="btn-insert"
                                type="button"
                                class="btn btn-primary pull-right"
                                data-toggle="modal"
                                data-target="#modalRegisterUser"
                                name="search"
                                disabled="disabled">
                            <span class="fa fa-search"></span> Continuar
                        </button>
                        <!-- Modal registrar usuario-->
                        <div id="modalRegisterUser" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Registrar usuario</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-horizontal">
                                            <!--Nombre-->
                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="name">
                                                    Nombre:
                                                </label>
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="name"
                                                           name="name"
                                                           placeholder="ej: juan"
                                                           pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}"
                                                           title="solo se permiten letras"
                                                           maxlength="25"
                                                           required>
                                                </div>
                                                <div id="mensaje4" class="col-xs-3 col-sm-3 col-md-2 col-lg-2 error">
                                                    Ingrese solo caracteres alfabeticos
                                                </div>
                                            </div>
                                            <!--Apellido-->
                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="app">
                                                    Apellidos:
                                                </label>
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="app"
                                                           name="app"
                                                           placeholder="ej: perez ramirez"
                                                           pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}"
                                                           title="ej: perez"
                                                           maxlength="25"
                                                           required>
                                                </div>
                                                <div id="mensaje5" class="col-xs-3 col-sm-3 col-md-2 col-lg-2 error">
                                                    Ingrese letras solamente
                                                </div>
                                            </div>
                                            <!--SEXO-->
                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4">Sexo:</label>
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" title="Seleccione una opcion">
                                                    <label class="radio-inline">
                                                        <input type="radio"
                                                               id="hombre"
                                                               value="1"
                                                               name="sex"
                                                               title="Seleccione una opcion"
                                                               required> Hombre
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="mujer" value="0" name="sex"> Mujer
                                                    </label>
                                                </div>
                                                <div id="mensaje8" class="col-xs-3 col-sm-3 col-md-2 col-lg-2 error">
                                                    Seleccione una opcion
                                                </div>
                                            </div>
                                            <!--Tipo de telefono-->
                                            <div class="form-group hidden">
                                                <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="typePhone">
                                                    Tipo de Tel&eacute;fono:
                                                </label>
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <select id="typePhone" class="form-control" name="phoneUser[0][idType]">
                                                        <option value="">Seleccione un tipo de Telef&oacute;no</option>
                                                        <?php if(!empty($listTypePhone)) {
                                                        foreach($listTypePhone as $type) { ?>
                                                        <option value="<?= $type['ID_TYPE_PHONE']; ?>"><?= $type['NAME_TYPE_PHONE'] ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--numero Telefono-->
                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="phoneUser">
                                                    Tel&eacute;fono:
                                                </label>
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <input type="tel"
                                                           class="form-control"
                                                           id="phoneUser"
                                                           name="phoneUser[0][nPhone]"
                                                           placeholder="ej: 7654321"
                                                           pattern="[0-9]{6,12}"
                                                           title="debe ingresar de 6 a 12 n&uacute;meros"
                                                           maxlength="12"
                                                           required>
                                                </div>
                                                <div id="mensaje9" class="col-xs-3 col-sm-3 col-md-2 col-lg-2 error">
                                                    Ingrese n&uacute;meros solamente
                                                </div>
                                            </div>
                                            <!--Correo Electronico-->
                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="email">
                                                    Correo electr&oacute;nico:
                                                </label>
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <input type="email"
                                                           class="form-control"
                                                           id="email"
                                                           name="email"
                                                           maxlength="30"
                                                           placeholder="ej: email@gmail.com"
                                                           pattern="^([a-zA-Z0-9_-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([a-zA-Z0-9-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$"
                                                           required>
                                                </div>
                                                <div id="mensaje7" class="col-xs-12 col-sm-14 col-md-12 col-lg-3 error">
                                                    Correo Electr&oacute;nico
                                                </div>
                                            </div>
                                            <!--Password-->
                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="passw">
                                                    Contrase&ntilde;a:
                                                </label>
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <input type="password" class="form-control" name="pass" id="passw" placeholder="******" maxlength="30"
                                                           required>
                                                </div>
                                                <div id="mensaje2" class="col-xs-3 col-sm-3 col-md-2 col-lg-2 error">
                                                    Caracteres no permitidos
                                                </div>
                                            </div>
                                            <!--Password repeat-->
                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="pass-repeat">
                                                    Repetir contrase&ntilde;a:
                                                </label>
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <input type="password"
                                                           class="form-control"
                                                           id="pass-repeat"
                                                           name="pass-repeat"
                                                           placeholder="*****"
                                                           title="las contrase&ntilde;as no coincide"
                                                           maxlength="30"
                                                           required>
                                                </div>
                                                <div id="mensaje3" class="col-xs-3 col-sm-3 col-md-2 col-lg-2 error">
                                                    Password no valido
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <!--Boton Enviar-->
                                            <button type="submit" class="btn btn-primary" name='register'>Registrar <span class="fa fa-edit"></span></button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
	                    <?php }else{?>
                        <button id="btn-insert"
                                type='submit'
                                name='saveReserve'
                                class='btn btn-primary pull-right'
                                disabled="disabled">
                            Continuar <span class='fa fa-arrow-right'></span>
                        </button>
                            <?php }?>
                        <br>
                    </div>
                </li>
            </ul>
        </form>
		<?php } else { ?>
        <div class="alert" role="alert">
            <img src="img/404/caja-vacia.jpg"
                 class="app-img-5 center-block"
                 alt="No existen datos disponibles">
            <h4 class="text-center">No se encontraron habitaciones disponible para la fecha seleccionada,seleccione otra
                fecha</h4>
        </div>
		<?php } ?>
    </div>
</section>

<!-- scripts -->
<script>
    var listService =<?=isset($listReservable) ? json_encode($listReservable) : new ArrayObject()?>;

    function updateCost(i) {
        nRoom = document.getElementById('nRoom_' + i).value;
        if (nRoom == '')
            nRoom = 0;
        idCost = document.getElementById('idCost_' + i).value;
        //console.log("i: "+i+'\nnRoom: '+nRoom+'\nidCost: '+idCost);
        //console.log(listService[i]['list_cost']);
        price = listService[i]['list_cost'][parseInt(idCost)]['PRICE_COST_SERVICE'];
        //console.log(listService);
        typeMoney = listService[i]['list_cost'][idCost]['NAME_TYPE_MONEY'];
        document.getElementById('cost_name_type_money_' + i).textContent = typeMoney;
        document.getElementById('cost-' + i).textContent = (parseInt(nRoom) * parseFloat(price) * 100) / 100;
        if (nRoom > 0) {
            document.getElementById('btn-insert').disabled = false;
        }
    }
</script>
