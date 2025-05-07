<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceDetail extends Model
{
    use HasFactory;

    protected $table = 'experience_detail';

    protected $fillable = [
        'user_account_id',
        'start_date',
        'end_date',
        'is_current_job',
        'job_name',
        'company_name',
        'job_location_city',
        'job_location_state',
        'job_location_country',
        'description',
    ];

    public function userAccount()
    {
        return $this->belongsTo(UserAccount::class, 'user_account_id');
    }
}