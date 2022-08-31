<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function posts(): HasMany
    {
        return $this->hasMany(PostTranslation::class, 'language_id', 'id');
    }
}
