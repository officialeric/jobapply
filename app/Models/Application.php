<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'marital', 'region', 'street', 'age',
        'district', 'level', 'preference', 'nationality', 'is_working',
        'has_traveled', 'has_applied', 'has_passport', 'where_working',
        'where_traveled', 'where_applied', 'passport', 'cv',
    ];
}
