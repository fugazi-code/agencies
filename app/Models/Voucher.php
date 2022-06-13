<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "agency_id",
        "name",
        "status",
        "source",
        "requirements",
        "passporting_allowance",
        "ticket",
        "tesda_allowance",
        "nbi_renewal",
        "medical_allowance",
        "pdos",
        "info_sheet",
        "owwa_allowance",
        "office_allowance",
        "travel_allowance",
        "weekly_allowance",
        "medical_follow_up",
        "created_by",
        "nbi_refund",
        "psa_refund",
        "passport_refund",
        "fare_refund",
        "red_rebon_nbi",
        "fit_to_work",
        "repat",
        "stamping",
        "vaccine_fare",
    ];

    protected $with = ['user', 'agency'];

    public function information()
    {
        return $this->hasOne(Information::class, 'user_id', 'created_by');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function agency()
    {
        return $this->hasOne(Agency::class, 'id', 'agency_id');
    }
}
