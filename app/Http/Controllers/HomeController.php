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
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $room = room::all();
                return view('user.home', compact('room'), ['events' => $events]);
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
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

        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
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


    }

    public function create_appointment()
    {
        if (Auth::id()) {
            $room = room::all();
            return view('user.create_appointment', compact('room'));
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


}


