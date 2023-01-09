<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id', 'name', 'description', 'price', 'quantity'];
    protected $date = ['deleted_at'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
