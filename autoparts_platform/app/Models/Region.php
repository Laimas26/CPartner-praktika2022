<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'name',
    ];
    protected $casts = [
        'id' => 'string'
    ];

    public function parts()
    {
        return $this->hasMany(Cities::class);
    }
}
