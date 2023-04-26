<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function addview()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                return view('admin.add_room');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function manage_users()
    {
        if (Auth::id()) {
            $users = User::all();

            if (Auth::user()->usertype == '1') {
                return view('admin.manageusers', compact('users'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function upload(Request $request)
    {
        $room = new room;
        $room->name = $request->name;
        $room->opening = $request->opening;
        $room->closing = $request->closing;
        $room->floor = $request->floor;
        $room->save();

        return redirect()->back()->with('message', 'Sikeresen létrehoztad a tanulószobát');
    }

    public function giveAdmin($id)
    {
        $data = User::find($id);
        $data->usertype = '1';
        $data->save();
        return redirect()->back();
    }

    public function update_user($id)
    {
        $data = User::find($id);
        return view('admin.update', compact('data'));

    }

    public function edituser(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->nk = $request->nk;
        $data->email = $request->email;
        $data->usertype = $request->usertype;

        $data->save();

        return redirect()->back()->with('message', 'Sikeresen módosítottad');

    }

    public function manage()
    {
        $data = Appointment::all();
        return view('admin.manage_appointments', compact('data'));
    }

    public function modify($id)
    {
        $data = Appointment::find($id);
        return view('admin.modify_app', compact('data'));

    }

    public function modified(Request $request, $id)
    {
        $data = Appointment::find($id);
        $data->name = $request->name;
        $data->starttime = $request->starttime;
        $data->endtime = $request->endtime;

        $data->save();

        return redirect()->back()->with('message', 'Sikeresen módosítottad');

    }
}
