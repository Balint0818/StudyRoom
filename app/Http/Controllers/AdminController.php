<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;


use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Nette\Schema\ValidationException;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_room');

    }

    public function manage_users()
    {
        $users = User::all();
        return view('admin.manageusers', compact('users'));
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

    public function removeAdmin($id)
    {
        $data = User::find($id);
        $data->usertype = '0';
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
        $validator = Validator::make($request->all(), [
            'nk' => ['required', 'regex:/^[A-Z0-9]+$/'],
            'email' => ['required', 'email'],
        ]);

        $validator->messages()->add('nk', 'A Neptun kód 6 karakterből áll, kizárólag számok és betűk lehetnek benne.');
        $validator->messages()->add('email', 'Adj meg egy valós e-mail címet.');

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = User::find($id);
        $data->name = $request->name;
        $data->nk = $request->nk;
        $data->email = $request->email;
        $data->usertype = $request->usertype;

        $data->save();

        return redirect()->back()->with('message', 'Sikeresen módosítottad');
    }


}
