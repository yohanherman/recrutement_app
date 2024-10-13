<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Title_offer',
        'Company_name',
        'Location',
        'Employement_type_id',
        'Salary_range',
    ];
}
