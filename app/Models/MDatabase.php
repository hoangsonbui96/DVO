<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class MDatabase extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'm_database';
    use HasFactory;

    protected $fillable = [
        'db_name',
        'db_user',
        'db_pwd',
        'db_host',
        'db_port',
        'ref_family_id'
    ];
}
