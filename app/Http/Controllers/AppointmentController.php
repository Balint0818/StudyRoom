<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function delete($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Sikeresen törölted az időpont foglalást!');

    }

    public function update(Request $request, $id)
    {
        $data = Appointment::find($id);
        $data->name = $request->name;
        $data->starttime = $request->starttime;
        $data->endtime = $request->endtime;

        return redirect()->back()->with('message', 'Sikeresen módosítottad');

    }

    public function modify($id)
    {
        $data = Appointment::find($id);
        return view('admin.modify_app', compact('data'));

    }

    public function manage()
    {
        $data = Appointment::all();
        return view('admin.manage_appointments', compact('data'));
    }
}
