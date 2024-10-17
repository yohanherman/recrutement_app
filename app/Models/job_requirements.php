<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class job_requirements extends Model
{
    use HasFactory;


    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }
}
