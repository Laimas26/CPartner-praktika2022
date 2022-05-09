<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartsCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    protected $casts = [
        'id' => 'string'
    ];
    
    public function parts()
    {
        return $this->hasMany(Parts::class);
    }
}
