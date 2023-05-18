<div class="table-responsive mt-5">
    <div class="container" align="center" style="padding-top: 100px">
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">X</button>
                {{ session()->get('message') }}
            </div>
        @endif
        <div align="center">
            <div align="center" style="padding: 100px">
                <table class="table-responsive mt-5">
                    <tr>
                        <th style="padding: 10px">ID</th>
                        <th style="padding: 10px">Név</th>
                        <th style="padding: 10px">Neptun kód</th>
                        <th style="padding: 20px">Ettől</th>
                        <th style="padding: 20px">Eddig</th>
                        <th style="padding: 10px">Módosítás</th>
                        <th style="padding: 10px">Törlés</th>
                    </tr>
                    @forelse($data as $appointment)
                        @php
                            $isFuture = \Carbon\Carbon::parse($appointment->starttime)->isFuture();
                        @endphp
                        @if(\Carbon\Carbon::now()->lessThan($appointment->starttime))
                            <tr align="center" style="background: #bababa">
                                <td style="padding: 10px">{{ $appointment->id }}</td>
                                <td style="padding: 10px">{{ $appointment->name }}</td>
                                <td style="padding: 10px">{{ $appointment->nk }}</td>
                                <td style="padding: 30px">{{ $appointment->starttime }}</td>
                                <td style="padding: 30px">{{ $appointment->endtime }}</td>
                                <td>
                                    <a href="{{ url('modify_app', $appointment->id) }}" class="btn btn-success">Módosítás</a>
                                </td>
                                <td>
                                    <a href="{{ url('deleteAppointment', $appointment->id) }}" class="btn btn-danger">Törlés</a>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Nincs megjele-níthető foglalás.</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
