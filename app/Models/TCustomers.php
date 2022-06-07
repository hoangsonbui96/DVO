<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class TCustomers extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 't_customer';
    use HasFactory;

    protected $fillable = [
        'user_name',
        'password',
        'full_name',
        'birth_day',
        'phone',
        'email'
    ];

    public function test(): void{
        echo("test");
    }
}
