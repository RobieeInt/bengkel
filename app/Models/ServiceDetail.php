<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceDetail extends Model
{
    use HasFactory, softDeletes;

    // protected table
    protected $table = 'service_detail';

    protected $fillable = [
        'service_id',
        'name',
        'description',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
