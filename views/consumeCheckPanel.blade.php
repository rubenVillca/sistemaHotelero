<section>
	<div class="app-color-white animated fadeInUp">
		<div class="">
			<!-- Default panel contents -->
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-8">
				<h3 class="text-primary">Hu&eacute;spedes registrados</h3>
			</div>
			<div class="clearfix"></div>
			<!-- Table -->
			<div class="table-responsive">
				<div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-7 col-lg-5 col-lg-offset-7">
					<div class="form-group pull-right">
						<input type="text" class="search form-control" placeholder="Buscar">
					</div>
					<span class="counter pull-right"></span>
				</div>

				<table class="table table-hover results">
					<thead>
					<tr>
						<th>Id</th>
						<th>Email</th>
						<th>Ingreso</th>
						<th>Egreso</th>
						<th>Opciones</th>
					</tr>
					</thead>
					<tbody>
					<?php if (!empty($listCheckIn)) { ?>
					<?php $idCheckAux = '';
					foreach ($listCheckIn as $check) {
					if ($idCheckAux != $check['ID_CHECK']) {
					$idCheckAux = $check['ID_CHECK']; ?>
					<tr>
						<td><?= $check['ID_CHECK'] ?></td>
						<td><?= $check['check']['EMAIL_PERSON'] ?></td>
						<td><?= $check['DATE_START_CHECK'] ?></td>
						<td><?= $check['DATE_END_CHECK'] ?></td>
						<td>
							<a href="checkIn/show/<?= $check['check']['ID_CHECK'] ?>"
							   class="btn btn-xs btn-default"
							   title="Ver Consumo">
								<i class="fa fa-eye"></i>
							</a>
							<a href="consume/service/<?= $check['check']['ID_CHECK'] ?>"
							   class="btn btn-xs btn-primary"
							   title="consumir servicio">
								<i class="fa fa-tags"></i>
							</a>
							<a href="consume/offer/<?= $check['check']['ID_CHECK'] ?>"
							   class="btn btn-xs btn-warning"
							   title="Registrar consumo de oferta">
								<i class="fa fa-star-o"></i>
							</a>
							<a href="consume/food/<?= $check['check']['ID_CHECK'] ?>"
							   class="btn btn-xs btn-info"
							   title="consumir comida">
								<i class="fa fa-coffee"></i>
							</a>
						</td>
					</tr>
					<?php }
					} ?>
					<?php } else { ?>
					<tr>
						<td colspan="5">
							<h3 class="text-center">No existen huspedes activos</h3>
						</td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<script>
    $(document).ready(function () {
        $(".search").keyup(function () {
            var searchTerm = $(".search").val();
            var listItem = $('.results tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

            $.extend($.expr[':'], {
                'containsi': function (elem, i, match, array) {
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });

            $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function (e) {
                $(this).attr('visible', 'false');
            });

            $(".results tbody tr:containsi('" + searchSplit + "')").each(function (e) {
                $(this).attr('visible', 'true');
            });

            var jobCount = $('.results tbody tr[visible="true"]').length;
            $('.counter').text(jobCount + ' encontrado');

            if (jobCount == '0') {
                $('.no-result').show();
            }
            else {
                $('.no-result').hide();
            }
        });
    });
</script>