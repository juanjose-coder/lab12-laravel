<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    // Campos que se pueden rellenar de forma masiva
    protected $fillable = ['title', 'content'];
}
