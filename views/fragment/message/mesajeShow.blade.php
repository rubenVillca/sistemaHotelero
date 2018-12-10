<!--Eviar correo electronico al administrador-->
<section>
    <div class="panel panel-primary animated fadeInUp">
        <div class="panel-heading">
            <h4 class="text-center">Enviar Mensaje al Administrador</h4>
        </div>
        <div class="panel-body">
            <form action="" method="post">
                <input type="text"
                       name="reg"
                       id="reg"
                       value="<?= isset($reg) ? $reg : '-1'; ?>"
                       title="controlado de mensajes"
                       hidden>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php if(isset($nameUser) && $nameUser == -1) { ?>
                    <div class="row">
                        <label for="name">Tu nombre:</label>
                        <input id="name" class="form-control" name="name" type="text" required/>
                    </div>
                    <div class="row">
                        <label for="email">Tu email:</label>
                        <input id="email" class="form-control" name="email" type="text" required/>
                    </div>
					<?php } ?>
                    <div class="row">
                        <label for="title">Titulo:</label>
                        <input id="title" class="form-control" name="title" type="text" required/>
                    </div>
                    <div class="row">
                        <label for="message">Tu mensaje:</label>
                        <textarea id="message"
                                  class="jqte-test form-control"
                                  name="message"
                                  rows="7"
                                  required></textarea>
                    </div>
                </div>
                <button id="btnSend" name="btnSend" type="submit" class="form-control btn-info pull-right">
                    Enviar Mensaje <span class="glyphicon glyphicon-envelope"></span>
                </button>
            </form>
        </div>
    </div>
</section>