<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'Title_offer',
        'Company_name',
        'Location',
        'Employement_type_id',
        'Salary_range',
        'description'
    ];

    public function responsabilities(): HasMany
    {
        return $this->hasMany(responsabilities::class, 'offer_id');
    }

    public function job_requirements(): HasMany
    {
        return $this->hasMany(job_requirements::class, 'offer_id');
    }
}
