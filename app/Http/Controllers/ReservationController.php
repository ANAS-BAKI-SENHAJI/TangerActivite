<?php

namespace App\Http\Controllers;

use App\Reservation;
use Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return response()->json(Reservation::with(['activity'])->get(),200);
    }
    public function deliverReservation(Reservation $reservation)
    {
        $reservation->is_delivered = true;
        $status = $reservation->save();

        return response()->json([
            'status'    => $status,
            'data'      => $reservation,
            'message'   => $status ? 'Reservation Delivered!' : 'Error Delivering Reservation'
        ]);
    }

    public function store(Request $request)
    {
        $reservation = Reservation::create([
            'activity_id' => $request->activity_id,
            'user_id' => Auth::id(),
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time
        ]);

        return response()->json([
            'status' => (bool) $reservation,
            'data'   => $reservation,
            'message' => $reservation ? 'Reservation Created!' : 'Error Creating Reservation'
        ]);
    }

    public function show(Reservation $reservation)
    {
        return response()->json($reservation,200);
    }

    public function update(Request $request, Reservation $reservation)
    {
        $status = $reservation->update(
            $request->only(['reservation_date','reservation_time'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Reservation Updated!' : 'Error Updating Reservation'
        ]);
    }

    public function destroy(Reservation $reservation)
    {
        $status = $reservation->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Reservation Deleted!' : 'Error Deleting Reservation'
        ]);
    }
}