<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use HasFactory;

    protected $primaryKey = 'region_id';
    protected $fillable = ['region_name'];

    /**
     * Get the countries that belong to the region.
     */
    public function countries(): HasMany
    {
        return $this->hasMany(Country::class, 'region_id', 'region_id');
    }
}
