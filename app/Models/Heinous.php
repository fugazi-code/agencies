<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heinous extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'priority',
        'created_by',
    ];
}
