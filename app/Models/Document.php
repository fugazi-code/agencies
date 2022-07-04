<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'filename',
        'path',
        'type',
        'created_by',
        'deleted_at',
    ];

    public function doc()
    {
        return $this->hasOne(OptionList::class, 'id', 'type');
    }
}
