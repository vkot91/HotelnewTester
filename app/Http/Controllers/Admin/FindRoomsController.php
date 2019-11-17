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
            $rooms = Room::with('booking')->whereHas('booking', function ($q) use ($time_from, $time_to) {
                $q->where(function ($q2) use ($time_from, $time_to) {
                    $q2->where('time_from', '>=', $time_to)
                       ->orWhere('time_to', '<=', $time_from);
                });
            })->orWhereDoesntHave('booking')->get();
        } else {
            $rooms = null;
        }


        $rules = array(

            'time_from' => 'required|date_format:Y-m-d|before_or_equal:time_to',
            'time_to' => 'required|date_format:Y-m-d|after_or_equal:time_from'

        );

        $validator = Validator::make($request->all(), $rules);
        return view('admin.find_rooms.index', compact('rooms', 'time_from', 'time_to','validator'));
    }
}
