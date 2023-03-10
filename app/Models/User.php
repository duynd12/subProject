<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User  extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id';
    protected $date = ['deleted_at'];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
