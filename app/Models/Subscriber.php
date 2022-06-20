<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;
    protected $fillable = [
        'email', 'name', 'state'
    ];

    const STATUS_ACTIVE = "ACTIVE";
    const STATUS_UNSUBSCRIBED = "UNSUBSCRIBED";
    const STATUS_JUNK = "JUNK";
    const STATUS_BOUNCED = "BOUNCED";
    const STATUS_UNCONFIRMED = "UNCONFIRMED";

    public const STATES = [
        self::STATUS_ACTIVE, self::STATUS_BOUNCED, self::STATUS_JUNK, self::STATUS_UNCONFIRMED, self::STATUS_UNSUBSCRIBED
    ];

    public function fields()
    {
        return $this->hasMany(FieldResource::class);
    }
}
