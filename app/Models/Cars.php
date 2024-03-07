<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cars extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'path',
        'categorie_id',
        'details',
        'doors',
        'passengers'
    ];  
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'categorie_id'); // Specify the correct foreign key column name
    }
    
}
