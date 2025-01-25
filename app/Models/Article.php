<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $fillable = [
        'title', 'content', 'theme_id','numeros_id', 'author_id',  'created_at',
    ];
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function numero()
    {
        return $this->belongsTo(Numero::class,'numeros_id');
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public function commentaire()
    {
        return $this->hasOne(Commentaire::class);
    }
}
