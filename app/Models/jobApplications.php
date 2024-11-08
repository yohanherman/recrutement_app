<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobApplications extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'offer_id',
        'recrutor_id',
        'name',
        'phone',
        'location',
        'profile_title',
        'cv',
        'cover_letter',
        'message',
        
    ];
}
