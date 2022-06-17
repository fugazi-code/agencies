<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'logo_path',
        'poea',
        'cr_no',
        'status',
        'created_by',
    ];

    public static function list()
    {
        return self::query()->select(['id', 'name'])->get()->toArray();
    }

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
