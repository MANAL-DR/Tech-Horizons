<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsibleProposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'theme_id',
        'user_id',
        'status',
        'numeros_id'
    ];
   
    // Relation avec le thème
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
    public function numero()
    {
        return $this->belongsTo(Numero::class,'numeros_id');
    }
    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
}