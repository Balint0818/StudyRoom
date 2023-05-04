@include('user.head')

@include('user.topbar')
@include('user.script')

<?php
session(['can_access_appointment' => true]);
?>

<div class="page-section">
    <div class="container">
        <h1 class="text-center mt-5" style="font-weight: bolder">My Appointments</h1>

        <div class="table-responsive mt-5">
            <table class="table table-striped">
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
                        <td><a href="{{url('delete',$appointment->id)}}" class="btn btn-danger">Törlés</a>
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
