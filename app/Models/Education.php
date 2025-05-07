<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'education_detail';
    protected $fillable = [
        'user_account_id',
        'certificate_degree_name',
        'major',
        'insitute_university_name',
        'starting_date',
        'completion_date',
        'percentage',
        'descgpacription',
    ];
    public $timestamps = false;
    public function userAccount()
    {
        return $this->belongsTo(UserAccount::class, 'user_account_id');
    }
    public function getFormattedStartingDateAttribute()
    {
        return \Carbon\Carbon::parse($this->starting_date)->format('d/m/Y');
    }
}
