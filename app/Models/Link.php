<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MultiTenantModelTrait;

class Link extends Model
{
    use HasFactory, MultiTenantModelTrait;

    protected $fillable = [
        'destination',
        'times'
    ];
}
