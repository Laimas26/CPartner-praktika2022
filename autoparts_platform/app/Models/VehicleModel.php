<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    protected $casts = [
        'id' => 'string'
    ];

    public function brand()
    {
        return $this->belongsTo(VehicleBrand::class);
    }
}
