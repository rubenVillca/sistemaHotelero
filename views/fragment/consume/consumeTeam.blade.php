<div class="panel-heading">
    <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><b>Datos del los H&uacute;espedes</b></a>
    </h4>
</div>
<div id="collapse4" class="panel-collapse collapse in">
    <div class="panel-body">
        <div class="row">
            <input type="text"
                   name="idPersonTitular"
                   id="idPersonTitular"
                   class="hidden"
                   value="<?=$checkPerson['ID_PERSON_TITULAR']?>"
                   title="Titular">
            <?php $personRoom= empty($roomOccupied)?$totalRoomFree:($roomOccupied[0]['UNIT_ADULT_ROOM_MODEL'] + $roomOccupied[0]['UNIT_BOY_ROOM_MODEL'])?>
			<?php for ($i = 0;$i <$personRoom ;$i++) { ?>
            <hr>
            <!-- toogle - titular ocupara la habitacion -->
            <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group">
                        <label class="checkbox-inline">
                            <input data-toggle="toggle"
                                   id="toggleOccupied-<?=$i?>"
                                   type="checkbox"
                                   data-on="SI"
                                   data-off="NO"
                                   <?=(!empty($listTeam)&&count($listTeam)>$i&&($checkPerson['ID_PERSON_TITULAR']==$listTeam[$i]['ID_PERSON']))?'checked':''?>
                                   name="team[<?= $i ?>][isOccupiedXTitular]"
                                   onchange="showListMember(<?=$i?>)">
                            Habitacion <?= empty($roomOccupied[$i]['NAME_ROOM']) ? '' :
								'<b>' . $roomOccupied[$i]['NAME_ROOM'] . '</b>'?>
                            sera ocupada por el titular: <b><?=$checkPerson['NAME_PERSON'].' '.$checkPerson['LAST_NAME_PERSON']?> </b>
                        </label>
                    </div>
                </div>
            </div>
            <!-- buscador -->
            <div class="form-group" id="divSearchUser-<?=$i;?>">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label class="label label-primary col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">
                        Hu&eacute;sped <?= $i + 1 ?>:
                    </label>
                    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                        <div class="input-group">
                            <input list="list-user-<?=$i?>"
                                   type="text"
                                   id="searchUser-<?= $i ?>"
                                   name="searchUser"
                                   class="form-control"
                                   autocomplete="off"
                                   placeholder="Buscar usuario">
                            <datalist id="list-user-<?=$i?>">
		                        <?php if(!empty($listPerson)){
		                        foreach($listPerson as $user){ ?>
                                <option value="<?= $user['NAME_USER'] ?>"><?= $user['NAME_USER'] ?></option>
		                        <?php }
		                        } ?>
                            </datalist>
                            <span class="input-group-btn">
							<button class="btn btn-sm btn-primary" type="button" onclick="updateMember('<?= $i ?>')">
                                <span class="fa fa-search"></span>
                            </button>
						</span>
                        </div>
                    </div>
                </div>
                <!-- id -->
                <input type="text"
                       id="idPersonMember-<?= $i ?>"
                       name="team[<?= $i ?>][idPerson]"
                       value="<?= empty($listTeam[$i]) ? 0 : $listTeam[$i]['ID_PERSON'] ?>"
                       class="form-control hidden"
                       title="id de huesped">
            </div>
            <div id="listMember-<?=$i?>">
                <!-- nombre y apellido -->
                <div class="form-group">
                    <!-- Nombre -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="nameMember-<?= $i?>" class="col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">Nombre(s):
                        </label>
                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                            <input type="text"
                                   id="nameMember-<?= $i?>"
                                   name="team[<?= $i ?>][name]"
                                   placeholder="Nombre"
                                   title="Nombre de huésped"
                                   class="form-control"
                                   value="<?= empty($listTeam[$i]) ? '' : $listTeam[$i]['NAME_PERSON'] ?>"
                                   required/>
                        </div>
                    </div>
                    <!-- Apellidos -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="lastNameMember-<?= $i?>" class="col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">Apellido(s):
                        </label>
                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                            <input type="text"
                                   id="lastNameMember-<?= $i?>"
                                   name="team[<?= $i ?>][app]"
                                   class="form-control"
                                   placeholder="Apellidos"
                                   title="apellidos"
                                   value="<?= empty($listTeam[$i]) ? '' : $listTeam[$i]['LAST_NAME_PERSON'] ?>"
                                   required/>
                        </div>
                    </div>
                </div>
                <!-- direccion y pais -->
                <div class="form-group">
                    <!-- Direccion -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="addressMember-<?= $i?>" class="col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">Dirección
                        </label>
                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                            <input type="text"
                                   id="addressMember-<?= $i?>"
                                   name="team[<?= $i ?>][address]"
                                   class="form-control"
                                   placeholder="Direcci&oacute;n"
                                   title="direccion"
                                   value="<?= empty($listTeam[$i]) ? '' : $listTeam[$i]['ADDRESS_PERSON'] ?>"/>
                        </div>
                    </div>
                    <!-- pais -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="countryMember-<?= $i?>" class="col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">País
                        </label>
                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                            <select name="team[<?= $i ?>][pais]"
                                    id="countryMember-<?= $i?>"
                                    class="form-control"
                                    title="pais de origen"
                                    required>
                                <option value="">Nacionalidad</option>
								<?php if (isset($listPais)) {
								foreach ($listPais as $pais) { ?>
                                <option value="<?= $pais ?>" <?= empty($listTeam[$i]) ? '' :
									($pais == $listTeam[$i]['COUNTRY_PERSON'] ? 'selected' : '') ?>>
									<?= $pais ?>
                                </option>
								<?php }
								} ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- fecha nacimiento y genero -->
                <div class="form-group">
                    <!-- Fecha de dateNac -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="dateBornMember-<?= $i ?>"
                               class="col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">Fecha
                                                                                          de nacimiento
                        </label>
                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                            <input type="date"
                                   id="dateBornMember-<?= $i ?>"
                                   name="team[<?= $i ?>][dateNac]"
                                   class="form-control datepickerBorn"
                                   placeholder="YYYY-mm-dd"
                                   title="Fecha de nacimiento"
                                   value="<?= empty($listTeam[$i]) ? '' : $listTeam[$i]['DATE_BORN_PERSON'] ?>"
                                   required/>
                        </div>
                    </div>
                    <!-- Sexo -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="hombre" class="col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">Género:</label>
                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                            <label class="radio-inline">
                                <input type="radio"
                                       id="hombre-<?= $i?>"
                                       value="1"
                                       name="team[<?= $i ?>][sex]"
								       <?= empty($listTeam[$i]) ? '' : ($listTeam[$i]['SEX_PERSON'] == 1 ? 'checked' :
									       '')?>                        required>
                                Hombre
                            </label>
                            <label class="radio-inline">
                                <input type="radio"
                                       id="mujer-<?= $i?>"
                                       value="0"
								       <?= empty($listTeam[$i]) ? '' : ($listTeam[$i]['SEX_PERSON'] == 0 ? 'checked' :
									       '')?>                        name="team[<?= $i ?>][sex]">
                                Mujer
                            </label>
                        </div>
                    </div>
                </div>
                <!-- documento de identificacion -->
                <div class="form-group">
                    <!-- tipo de documento -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="idTypeDocument-<?= $i ?>"
                               class="col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">
                            Tipo de documento:
                        </label>
                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                            <select name="team[<?= $i ?>][listDocument][0][idType]"
                                    id="idTypeDocument-<?= $i ?>"
                                    class="form-control"
                                    title='Documento de identificacion'
                                    required>
								<?php if (!empty($listTypeDoc)) {
								foreach ($listTypeDoc as $doc) { ?>
                                <option value="<?= $doc['ID_TYPE_DOCUMENT'] ?>"
								<?= empty($listTeam[$i]['listDocument']) ? '' :
									($doc['ID_TYPE_DOCUMENT'] == $listTeam[$i]['listDocument'][0]['ID_TYPE_DOCUMENT'] ?
										'selected' : '')?>>
									<?= $doc['NAME_TYPE_DOCUMENT'] ?>
                                </option>
								<?php }
								} ?>
                            </select>
                        </div>
                    </div>
                    <!-- numero de documento -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="numberDocument-<?= $i ?>"
                               class="col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">Número
                                                                                          de documento
                        </label>
                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                            <input type="text"
                                   id="numberDocumentOld-<?= $i ?>"
                                   name="team[<?= $i ?>][listDocument][0][nDocOld]"
                                   class="hidden"
                                   value="<?= empty($listTeam[$i]['listDocument']) ? '' :
								       ($listTeam[$i]['listDocument'][0]['NUMBER_DOCUMENT'])?>"
                                   title=""/>
                            <input type="text"
                                   id="numberDocument-<?= $i ?>"
                                   name="team[<?= $i ?>][listDocument][0][nDoc]"
                                   class="form-control"
                                   placeholder="Nro de documento"
                                   title="Numero de identificacion del documento"
                                   value="<?= empty($listTeam[$i]['listDocument']) ? '' :
								       ($listTeam[$i]['listDocument'][0]['NUMBER_DOCUMENT'])?>"
                                   required/>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                showListMember(<?=$i?>);
                function showListMember(id) {
                    selected= document.getElementById('toggleOccupied-'+id).checked;
                    document.getElementById("listMember-"+id).hidden = selected;
                    document.getElementById("divSearchUser-"+id).hidden = selected;

                    document.getElementById("idPersonMember-"+id).disabled=selected;
                    document.getElementById("nameMember-"+id).disabled=selected;
                    document.getElementById("lastNameMember-"+id).disabled=selected;
                    document.getElementById("addressMember-"+id).disabled=selected;
                    document.getElementById("countryMember-"+id).disabled=selected;
                    document.getElementById("dateBornMember-"+id).disabled=selected;
                    document.getElementById("hombre-"+id).disabled=selected;
                    document.getElementById("mujer-"+id).disabled=selected;
                    document.getElementById("idTypeDocument-"+id).disabled=selected;
                    document.getElementById("numberDocument-"+id).disabled=selected;
                }
            </script>
			<?php } ?>
        </div>
    </div>
</div>
<script>
    function updateMember(id) {
        nameUser = document.getElementById('searchUser-' + id).value;
        $.ajax({
            type: "POST",
            url: "checkIn/readPerson/" + nameUser,
            data: nameUser
        }).done(function (person) {
            var personData = JSON.parse(person);
            document.getElementById('idPersonMember-' + id).value = personData[0]['ID_PERSON'];
            document.getElementById('nameMember-' + id).value = personData[0]['NAME_PERSON'];
            document.getElementById('lastNameMember-' + id).value = personData[0]['LAST_NAME_PERSON'];
            document.getElementById('addressMember-' + id).value = personData[0]['ADDRESS_PERSON'];

            $("#countryMember-" + id + " option[value='" + personData[0]['COUNTRY_PERSON'] + "']").attr("selected", true);

            document.getElementById('dateBornMember-' + id).value = personData[0]['DATE_BORN_PERSON'];
            document.getElementById('hombre-' + id).checked = personData[0]['SEX_PERSON'] == 1;
            document.getElementById('mujer-' + id).checked = personData[0]['SEX_PERSON'] == 0;

            $("#idTypeDocument-" + id + " option[value=" + personData[0]['listDocument'][0]['ID_TYPE_DOCUMENT'] + "]").attr("selected", true);
            document.getElementById('numberDocument-' + id).value = personData[0]['listDocument'][0]['NUMBER_DOCUMENT'];
        })
    }
</script>
