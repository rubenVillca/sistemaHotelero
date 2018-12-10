<!-- Lista de consumo  -->
<section>
	<div class="animated fadeInUp">
		<!-- Default panel contents -->
		<div class="container-fluid">
			<h3 class="text-primary"><span class="fa fa-list"></span> Tabla de consumo del h&uacute;esped</h3>
			<hr>
		</div>
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
					<th>Nro</th>
					<th>Servicio</th>
					<th>Inicio</th>
					<th>Fin</th>
					<th>Precio</th>
					<th>Pago</th>
					<th>Estado</th>
					<th>Detalle</th>
					<th>Ver</th>
				</tr>
				</thead>
				<tbody>
				<?php $i = 1;
				$total = 0;
				$type = ''; ?>
				<!-- lista de servicios -->
				<?php if (isset($listConsumService)) { ?>
				<?php foreach ($listConsumService as $consum) { ?>
				<tr>
					<td><?= $i; ?></td>
					<td><?= $consum['NAME_SERVICE'] ?></td>
					<td><?= $consum['DATE_START_CONSUME_SERVICE'] ?><br><?= $consum['TIME_START_CONSUME_SERVICE'] ?></td>
					<td><?= $consum['DATE_END_CONSUME_SERVICE'] ?><br><?= $consum['TIME_END_CONSUME_SERVICE'] ?></td>
					<td><?= $consum['NAME_TYPE_MONEY'].' '.$consum['PRICE_CONSUME_SERVICE'] ?></td>
					<td><?= $consum['NAME_TYPE_MONEY'].' '.$consum['PAY_CONSUME_SERVICE'] ?></td>
					<td>
						<?php if ($consum['DETAIL_CONSUME_SERVICE']!='Reserve'){?>
						<?= $consum['ACTIVE_CONSUME_SERVICE'] == Constants::$STATE_CONSUME_ACTIVE ? 'Activo' : 'En proceso' ?>
						<?php }?>
						<?php if ($consum['DETAIL_CONSUME_SERVICE']=='Reserve'){?>
						<?= $consum['ACTIVE_CONSUME_SERVICE'] == Constants::$STATE_CONSUME_ACTIVE ? 'En Proceso' : 'Activo' ?>
						<?php }?>
					</td>
					<td><?= $consum['DETAIL_CONSUME_SERVICE'] ?></td>
					<td>
						<a href="<?="consume/show/$consum[ID_CONSUME_SERVICE]"?>" class="btn btn-primary btn-xs">
							<span class="fa fa-eye"></span>
						</a>
					</td>
				</tr>
				<?php $i++;
				$type = $consum['NAME_TYPE_MONEY'];
				$total += $consum['PAY_CONSUME_SERVICE']-$consum['PRICE_CONSUME_SERVICE'];
				} ?>
				<?php } else { ?>
				<tr>
					<td colspan="7"><b>No existen Servicios consumidos</b></td>
				</tr>
				<?php } ?>
				<!-- lista de consumo comidas -->
				<?php if (!empty($listconsumeFood)) { ?>
				<?php foreach ($listconsumeFood as $food) { ?>
				<tr>
					<td><?= $i; ?></td>
					<td><?= $food['NAME_FOOD'] ?></td>
					<td colspan="2"><?= $food['DATE_CREATED_COST_FOOD'].' ('.$food['TIME_CREATED_COST_FOOD'].')' ?></td>
					<td><?= $food['NAME_TYPE_MONEY'].' '.$food['PRICE_CONSUME_FOOD'] ?></td>
					<td><?= $food['NAME_TYPE_MONEY'].' '.$food['PAY_CONSUME_FOOD'] ?></td>
					<td><?= $food['STATE_CONSUME_FOOD'] == 0 ? 'Pendiente' : ($food['STATE_CONSUME_FOOD'] == 1 ? 'Entregado' : 'Cancelado') ?></td>
					<td><?= $food['NAME_TYPE_FOOD'] ?></td>
					<td>
						<a href="<?='consume/show/'.$consum['ID_CONSUME_SERVICE']?>" class="btn btn-primary btn-xs">
							<span class="fa fa-eye"></span></a>
					</td>
				</tr>
				<?php $i++;
				$type = $food['NAME_TYPE_MONEY'];
				$total += $food['PAY_CONSUME_FOOD']-$food['PRICE_CONSUME_FOOD'];
				}
				}?>
				<tr>
					<td colspan="5"><p><b>Saldo total del consumo:</b></p></td>
					<td colspan="1"> <?= $type.' '.$total; ?></td>
				</tr>
				</tbody>
			</table>
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
            $('.counter').text(jobCount + ' resultado');

            if (jobCount == '0') {
                $('.no-result').show();
            }
            else {
                $('.no-result').hide();
            }
        });
    });
</script>