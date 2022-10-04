<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'service_id',
        'service_detail_id',
        'name',
        'description',
        'status',
        'payment_status',
        'payment_proof',
        'total_price',
        'transaction_code',
        'address',
        'phone_number',
        'service_date',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceDetail()
    {
        return $this->belongsTo(ServiceDetail::class);
    }


}
