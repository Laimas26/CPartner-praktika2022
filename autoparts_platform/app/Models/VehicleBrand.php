<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBrand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    
    protected $casts = [
        'id' => 'string'
    ];

    public function model()
    {
        return $this->hasMany(VehicleModel::class);
    }
}
