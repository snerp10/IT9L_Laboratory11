<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $primaryKey = 'country_id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['country_name', 'region_id'];

    /**
     * Get the region that the country belongs to.
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id', 'region_id');
    }

    /**
     * Get the locations for the country.
     */
    public function locations(): HasMany
    {
        return $this->hasMany(Location::class, 'country_id', 'country_id');
    }
}
