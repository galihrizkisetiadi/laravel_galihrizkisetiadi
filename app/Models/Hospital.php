<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'telephone'
    ];

    /**
     * Get all of the pasien for the Hospital
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pasien(): HasMany
    {
        return $this->hasMany(Patient::class);
    }
}
