<!-- inicio de sesion con facebook -->
<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '376338386128072',
            cookie: true,
            xfbml: true,
            version: 'v2.10'
        });
        FB.AppEvents.logPageView();
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function checkLoginState() {
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);

        });
    }
</script>
<!--inicio seccion sesion-->
<section>
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-4 col-lg-offset-4">
        <div class="row">
            <div class="panel panel-primary animated fadeIn">
                <div class="panel-heading">
                    <h4 class="text-center panel-title">Inicie Sesi&oacute;n</h4>
                </div>
                <div class="panel-body">
                    <form action="login/login/" method="post" class="login-form1" id="login">
                        <!-- usuario-->
                        <div class="form-group">
                            <label for="user">Nombre de Usuario</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" placeholder="Usuario" class="form-control" name="user" id="user"
                                       max="30"
                                       required>
                            </div>
                        </div>
                        <!-- password-->
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-key"></span></span>
                                <input type="password" placeholder="Password" class="form-control" name="pass" id="pass"
                                       max="25"
                                       required>
                            </div>
                        </div>
                        <!-- mensaje de error -->
						<?php if (!empty($mesaje['type'])) { ?>
                        <div class="alert alert-<?= $mesaje['type'] ?>" role="alert"><?= $mesaje['mesaje'] ?></div>
					    <?php } ?>
                    <!-- boton enviar formulario -->
                        <button class="btn btn-primary btn-block" name="login">
                            <span class="glyphicon glyphicon-log-in"></span> Iniciar Session
                        </button>
                        <!--<div class="form-control">
                            <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"/>
                        </div>-->
                        <!-- registrar nuevo usuario -->
                        <p class="help-block">¿no esta registrado?
                            <a href="user/">Registrar usuario</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>