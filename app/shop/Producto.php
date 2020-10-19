<?php

namespace App\shop;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $fillable = ['nombre','descripcion','precio'];

    public static $sortables = ['nombre','precio', 'id'];
}
