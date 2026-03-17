<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'type',
        'age',
        'sex',
        'description',
        'health_status',
        'image_path',
        'position',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function adoptionRequests()
    {
        return $this->hasMany(AdoptionRequest::class);
    }
}
