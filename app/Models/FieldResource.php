<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldResource extends Model
{
    use HasFactory;

    protected $guarded = [];

    const TYPE_EMAIL_SENT = [
        'title' => "EMAIL_SENT",
        'type' => 'numberType'
    ];
    const TYPE_EMAIL_OPENED = [
        'title' => "EMAIL_OPENED",
        'type' => 'numberType'
    ];

    const TYPE_EMAIL_CLICKED = [
        'title' => "EMAIL_CLICKED",
        'type' => 'numberType'
    ];
    const TYPE_LOCATION = [
        'title' => "LOCATION",
        'type' => 'stringType'
    ];

    const TYPE_SUBSCRIBED_AT = [
        'title' => "SUBSCRIBED_AT",
        'type' => 'dateType'
    ];
}
