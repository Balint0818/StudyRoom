<!DOCTYPE html>
<html lang='en'>
@include('user.head')
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="col-md-11 offset-1 mt-5 mb-5">
                <div id='calendar'></div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var appointment = @json($events);
        $('#calendar').fullCalendar({
            header: {
                left: 'prev next today',
                center: 'title',
                right: 'month,agendaWeek' // Remove the unnecessary comma
            },
            events: appointment
        });
    });

</script>
</body>
</html>
