<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        "color_level",
        "description",
        "name",
        "created_by"
    ];
}
