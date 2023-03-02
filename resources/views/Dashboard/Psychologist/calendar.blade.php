@extends('Dashboard.Admin.Layout.layout')
@section('title')
    {{$title}} | Takvim
@endsection
@section('page-title')
    Takvim
@endsection
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Takvim</h4>
                        </div>
                        <div class="card-body">
                            <div id="calendar">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialDate: '2023-01-12',
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                firstDay : 1,
                initialDate: Date.now(),
                select: function(arg) {
                    var title = prompt('Event Title:');
                    if (title) {
                        calendar.addEvent({
                            title: title,
                            start: arg.start,
                            end: arg.end,
                            allDay: arg.allDay
                        })
                    }
                    calendar.unselect()
                },
                eventClick: function(arg) {
                    if (confirm('Are you sure you want to delete this event?')) {
                        arg.event.remove()
                    }
                },
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: (start,end,timezone,callback)=>{
                    axios.get("{{route("psychologist.calendar.get")}}",{
                        headers: {
                            "Authorization": "Bearer " + "{{\Illuminate\Support\Facades\Cookie::get("token")}}"
                        }
                    })
                }
            });
            calendar.render();
        });

    </script>
@endsection
