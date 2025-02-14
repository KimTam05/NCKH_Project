<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    use HasFactory;

    protected $table = 'user_account';

    protected $fillable = [
        'name', 'email', 'password'
    ];
    protected $hidden = [
        'password'
    ];

    public $timestamps = false;

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'post_by_id');
    }

    public function jobPostActivities()
    {
        return $this->hasMany(JobPostActivity::class, 'user_account_id');
    }

    public function savedJobs()
    {
        return $this->belongsToMany(JobPost::class, 'saved_jobs', 'user_account_id', 'job_post_id');
    }
}
