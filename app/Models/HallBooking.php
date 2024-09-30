<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallBooking extends Model
{
    use HasFactory;
    protected $fillable = ['date','section','hall', 'time_from','time_to','remarks'];

}
