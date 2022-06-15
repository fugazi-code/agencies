<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    public static function getNameById($id)
    {
        return (new static())->newQuery()->where('user_id',$id)->pluck('name')[0];
    }
}
