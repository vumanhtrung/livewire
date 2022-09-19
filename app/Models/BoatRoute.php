<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoatRoute extends Model
{
    use SoftDeletes;

    protected $table = 'boat_routes';

    protected $fillable = [
        'boat_id',
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

    public function boat(): BelongsTo
    {
        return $this->belongsTo(Boat::class);
    }
}
