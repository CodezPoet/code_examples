<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Organisation extends Model
{
    protected $fillable = ['name', 'type', 'lang_code'];

    public function languages(): BelongsTo
    {
        return $this->belongsTo(LanguageCode::class, 'lang_code_id');
    }

    public function languageCode()
    {
        return $this->belongsTo(LanguageCode::class, 'lang_code', 'lang_code'); 
    }
}
