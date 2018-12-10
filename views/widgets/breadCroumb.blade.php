<?php if(!empty($cabecera)) { ?>
<section class="hidden-xs">
    <div class="row">
        <ul class="breadcrumb">
			<?php foreach($cabecera as $list) { ?>
            <li>
				<?php if(empty($list[0])) { ?>
							<?= $list[1] ?>
						<?php } ?>
				<?php if(!empty($list[0])) { ?>
                <a href="<?= $list[0] ?>" class="app-underline"><?= $list[1] ?></a>
				<?php } ?>
            </li>
			<?php } ?>
        </ul>
    </div>
</section>
<?php } ?>