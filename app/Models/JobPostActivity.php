<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobPost;
use App\Models\UserAccount;

class JobPostActivity extends Model
{
    use HasFactory;

    protected $table = 'job_post_activity';

    protected $fillable = [
        'user_account_id', 'job_post_id', 'apply_date', 'is_accept'
    ];

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class, 'job_post_id');
    }

    public function user()
    {
        return $this->belongsTo(UserAccount::class, 'user_account_id');
    }
}