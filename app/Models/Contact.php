<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use Notifiable;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['name', 'email', 'phone', 'message', 'attachment', 'ip'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
    ];
}
