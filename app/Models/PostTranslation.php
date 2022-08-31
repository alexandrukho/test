<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PostTranslation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function language(): HasOne
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }
}
