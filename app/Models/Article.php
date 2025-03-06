<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $fillable = [
        'title', 'content', 'theme_id','image_url','numeros_id', 'user_id','status', 'created_at',
    ];
    public function theme()
    {
        return $this->belongsTo(Theme::class,'theme_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function numero()
    {
        return $this->belongsTo(Numero::class,'numeros_id');
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
