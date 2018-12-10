<?php if(!empty($mesaje) && $mesaje['type'] != '' && $mesaje['mesaje'] != ''){?>
<div class="row">
    <div class="alert alert-<?=$mesaje['type']?>" role="alert">
        <p class="text-left"><?=$mesaje['mesaje']?></p>
    </div>
</div>
<?php }?>
