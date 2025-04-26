<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $table = 'work_experience';

    protected $fillable = [
        'user_account_id',
        'job_title',
        'company_name',
        'start_date',
        'end_date',
        'is_current_job',
        'job_description',
    ];

    public function userAccount()
    {
        return $this->belongsTo(UserAccount::class, 'user_account_id');
    }
}