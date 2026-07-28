<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'guests',
        'date',
        'time',
        'status',
    ];

    public function logs()
    {
        return $this->hasMany(ReservationLog::class);
    }

    protected static function booted()
    {
        static::created(function ($reservation) {
            ReservationLog::create([
                'reservation_id' => $reservation->id,
                'reservation_name' => $reservation->name,
                'action' => 'created',
                'details' => "Reservation created for {$reservation->guests} guests on {$reservation->date} at {$reservation->time}.",
                'performed_by' => 'Customer',
            ]);
        });

        static::updated(function ($reservation) {
            if ($reservation->isDirty('status')) {
                $oldStatus = $reservation->getOriginal('status');
                $newStatus = $reservation->status;
                $user = auth()->user();
                $performedBy = $user ? $user->name : 'System';

                ReservationLog::create([
                    'reservation_id' => $reservation->id,
                    'reservation_name' => $reservation->name,
                    'action' => 'status_updated',
                    'details' => "Status updated from '{$oldStatus}' to '{$newStatus}'.",
                    'performed_by' => $performedBy,
                ]);
            }
        });

        static::deleted(function ($reservation) {
            $user = auth()->user();
            $performedBy = $user ? $user->name : 'System';

            ReservationLog::create([
                'reservation_id' => null,
                'reservation_name' => $reservation->name,
                'action' => 'deleted',
                'details' => "Reservation #{$reservation->id} for {$reservation->name} was deleted.",
                'performed_by' => $performedBy,
            ]);
        });
    }
}
