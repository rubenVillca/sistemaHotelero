<section>
        <div class="row">
            <!-- lista de tipo de mensajes -->
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <?php require "message_section_menu_type.blade.php";?>
            </div>
            <!-- mensaje a enviar -->
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div class="panel panel-body">
                    <h3 class="text-center">Enviar Mensaje</h3>
                    <form action="messages/insert_dd/" method="post" class="form-horizontal" role="form">
                        <!--Correo electronico-->
                        <div class="form-group">
                            <label for="name" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">A</label>
                            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-9">
                                <input list="list-user" class="form-control" id="idPersonReceptor"
                                       name="idPersonReceptor"
                                       placeholder="Nombre de usuario"
                                       value="" required>
                                <datalist id="list-user">
									<?php foreach ($listUser as $user){?>
                                    <option value="<?= $user['NAME_USER']?>" label="<?=$user['NAME_USER']?>">
									<?php }?>
                                </datalist>
                            </div>
                        </div>
                        <!--Asunto-->
                        <div class="form-group">
                            <label for="asunto" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Asunto</label>
                            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-9">
                                <input type="text" name="asunto" id="asunto" class="form-control" required>
                            </div>
                        </div>
                        <!--Tipo de mensaje-->
                        <div class="form-group">
                            <label for="typeMessage"
                                   class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Tipo</label>
                            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-9">
                                <select name="typeMessage" id="typeMessage" class="form-control" required>
									<?php foreach ($listTypeMessage as $type){?>
                                    <option value="<?= $type['ID_TYPE_MESSAGE']?>"><?=$type['NAME_TYPE_MESSAGE']?></option>
									<?php }?>
                                </select>
                            </div>
                        </div>
                        <!--Mensaje-->
                        <div class="form-group">
                            <label for="mensaje"
                                   class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Mensaje</label>
                            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-9">
                                <textarea name="mensaje" id="mensaje" class="jqte-test form-control" rows="7"
                                          required></textarea>
                            </div>
                        </div>
                        <!-- botones -->
                        <div class="form-group">
                            <div class="col-xs-6 col-xs-offset-6 col-sm-6 col-sm-offset-6 col-md-4 col-md-offset-8 col-lg-3 col-lg-offset-8">
                                <button type="submit" class="btn btn-primary form-control" name="enviar">
                                    Enviar <span class="fa fa-send-o"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
