<section>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-color-white">
        <form id="formChat" role="form" method="post">
            <div class="form-group">
                <label for="user">Usuario: <?=$nameUser?></label>
            </div>
            <div class="form-group">
                <div id="conversation"></div>
            </div>
            <div class="form-group">
                <label for="message"><strong>Mensaje:</strong></label><br>
                <textarea id="message" name="message" placeholder="Escribe tu Mensaje..." class="form-control" rows="3"
                          cols="182"></textarea>
            </div>
            <div class="form-group pull-right">
                <button id="send" class="btn btn-primary btn-md"><span class="fa fa-save"></span> Enviar</button>
            </div>
        </form>
    </div>
</section>

<script>
    $(document).on("ready", function () {
        registarmensajes();
        $.ajaxSetup({"cache": false});
        setInterval("loadMensajes()", 500);
    });

    var registarmensajes = function () {//leer mensajes
        $("#send").on("click", function (e) {
            e.preventDefault();
            var frm = $("#formChat").serialize();
            $.ajax({
                type: "POST",
                url: "chat/insert/<?=$nameUser?>",
                data: frm
            }).done(function (info) {
                $("#message").val("");
                var altura = $("#conversation").prop("scrollHeight");
                $("#conversation").scrollTop(altura)
                console.log(info);
            })
        });
    }


    var loadMensajes = function () {//guardar los mensajes en el servidor
        $.ajax({
            type: "POST",
            url: "chat/insert_dd/<?=$nameUser?>"
        }).done(function (info) {
            $("#conversation").html(info);
            $("#conversation p:last-child").css({"background-color": "#64cccb", "padding-botton": "20px"});
            var altura = $("#conversation").prop("scrollHeight");
            $("#conversation").scrollTop(altura)
        });
    }

</script>
