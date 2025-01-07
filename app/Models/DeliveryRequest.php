<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'pickup_address',
        'pickup_name',
        'pickup_contact_no',
        'pickup_email',
        'delivery_address',
        'delivery_name',
        'delivery_contact_no',
        'delivery_email',
        'type_of_good',
        'delivery_provider',
        'priority',
        'shipment_pickup_date',
        'shipment_pickup_time',
        'package_description',
        'length',
        'height',
        'width',
        'weight',
    ];
}
