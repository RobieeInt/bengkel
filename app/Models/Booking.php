<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'package_id',
        'status',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function getStatusAttribute($value)
    {
        return $value === 1 ? 'PUBLISH' : 'DRAFT';
    }
}
