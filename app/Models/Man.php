<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Man extends Model
{
    use HasFactory;

    protected $table = 'mans';

    protected $fillable = [
        'name',
        'email',
        'birthday'
    ];
}
