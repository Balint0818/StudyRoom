<?php

namespace App\Http\Controllers;

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

    }


}
