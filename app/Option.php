<?php

namespace App;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Option extends Model
{
    use UsesSystemConnection;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'prince'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'null'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'prince' => 'decimal',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Return the list of advices for this option.
     *
     * @return HasMany
     */
    public function advices(): HasMany
    {
        return $this->hasMany(Advice::class);
    }
}
