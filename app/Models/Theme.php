<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'manager_id',
    ];

    //  Un thème peut avoir plusieurs articles
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    //  Relation avec **les abonnés** (les utilisateurs qui suivent ce thème)
    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'subscriptions');
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'theme_id');
    }

    //  Relation avec **tous les utilisateurs liés au thème** (responsable + abonnés)
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    public function subscribingUsers()
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'theme_id', 'user_id');
    }
}