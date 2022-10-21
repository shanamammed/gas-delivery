<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_name_english',
        'service_name_arabic',
        'status',
    ];

    public function serviceTypes()
    {
        return $this->hasMany(ServiceTypes::class, 'service_id', 'id');
    }
}
