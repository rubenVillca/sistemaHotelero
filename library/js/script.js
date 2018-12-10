<!-- alertas para confirmacion -->
function validLink(address, title, description, type) {
    swal({
        title: title,
        text: description,
        type: type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
    }).then(function () {
        window.location.href = address;
    });
    return false;
}

function validForm(idForm, title, description, type) {
    swal({
        title: title,
        text: description,
        type: type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
    }).then(function () {
        document.forms[idForm].submit();
    });
    return false;
}

//Creamos dos variables que tendrán las expresiones regulares a ser comprobadas
var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;//para correo
var expr1 = /^[a-zA-Z\s]*$/;//solo texto
var expr2 = /^[0-9]*$/;//solo permite numeros
var expr3 = /^[a-zA-Z0-9_\.\-]+$/;//para contrasena
$(document).ready(function () {
    $("#boton").click(function () { //función para el boton de enviar
        //recolectamos en variables, lo que tenga cada input.
        //Para mejor manipulación en los if's
        var user = $("#email").val();
        var passw = $("#passw").val();
        var repass = $("#pass-repeat").val();
        var nombre = $("#name").val();
        var apellido1 = $("#app").val();
        var telefono = $("#phone").val();
        var res = true;
        //Secuencia de if's para verificar contenido de los inputs
        if (res === true && user === "" || !expr.test(user)) {//Verifica que no este vacío y que sean letras
            $("#mensaje7").fadeIn("slow"); //Muestra mensaje de error
            res = false;				   // con false sale de la secuencia
        } else {
            $("#mensaje1").fadeOut();	//Si el anterior if cumple, se oculta el error
        }
        if (res === true && passw === "" || !expr3.test(passw)) {
            $("#mensaje2").fadeIn("slow"); //Muestra mensaje de error
            return false;				   // con false sale de la secuencia
        } else {
            $("#mensaje2").fadeOut();	//Si el anterior if cumple, se oculta el error
        }
        if (passw !== repass) {
            $("#mensaje3").fadeIn("slow");
            res = false;
        } else {
            $("#mensaje3").fadeOut();	//Si el anterior if cumple, se oculta el error
        }
        if (res === true && nombre === "" || !expr1.test(nombre)) {
            $("#mensaje4").fadeIn("slow"); //Muestra mensaje de error
            res = false;				   // con false sale de la secuencia
        } else {
            $("#mensaje4").fadeOut();	//Si el anterior if cumple, se oculta el error
        }
        if (res === true && apellido1 === "" || !expr1.test(apellido1)) {
            $("#mensaje5").fadeIn("slow");
            res = false;
        } else {
            $("#mensaje5").fadeOut();
        }
        if (res === true && telefono === "" || !expr2.test(telefono)) {
            $("#mensaje9").fadeIn("slow");
            res = false;
        }
        return res;
    });//fin click

    /*Las siguientes funciones son una mejora al ejemplo anterior que mostré
     * Si el mensaje se mostró, el usuario tenía que volver a oprimir el boton
     * de registrar para que el error se ocultará (si era el caso).
     *
     *Con estas funciones de keyup, el mensaje de error se muestra y
     * se ocultará automáticamente, si el usuario escribe datos admitidos.
     * Sin necesidad de oprimir de nuevo el boton de registrar.
     *
     * La función keyup lee lo último que se ha escrito y comparamos
     * con nuestras condiciones, si cumple se quita el error.
     *
     * Es cuestión de analizar un poco para entenderlas
     * Cualquier duda, comenten
     * */
    $("#email").keyup(function () {
        if ($(this).val() != "" && expr.test($(this).val())) {
            $("#mensaje7").fadeOut();
            return false;
        }
    });

    var valido = false;
    $("#pass-repeat").keyup(function () {
        var pass = $("#passw").val();
        var re_pass = $("#pass-repeat").val();
        if (pass != re_pass) {
            $("#pass-repeat").css({"background": "#F22"}); //El input se pone rojo
            valido = true;
        }
        else if (pass == re_pass) {
            $("#pass-repeat").css({"background": "#8F8"}); //El input se ponen verde
            $("#mensaje3").fadeOut();
            valido = true;
        }
    });//fin keyup repass

    $("#name, #app").keyup(function () {
        if ($(this).val() != "" && expr1.test($(this).val())) {
            $("#mensaje4, #mensaje5").fadeOut();
            return false;
        }
    });
});//fin ready
//input text area control
$('.jqte-test').jqte();
var jqteStatus = true;
$(".status").click(function () {
    jqteStatus = !jqteStatus;
    $('.jqte-test').jqte({"status": jqteStatus})
});
//calendario con dias habiles desde el dia actual en el input date
$(function () {
    $(".datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0
    });
});
//calendario con dias habiles hasta el dia actual en el input date
$(function () {
    $(".datepickerHistory").datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 0
    });
});
//calendario con dias habiles desde hace 10 años atras en el input date
$(function () {
    var date = new Date();
    $(".datepickerBorn").datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-mm-dd',
        maxDate: '-10Y'
    });
});
//input time formato
$(function () {
    $(".timepicker").timepicker({'timeFormat': 'H:i:s'});
});
//datepicker convertir a español
$.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    weekHeader: 'Sm',
    dateFormat: 'yy-mm-dd',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);