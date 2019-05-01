<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Greabock\Tentacles\EloquentTentacle;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use UsesTenantConnection, EloquentTentacle, Notifiable, HasRoles, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'email_verified_at', 'remember_token', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Return the name of the highest role.
     *
     * @return string
     */
    public function role()
    {
        if (sizeof($this->roles->pluck('name')) === 0) {
            return "Ok";
        } else {
            return $this->roles->pluck('name')[0];
        }
    }

    /**
     * Returns the user avatar's URL.
     *
     * @return string
     */
    public function avatar()
    {
        if ($this->getFirstMedia('avatar') !== null) {
            return $this->getFirstMedia('avatar')->getUrl('thumb');
        } elseif ($this->getFirstMedia('avatar') === null) {
            return "https://cdn.pixabay.com/photo/2016/06/18/17/42/image-1465348_960_720.jpg";
        }
    }

    /*
     * Definition of collections for the media
     *
     * Return MediaCollection
     */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Manipulations::FIT_STRETCH, 250, 250);
            });

    }
}
