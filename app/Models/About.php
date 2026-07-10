<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'name', 'headline', 'short_bio', 'full_bio', 'photo', 'email', 'whatsapp', 'location', 'linkedin', 'instagram', 'github', 'cta_text', 'open_to_work'
    ];
}
