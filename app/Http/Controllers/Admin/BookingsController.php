<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Room;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBookingsRequest;
use App\Http\Requests\Admin\UpdateBookingsRequest;

class BookingsController extends Controller
{
    /**
     * Display a listing of Booking.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        if (!Gate::allows('booking_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (!Gate::allows('booking_delete')) {
                return abort(401);
            }
            $bookings = Booking::onlyTrashed()->get();
        } else {
            $bookings = Booking::all();
        }

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating new Booking.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('booking_create')) {
            return abort(401);
        }


        $rooms = Room::get()->pluck('room_number', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $users = User::get()->pluck('id','id')->prepend(trans('quickadmin.qa_please_select'),'');
        $rooms2 = Room::get()->pluck('price', 'id');

        return view('admin.bookings.create', compact('rooms','users','rooms2'));
    }

    /**
     * Store a newly created Booking in storage.
     *
     * @param  \App\Http\Requests\StoreBookingsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingsRequest $request)
    {
        if (!Gate::allows('booking_create')) {
            return abort(401);
        }
        $booking = Booking::create($request->all());
        \Session::flash('flash_message','Your reservation was successfully created. Awaiting confirmation from the administrator');
        return redirect()->route('home');
    }


    /**
     * Show the form for editing Booking.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('booking_edit')) {
            return abort(401);
        }


        $rooms = Room::get()->pluck('room_number', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $users = User::get()->pluck('id','id')->prepend(trans('quickadmin.qa_please_select'),'');
        $booking = Booking::findOrFail($id);

        return view('admin.bookings.edit', compact('booking', 'rooms','users'));
    }

    /**
     * Update Booking in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingsRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingsRequest $request, $id)
    {
        if (!Gate::allows('booking_edit')) {
            return abort(401);
        }
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());


        return redirect()->route('admin.bookings.index');
    }


    /**
     * Display Booking.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('booking_view')) {
            return abort(401);
        }
        $booking = Booking::findOrFail($id);

        return view('admin.bookings.show', compact('booking'));
    }


    /**
     * Remove Booking from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('booking_delete')) {
            return abort(401);
        }
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index');
    }

    /**
     * Delete all selected Booking at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('booking_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Booking::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Booking from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (!Gate::allows('booking_delete')) {
            return abort(401);
        }
        $booking = Booking::onlyTrashed()->findOrFail($id);
        $booking->restore();

        return redirect()->route('admin.bookings.index');
    }

    /**
     * Permanently delete Booking from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('booking_delete')) {
            return abort(401);
        }
        $booking = Booking::onlyTrashed()->findOrFail($id);
        $booking->forceDelete();

        return redirect()->route('admin.bookings.index');
    }
    public function diff(Request $request)
    {
        $start_time = \Carbon\Carbon::parse($request->input('time_from'));
        $finish_time = \Carbon\Carbon::parse($request->input('time_to'));
        $diff_days = $start_time->diffInDays($finish_time, false);
    }
}
