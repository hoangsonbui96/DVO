<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
class MFamily extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'm_family';
    use HasFactory;

    protected $fillable = [
        'family_name',
        'family_hometown',
        'family_anniversary'
    ];
}
