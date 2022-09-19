<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $table = 'countries';

    protected $fillable = [
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

    public function getWardsAttribute()
    {
        if( ! array_key_exists('wards', $this->relations)) $this->wards();

        return $this->getRelation('wards');
    }

    public function provinces(): HasMany
    {
        return $this->hasMany(Province::class);
    }

    public function districts(): HasManyThrough
    {
        return $this->hasManyThrough(District::class, Province::class);
    }

    public function wards()
    {
        $wards = Ward::join('districts', 'wards.district_id', '=', 'districts.id')
            ->join('provinces', 'districts.province_id', '=', 'provinces.id')
            ->where('provinces.country_id', $this->getkey())
            ->get();

        $hasMany = new HasMany($this->query(), $this, 'provinces.country_id', 'id');

        $hasMany->matchMany(array($this), $wards, 'wards');

        return $this;
    }

}
