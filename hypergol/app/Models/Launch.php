<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Launch extends Model
{
    use HasFactory;

    protected $table = 'launches';
    public $timestamps = true;

    protected $fillable = [
        'mission_name',
        'nation',
        'launch_provider',
        'rocket',
        'payload',
        'payload_mass',
        'location',
        'launch_date',
        'image'
    ];
}
