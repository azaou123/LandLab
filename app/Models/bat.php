<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bat extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'DO',
        'btp',
        'i0',
    ];
}
