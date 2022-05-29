<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seller extends Model
{
    use HasFactory, Uuids;


    protected $fillable = [
        'name',
        'user_id',
        'address',
        'email',
        'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function parts()
    {
        return $this->hasMany(Parts::class);
    }
}
