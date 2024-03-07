<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'event_id', 'status', 'auto_approve'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    protected static function booted()
    {
        static::creating(function ($reservation) {
            if ($reservation->auto_approve) {
                $reservation->status = 'confirmed';
            }
        });
    }
}
