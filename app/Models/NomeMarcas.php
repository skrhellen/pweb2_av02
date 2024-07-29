<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomeMarcas extends Model
{
    use HasFactory;

    protected $table = "nomemarcas";
    //app/Models/
    protected $fillable = [
        "nomemarcas",
    ];
}