<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function employee(){
        return $this->hasOne(Candidate::class, 'id', 'candidate_id');
    }

    public function employer(){
        return $this->hasOne(Information::class, 'user_id', 'employer_id');
    }
}
