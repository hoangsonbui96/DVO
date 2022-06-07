<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
class Thongtindongho extends Model
{
    protected $connection = 'mongodb2';
    protected $collection = 'thongtindongho';
    use HasFactory;

    protected $fillable = [
        'Name',
        'Que_quan',
        'Univer_day'
    ];
}
