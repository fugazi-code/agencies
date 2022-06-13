<?php

namespace App\Models;

use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'agency_id',
        'position_1',
        'position_2',
        'position_3',
        'skills',
        'employer_id',
        'status',
        'salary',
        'position_selected',
        'date_hired',
        'agency_abroad_id',
        'deployed',
        'date_deployed',
        'passport',
        'place_issue',
        'dos',
        'doe',
        'remarks',
        'kin',
        'kin_relationship',
        'kin_contact',
        'kin_address',
        'applied_using',
        'agency_branch',
        'code',
        'iqama',
        'photo_url',
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'fb_account',
        'contact_1',
        'contact_2',
        'address',
        'birth_date',
        'birth_place',
        'civil_status',
        'gender',
        'blood_type',
        'height',
        'weight',
        'religion',
        'language',
        'education',
        'spouse',
        'mother_name',
        'father_name',
        'agreed',
        'travel_status',
        'deleted_at',
        'created_at',
        'updated_at',
        'skills_other',
    ];

    public function employment()
    {
        return $this->hasMany(EmploymentHistory::class, 'candidate_id', 'id');
    }

    public function document()
    {
        return $this->hasMany(Document::class, 'candidate_id', 'id');
    }

    public function documentCV()
    {
        return $this->hasMany(Document::class, 'candidate_id', 'id');
    }

    public function documentPic1x1()
    {
        return $this->hasOne(Document::class, 'candidate_id', 'id')->where('type', 'pic1x1');
    }

    public function documentPicFull()
    {
        return $this->hasOne(Document::class, 'candidate_id', 'id')->where('type', 'picfull');
    }

    public function agency()
    {
        return $this->hasOne(Agency::class, 'id', 'agency_id');
    }

    public function employer()
    {
        return $this->hasOne(Information::class, 'user_id', 'employer_id');
    }

    public function affiliates()
    {
        return $this->hasOne(Information::class, 'user_id', 'agency_abroad_id');
    }

    public static function belongsToAgency($id, $agency_id)
    {
        return (new static())->where('id', $id)->where('agency_id', $agency_id)->count() > 0;
    }

    public static function belongsToEmployer($id, $agency_id)
    {
        return (new static())->where('id', $id)->where('employer_id', $agency_id)->count() > 0;
    }

    public function store($request)
    {
        $faker = Factory::create();
        $code  = $faker->hexColor;

        $candidate                   = new $this;
        $candidate->code             = $code;
        $candidate->agency_id        = $request->agency_id;
        $candidate->passport         = $request->passport;
        $candidate->position_1       = $request->position_1;
        $candidate->position_2       = $request->position_2;
        $candidate->position_3       = $request->position_3;
        $candidate->first_name       = $request->first_name;
        $candidate->middle_name      = $request->middle_name;
        $candidate->last_name        = $request->last_name;
        $candidate->language         = $request->language;
        $candidate->birth_date       = $request->birth_date;
        $candidate->gender           = $request->gender;
        $candidate->civil_status     = $request->civil_status;
        $candidate->spouse           = $request->spouse;
        $candidate->blood_type       = $request->blood_type;
        $candidate->height           = $request->height;
        $candidate->weight           = $request->weight;
        $candidate->religion         = $request->religion;
        $candidate->mother_name      = $request->mother_name;
        $candidate->father_name      = $request->father_name;
        $candidate->contact_1        = $request->contact_1;
        $candidate->contact_2        = $request->contact_2;
        $candidate->email            = $request->email;
        $candidate->address          = $request->address;
        $candidate->agreed           = $request->agreed;
        $candidate->status           = 'applicant';
        $candidate->place_issue      = $request->place_issue;
        $candidate->birth_place      = $request->birth_place;
        $candidate->travel_status    = $request->travel_status;
        $candidate->iqama            = $request->iqama;
        $candidate->education        = $request->education;
        $candidate->applied_using    = $request->applied_using;
        $candidate->deployed         = 'no';
        $candidate->applied_using    = $request->applied_using;
        $candidate->doe              = $request->doe;
        $candidate->dos              = $request->dos;
        $candidate->remarks          = $request->remarks;
        $candidate->skills           = $request->skills;
        $candidate->kin              = $request->kin;
        $candidate->kin_relationship = $request->kin_relationship;
        $candidate->kin_contact      = $request->kin_contact;
        $candidate->kin_address      = $request->kin_address;
        $candidate->fb_account       = $request->fb_account;
        $candidate->skills_other     = json_encode($request->skills_other);
        $candidate->save();

        return $candidate;
    }
}
