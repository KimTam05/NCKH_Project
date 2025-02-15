<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    protected $fillable = [
        'company_name',
        'profile_description',
        'establishment_date',
        'company_website_url',
        'company_email'
    ];

    public $timestamps = false;

    public function userAccount()
    {
        return $this->belongsTo(UserAccount::class, 'user_account_id');
    }

    public function companyImage()
    {
        return $this->hasOne(CompanyImage::class);
    }
}
