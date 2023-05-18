<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function redirect()
    {
        $appointments = Appointment::all();
        $events = array();
        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->nk,
                'start' => $appointment->starttime,
                'end' => $appointment->endtime,
            ];
        }
                $room = room::all();
                return view('user.home', compact('room'), ['events' => $events]);
    }

    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {
            $room = room::all();
            return view('user.home', compact('room'));
        }

    }

    public function appointment(Request $request)
    {
        $data = new appointment;

        $data->name = Auth::user()->name;
        $data->email = Auth::user()->email;
        $data->starttime = $request->starttime;
        $data->endtime = $request->endtime;
        $data->room = $request->room;
        $data->nk = Auth::user()->nk;
        $data->message = $request->message;
        $data->status = 'Folyamatban';
        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->back()->with('message', 'Fogalalás megtörtént, hamarosan értesítünk.');



    }

    public function create_appointment()
    {
            $appointments = Appointment::all();
            $events = array();
            foreach ($appointments as $appointment) {
                $events[] = [
                    'title' => $appointment->nk,
                    'start' => $appointment->starttime,
                    'end' => $appointment->endtime,
                ];
            }
            $rooms = Room::all();
            return view('user.create_appointment', ['room' => $rooms], ['events' => $events]);
    }


    public function schedule()
    {
        $appointments = Appointment::all();
        $events = array();
        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->nk,
                'start' => $appointment->starttime,
                'end' => $appointment->endtime,
            ];
        }

        return view('user.schedule', ['events' => $events]);
    }

    public function admin_view()
    {
        return view('admin.adminpanel');
    }

    public function restrict()
    {
        return redirect()->back();
    }

    public function myappointments()
    {
        return view('user.myappointments', [
            'appointments' => Appointment::query()->where('user_id', 'LIKE', auth()->id())
                ->orderByDesc('created_at')
                ->orderByDesc('id')
                ->paginate(10),
        ]);
    }

    public function delete($id)
    {
        $data = Appointment::find($id);
        if ($data && $data->user_id != 0 && auth()->id() == $data->user_id) {
            $data->delete();
            return redirect()->back()->with('message', 'Sikeresen törölted az időpont foglalást!');
        } else {
            return redirect()->back()->with('message', 'Sikertelen!');
        }


    }


}


