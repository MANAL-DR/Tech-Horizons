<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleProposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'theme_id',
        'user_id',
        'status',
    ];

    public function theme()
    {
        return $this->belongsTo(Theme::class); // Une proposition appartient à un thème
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Une proposition est faite par un utilisateur
    }
}