<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\ReservationLog;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $query = Reservation::query();

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');
        }

        $reservations = $query->latest()->paginate(15)->onEachSide(1)->withQueryString();

        return view('admin.reservations.index', compact('reservations'));
    }

    public function logs(Request $request)
    {
        $query = ReservationLog::query();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('reservation_name', 'like', '%' . $request->search . '%')
                  ->orWhere('details', 'like', '%' . $request->search . '%')
                  ->orWhere('performed_by', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }

        $logs = $query->latest()->paginate(20)->onEachSide(1)->withQueryString();

        return view('admin.reservations.logs', compact('logs'));
    }

    public function show($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return redirect()->route('admin.reservations.index')->with('error', 'Reservation #' . $id . ' not found or has been deleted.');
        }

        return view('admin.reservations.show', compact('reservation'));
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $reservation->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Reservation status updated successfully.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->back()->with('success', 'Reservation record deleted.');
    }
}
