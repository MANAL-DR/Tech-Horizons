<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function Users()
    {
        return $this->belongsToMany(User::class, 'subscriptions');
    }
    public function responsable()
    {
        return $this->belongsTo(User::class,'manager_id');
    }
}
