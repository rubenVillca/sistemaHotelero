<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-color-white">
    <div class="x_panel">
        <div class="x_title animated fadeInUpBig">
            <h2 class="text-center">Calendario de Eventos</h2>
        </div>
        <div class="x_content animated fadeInUpBig">
            <div id='calendar'></div>
        </div>
    </div>
</div>
<!-- Start Calender modal -->
<script src="libs/moment/moment.min.js"></script>
<script src="libs/calendar/fullcalendar.min.js"></script>
<!-- pace -->
<script src="libs/pace/pace.min.js"></script>
<script>
    $(window).load(function () {
        //var date = new Date();
        var started;
        var categoryClass;
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                $('#fc_create').click();
                started = start;
                ended = end;
                $(".antosubmit").on("click", function () {
                    var title = $("#title").val();
                    if (end) {
                        ended = end
                    }
                    categoryClass = $("#event_type").val();
                    if (title) {
                        calendar.fullCalendar('renderEvent', {
                                title: title,
                                start: started,
                                end: end,
                                allDay: allDay
                            },
                            true // make the event "stick"
                        );
                    }
                    $('#title').val('');
                    calendar.fullCalendar('unselect');
                    $('.antoclose').click();
                    return false;
                });
            },
            eventClick: function (calEvent, jsEvent, view) {
                //alert(calEvent.title, jsEvent, view);
                $('#fc_edit').click();
                $('#title2').val(calEvent.title);
                categoryClass = $("#event_type").val();
                $(".antosubmit2").on("click", function () {
                    calEvent.title = $("#title2").val();
                    calendar.fullCalendar('updateEvent', calEvent);
                    $('.antoclose2').click();
                });
                calendar.fullCalendar('unselect');
            },
            editable: true,
            events: [
					<?php if(!empty($listActivity)){?>
					<?php foreach($listActivity as $activity){?>
                {
                    title: '<?=$activity['NAME_ACTIVITY']?>',
                    start: '<?=$activity['DATE_START_ACTIVITY'].' '.$activity['TIME_START_ACTIVITY'] ?>',
                    end: '<?=$activity['DATE_END_ACTIVITY'].' '.$activity['TIME_END_ACTIVITY'] ?>',
                    url: 'activity/show/<?=$activity['ID_ACTIVITY']?>'
                },
				<?php }}?>
            ],
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
            allDayText: "Todo el dia",
            buttonText: {
                prev: "Ant",
                next: "Sig",
                ventLimitText: "mas",
                prevYear: "sig año",
                nextYear: "ant año",
                year: "año",
                today: "hoy",
                month: "mes",
                week: "semana",
                day: "dia"
            }
        });
    });
</script>