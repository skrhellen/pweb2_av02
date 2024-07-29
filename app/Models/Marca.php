<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $table = "marca";
    
    protected $fillable = [
        "nome",
        "contato",
        "materiais",
    ];
    
    public function joia(){
        return $this->hasOne(Joias::class);
    }

}
