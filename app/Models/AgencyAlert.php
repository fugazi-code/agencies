<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_id',
        'alert_id',
        'created_by',
    ];

    public static function hasAlert()
    {
        return self::query()->where('agency_id', auth()->user()->agency_id)->with(['level'])->first();
    }

    public function level()
    {
        return $this->hasOne(AlertLevel::class, 'id', 'alert_id');
    }
    public function agency()
    {
        return $this->hasOne(Agency::class, 'id', 'agency_id');
    }
}
