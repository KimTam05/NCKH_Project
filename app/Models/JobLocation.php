<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobPost;

class JobLocation extends Model
{
    use HasFactory;

    protected $table = 'job_location';

    protected $fillable = [
        'name'
    ];

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'job_location_id');
    }
}