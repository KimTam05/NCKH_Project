<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeekerProfiles extends Model
{
    use HasFactory;

    protected $table = 'seeker_profile';

    protected $fillable = [
        'user_account_id',
        'name',
        'contact_phone',
        'contact_email',
        'file_cv',
    ];

    public $timestamps = false;
    public function userAccount()
    {
        return $this->belongsTo(UserAccount::class, 'user_account_id');
    }
}
