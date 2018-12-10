<section>
    <div class="app-color-white">
		<?php if(!empty($listFood)){ ?>
        <div class="table-responsive">
            <br>
            <div class="form-group pull-right">
                <input type="text" class="search form-control" placeholder="Buscar">
            </div>
            <span class="counter pull-right"></span>

            <table class="table table-striped table-hover results">
                <thead>
                <tr>
                    <th>Nro</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Tipo</th>
                    <th>Descripci&oacute;n</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$i = 0;
				foreach($listFood as $food){ ?>
                <tr>
                    <td><?= ++$i ?></td>
                    <td><img src="<?= $food['IMAGE_FOOD'] ?>"
                             class="app-img-9"
                             alt=""></td>
                    <td><?= $food['NAME_FOOD'] ?></td>
                    <td><i class="fa fa-<?= $food['VALUE_STATE_FOOD'] > 0 ? 'check' : 'remove' ?>"></i></td>
                    <td><?= $food['NAME_TYPE_FOOD'] ?></td>
                    <td><?= Helper::camelUpperCase($food['DESCRIPTION_FOOD']) ?></td>
                    <td>
                        <a href="food/show/<?= $food['ID_FOOD'] ?>"
                           class="btn btn-xs btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="food/edit/<?= $food['ID_FOOD'] ?>"
                           class="btn btn-xs btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="food/delete_dd/<?= $food['ID_FOOD'] ?>"
                           class="btn btn-xs btn-danger"
                           onclick="return validLink('food/delete_dd/<?= $food['ID_FOOD'] ?>','Eliminar','Realmente desea eliminar eliminarlo','error')">
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
        <div>
            <img src="img/404/caja-vacia.jpg"
                 class="app-img-5 center-block"
                 alt="No existen datos disponibles">
            <h4 class="text-center text-success">Alimentos no registrados</h4>
        </div>
		<?php } ?>
        <div class="panel">
            <a href="food/insert/"
               class="btn btn-block btn-primary">
                <i class="fa fa-plus"></i> Insertar Comida
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