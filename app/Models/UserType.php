<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $table = 'user_type';

    protected $fillable = ['user_type_name'];

    public $timestamps = false;
}
