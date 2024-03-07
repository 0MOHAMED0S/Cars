<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'active'
    ];
    public function car(): HasMany
    {
        return $this->hasMany(Cars::class, 'categorie_id');
    }
}
