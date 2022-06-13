<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    public static function belongsToAgency($id, $agency_id)
    {
        return (new static())->where('id', $id)->where('agency_id', $agency_id)->count() > 0;
    }

    public function getAgentsByAgency($id)
    {
        return $this->newQuery()->where('agency_id', $id)->select(['id', 'name'])->get();
    }

    public function candidate()
    {
        return $this->hasMany(Candidate::class, 'agent_id', 'id');
    }
}
