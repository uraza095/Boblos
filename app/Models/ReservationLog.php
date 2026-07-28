<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'reservation_name',
        'action',
        'details',
        'performed_by',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
