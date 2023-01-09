<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class Profile extends Model
{
    use HasFactory, SoftDeletes, Schema;

    protected $date = ['deleted_at'];
}
