<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Validator;

class FindRoomsController extends Controller
{
    public function index(Request $request)
    {
        if (!Gate::allows('find_room_access')) {
            return abort(401);
        }
        $time_from = $request->input('time_from');
        $time_to = $request->input('time_to');


        if ($request->isMethod('POST')) {
              $rooms = Room::whereNotIn('id', function($query) use ($time_from, $time_to) {
            $query->from('bookings')
                ->select('room_id')
                ->where('time_from', '<=', $time_to)
                ->where('time_to', '>=', $time_from);
        })->get();
        } else {
            $rooms = null;
        }


        return view('admin.find_rooms.index', compact('rooms', 'time_from', 'time_to'));
    }
}
