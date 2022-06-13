<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory, SoftDeletes;

    public function agencyAbroad()
    {
        return $this->hasOne(Information::class, 'user_id', 'abroad_agency');
    }

    public function author()
    {
        return $this->hasOne(Information::class, 'user_id', 'created_by');
    }
}
