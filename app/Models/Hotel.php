<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;

    protected $table = 'hotels';

    protected $fillable = [
        'country_id',
        'code',
        'name',
        'address',
        'city',
        'postal_code',
        'province_code',
        'country_code',
        'latitude',
        'longitude',
        'phone',
        'website',
        'star',
        'active',
        'sort_order'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function getFullAddressAttribute()
    {
        return "{$this->address}, {$this->city}, {$this->province}, {$this->country->name},  {$this->postal_code}";
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
