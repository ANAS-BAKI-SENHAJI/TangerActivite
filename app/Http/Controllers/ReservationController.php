<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
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
            'message'   => $status ? 'Réservation terminée!' : 'Erreur dans la fin de réservation'
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
            'message' => $reservation ? 'Réservation créée!' : 'Erreur lors de la création de la réservation'
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
            'message' => $status ? 'Réservation mise à jour!' : 'Erreur lors de la mise à jour de la réservation'
        ]);
    }

    public function destroy(Reservation $reservation)
    {
        $status = $reservation->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Réservation supprimée!' : 'Erreur lors de la suppression de la réservation'
        ]);
    }
}