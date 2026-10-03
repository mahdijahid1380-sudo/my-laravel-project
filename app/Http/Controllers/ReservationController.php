<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('user', 'table')->get();

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'table_id' => 'required|integer',
            'res_date' => 'required|date',
            'res_time' => 'required',
            'guest_count' => 'required|integer|min:1',
            'status' => 'required|string|max:255',
        ]);

        Reservation::create([
            'user_id' => $request->user_id,
            'table_id' => $request->table_id,
            'res_date' => $request->res_date,
            'res_time' => $request->res_time,
            'guest_count' => $request->guest_count,
            'status' => $request->status,
        ]);

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation added successfully.');
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'table_id' => 'required|integer',
            'res_date' => 'required|date',
            'res_time' => 'required',
            'guest_count' => 'required|integer|min:1',
            'status' => 'required|string|max:255',
        ]);

        $reservation->update([
            'user_id' => $request->user_id,
            'table_id' => $request->table_id,
            'res_date' => $request->res_date,
            'res_time' => $request->res_time,
            'guest_count' => $request->guest_count,
            'status' => $request->status,
        ]);

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation updated successfully.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation deleted successfully.');
    }
}