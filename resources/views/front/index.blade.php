<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            スケジュール
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@section('script')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
   const events = @json($events);
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: events,
      locale: 'ja',
      height: '500px',
      firstDay: 1,
      headerToolbar: {
        left: "dayGridMonth, timeGridWeek, timeGridDay, listWeek",
        center: "title",
        right: "today prev, next"
      },
      buttonText: {
        today: '今月',
        month: '月間',
        week: '週間',
        day: '日間',
        list: 'リスト'
      },
      noEventsContent: 'スケジュールはありません。',
    });
    calendar.render();
  });

</script>
