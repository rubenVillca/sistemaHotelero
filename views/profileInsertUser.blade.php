<!-- Registro modulo de registro de usuario del sistema-->
<section>
    <div class=" col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary animated fadeInUp">
            <div class="panel-heading">
                <h2 class="panel-title text-center">Registrar usuario</h2>
            </div>
            <div class="panel-body">
                <form action="user/insert_dd/" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <!--Nombre-->
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="name">
                            Nombre:
                        </label>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <input type="text"
                                   class="form-control"
                                   id="name"
                                   name="name"
                                   placeholder="ej: juan"
                                   pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}"
                                   title="solo se permiten letras"
                                   maxlength="25"
                                   required>
                        </div>
                        <div id="mensaje4" class="col-xs-3 col-sm-3 col-md-2 col-lg-2 error">
                            Ingrese solo caracteres alfabeticos
                        </div>
                    </div>
                    <!--Apellido-->
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="app">
                            Apellidos:
                        </label>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <input type="text"
                                   class="form-control"
                                   id="app"
                                   name="app"
                                   placeholder="ej: perez ramirez"
                                   pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}"
                                   title="ej: perez"
                                   maxlength="25"
                                   required>
                        </div>
                        <div id="mensaje5" class="col-xs-3 col-sm-3 col-md-2 col-lg-2 error">
                            Ingrese letras solamente
                        </div>
                    </div>
                    <!--SEXO-->
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4">Sexo:</label>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" title="Seleccione una opcion">
                            <label class="radio-inline">
                                <input type="radio"
                                       id="hombre"
                                       value="1"
                                       name="sex"
                                       title="Seleccione una opcion"
                                       required> Hombre
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="mujer" value="0" name="sex"> Mujer
                            </label>
                        </div>
                        <div id="mensaje8" class="col-xs-3 col-sm-3 col-md-2 col-lg-2 error">
                            Seleccione una opcion
                        </div>
                    </div>
                    <!--Tipo de telefono-->
                    <div class="form-group hidden">
                        <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="typePhone">
                            Tipo de Tel&eacute;fono:
                        </label>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <select id="typePhone" class="form-control" name="phoneUser[0][idType]">
                                <option value="">Seleccione un tipo de Telef&oacute;no</option>
								<?php if(!empty($listTypePhone)) {
								foreach($listTypePhone as $type) { ?>
                                <option value="<?= $type['ID_TYPE_PHONE']; ?>"><?= $type['NAME_TYPE_PHONE'] ?></option>
								<?php }
								} ?>
                            </select>
                        </div>
                    </div>
                    <!--numero Telefono-->
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="phoneUser">
                            Tel&eacute;fono:
                        </label>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <input type="tel"
                                   class="form-control"
                                   id="phoneUser"
                                   name="phoneUser[0][nPhone]"
                                   placeholder="ej: 7654321"
                                   pattern="[0-9]{6,12}"
                                   title="debe ingresar de 6 a 12 n&uacute;meros"
                                   maxlength="12"
                                   required>
                        </div>
                        <div id="mensaje9" class="col-xs-3 col-sm-3 col-md-2 col-lg-2 error">
                            Ingrese n&uacute;meros solamente
                        </div>
                    </div>
                    <!--Correo Electronico-->
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="email">
                            Correo electr&oacute;nico:
                        </label>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <input type="email"
                                   class="form-control"
                                   id="email"
                                   name="email"
                                   maxlength="30"
                                   placeholder="ej: email@gmail.com"
                                   pattern="^([a-zA-Z0-9_-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([a-zA-Z0-9-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$"
                                   required>
                        </div>
                        <div id="mensaje7" class="col-xs-12 col-sm-14 col-md-12 col-lg-3 error">
                            Correo Electr&oacute;nico
                        </div>
                    </div>
                    <!--Password-->
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="passw">
                            Contrase&ntilde;a:
                        </label>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <input type="password" class="form-control" name="pass" id="passw" placeholder="******" maxlength="30"
                                   required>
                        </div>
                        <div id="mensaje2" class="col-xs-3 col-sm-3 col-md-2 col-lg-2 error">
                            Caracteres no permitidos
                        </div>
                    </div>
                    <!--Password repeat-->
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="pass-repeat">
                            Repetir contrase&ntilde;a:
                        </label>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <input type="password"
                                   class="form-control"
                                   id="pass-repeat"
                                   name="pass-repeat"
                                   placeholder="*****"
                                   title="las contrase&ntilde;as no coincide"
                                   maxlength="30"
                                   required>
                        </div>
                        <div id="mensaje3" class="col-xs-3 col-sm-3 col-md-2 col-lg-2 error">
                            Password no valido
                        </div>
                    </div>
                    <!--Boton Enviar-->
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-3 col-lg-offset-7">
                            <button type="submit" class="btn btn-primary form-control" name='register'>
                                Registrar <span class="fa fa-edit"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>