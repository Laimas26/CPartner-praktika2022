<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'name',
        'region_id',
    ];
    protected $casts = [
        'id' => 'string'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
