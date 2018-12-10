<section>
    <div class="panel panel-primary">
        <div class="panel-body">
            <form action="" method="post">
                <div class="hidden">
                    <input type="text" name="menu" id="menu" value="<?= $menuType;?>" title="">
                </div>
                <button type="submit" id="alert" name="menuType" class="btn btn-success" value="1">
                    <i class="glyphicon glyphicon-envelope"></i>    <!--Alertas-->
                    <span class="badge"><?= $typeMesaje1;?></span>
                </button>
                <button type="submit" id="regUser" name="menuType" class="btn btn-success" value="2">
                    <i class="glyphicon glyphicon-earphone"></i>  <!--Registro de usuario-->
                    <span class="badge"><?= $typeMesaje2;?></span>
                </button>
                <button type="submit" id="regClient" name="menuType" class="btn btn-success" value="3">
                    <i class="glyphicon glyphicon-edit"></i>   <!--Registro de clientes-->
                    <span class="badge"><?= $typeMesaje3;?></span>
                </button>
                <button type="submit" id="reservation" name="menuType" class="btn btn-success" value="4">
                    <i class="glyphicon glyphicon-heart-empty"></i> <!--Soliciud de reservas-->
                    <span class="badge"><?= $typeMesaje4;?></span>
                </button>
                <button type="submit" id="suggestion" name="menuType" class="btn btn-success" value="5">
                    <i class="glyphicon glyphicon-paperclip"></i> <!--Sugerencias-->
                    <span class="badge"><?= $typeMesaje5;?></span>
                </button>
                <button type="submit" id="complaint" name="menuType" class="btn btn-success" value="6">
                    <i class="glyphicon glyphicon-alert"></i>   <!--Quejas-->
                    <span class="badge"><?= $typeMesaje6;?></span>
                </button>
                <button type="submit" id="mesajes" name="menuType" class="btn btn-success" value="7">
                    <i class="glyphicon glyphicon-envelope"></i>   <!--Mensajes-->
                    <span class="badge"><?= $typeMesaje7;?></span>
                </button>
                <button type="submit" id="reminder" name="menuType" class="btn btn-success" value="8">
                    <i class="glyphicon glyphicon-calendar"></i>  <!--Recordatorio-->
                    <span class="badge"><?= $typeMesaje8;?></span>
                </button>
                <button type="submit" id="reminder" name="menuType" class="btn btn-success" value="9">
                    <i class="glyphicon glyphicon-apple"></i>  <!--Preguntas-->
                    <span class="badge"><?= $typeMesaje9;?></span>
                </button>
            </form>
        </div>
    </div>
</section>