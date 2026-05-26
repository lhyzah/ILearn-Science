<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_school',
        'payment_method',
        'payment_status',
        'email_status',
        'items',
        'totals',
        'checked_out_at',
        'email_sent_at',
        'email_failed_at',
        'email_error',
    ];

    protected $casts = [
        'items' => 'array',
        'totals' => 'array',
        'checked_out_at' => 'datetime',
        'email_sent_at' => 'datetime',
        'email_failed_at' => 'datetime',
    ];
}
