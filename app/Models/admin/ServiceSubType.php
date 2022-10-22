<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceSubType extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'service_id',
        'service_type_english',
        'service_type_arabic',
        'has_sub_type',
        'price',
    ];
}
