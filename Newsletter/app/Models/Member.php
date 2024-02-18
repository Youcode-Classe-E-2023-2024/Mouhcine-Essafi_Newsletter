<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Member extends Model
{
    use HasFactory;

    protected $table = 'subscribers';
    protected $fillable = [
        'email',
        'status'
    ];
}