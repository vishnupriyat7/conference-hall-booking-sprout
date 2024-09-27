<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halls extends Model
{
    use HasFactory;
    protected $fillable = ['hall_name', 'hall_code','hall_location'];
}
