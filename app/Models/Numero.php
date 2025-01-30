<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Numero extends Model
{
    protected $fillable = [
        'title', 'description', 'status', 'publication_date',
    ];

    public function Articles()
    {
      return $this->hasMany(Article::class,'numeros_id');
    }
}
