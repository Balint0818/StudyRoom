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

    protected function appointment(Request $request)
    {
        if (Auth::id()) {
            $data = new appointment;

            $data->name = $request->name;
            $data->email = $request->email;
            $data->starttime = $request->starttime;
            $data->endtime = $request->endtime;
            $data->room = $request->room;
            $data->nk = $request->nk;
            $data->message = $request->message;
            $data->status = 'Folyamatban';
            if (Auth::id()) {
                $data->user_id = Auth::user()->id;
            }

            $data->save();

            return redirect()->back()->with('message', 'Fogalalás megtörtént, hamarosan értesítünk.');
        } else {
            return redirect()->back();
        }



    }

    public function create_appointment()
    {
        if (Auth::id()) {
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

        } else {
            return redirect()->back();
        }
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
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                return view('admin.home');
            } else {
                return redirect()->back();
            }

        } else {
            return redirect()->back();
        }

    }

    public function restrict()
    {
        return redirect()->back();
    }


}


