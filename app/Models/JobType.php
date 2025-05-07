<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobPost;

class JobType extends Model
{
    use HasFactory;

    protected $table = 'job_type';

    protected $fillable = [
        'job_type'
    ];

    public $timestamps = false;

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'job_type_id');
    }
}