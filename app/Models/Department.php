<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $primaryKey = 'department_id';
    protected $fillable = ['department_name', 'location_id'];

    /**
     * Get the location of the department.
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id', 'location_id');
    }

    /**
     * Get the employees for the department.
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'department_id', 'department_id');
    }
}
