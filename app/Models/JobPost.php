<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserAccount;
use App\Models\JobType;
use App\Models\JobLocation;
use App\Models\Category;
use App\Models\JobPostActivity;

class JobPost extends Model
{
    use HasFactory;

    protected $table = 'job_post';

    protected $fillable = [
        'post_by_id', 'job_type_id', 'created_at', 'description', 'job_location_id', 'is_active', 'job_title', 'date_expired', 'date_receiving_applications', 'salary', 'category_id', 'file_description'
    ];

    public function postedBy()
    {
        return $this->belongsTo(UserAccount::class, 'post_by_id');
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }

    public function jobLocation()
    {
        return $this->belongsTo(JobLocation::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function activities()
    {
        return $this->hasMany(JobPostActivity::class, 'job_post_id');
    }
}