<section>
	<div class="animated fadeInUp">
		<form action=""
		      method="post"
		      class="search-form">
			<div class="hidden">
				<input type="text"
				       name="idService"
				       value="<?= !empty($service['ID_SERVICE']) ? $service['ID_SERVICE'] : 0 ?>"
				       title="">
				<input type="text"
				       name="idTypeRoom"
				       value="<?= !empty($service['ID_ROOM_MODEL']) ? $service['ID_ROOM_MODEL'] : 0 ?>"
				       title="">
				<input type="text"
				       name="idOffer"
				       value="<?= !empty($offer['ID_OFFER']) ? $service['ID_OFFER'] : 0 ?>"
				       title="">
				<input type="text"
				       name="idCheck"
				       value="<?= !empty($idCheck) ? $idCheck : 0; ?>"
				       title="">
				<input type="date"
				       name="dateIn"
				       value="<?= !!empty($dateIn) ? date('Y-m-d') : $dateIn ?>"
				       title="">
				<input type="date"
				       name="dateOut"
				       value="<?= !!empty($dateOut) ? date('Y-m-d') : $dateOut ?>"
				       title="">
				<input type="text"
				       name="value"
				       value="<?= !empty($value) ? $value : 0 ?>"
				       title="">
			</div>
			<div class="input-group">
				<input list="list-user"
				       placeholder="Buscar "
				       class="form-control"
				       id="searchUser"
				       name="searchUser"
					   autocomplete="off"
				       value="<?= !empty($searchUser) ? $searchUser : ''; ?>">
				<datalist id="list-user">
					<?php if(!empty($listPerson)){
					foreach($listPerson as $user){ ?>
					<option value="<?= $user['NAME_USER'] ?>"><?= $user['NAME_USER'] ?></option>
					<?php }
					} ?>
				</datalist>
				<div class="input-group-btn">
					<button type="submit"
					        class="btn btn-primary btn-flat"
					        name="btnSearchUser">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</div>
			</div>
		</form>
	</div>
</section>