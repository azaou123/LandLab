<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jours_ferrie extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'jour',
    ];
}
