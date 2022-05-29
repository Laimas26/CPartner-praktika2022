<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'model_id',
        'user_id',
        'part_id',
        'name',
        'price',
        'image_path',
        'part_wear',
        'make_years',
        'price'
    ];
    protected $casts = [
        'id' => 'string'
    ];

    public function category()
    {
        return $this->belongsTo(PartsCategories::class);
    }
    public function model()
    {
        return $this->belongsTo(VehicleModel::class);
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
