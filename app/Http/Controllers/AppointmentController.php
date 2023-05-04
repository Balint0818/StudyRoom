<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private function validateInput(Request $request)
    {
        $validated = $request->validate([
            'nk' => ['required', 'regex:/^[a-zA-Z0-9]{6}$/'],
            // add other validation rules here
        ]);

        return $validated;
    }

    public function delete($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Sikeresen törölted az időpont foglalást!');

    }

    public function update(Request $request, $id)
    {
        $validated = $this->validateInput($request);

        $data = Appointment::find($id);
        $data->name = $request->name;
        $data->nk = $request->nk;
        $data->starttime = $request->starttime;
        $data->endtime = $request->endtime;

        $data->save();

        return redirect()->route('manage_appointments')->with('message', 'Sikeresen módosítottad');
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
