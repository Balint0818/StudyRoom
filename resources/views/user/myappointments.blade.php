@include('user.head')

@include('user.topbar')
@include('user.script')

<?php
session(['can_access_appointment' => true]);
$isAll = true; // Set initial value to false
?>

<script>
    $(document).ready(function () {
        var isShowingCurrent = false; // Set initial value to false
        var $toggleButton = $('#toggleButton');
        var $appointmentsTable = $('#appointmentsTable');
        var $header = $('#appointmentsHeader');

        $toggleButton.on('click', function () {
            isShowingCurrent = !isShowingCurrent;
            $appointmentsTable.find('tbody tr').each(function () {
                var $row = $(this);
                if (isShowingCurrent) {
                    var startTime = $row.find('td:eq(2)').text();
                    $row.toggle(startTime && new Date(startTime) > new Date());
                } else {
                    $row.show();
                }
            });

            if (isShowingCurrent) {
                $toggleButton.text('Összes foglalás');
                $header.text('Jelenleg érvényes foglalások');
            } else {
                $toggleButton.text('Jelenlegi');
                $header.text('Összes foglalás');
            }

            // Disable "Törlés" button for past bookings
            var $deleteButtons = $appointmentsTable.find('.delete-button');
            $deleteButtons.each(function () {
                var startTime = $(this).closest('tr').find('td:eq(2)').text();
                if (startTime && new Date(startTime) <= new Date()) {
                    $(this).prop('disabled', true);
                } else {
                    $(this).prop('disabled', false);
                }
            });
        });
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
                    <th scope="col">Name</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Room</th>
                    <th scope="col">Neptun Code</th>
                    <th scope="col">Message</th>
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
                            <a href="{{url('delete',$appointment->id)}}" class="btn btn-danger delete-button"
                               @if($appointment->starttime && new Date($appointment->starttime) <= new Date()) disabled @endif>
                                Törlés
                            </a>
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
