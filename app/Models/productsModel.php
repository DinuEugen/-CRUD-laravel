<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productsModel extends Model
{
    use HasFactory;

    protected $fillable=["nume","descriere","categorie","imagine"];
    protected $table="products";
}
