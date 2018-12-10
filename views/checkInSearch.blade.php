<div class="row">
    <section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="<?= $step == 1 ? 'active' : ''?>">
                        <a title="Buscar habitacion">
                            <span class="round-tab <?= $step == 1 ? 'active' : 'proggress'?>">
                                <i class="fa fa-search fa-lg"></i>
                            </span>
                        </a>
                    </li><!-- search -->
                    <li role="presentation" class="<?= $step == 2? 'active' : ''?>">
	                    <?php if ($idCheck>0&&($step == 2 ||($step == 3||$step == 4))){?>
                        <a href="checkIn/edit/<?=$idCheck?>/" title="Editar check">
                            <span class="round-tab"><i class="fa fa-pencil fa-lg"></i></span>
                        </a>
						<?php }else{?>
                        <a title="Editar check">
                            <span class="round-tab disabled"><i class="fa fa-pencil fa-lg"></i></span>
                        </a>
						<?php }?>
                    </li><!-- registerTitular -->
                    <li role="presentation" class="<?= $step == 3 ? 'active' : ''?>">
	                    <?php if ($idCheck>0&&($step == 2 ||($step == 3||$step == 4))){?>
                        <a href="checkTeam/edit/<?=isset($idConsum) ? $idConsum : 0?>" title="Editar datos de personas que ocupan la habitacion">
                            <span class="round-tab"><i class="fa fa-users fa-lg"></i></span>
                        </a>
						<?php }else{?>
                        <a title="Editar datos de personas que ocupan la habitacion">
                            <span class="round-tab disabled"><i class="fa fa-users fa-lg"></i></span>
                        </a>
						<?php }?>
                    </li><!-- registerTeam -->
                    <li role="presentation" class="<?= $step == 4 ? 'active' : ''?>">
                        <?php if ($idCheck>0&&($step == 2 ||($step == 3||$step == 4))){?>
                        <a href="checkIn/panel/<?=$idCheck?>/" title="Resumen consumo de habitaciones">
                            <span class="round-tab"><i class="fa fa-check fa-lg"></i></span>
                        </a>
						<?php }else{?>
                        <a title="Resumen consumo de habitaciones">
                            <span class="round-tab disabled"><i class="fa fa-check fa-lg"></i></span>
                        </a>
						<?php } ?>
                    </li><!-- showCheckIn -->
                    <li role="presentation" class="<?= $step == 5 ? 'active' : ''?>">
	                    <?php if ($step == 5){?>
                        <a href="checkOut/edit/<?=$idCheck?>" title="registrar salida">
                            <span class="round-tab"><i class="fa fa-sign-out"></i></span>
                        </a>
                        <?php }else{?>
                            <a title="registrar salida">
                                <span class="round-tab disabled"><i class="fa fa-sign-out fa-lg"></i></span>
                            </a>
                        <?php }?>
                    </li><!-- checkOut -->
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane <?= $step == 1 ? 'active' : 'disabled'?>" role="tabpanel" id="step1">
                    <div class="container-fluid">
                        <h3 class="text-primary">Paso 1</h3>
                        <p class="text-success">Buscar habitaciones libres</p>
                    </div>
                    <hr>
					<?php if ($step == 1)
						require_once "views/fragment/reserve/reserveSearchRoom.blade.php"?>
                </div><!-- search -->
                <div class="tab-pane <?= $step == 2 ? 'active' : 'disabled'?>" role="tabpanel" id="step2">
                    <div class="container-fluid">
                        <h3 class="text-primary">Paso 2</h3>
                        <p class="text-success">Formulario de registro</p>
                    </div>
					<?php if ($step == 2)
						require_once "views/fragment/checkin/checkInEditIncumbent.blade.php"?>
                </div><!-- registerTitular -->
                <div class="tab-pane <?= $step == 3 ? 'active' : 'disabled'?>" role="tabpanel" id="step3">
                    <div class="container-fluid">
                        <h3 class="text-primary">Paso 3</h3>
                        <p class="text-success">Personas que ocuparan la habitacion</p>
                    </div>
					<?php if ($step == 3)
						require_once "views/checkInEditTeam.blade.php"?>
                </div><!-- registerTeam -->
                <div class="tab-pane <?= $step == 4 ? 'active' : 'disabled'?>" role="tabpanel" id="step4">
                    <div class="container-fluid">
                        <h3 class="text-primary">Paso 4</h3>
                        <p class="text-success">Estado del registro</p>
                    </div>
					<?php if ($step == 4)require_once "views/checkInConsumeList.blade.php"?>
                </div><!-- showCheckIn -->
                <div class="tab-pane <?= $step == 5 ? 'active' : 'disabled'?>" role="tabpanel" id="complete">
                    <div class="container-fluid">
                        <h3 class="text-primary">Finalizar estadia</h3>
                        <p class="text-success">Registrar salida del hotel.</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
							<?php require_once "views/fragment/consume/consumeTitular.blade.php";?>
                        </div>
                        <div class="row">
							<?php require_once "views/fragment/consume/listConsum.blade.php";?>
                        </div>
                        <div class="row">
							<?php require_once "views/fragment/consume/registerCheckOut.blade.php";?>
                        </div>
                    </div>
                </div><!-- checkOut -->
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
</script>
