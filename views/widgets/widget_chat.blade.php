<section>
	<form id="formChat" role="form" method="post">
		<div class="form-group">
			<div id="conversation"></div>
		</div>
		<div class="form-group">
			<textarea id="message" name="message" placeholder="Escribe tu Mensaje..." class="form-control"
			          rows="3"
			          cols="182"></textarea>
		</div>
		<div class="form-group pull-right">
			<button id="send" class="btn btn-primary btn-md"><span class="fa fa-save"></span> Enviar</button>
		</div>
	</form>
</section>

<script>
	var infoBackUp='';
    $(document).on("ready", function () {
        registarmensajes();
        $.ajaxSetup({"cache": false});
        setInterval("loadMensajes()", 1500);
    });

    var registarmensajes = function () {//leer mensajes
        $("#send").on("click", function (e) {
            e.preventDefault();
            var frm = $("#formChat").serialize();
            $.ajax({
                type: "POST",
                url: "chat/insert/<?=$_SESSION['NAME_USER']?>",
                data: frm
            }).done(function (info) {
                $("#message").val("");
                var altura = $("#conversation").prop("scrollHeight");
                $("#conversation").scrollTop(altura);
                console.log(info);
            })
        });
    };


    var loadMensajes = function () {//guardar los mensajes en el servidor
        $.ajax({
            type: "POST",
            url: "chat/insert_dd/<?=$_SESSION['NAME_USER']?>"
        }).done(function (info) {
            $("#conversation").html(info);
            $("#conversation p:last-child").css({"background-color": "#09C", "padding-botton": "20px"});
            var altura = $("#conversation").prop("scrollHeight");
            if (info!==infoBackUp) {
                $("#conversation").scrollTop(altura);
            }
            infoBackUp=info;
        });
    };
</script>
