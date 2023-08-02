<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'navbar_status',
        'status',
        'created_by'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'country_id', 'id');
    }
}
