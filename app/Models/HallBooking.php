<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallBooking extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'section', 'hall_id', 'time_from', 'time_to', 'remarks'];
    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id'); // Assuming 'hall_id' is the foreign key
    }
}
