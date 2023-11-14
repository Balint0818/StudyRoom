@include('user.head')

@include('user.topbar')
@include('user.script')

<?php
session(['can_access_appointment' => true]);
$isAll = false; // Set initial value to false
?>

<script>

    $(document).ready(function () {
        var $toggleButton = $('#toggleButton');
        var $appointmentsTable = $('#appointmentsTable');
        var $header = $('#appointmentsHeader');

        var isShowingCurrent = false; // Set initial value to false

        $toggleButton.on('click', function () {
            isShowingCurrent = !isShowingCurrent;
            updateAppointmentsVisibility();
        });

        function updateAppointmentsVisibility() {
            $appointmentsTable.find('tbody tr').each(function () {
                var $row = $(this);
                var startTime = $row.find('td:eq(2)').text();
                $row.toggle(isShowingCurrent || (startTime && new Date(startTime) > new Date()));
            });

            if (isShowingCurrent) {
                $toggleButton.text('Összes foglalás');
                $header.text('Jelenleg érvényes foglalások');
            } else {
                $toggleButton.text('Jelenlegi');
                $header.text('Összes foglalás');
            }
            var $deleteButtons = $appointmentsTable.find('.delete-button');
            $deleteButtons.each(function () {
                var startTime = $(this).closest('tr').find('td:eq(2)').text();
                if (startTime && new Date(startTime) <= new Date()) {
                    $(this).prop('disabled', true);
                } else {
                    $(this).prop('disabled', false);
                }
            });
        }

        // Initial update of appointments visibility
        updateAppointmentsVisibility();
    });
</script>

<div class="page-section">
    <div class="container">
        <h1 class="text-center mt-5" style="font-weight: bolder" id="appointmentsHeader">
            @if($isAll)
                Összes foglalás
            @else
                Jelenleg érvényes foglalások
            @endif
        </h1>

        <div class="text-center mt-3">
            <button id="toggleButton" class="btn btn-primary">
                @if($isAll)
                    Jelenlegi
                @else
                    Összes foglalás
                @endif
            </button>
        </div>

        <div class="table-responsive mt-5">
            <table id="appointmentsTable" class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Név</th>
                    <th scope="col">Foglalás kezdete</th>
                    <th scope="col">Foglalás vége</th>
                    <th scope="col">Tanulószoba</th>
                    <th scope="col">Neptun kód</th>
                    <th scope="col">Üzenet</th>
                    <th scope="col">Foglalás törlése</th>
                </tr>
                </thead>
                <tbody>
                @forelse($appointments as $appointment)
                    <tr style="background-color: {{ $loop->iteration % 2 == 0 ? '#f6f6f6' : '#ffffff' }};">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ date('Y-m-d H:i', strtotime($appointment->starttime)) }}</td>
                        <td>{{ date('Y-m-d H:i', strtotime($appointment->endtime)) }}</td>
                        <td>{{ $appointment->room }}</td>
                        <td>{{ $appointment->nk }}</td>
                        <td>{{ $appointment->message }}</td>
                        <td>
                            @if($appointment->starttime && new Date($appointment->starttime) <= new Date())
                                <button class="btn btn-danger delete-button" disabled>Törlés</button>
                            @else
                                <a href="{{url('delete',$appointment->id)}}"
                                   class="btn btn-danger delete-button">Törlés</a>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Neked még nincsenek foglalásaid.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
