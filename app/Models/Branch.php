<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Branch extends Model
{
    use HasFactory;

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function customers(): Builder|HasMany
    {
        return $this->hasMany(User::class, 'branch_id')
            ->customers();
    }

    public function manager(): HasOne|Builder
    {
        return $this->hasOne(User::class, 'branch_id')
            ->managers();
    }

    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class);
    }

    public function getFullAddressAttribute(): string
    {
        return "$this->address, $this->city, $this->state";
    }
}
