<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $primaryKey = 'location_id';
    protected $fillable = ['street_address', 'postal_code', 'city', 'state_province', 'country_id'];

    /**
     * Get the country that the location belongs to.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'country_id');
    }

    /**
     * Get the departments for the location.
     */
    public function departments(): HasMany
    {
        return $this->hasMany(Department::class, 'location_id', 'location_id');
    }
}
