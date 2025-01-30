<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme_id',
        'total_articles',
        'proposals_pending',
        'proposals_approved',
        'proposals_rejected',
        'total_subscribers',
    ];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
