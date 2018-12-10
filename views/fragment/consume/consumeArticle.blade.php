<!------------------------------------------------- Datos del cuarto------------------ -->
<?php if (isset($listArticle)) { ?>
<!-- Titulo tipo de ambiente -->
<hr>
<div class="panel-heading">
	<h3 class="panel-title text-center">
		<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Articulos entregados</a>
	</h3>
</div>
<!-- contenidos del registro del ambiente -->
<div id="collapse3" class="panel-collapse collapse in">
	<div class="panel-body">
		<!-- listIdArticle[]--><!-- Articulos de entrada-->
		<?php if (isset($listArticle)) { ?>
		<?php foreach(empty($roomOccupied) ? array() : $roomOccupied as $room){ ?>
		<?php if (isset($room['NAME_ROOM'])){?>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<label class="control-label" for="name">Habitaci&oacute;n:</label>
			<h5> <?= $room['NAME_ROOM'] ?></h5>
		</div>
		<?php }?>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<label class="control-label"
			       for="listIdArticle">Objetos entregados
			</label>
			<select id="listIdArticle"
			        multiple="multiple"
			        name="listIdArticle[]"
			        class="form-control">
				<?php foreach ($listArticle as $article) {
				$var = '';
				foreach(isset($articleConsum) ? $articleConsum : array() as $artCon) {
					$var = $article['ID_ARTICLE'] == $artCon['ID_ARTICLE'] ? 'selected' : $var;
				} ?>
				<option value="<?= $article['ID_ARTICLE']; ?>" <?= $var; ?> >
					<?= $article['NAME_ARTICLE']; ?>
				</option>
				<?php } ?>
			</select>
		</div>
		<?php } ?>
		<?php } ?>
		<?php if (isset($listRoomFree)) { ?>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<label class="control-label"
			       for="idRoom">Habitaciones
			</label>
			<select id="idRoom" name="idRoom" class="form-control" required>
				<option value=""></option>
				<?php if (!empty($consum['list_room'])) {
				foreach ($consum['list_room'] as $roomSelected){?>
				<option value="<?= $roomSelected['ID_ROOM'] ?>" selected><?=$roomSelected['NAME_ROOM']?></option>
				<?php }
				}else {
					$roomSelected['ID_ROOM'] = 0;
				} ?>
				<?php foreach ($listRoomFree as $typeRoom) {?>
				<?php foreach ($typeRoom as $room) {?>
				<option value="<?= $room['ID_ROOM']; ?>" <?= $room['ID_ROOM'] == $roomSelected['ID_ROOM'] ? 'selected' : '' ?> >
					<?= $room['NAME_ROOM']; ?>
				</option>
				<?php }?>
				<?php } ?>
			</select>
		</div>
		<?php } ?>
	</div>
</div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#listIdArticle').multiselect({buttonWidth: '100%'});
    });
</script>

