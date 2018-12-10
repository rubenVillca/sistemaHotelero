<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div id="datepicker" class="hidden-xs"></div>
</div>
<script>
    $(function () {
        var eventDates = {};
        eventDates[new Date('08/09/2017')] = new Date('08/09/2017');
        eventDates[new Date('09/09/2017')] = new Date('09/09/2017');
        eventDates[new Date('10/09/2017')] = new Date('10/09/2017');
        eventDates[new Date('11/09/2017')] = new Date('11/09/2017');

        $("#datepicker").datepicker({
                dateFormat: 'dd/mm/yy',
                changeMonth: false,
                changeYear: true,
                numberOfMonths: 1,
                buttonImageOnly: true,
                onSelect: function (selectedDate) {
                    var instance = $(this).data("datepicker");

                    var date = $.datepicker.parseDate(instance.settings.dateFormat, dateText, instance.settings);

                    $('#end_date').datepicker('option', 'minDate', dateText);
                },
                beforeShowDay: function (date) {
                    var highlight = eventDates[date];
                    if (highlight) {
                        return [true, "event", 'Tooltip text'];
                    } else {
                        return [true, '', ''];
                    }
                }
            }
        );
    });
</script>
