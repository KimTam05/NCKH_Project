<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_image extends Model
{
    use HasFactory;

    protected $table = 'company_image';
    protected $fillable = ['company_id', 'company_image_url'];

    public $timestamps = false;

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }
}
