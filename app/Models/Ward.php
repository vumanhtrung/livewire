<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ward extends Model
{
    use SoftDeletes;

    protected $table = 'wards';

    protected $fillable = [
        'district_id',
        'name',
        'code',
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

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function province(): HasOneThrough
    {
        return $this->hasOneThrough(Province::class, District::class, 'id', 'id', 'district_id', 'province_id');
    }
}
