<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "authors";
    protected $fillable = [
        'name', 'date_of_birth', 'place_of_birth', 'gender', 'email','hp'
    ];
}